

<?php 

      
      require_once("dboperation.php");
      class MPS extends Db
      {
      	
            private $pages;
            private $userrole;

			private $products = false;
			private $purchase = false;
			private $purchase_return = false;
			private $sale = false;
			private $sale_return = false;
			private $recievecollection = false;
			private $paymenttosupplier = false;
			private $cashtransfer = false;
			private $expense = false;
			private $productcategory = false;
			private $brand = false;
			private $size = false;
			private $salery_keys = false;
			private $employeetarget = false;
			private $employeesalry = false;
			private $accountcategory = false;
			private $accountname = false;
			private $expensecategory = false;
			private $users = false;
			private $employeetype = false;
			private $reconcilation = false;

			function __construct($role)
			{
				 parent::__construct();
				 $this->userrole = $role;
				 $this->fetchRecords();
				 
			}

			public function fetchRecords()
			{
				if ($this->userrole != 0) 
				{

				$this->pages =  $this->joinQuery("SELECT  `page_id` FROM `access_privilige` WHERE `role_id`='{$this->userrole}'")->fetchAll();
				$this->activeroledone();
				}
				else 
				{
					$this->products = true;
					$this->purchase = true;
					$this->purchase_return = true;
					$this->sale = true;
					$this->sale_return = true;
					$this->recievecollection = true;
					$this->paymenttosupplier = true;
					$this->cashtransfer = true;
					$this->expense = true;
					$this->productcategory = true;
					$this->brand = true;
					$this->size = true;
					$this->salery_keys = true;
					$this->employeetarget = true;
					$this->employeesalry = true;
					$this->accountcategory = true;
					$this->accountname = true;
					$this->expensecategory = true;
					$this->users = true;
					$this->employeetype = true;
					$this->reconcilation = true;
				}
			}


			public function activeroledone()
			{
				if (count($this->pages) !=0 ) {
			 for ($i=0; $i <count($this->pages); $i++) 
				{ 
					/* echo "<pre>";
					 print_r($this->getPageIds($this->pages[$i][0]));
					 echo "</pre>";*/
					  if ($this->getPageIds($this->pages[$i][0]) == "Products") 
					  {
					  	$this->products = true;
					  }

					  if ($this->getPageIds($this->pages[$i][0]) == "Purchase") 
					  {
					  	$this->purchase = true;
					  }

				 if ($this->getPageIds($this->pages[$i][0]) == "Purchase Return") 
					  {
					  	$this->purchase_return = true;
					  } 
					 if ($this->getPageIds($this->pages[$i][0]) == "Sale") 
					  {
					  	$this->sale =  true;
					  }
					 if ($this->getPageIds($this->pages[$i][0]) == "Sale Return") 
					  {
					  	$this->sale_return = true;
					  }

			if ($this->getPageIds($this->pages[$i][0]) == "Recieve-Collection") 
					  {
					  	$this->recievecollection =  true;
					  }
			 if ($this->getPageIds($this->pages[$i][0]) == "Payment-to-supplier") 
					  {
					  	$this->paymenttosupplier = true;
					  }
			if ($this->getPageIds($this->pages[$i][0]) == "Cash Transer") 
					  {
					  	$this->cashtransfer = true;
					  }
			if ($this->getPageIds($this->pages[$i][0]) == "Expense") 
					  {
					  	$this->expense = true;
					  }
		   if ($this->getPageIds($this->pages[$i][0]) == "Product-Category") 
					  {
					  	$this->productcategory =  true;
					  }
		if ($this->getPageIds($this->pages[$i][0]) == "Product-Brand") 
					  {
					  	$this->brand =  true;
					  }
			if ($this->getPageIds($this->pages[$i][0]) == "Product-Size") 
					  {
					  	$this->size = true;
					  }
		  if ($this->getPageIds($this->pages[$i][0]) == "Salery-keys") 
					  {
					  	$this->salery_keys = true;
					  } 
		 if ($this->getPageIds($this->pages[$i][0]) == "Employee-Traget") 
					  {
					  	$this->employeetarget =  true;
					  }
		 if ($this->getPageIds($this->pages[$i][0]) == "Employee-Salery") 
					  {
					  	$this->employeesalry = true;
					  }
		if ($this->getPageIds($this->pages[$i][0]) == "Account-category") 
					  {
					  	$this->accountcategory =  true;
					  }
	 if ($this->getPageIds($this->pages[$i][0]) == "Account-Name") 
					  {
					  	$this->accountname = true;
					  } 
		if ($this->getPageIds($this->pages[$i][0]) == "Expense-category") 
					  {
					  	$this->expensecategory = true;
					  }
	if ($this->getPageIds($this->pages[$i][0]) == "Users") 
					  {
					  	$this->users = true;
					  }
	if ($this->getPageIds($this->pages[$i][0]) == "Employee-Type") 
					  {
					  	$this->employeetype = true;
					  }
		if ($this->getPageIds($this->pages[$i][0]) == "Bank-reconcilation") 
					  {
					  	$this->reconcilation = true;
					  }
				}
				}

				
			}

			public function getPageIds($pageid)
			{ 

				

				for ($i=0; $i <count($GLOBALS['ss']['priviliges']); $i++) 
				{ 
				 if ($pageid == $GLOBALS['ss']['priviliges'][$i]['priv_id']) 
				 		    {
				 			 return $GLOBALS['ss']['priviliges'][$i]['priv_name'];
				 		    }
				}
			 return -1;
			}



				


      
    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @return mixed
     */
    public function getPurchase()
    {
        return $this->purchase;
    }

    /**
     * @return mixed
     */
    public function getPurchaseReturn()
    {
        return $this->purchase_return;
    }

    /**
     * @return mixed
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * @return mixed
     */
    public function getSaleReturn()
    {
        return $this->sale_return;
    }

    /**
     * @return mixed
     */
    public function getRecievecollection()
    {
        return $this->recievecollection;
    }

    /**
     * @return mixed
     */
    public function getPaymenttosupplier()
    {
        return $this->paymenttosupplier;
    }

    /**
     * @return mixed
     */
    public function getCashtransfer()
    {
        return $this->cashtransfer;
    }

    /**
     * @return mixed
     */
    public function getExpense()
    {
        return $this->expense;
    }

    /**
     * @return mixed
     */
    public function getProductcategory()
    {
        return $this->productcategory;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return mixed
     */
    public function getSaleryKeys()
    {
        return $this->salery_keys;
    }

    /**
     * @return mixed
     */
    public function getEmployeetarget()
    {
        return $this->employeetarget;
    }

    /**
     * @return mixed
     */
    public function getEmployeesalry()
    {
        return $this->employeesalry;
    }

    /**
     * @return mixed
     */
    public function getAccountcategory()
    {
        return $this->accountcategory;
    }

    /**
     * @return mixed
     */
    public function getAccountname()
    {
        return $this->accountname;
    }

    /**
     * @return mixed
     */
    public function getExpensecategory()
    {
        return $this->expensecategory;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @return mixed
     */
    public function getEmployeetype()
    {
        return $this->employeetype;
    }

    /**
     * @return mixed
     */
    public function getReconcilation()
    {
        return $this->reconcilation;
    }
}

	


?>