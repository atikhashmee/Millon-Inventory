
		
		<?php
          



				class PuReport
				{

					private $salerawquery = ["SELECT `purchasedate`, `supplier`, (SUM(`quantity`*`price`)+(`weight`+`transport`+(`vat`/100)*SUM(`quantity`*`price`))-((`comission`/100)*SUM(`quantity`*`price`)+`discount`)) as total, `token`, CONCAT( billchallan,'_',payment_taka)as paytaka FROM `purchase`",
					"SELECT `return_date`, `supplierId`,SUM(`quntity`*`price`)+ sum(`weight`+`transport`) as amount,`token`,`memono` FROM `purchase_return`",
				"SELECT `expiredate`,`customerid`, `amount`, `fromtable`,'others' FROM `cheque` WHERE fromtable='minus' AND approve='1'",
					"SELECT `pay_date`, `sup_id`, `amnts`, `status`,'null' FROM `supplierpayment` WHERE `status`='pts_Cash'"];
				   private $whereas = [" WHERE","WHERE","AND","AND"];

				 private $idsup = ["supplier","supplierId","customerid","sup_id"];

				   private $iddate =["purchasedate","return_date","expiredate","pay_date"];

				    private  $p_goupby  = "GROUP BY `billchallan`";
					private	$pr_goupby = "GROUP BY `memono`";
					private	$orderby   = "ORDER BY `purchasedate` ASC";

				
					
				 public function purQueryEnquery($sup="",$st="",$end="")
				 {
			     	

				if (!empty($sup) && (empty($st) && empty($end))) 
				{
					for ($i=0; $i <4; $i++) 
					{ 
						
						if ($i==0) 
						{
						$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}'".$this->p_goupby;
						}
						else if ($i==1) 
						{
						$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}'".$this->pr_goupby;
						}
						else
						{
							$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}'";
						}
					}
			    }

				if (! empty($sup) && (!empty($st) && empty($end))) 
					{
						for ($i=0; $i <4 ; $i++) 
						{ 
							if ($i==0) 
							{
								$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]."='{$st}'".$this->p_goupby;
							}
							else if ($i==1) 
							{
								$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]."='{$st}'".$this->pr_goupby;
							}
							else
							{
								$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]."='{$st}'";
							}
							
						}
					}


					if (!empty($sup) && (!empty($st) && !empty($end))) 
					{
						for ($i=0; $i <4; $i++) 
						{ 
							if ($i==0) 
							{
								$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]." BETWEEN '{$st}' AND '{$end}'".$this->p_goupby;
							}
							else if ($i==1) 
							{
								$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]." BETWEEN '{$st}' AND '{$end}'".$this->pr_goupby;
							}
							else
							{
								$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]." BETWEEN '{$st}' AND '{$end}'";
							}
							
						}
					}

					$query   = implode(" UNION ",$this->salerawquery);
					$query  .= $this->orderby;
					return $query;
				}

				

				public function getSupplierToken($tkn,$amount,$others)
				{
					 if($tkn == "p_Cash" || $tkn == "p_Cheque")
					{
						$othe = explode("_", trim($others));
						return [
							"puramount"    => $amount,
							"purreturn"    => 0,
							"payamount"     => $othe[1],
							"descrip"       => "Product Purchase <a href='pur_invoice_info.php?invo={$othe[0]}'>See details</a>"
						];
						
					}
					else if ($tkn == "minus") 
					{
						return [
							"puramount"    => 0,
							"purreturn"    => 0,
							"payamount"     => $amount,
							"descrip"       => "Cheque Payment"
						];

						
					}
					else if ($tkn == "pts_Cash") 
					{
						return [
							"puramount"    => 0,
							"purreturn"    => 0,
							"payamount"     => $amount,
							"descrip"       => "Cash Payment"
						];
					}
					else if ($tkn == "pr") 
					{
						return [
							"puramount"    => 0,
							"purreturn"    => $amount,
							"payamount"     => 0,
							"descrip"       => "Product Return <a href='pur_invoice_info.php?invo={$others}'>See details</a>"
						];
					}
				}


		public function getSupplierPaymentList($sup="",$st="",$end="")
				{
					$sqll = array();
					for ($i=0; $i <4; $i++) 
					{ 
						if ($i==1) continue;
					    $sqll[$i] = $this->salerawquery[$i];
					}
				
			if (!empty($sup) && (empty($st) && empty($end)) ) 
				{
					for ($i=0; $i <4; $i++) 
					{ 
						if ($i==1) continue;
						
						if ($i==0) 
						{
						$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}'".$this->p_goupby;
						}
						else
						{
							$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}'";
						}
					}
			    }

				if (! empty($sup) && (!empty($st) && empty($end))) 
					{
						for ($i=0; $i <4; $i++) 
						{ 
							if ($i==1) continue;
							if ($i==0) 
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]."='{$st}'".$this->p_goupby;
							}
							
							else
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]."='{$st}'";
							}
							
						}
					}


					if (!empty($sup) && (!empty($st) && !empty($end))) 
					{
						for ($i=0; $i <4; $i++) 
						{ 
							if ($i==1) continue;
							if ($i==0) 
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]." BETWEEN '{$st}' AND '{$end}'".$this->p_goupby;
							}
							
							else
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]." BETWEEN '{$st}' AND '{$end}'";
							}
							
						}
					}

					$query   = implode(" UNION ",$sqll);
					$query  .= $this->orderby;
					return $query;
				}

				public function getSupplierProductList($sup="",$st="",$end="")
				{
					$sqll = array();
					for ($i=0; $i <2; $i++) 
					{ 
					    $sqll[$i] = $this->salerawquery[$i];
					}
				
			if (!empty($sup) && (empty($st) && empty($end)) ) 
				{
					for ($i=0; $i <2; $i++) 
					{ 
						
						if ($i==0) 
						{
						$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}'".$this->p_goupby;
						}
						else
						{
							$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}'".$this->pr_goupby;
						}
					}
			    }

				if (! empty($sup) && (!empty($st) && empty($end))) 
					{
						for ($i=0; $i <2; $i++) 
						{ 
							if ($i==0) 
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]."='{$st}'".$this->p_goupby;
							}
							
							else
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]."='{$st}'".$this->pr_goupby;
							}
							
						}
					}


					if (!empty($sup) && (!empty($st) && !empty($end))) 
					{
						for ($i=0; $i <2; $i++) 
						{ 
							if ($i==0) 
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]." BETWEEN '{$st}' AND '{$end}'".$this->p_goupby;
							}
							
							else
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idsup[$i]."='{$sup}' AND ".$this->iddate[$i]." BETWEEN '{$st}' AND '{$end}'".$this->pr_goupby;
							}
							
						}
					}

					$query   = implode(" UNION ",$sqll);
					$query  .= $this->orderby;
					return $query;
				}

				public function PurHistory($supplierid="",$start="",$end="")
				{
					$salequery = "SELECT `billchallan`, `purchasedate`, `supplier`, (SUM(`quantity`*`price`)+(`weight`+`transport`+(`vat`/100)*SUM(`quantity`*`price`))-((`comission`/100)*SUM(`quantity`*`price`)+`discount`)) as total_taka, `purchaseentryby`, `token` FROM `purchase`";
					if (!empty($supplierid) && (empty($start) && empty($end))) 
				      {
						$salequery .= $this->whereas[2]." ".$this->idsup[2]."='{$supplierid}'";
			          }

				if (! empty($supplierid) && (!empty($start) && empty($end))) 
					{
						
							
								$salequery .= $this->whereas[2]." ".$this->idsup[2]."='{$supplierid}' AND ".$this->iddate[2]."='{$start}'";
						
					}

					if (!empty($supplierid) && (!empty($start) && !empty($end))) 
					{
						 
							
						$salequery .= $this->whereas[2]." ".$this->idsup[2]."='{$supplierid}' AND ".$this->iddate[2]." BETWEEN '{$start}' AND '{$end}'";
					}
					return $salequery." GROUP BY `billchallan ORDER BY selldate DESC";
				}



				public function purReturnHistory($supplierid="",$start="",$end="")
				{
					$returnsql ="SELECT `memono`,`return_date`,`supplierId`,SUM(`quntity`*`price`)+ sum(`weight`+`transport`) as amount,`entryby`,`token` FROM `purchase_return`";

					if (!empty($supplierid) && (empty($start) && empty($end))) 
				      {
						$salequery .= $this->whereas[3]." ".$this->idsup[3]."='{$supplierid}'";
			          }

				if (! empty($supplierid) && (!empty($start) && empty($end))) 
					{
						
							
								$salequery .= $this->whereas[3]." ".$this->idsup[3]."='{$supplierid}' AND ".$this->iddate[3]."='{$start}'";
						
					}

					if (!empty($supplierid) && (!empty($start) && !empty($end))) 
					{
						 
							
						$salequery .= $this->whereas[3]." ".$this->idsup[3]."='{$supplierid}' AND ".$this->iddate[3]." BETWEEN '{$start}' AND '{$end}'";
					}
					return $salequery." GROUP BY `billchallan";
				}



				/*purchase history */

				public function purchaseHistory($sup="",$st="",$to="")
				{
					$replace = "`billchallan`,";
					$this->salerawquery[0] = substr_replace($this->salerawquery[0], $replace, 7,0);

					if (!empty($sup) && (empty($st) && empty($to))) 
				      {
						$this->salerawquery[0] .= $this->whereas[0]." ".$this->idsup[0]."='{$sup}'";
			          }

				if (! empty($sup) && (!empty($st) && empty($to))) 
					{
						
							
								$this->salerawquery[0] .= $this->whereas[0]." ".$this->idsup[0]."='{$sup}' AND ".$this->iddate[0]."='{$st}'";
						
					}

					if (!empty($sup) && (!empty($st) && !empty($to))) 
					{
						 
							
						$this->salerawquery[0] .= $this->whereas[0]." ".$this->idsup[0]."='{$sup}' AND ".$this->iddate[0]." BETWEEN '{$st}' AND '{$to}'";
					}
					return $this->salerawquery[0]." ".$this->p_goupby." ".$this->orderby;
				}


				

				

	
		

			}
				


				


				




	   
?>
	