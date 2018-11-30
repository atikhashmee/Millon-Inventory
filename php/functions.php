		<?php 
				require_once("dboperation.php");
				 
				class Functions extends Db
				{


				    function __construct(){
				    	parent::__construct();
				    }

				    public function getName($tablename,$whereclause,$colname)
				    {
				    	$qry =  $this->selectAll($tablename,$whereclause);
				    	$names =  $qry->fetch(PDO::FETCH_ASSOC);
				    	return ($qry->rowCount()==0)?"Not found":$names[$colname];
				    }

				 public function getBrandName($brandid)
				   {
				       
				       $prod =  $this->selectAll("p_brand","brand_id='".$brandid."'");
				       $productname = $prod->fetch(PDO::FETCH_ASSOC);
				       return ($prod->rowCount()==0)?"Not found":$productname['brand_name'];

				   }
				   public function getSizeName($sizeid)
				   {
				       
				      $prod =  $this->selectAll("p_size","pro_size_id='".$sizeid."'");
				      $productname = $prod->fetch(PDO::FETCH_ASSOC);
				       return ($prod->rowCount()==0)?"Not found":$productname['pro_size_name'];

				   }

				   public function getUserName($userid)
				   {
				   	 $user =  $this->selectAll("users","u_id='".$userid."'");
				   	 $username = $user->fetch(PDO::FETCH_ASSOC);
				       return ($user->rowCount()==0)?"Not Found":$username['name'];
				   }

				   public function Chartsaccounta($chartid)
				   {
				   	 $productname =  $this->selectAll("charts_accounts","charts_id='".$chartid."'")->fetch(PDO::FETCH_ASSOC);
				       return $productname['chart_name'];
				   }
				   public function expenseCategory($expcat)
				   {
				   	 $productname =  $this->selectAll("expensecategory","excate_id='".$expcat."'")->fetch(PDO::FETCH_ASSOC);
				       return $productname['name'];
				   } 

				   public function getProductName($Productid)
				   {
				   	 $val =  $this->joinQuery("SELECT  `brand_id`, `size_id` FROM `product_info` WHERE `pro_id` ='{$Productid}'")->fetch(PDO::FETCH_ASSOC);
				   	  $productname = '';
                       if (!empty($val['size_id'])) 
                       {
                             $productname .= $this->getBrandName($val['brand_id'])."-".$this->getSizeName($val['size_id']);
                       }
                       else
                       {
                             $productname .=$this->getBrandName($val['brand_id']);
                       }
				       return $productname;
				   }

				
				function imageupload($str,$targetfile)
			                   {
			                   	   $filename = $_FILES[$str]['name'];
			                   	   $filesize = $_FILES[$str]['size'];
			                   	   $filetype = $_FILES[$str]['type'];
			                   	   $tempname = $_FILES[$str]['tmp_name'];

			                                $allowed = array(
			                                'jpg' =>"image/jpg",
			                                'jpeg' =>"image/jpeg",  
			                                'png' =>"image/png",
			                                'gif' =>"image/gif"
			                               );

			                                $ext  =  pathinfo($filename,PATHINFO_EXTENSION);
			                                
					                      if (!array_key_exists($ext, $allowed)) {
					                     die("Select a valid file,. valid extentions are JPG,JPEG,PNG,GIF");
					                      }

					                      $maxsize = 5*1024*1024;
					                      if ($filesize>$maxsize) {
					                        die("Maximum file size is 5 MB, your file size exceeding the limit");
					                      }


						                       if (in_array($filetype, $allowed)) {
						                  if (file_exists($targetfile)) {
						                die("this file is already exist ");
						              }else {
						                move_uploaded_file($tempname, $targetfile);
						               // echo "your file is successfully uploaded ";
						              }
						                }else{
						                  echo "there is problem uploading your files";
						                }
			                   }



				public function getCustomerPurchasedAmount($customerid)
				{
					$customers_opening = $this->joinQuery("SELECT `opening_balance` FROM `users` WHERE `u_id`='".$_POST['cutomername']."'")->fetch(PDO::FETCH_ASSOC);
              $opening = $customers_opening['opening_balance'];
              $sum = $opening;
					 $sql ="SELECT `selldate`, `billchallan`, `productid`, `quantity`, `price`,`weight`,`transport`,`vat`,`discount`,`token` FROM `sell` WHERE `customerid`='{$customerid}'
             UNION
              SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`, `discount`, `token` FROM `sell_return` WHERE `customerid`='{$customerid}'";
               $ss =  $this->joinQuery($sql)->fetchAll();
				  foreach ($ss as $val) {
				  	$tot = (((int)$val['price'] * (int)$val['quantity']) + (int)$val['weight'] + (int)$val['transport']);
				  	if ($val['token']=="sr") {
                        $sum -= $tot;
                    }else if($val['token']=="s"){
                       $sum += $tot;
                    }
				  }
				  return $sum;
				
				}


				public function getSupllierdueby($supplier)
				{
					$customers_opening = $this->joinQuery("SELECT `opening_balance` FROM `users` WHERE `u_id`='{$supplier}'")->fetch(PDO::FETCH_ASSOC);
              $opening = $customers_opening['opening_balance'];
              $sum = $opening;
					  $sql ="SELECT `purchasedate`,`billchallan`, `productid`, `quantity`, `price`, `weight`, `transport`, `vat`, `discount`, `token` FROM `purchase` WHERE `supplier`='{$supplier}'
             UNION
              SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`, `discount`, `token` FROM `purchase_return` WHERE `supplierId`='{$supplier}' ORDER by purchasedate";


               $ss =  $this->joinQuery($sql)->fetchAll();
				  foreach ($ss as $val) {
				  	$tot = (((int)$val['price'] * (int)$val['quantity']) + (int)$val['weight'] + (int)$val['transport']);
				  	if ($val['token']=="pr") {
                        $sum -= $tot;
                    }else if($val['token']=="p"){
                       $sum += $tot;
                    }
				  }
				  return $sum;
				
				}

				public function userType($urole)
				{
					switch ($urole) {
						case 0:
							echo "Admin";
							break;
						case 1:
							echo "Customer";
							break;
					    case 2:
							echo "Supplier";
							break;
						case 3:
							echo "Customer and supplier";
							break;
						case 4:
							echo "Employee";
							break;

					}
				}

				public function employeeType($typeid)
				{
					if ($typeid == 'ss2') {
						echo "SalesMan";
					}else {
						echo "Accounts";
					}
				}


				public function myCashBalance()
				{
					$myblance = 0;
					$opening_balance  =  $this->joinQuery("SELECT `opening_balance` FROM `charts_accounts` WHERE `chart_name`='Cash'")->fetch(PDO::FETCH_ASSOC);

					$myblance += $opening_balance['opening_balance'];

				     $sql =  "SELECT `selldate`, `customerid`, `payment_taka`, `token` FROM `sell` WHERE `payment_taka` IS NOT NULL AND TRIM(`payment_taka`) <> ''
UNION 
SELECT `recievedate`, `cusotmer_id`, `amounts`, `bycashcheque` FROM `recevecollection`
UNION 
SELECT `expiredate`, `customerid`, `amount`, `fromtable` FROM `cheque` WHERE `approve`='1'";
$data =  $this->joinQuery($sql)->fetchAll();

         
         
          foreach ($data as $d) {
          	    
          	    if ($d['token'] == "s") {
                      $myblance += $d['payment_taka']; 
                    }else if ($d['token'] == "add") {
                      $myblance += $d['payment_taka']; 
                    }else if ($d['token'] == "Cash") {
                      $myblance += $d['payment_taka']; 
                    }else if ($d['token'] == "minus") {
                      $myblance -= $d['payment_taka']; 
                    }
          }
         
         
        return $myblance;
				}


				public function mySale()
				{
					$sql = "SELECT SUM( `quantity`) as qtotal, SUM(`payment_taka`) as  paysum FROM `sell`";
					$qry = $this->joinQuery($sql)->fetch(PDO::FETCH_ASSOC);
					$myval = array();
					array_push($myval, $qry['qtotal']);
					array_push($myval, $qry['paysum']);
					return $myval;
				}
			}
				
		?>