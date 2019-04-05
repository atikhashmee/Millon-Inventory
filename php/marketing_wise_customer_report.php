<?php 



   require_once('cussupreportquery.php');


   /**
    * 
    */
   class MarketingReport extends Report
   {
   	
   	     public function queryEnquery($marketing="",$start="",$end="")
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
   }





?>