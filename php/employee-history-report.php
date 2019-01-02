


<?php

	
	/**
	 * 
	 */
	class EmployeeHistoryReport
	{
		
		private $esql = [
			'SELECT `expendituredate`, `accountsid`, `amount`, `token` FROM `expenditure` WHERE `employeeid` <> "-1"',
			'SELECT `payment_date`, `employeeid`,`amount_pay`, `token` FROM `e_payment_salery`',
			"SELECT `paydate`, `employee_id`, `pament`, `token` FROM `target` WHERE token='comisn_paid'"
		];
		private $ext = ["AND","WHERE","AND"];
		private $usercluase = ['employeeid','employeeid','employee_id'];
		private $datecluase = ['expendituredate','payment_date','paydate'];

		public function reportQuery($e_id="",$st="",$en="")
		{
			if (!empty($e_id) && (empty($st) && empty($en))) 
				{   
					for ($i=0; $i <count($this->ext); $i++) 
					{ 
						$this->esql[$i] .= $this->ext[$i]." ".$this->usercluase[$i]."='{$e_id}'";
					}
			    }

				if (! empty($e_id) && (!empty($st) && empty($en))) 
					{
						
						for ($i=0; $i <count($this->ext) ; $i++) 
						{ 
						$this->esql[$i] .= $this->ext[$i]." ".$this->usercluase[$i]."='{$e_id}' AND ".$this->datecluase[$i]." = {$st}";
						}
					}


					if (!empty($e_id) && (!empty($st) && !empty($en))) 
					{
						
						for ($i=0; $i <count($this->ext); $i++) 
						{ 
							
						$this->esql[$i] .= $this->ext[$i]." ".$this->usercluase[$i]."='{$e_id}' AND ".$this->datecluase[$i]." BETWEEN {$st} AND {$en}";
						}
					}

					$query   = implode(" UNION ",$this->esql);
					return $query;
		}

		public function getEmployeeToken($tkn,$amount,$obj,$employee)
				{
					 if( substr($tkn, 0,5) == "stuff")
					{
						$othe = explode("_", trim($tkn));
						return [
							"amount"    => $amount,
							"descrip"       => "Expense bill piad to Employee <a href='employee_report.php?e_id={$othe[2]}'>".$obj->getUserName($othe[2])."</a>"
						];
						
					}
					else if ($tkn == "salerypayment") 
					{
						return [
							"amount"    => $amount,
							"descrip"       => "Salery Payment to Employee <a href='employee_report.php?e_id={$employee}'>".$obj->getUserName($employee)."</a>"
						];

						
					}
					else if ($tkn == "comisn_paid") 
					{
						return [
							"amount"    => $amount,
							"descrip"       => "Got commission to Employee <a href='employee_report.php?e_id={$employee}'>".$obj->getUserName($employee)."</a>"
						];
					}
					
				}
	}

?>