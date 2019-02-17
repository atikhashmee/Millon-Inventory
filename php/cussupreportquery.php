<?php
          



				class Report
				{

					

					private $salerawquery = ["SELECT `selldate`,`customerid`, (SUM(`quantity`*`price`)+(`weight`+`transport`+(`vat`/100)*SUM(`quantity`*`price`))-((`comission`/100)*SUM(`quantity`*`price`)+`discount`)) as total,`token`, CONCAT( billchallan,'_',payment_taka)as paytk FROM `sell`",
					"SELECT `return_date`,`customerid`, SUM(`quntity`*`price`)+ sum(`weight`+`transport`) as amount ,`token`, `memono` FROM `sell_return`",
					"SELECT `recievedate`, `cusotmer_id`, `amounts`,`bycashcheque`,'others' FROM `recevecollection` WHERE bycashcheque ='rac_Cash'",
					 "SELECT `expiredate`,`customerid`, `amount`, `fromtable`,'null' FROM `cheque` WHERE fromtable='add' AND approve='1'"];
				   private $whereas = [" WHERE","WHERE","AND","AND"];

				   private $idcus = ["customerid","customerid","cusotmer_id","customerid"];

				   private $iddate =["selldate","return_date","recievedate","expiredate"];

				    private  $s_goupby  = "GROUP BY `billchallan`";
					private	$sr_goupby = "GROUP BY `memono`";
					private	$orderby   = "ORDER BY selldate ASC";
					
				 public function queryEnquery($customerid="",$start="",$end="")
				 {
					

				if (!empty($customerid) && (empty($start) && empty($end))) 
				{
					for ($i=0; $i <count($this->idcus); $i++) 
					{ 
						
						if ($i==0) 
						{
						$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}'".$this->s_goupby;
						}
						else if ($i==1) 
						{
						$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}'".$this->sr_goupby;
						}
						else
						{
							$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}'";
						}
					}
			    }

				if (! empty($customerid) && (!empty($start) && empty($end))) 
					{
						for ($i=0; $i <count($this->idcus) ; $i++) 
						{ 
							if ($i==0) 
							{
								$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]."='{$start}'".$this->s_goupby;
							}
							else if ($i==1) 
							{
								$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]."='{$start}'".$this->sr_goupby;
							}
							else
							{
								$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]."='{$start}'";
							}
							
						}
					}


					if (!empty($customerid) && (!empty($start) && !empty($end))) 
					{
						for ($i=0; $i <count($this->idcus); $i++) 
						{ 
							if ($i==0) 
							{
								$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]." BETWEEN '{$start}' AND '{$end}'".$this->s_goupby;
							}
							else if ($i==1) 
							{
								$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]." BETWEEN '{$start}' AND '{$end}'".$this->sr_goupby;
							}
							else
							{
								$this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]." BETWEEN '{$start}' AND '{$end}'";
							}
							
						}
					}

					$query   = implode(" UNION ",$this->salerawquery);
					$query  .= $this->orderby;
					return $query;
				}

				
		public function getCustomerPaymentList($customerid="",$start="",$end="")
				{
					$sqll = array();
					for ($i=0; $i <4 ; $i++) 
					{ 
						if ($i==1) continue;
					    $sqll[$i] = $this->salerawquery[$i];
					}
				
				if (!empty($customerid) && (empty($start) && empty($end))) 
				{
					for ($i=0; $i <4; $i++) 
					{ 
						if ($i==1) continue;
						if ($i==0) 
						{
						$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}'".$this->s_goupby;
						}
						else
						{
							$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}'";
						}
					}
			    }

				if (! empty($customerid) && (!empty($start) && empty($end))) 
					{
						for ($i=0; $i <4; $i++) 
						{ 
							if ($i==1) continue;
							if ($i==0) 
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]."='{$start}'".$this->s_goupby;
							}
							
							else
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]."='{$start}'";
							}
							
						}
					}


					if (!empty($customerid) && (!empty($start) && !empty($end))) 
					{
						for ($i=0; $i <4; $i++) 
						{ 
							if ($i==1) continue;
							if ($i==0) 
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]." BETWEEN '{$start}' AND '{$end}'".$this->s_goupby;
							}
							
							else
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]." BETWEEN '{$start}' AND '{$end}'";
							}
							
						}
					}

					$query   = implode(" UNION ",$sqll);
					$query  .= $this->orderby;
					return $query;
				}
        public function getCustomerProductList($customerid="",$start="",$end="")
				{
					$sqll = array();
					for ($i=0; $i <2 ; $i++) 
					{ 
					    $sqll[$i] = $this->salerawquery[$i];
					}
				
				if (!empty($customerid) && (empty($start) && empty($end))) 
				{
					for ($i=0; $i <2; $i++) 
					{ 
						
						if ($i==0) 
						{
						$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}'".$this->s_goupby;
						}
						else
						{
							$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}'".$this->sr_goupby;;
						}
					}
			    }

				if (! empty($customerid) && (!empty($start) && empty($end))) 
					{
						for ($i=0; $i <2; $i++) 
						{ 
							
							if ($i==0) 
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]."='{$start}'".$this->s_goupby;
							}
							
							else
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]."='{$start}'".$this->sr_goupby;;
							}
							
						}
					}


					if (!empty($customerid) && (!empty($start) && !empty($end))) 
					{
						for ($i=0; $i <2; $i++) 
						{ 
							
							if ($i==0) 
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]." BETWEEN '{$start}' AND '{$end}'".$this->s_goupby;
							}
							
							else
							{
								$sqll[$i] = $this->salerawquery[$i] .= $this->whereas[$i]." ".$this->idcus[$i]."='{$customerid}' AND ".$this->iddate[$i]." BETWEEN '{$start}' AND '{$end}'".$this->sr_goupby;
							}
							
						}
					}

					$query   = implode(" UNION ",$sqll);
					$query  .= $this->orderby;
					return $query;
				}



				public function saleHistory($customerid="",$start="",$end="")
				{
					$salequery = "SELECT `billchallan`,`sellby`,`entryby`,`selldate`,`customerid`, (SUM(`quantity`*`price`)+(`weight`+`transport`+(`vat`/100)*SUM(`quantity`*`price`))-((`comission`/100)*SUM(`quantity`*`price`)+`discount`)) as total_taka,`token`, CONCAT( billchallan,'_',payment_taka)as total FROM `sell`";
					if (!empty($customerid) && (empty($start) && empty($end))) 
				      {
						$salequery .= "WHERE customerid ='{$customerid}'";
			          }

				if (! empty($customerid) && (!empty($start) && empty($end))) 
					{
						
							
								$salequery .= " WHERE customerid = '{$customerid}' AND selldate='{$start}'";
						
					}

					if (!empty($customerid) && (!empty($start) && !empty($end))) 
					{
						 
							
						$salequery .= "WHERE customerid = '{$customerid}' AND selldate between '{$start}' AND '{$end}'";
					}
					
						return $salequery."GROUP BY `billchallan` ORDER BY selldate DESC";
					
					
				}



				public function getCustomerToken($tkn,$amount,$others)
				{
					 if($tkn == "s_Cash" || $tkn == "s_Cheque")
					{
						$othe = explode("_", trim($others));
						return [
							"sellamount"    => $amount,
							"sellreturn"    => 0,
							"payamount"     => $othe[1],
							"descrip"       => "Product Sold out <a href='sale_invoice_info.php?invo={$othe[0]}'>{$othe[0]}</a>"
						];
						
					}
					else if ($tkn == "add") 
					{
						return [
							"sellamount"    => 0,
							"sellreturn"    => 0,
							"payamount"     => $amount,
							"descrip"       => "Cheque Payment"
						];

						
					}
					else if ($tkn == "rac_Cash") 
					{
						return [
							"sellamount"    => 0,
							"sellreturn"    => 0,
							"payamount"     => $amount,
							"descrip"       => "Cash Collection"
						];
					}
					else if ($tkn == "sr") 
					{
						return [
							"sellamount"    => 0,
							"sellreturn"    => $amount,
							"payamount"     => 0,
							"descrip"       => "Product Return <a href='sale_invoice_info.php?invo={$others}'>{$others}</a>"
						];
					}
				}




			public function datewiseInvoiceAmount($date,$customer)
				{
					$inv = $GLOBALS['db']->joinQuery("SELECT DISTINCT `billchallan` FROM `sell` WHERE `selldate`='{$date}' AND `customerid`='{$customer}'")->fetchAll();
					$invoices = [];
					foreach ($inv as $v) 
					{
						array_push($invoices, [
							"invoice" => $v['billchallan'],
							"amount"  => invoiceAmount($v['billchallan'])
						]);
					}
					return $invoices;
				}

			public 	function invoiceAmount($invoice,$token="") // may need later
				{
					$table = ($token=="s")?"sell":"purchase";
					
					$sell = $GLOBALS['db']->selectAll($table,"billchallan='{$invoice}'")->fetchAll();
					$productamount =0;
					foreach ($sell as $s) 
					{
						$productamount += (int)$s['quantity']*(int)$s['price'];
					}

					$bc = new Bc();
                    $bc->setAmount($productamount);
                    $bc->setWeight($sell[0]['weight']);
                    $bc->setTransport($sell[0]['transport']);
                    $bc->setVat($sell[0]['vat']);
                    $bc->setDiscount($sell[0]['discount']);
                    $bc->setComission($sell[0]['comission']);
					return $bc->getResult();
				}
			}
				


				


				




	   
?>