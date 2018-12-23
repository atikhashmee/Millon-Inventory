


<?php

	
   function cashReport($date)
	{
		$sql = "SELECT `selldate`, `customerid`, `payment_taka`, `token` FROM `sell` WHERE `token` = 's_Cash' AND `selldate`= '{$date}'
          UNION 
         SELECT `recievedate`, `cusotmer_id`, `amounts`, `bycashcheque` FROM `recevecollection` WHERE `bycashcheque` = 'rac_Cash' AND  `recievedate` = '{$date}'
         UNION 
         SELECT `pay_date`, `sup_id`, `amnts`, `status` FROM `supplierpayment` WHERE `status`='pts_Cash' AND  `pay_date` = '{$date}'  
         UNION 
         SELECT `expiredate`, `customerid`, `amount`, `fromtable` FROM `cheque` WHERE `approve`='1' AND  `expiredate` = '{$date}' 
         UNION 
         SELECT `expendituredate`, `accountsid`, `amount`, `token` FROM `expenditure` WHERE `expendituredate`= '{$date}' 
         UNION 
         SELECT `payment_date`, `employeeid`,`amount_pay`, `token` FROM `e_payment_salery` WHERE `payment_date` = '{$date}'
         UNION 
         SELECT `purchasedate`, `supplier`, `payment_taka`, `token` FROM `purchase` where `token` = 'p_Cash' AND `purchasedate` = '{$date}' 

            UNION 
            SELECT `transerdate`, `to`, `amounts`, `bycashcheque` FROM `banktransfer` WHERE `transerdate`= '{$date}'";
            $data = $GLOBALS['db']->joinQuery($sql)->fetchAll();
            return  $data;
	}

	function previousDayCash($previousday)
	{
		$data =  cashReport($previousday);
		$sum = 0;
		foreach ($data as $val)
		 {
			$amounts = trim($val['payment_taka']);
			$tkn = trim($val['token']);
                    if ($tkn == "pts_Cash") 
                    {
                       $sum -= $amounts;
                    }
                    if ($tkn == "rac_Cash") 
                    {
                       $sum += $amounts;
                    }
                   else  if ($tkn == "s_Cash") 
                    {
                       $sum += $amounts;
                    }
                    else if ($tkn== "p_Cash") 
                    {
                      $sum -= $amounts;
                    }
                    else if ($tkn == "add") 
                    {
                       $sum += $amounts;
                    } 
                    else if (substr($tkn, 0,7) == "expense") 
                    {
                       $sum -= $amounts;
                    }
                    else if (substr($tkn, 0,5) == "stuff") 
                    {
                       $sum -= $amounts;
                    }
                    
                    else if ($tkn == "minus") 
                    {
                       $sum -= $amounts;
                    }
                    else if ($tkn == "salerypayment") 
                    {
                       $sum -= $amounts;
                    }
                    else if (substr($tkn,0,7) == "ct_Cash") 
                    {
                      $tkens = explode("_", $tkn);
                      if ($tkens[2] == 1) 
                      {
                            $sum -= $amounts;
                      }
                      else 
                      {
                             $sum += $amounts;  
                      }
                      
                    }
		}
		return $sum;
	}


?>