


<?php 

		/**
		 * 
		 */
		class Bc
		{
			
			private $comission;
			private $discount;
			private $vat;
			private $weight;
			private $transport;
			private $amount;


				
		    /**
		     * @return mixed
		     */
		    public function getComission()
		    {
		        return $this->comission;
		    }

		    /**
		     * @param mixed $comission
		     *
		     * @return self
		     */
		    public function setComission($comission)
		    {

		        $this->comission = empty($comission)?0:$comission;

		        return $this;
		    }

		    /**
		     * @return mixed
		     */
		    public function getDiscount()
		    {
		        return $this->discount;
		    }

		    /**
		     * @param mixed $discount
		     *
		     * @return self
		     */
		    public function setDiscount($discount)
		    {
		        $this->discount = empty($discount)?0:$discount;

		        return $this;
		    }

		    /**
		     * @return mixed
		     */
		    public function getVat()
		    {
		        return $this->vat;
		    }

		    /**
		     * @param mixed $vat
		     *
		     * @return self
		     */
		    public function setVat($vat)
		    {
		        $this->vat = empty($vat)?0:$vat;

		        return $this;
		    }

		    /**
		     * @return mixed
		     */
		    public function getWeight()
		    {
		        return $this->weight;
		    }

		    /**
		     * @param mixed $weight
		     *
		     * @return self
		     */
		    public function setWeight($weight)
		    {
		        $this->weight = empty($weight)?0:$weight;

		        return $this;
		    }

		    /**
		     * @return mixed
		     */
		    public function getTransport()
		    {
		        return $this->transport;
		    }

		    /**
		     * @param mixed $transport
		     *
		     * @return self
		     */
		    public function setTransport($transport)
		    {
		        $this->transport = empty($transport)?0:$transport;

		        return $this;
		    }

		    /**
		     * @return mixed
		     */
		    public function getAmount()
		    {
		        return $this->amount;
		    }

		    /**
		     * @param mixed $amount
		     *
		     * @return self
		     */
		    public function setAmount($amount)
		    {
		        $this->amount = $amount;

		        return $this;
		    }

		    public function getResult()
		    {
		    	$sum =  $this->getAmount();
		    	$sum += $this->getTransport();
		    	$sum += $this->getWeight();
		    	$sum += (($this->getVat()/100)*$this->getAmount());
		    	$sum -= (($this->getComission()/100)*$this->getAmount());
		    	$sum -=  $this->getDiscount();
		    	return $sum;
		    }
}

?>