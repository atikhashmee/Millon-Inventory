


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

       $sql[7] = "SELECT `paydate`, `employee_id`, `pament`, `token` FROM `target` WHERE token='comisn_paid'";

         $dateext = [];
         $dateext[0] =" AND `selldate`";
         $dateext[1] =" AND `recievedate`";
         $dateext[2] =" AND `pay_date`";
         $dateext[3] =" AND `expiredate`";
         $dateext[4] =" WHERE `expendituredate`";
         $dateext[5] =" WHERE `payment_date`";
         $dateext[6] =" AND `purchasedate`";
         $dateext[7] =" WHERE `transerdate`";
         $dateext[7] =" AND `paydate`";

       if (!empty($start) && empty($end)) 
       {
         for ($i=0; $i <8 ; $i++) 
         { 
           $sql[$i] .= $dateext[$i]." ='{$start}'";
         }
       }

       if (!empty($start) && !empty($end)) 
       {
         for ($i=0; $i <8 ; $i++) 
         { 
           $sql[$i] .= $dateext[$i]." BETWEEN '{$start}' AND '{$end}'";
         }
       }

       $query = implode(" UNION ", $sql);
      // echo $query;

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
                       return +(int)$amounts;
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
                      if ($tkens[2] == 1) 
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
                      $str = '<p class="description">Payment Paid to supplier <a href="#">'.$GLOBALS['fn']->getUserName($customerid).'</a></p>';
                    }
                   else  if ($tkn == "rac_Cash") 
                    {
                      $str = '<p class="description">Payment collection from customer <a href="#">'.$GLOBALS['fn']->getUserName($customerid).'</a> </p>';
                    }
                   else  if ($tkn == "s_Cash") 
                    {
                      $str = '<p class="description">Product sold payment from customer <a href="#">'.$GLOBALS['fn']->getUserName($customerid).'</a> </p>';
                    }
                    else if ($tkn == "p_Cash") 
                    {
                      $str = '<p class="description">Purchase Payment to supplier <a href="#">'.$GLOBALS['fn']->getUserName($customerid).'</a> </p>';
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