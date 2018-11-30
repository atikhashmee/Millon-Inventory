



<?php

		require_once("dboperation.php");
		require_once("functions.php");

		class DbModels extends Db
		{
			private $CategoryTableName = "cateogory";
			private $brandTableName = "p_brand";
			private $sizeTableName = "p_size";
			private $productTableName = "product_info";


			private $brands = [];
			private $size = [];
			private $products = [];
			
			function __construct()
			{
				parent::__construct();
			}

			public function getRawData($table)
			{
				return $this->selectAll($table);
			}
			

			public function getCategories()
			{
			    $datas = $this->getRawData($this->CategoryTableName)->fetchAll();
			    foreach ($datas as $dt)
			     {
			    	 echo "<option value='".$dt['cat_id']."'>".$dt['cat_name']."</option>";
			    }
			}

			public function getBrands()
			{
				$datas = $this->getRawData($this->brandTableName)->fetchAll();
			    foreach ($datas as $dt)
			     {
			     	
			    	 echo "<option value='".$dt['brand_id']."'>".$dt['brand_name']."</option>";
			    }
			}

			public function brandsList()
			{
				$datas = $this->getRawData($this->brandTableName)->fetchAll();
				foreach ($datas as $dt)
			     {
			     	$this->brands[$dt['brand_id']] = $dt['brand_name'];
			    	 
			    }
			}


			public function getSizes()
			{
				$datas = $this->getRawData($this->sizeTableName)->fetchAll();
				foreach ($datas as $dt)
			     {
			     	$this->size[$dt['pro_size_id']] = $dt['pro_size_name'];
			    	 
			    }

			}

			public function products()
			{
				$datas = $this->getRawData($this->productTableName)->fetchAll();
				$fn = new Functions();
				foreach ($datas as $dt)
			     {
			     $this->products[$dt['pro_id']] = $fn->getProductName($dt['pro_id']);
			    	 
			    }
			}

			public function getBrandListByIds()
			{
				 $this->brandsList();
				return $this->brands;
			}

			public function getSizeListByIds()
			{
				$this->getSizes();
				return $this->size;
			}

			public function getProListByIds()
			{
				$this->products();
				return $this->products;
			}




			




		}

?>