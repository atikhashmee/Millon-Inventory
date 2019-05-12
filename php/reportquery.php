


<?php
    
    function cashRawQuery($start="",$end="")
    {
      $sql = [];
       $sql[0] = "SELECT `selldate`, `customerid`, `payment_taka`, `token` FROM `sell` WHERE `token` = 's_Cash'";

       $sql[1] =  "SELECT `recievedate`, `cusotmer_id`, `amounts`, `bycashcheque` FROM `recevecollection` WHERE `bycashcheque` = 'rac_Cash'";

       $sql[2] = "SELECT `pay_date`, `sup_id`, `amnts`, `status` FROM `supplierpayment` WHERE `status`='pts_Cash'";

       $sql[3] = "SELECT `expiredate`, `customerid`, `amount`, `fromtable` FROM `cheque` WHERE `approve`='1'";

       $sql[4] = " SELECT `expendituredate`, `accountsid`, `amount`, `token` FROM `expenditure`";

       $sql[5] = "SELECT `payment_date`, `employeeid`,`amount_pay`, `token` FROM `e_payment_salery`";

       $sql[6] =  "SELECT `purchasedate`, `supplier`, `payment_taka`, `token` FROM `purchase` where `token` = 'p_Cash'";

       $sql[7] = "SELECT `transerdate`, `to`, `amounts`, `bycashcheque` FROM `banktransfer`"; 

       $sql[8] = "SELECT `paydate`, `employee_id`, `pament`, `token` FROM `target` WHERE token='comisn_paid'";

         $dateext = [];
         $dateext[0] =" AND `selldate`";
         $dateext[1] =" AND `recievedate`";
         $dateext[2] =" AND `pay_date`";
         $dateext[3] =" AND `expiredate`";
         $dateext[4] =" WHERE `expendituredate`";
         $dateext[5] =" WHERE `payment_date`";
         $dateext[6] =" AND `purchasedate`";
         $dateext[7] =" WHERE `transerdate`";
         $dateext[8] =" AND `paydate`";

       if (!empty($start) && empty($end)) 
       {
         for ($i=0; $i <9 ; $i++) 
         { 
            if ($i == 0 ) {
                 $sql[$i] .= $dateext[$i]." ='{$start}'";
                 $sql[$i] .= "GROUP BY `billchallan`";
             } else {
               $sql[$i] .= $dateext[$i]." ='{$start}'"; 
             }
           
         }
       }

       if (!empty($start) && !empty($end)) 
       {
         for ($i=0; $i <9 ; $i++) 
         { 
            if ($i == 0) {

              $sql[$i] .= $dateext[$i]." BETWEEN '{$start}' AND '{$end}'";
              $sql[$i] .= "GROUP BY `billchallan`";
            }else{
               $sql[$i] .= $dateext[$i]." BETWEEN '{$start}' AND '{$end}'";
            }
          
         }
       }

       $query = implode("UNION ALL ", $sql);
       //echo $query;

       return $query;
    }
	
   function cashReport($date)
	 {
	        	$sql =  cashRawQuery($date);
                        
            $data = $GLOBALS['db']->joinQuery($sql)->fetchAll();
            return  $data;
	 }

	function previousDayCash()
	{
   
           $i=1;
           while (1) 
           {
             $prv = $GLOBALS['df']->sub(new DateInterval('P'.$i.'D'))->format('Y-m-d');
             if (datewiseCashBalance($prv)>0) 
             {
               return datewiseCashBalance($prv);
             }
             $i++;

           }
	}
                         /**
                          *   class decalarion for the calculation of previous cash
                          */
                         class DateWiseBalance
                         {
                           
                           public $date; 
                           public $amount;
                           public $starting;
                           public $ending;
                           
                           function __construct($date, $amount)
                           {
                              
                              $this->date = $date; 
                              $this->amount = $amount;
                           }
                         }

              function calculatePreviCash(){

                    $openingbalance =  $GLOBALS['db']->joinQuery("SELECT `opening_balance` FROM `charts_accounts` WHERE `charts_id`='4'")->fetch(PDO::FETCH_ASSOC);
              $last50 = array();
              for ($i=0; $i < 50; $i++) { 
                        $d =  new DateTime('now', new DateTimezone('Asia/Dhaka'));
                        $di = $d->sub(new DateInterval('P'.$i.'D'))->format('Y-m-d');
                        if(datewiseCashBalance($di) != 0){

                                 array_push($last50, new DateWiseBalance( $di, datewiseCashBalance($di)) );
                          }
                              
                        }

                        $openingblance  = (double) $openingbalance['opening_balance']; 

                        $balances = array();

                        for($j = count($last50)-1; $j>=0; $j--) 
                            {   
                                //echo $openingblance."<br>";
                              $last50[$j]->starting = $openingblance;
                                  $openingblance += $last50[$j]->amount;
                                  $last50[$j]->ending = $openingblance;
                                  $balances[$last50[$j]->date]   = $last50[$j]->ending;
                                  $openingblance =   $last50[$j]->ending;
                            }
                            return [
                                  "p_objs" => $last50,
                                  "p_arrays" => $balances
                            ];

              }
  function previCash($todate=""){
      
                    $balances = calculatePreviCash()['p_arrays'];


                            /*echo "<pre>";
                            print_r($balances);
                            print_r( array_values(array_slice($balances, -1, 1))[0] );
                            echo "</pre>";*/

                            //show output results
                            if (empty($todate)) {
                               return  array_values(array_slice($balances, -2, 1))[0];
                            }
                            else{

                                if (array_key_exists($todate, $balances)) {
                                     return  $balances[$todate];
                                }
                                else{




                                        $firs_holder = array_keys($balances)[0];
                                        $last_holder = array_keys($balances)[count($balances)-1];

                                        if (strtotime($todate) < strtotime($firs_holder) ) return (double) $openingbalance['opening_balance'];
                                    
                                        else if(strtotime($todate) >  strtotime($last_holder))  return end($balances);

                                        else{
                                          

                                            foreach ($balances as $arr) {
                                                  
                                                  current($balances);

                                                     if (strtotime(key($balances)) < strtotime($todate)) {
                                                         next($balances);

                                                          if (strtotime(key($balances)) > strtotime($todate)) {
                                                                prev($balances);
                                                               return $balances[key($balances)];
                                                          }
                                                     }
                                                  
                                                  
                                                // echo $next." ".$prev."  ". $current."<br>";
                                                /*if ( strtotime(key($current)) < strtotime($todate) && strtotime( key($next) ) <  strtotime($todate) ) {
                                                    return $balances[key($current)];
                                                }*/
                                            }

                                                   
                                            
                                        }



                                    /*  echo "<pre>";
                                         echo array_keys($balances)[0]."</br>";
                                         echo  $last_holder."<br>";
                                         echo end($balances)."</br>";
                                         echo reset($balances)."</br>";
                                      echo "</pre>";*/

                                 /* $d =  new DateTime( $todate, new DateTimezone('Asia/Dhaka'));
                                  $di = $d->sub(new DateInterval('P'.$i.'D'))->format('Y-m-d');*/
                                  return -1;
                                    
                                }
                            }
       
  }


  function datewiseCashBalance($previousday)
  {
    $data =  $GLOBALS['db']->joinQuery(cashRawQuery($previousday));
    $sum = 0;
    foreach ($data as $val)
      {
         $sum += getMoneyToken(trim($val['token']),trim($val['payment_taka']));
      }

    return $sum;
  }



    function getMoneyToken($tkn,$amounts)
    { 
                      
             
                   if ($tkn == "pts_Cash") 
                    {
                       return  -$amounts;
                    }
                    else if ($tkn == "rac_Cash") 
                    {
                       return +$amounts;
                    }
                    else  if ($tkn == "s_Cash") 
                    {
                       return +$amounts;
                    }
                    else if ($tkn== "p_Cash") 
                    {
                      return -$amounts;
                    }
                    else if ($tkn == "add") 
                    {
                       return +$amounts;
                    } 
                    else if (substr($tkn, 0,7) == "expense") 
                    {
                       return -$amounts;
                    }
                    else if (substr($tkn, 0,5) == "stuff") 
                    {
                       return -$amounts;
                    }
                    
                    else if ($tkn == "minus") 
                    {
                       return -$amounts;
                    }
                    else if ($tkn == "salerypayment") 
                    {
                       return -$amounts;
                    }
                    else if ($tkn == "comisn_paid") 
                    {
                       return -$amounts;
                    }
                    else if (substr($tkn,0,7) == "ct_Cash") 
                    {
                      $tkens = explode("_", $tkn);

                      if ($GLOBALS['fn']->Chartsaccounta($tkens[2]) == "Cash") 
                      {
                            return -$amounts;
                      }
                      else 
                      {
                             return +$amounts;  
                      }
                      
                    }
    }





 


  function detailsOfAction($tkn,$customerid)
  {
         $str = "No caption";
                   if ($tkn == "pts_Cash") 
                    {
                      $str = '<p class="description">Payment Paid to supplier <a href="supplier-history-1.php?supid='.$customerid.'">'.$GLOBALS['fn']->getUserName($customerid).'</a></p>';
                    }
                   else  if ($tkn == "rac_Cash") 
                    {
                      $str = '<p class="description">Payment collection from customer <a href="customer-history.php?cusid='.$customerid.'">'.$GLOBALS['fn']->getUserName($customerid).'</a> </p>';
                    }
                   else  if ($tkn == "s_Cash") 
                    {
                      $str = '<p class="description">Product sold payment from customer <a href="customer-history.php?cusid='.$customerid.'">'.$GLOBALS['fn']->getUserName($customerid).'</a> </p>';
                    }
                    else if ($tkn == "p_Cash") 
                    {
                      $str = '<p class="description">Purchase Payment to supplier <a href="supplier-history-1.php?supid='.$customerid.'">'.$GLOBALS['fn']->getUserName($customerid).'</a> </p>';
                    }
                    else if ($tkn == "add") 
                    {
                      $str = '<p class="description">Cheque has been withdrawn from the customer <a href="#">'.$GLOBALS['fn']->getUserName($customerid).'</a> </p>';
                    } 
                    else if (substr($tkn, 0,7) == "expense") 
                    {
                      $tkens = explode("_", $tkn);
                      $str = '<p class="description">Bill paid for <a href="#">'.$GLOBALS['fn']->expenseCategory($tkens[1]).'</a> </p>';
                    }
                    else if (substr($tkn, 0,5) == "stuff") 
                    {
                      $tkens = explode("_", $tkn);
                      $str = '<p class="description">Bill paid for <a href="#">'.$GLOBALS['fn']->expenseCategory($tkens[1]).'</a> to employee <a href="#">'.$GLOBALS['fn']->getUserName($tkens[2]).'</a> </p>';
                    }
                    else if (substr($tkn,0,7) == "ct_Cash") 
                    {
                      $tkens = explode("_", $tkn);
                      $str = '<p class="description">Money transfar from  <a href="#">'.$GLOBALS['fn']->Chartsaccounta($tkens[2]).'</a> to  <a href="#">'.$GLOBALS['fn']->Chartsaccounta($tkens[3]).'</a> </p>';
                    }
                    
                    else if ($tkn == "minus") 
                    {
                      $str = '<p class="description">Cheque Payment to supplier <a href="#">'.$GLOBALS['fn']->getUserName($customerid).'</a> </p>';
                    }
                    else if ($tkn == "salerypayment") 
                    {
                      $str = '<p class="description">Salery Payment to Employee <a href="#">'.$GLOBALS['fn']->getUserName($customerid).'</a> </p>';
                    }else if ($tkn == "comisn_paid") 
                    {
                      $str = '<p class="description">Commsion Paid to Marketing <a href="#">'.$GLOBALS['fn']->getUserName($customerid).'</a> </p>';
                    }
            return $str;
  }


?>