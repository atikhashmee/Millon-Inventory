

		<?php 

			include '../php/dboperation.php';
			$db = new Db();
			session_start();
			  
			  $datass = json_decode($_GET['item']);

			   if ($_GET['cashcheque']=="yes") {
                  $chquedata = array(
                    'accountno' => $_GET['chequeno'],
                     'customerid' => $_GET['suppliername'],
                    'bankname' => $_GET['accounts'],
                    'expiredate' => $_GET['expredate'],
                    'amount' => $_GET['cheqamount'],
                    'userid' => $_SESSION['u_id'],
                    'fromtable' => "minus"
                  );
                   if ($db->insert("cheque",$chquedata)) {
                   echo "<h1 style='color:blue'>Cheque has been saved</h1>";
                 }
                 
                  
                }

                	
                /* to perform an update operation we are deleting the previous product and inserting newly update product*/

                $dd =  $db->joinQuery("SELECT COUNT(*) as rowexist FROM `purchase` WHERE `billchallan`='".$_GET['billchallan']."'")->fetch(PDO::FETCH_ASSOC);
                if ($dd['rowexist']>0) {
                   $db->delete('purchase',"`billchallan`='".$_GET['billchallan']."'");
                }
                /*end of product update*/

   
			   for ($i=0; $i <count($datass); $i++) { 
			    	 $data = array(
			    	 	'purchasedate' => $_GET['datepurchase'],
			    	 	'billchallan' => $_GET['billchallan'],
			    	 	'weight' => $_GET['weght'],
			    	 	'transport' => $_GET['transport'],
			    	 	'vat' => $_GET['vat'],
			    	 	'comission' => $_GET['comision'],
			    	 	'discount' => $_GET['discount'],
			    	 	'payment_taka' => $_GET['nowpayment'],
			    	 	'purchaseentryby' => $_SESSION['u_id'],
			    	 	'supplier' => $_GET['suppliername'],
			    	 	'productid' => $datass[$i]->pname,
			    	 	'quantity' => $datass[$i]->quntity,
			    	 	'price' => $datass[$i]->price
			    	 	 );

			    	 echo "<pre>";
			    	 print_r($data);
			    	 echo "</pre>";
			    	$db->insert("purchase",$data);
			    	  
			    }
			 /* echo "<pre>";
			   print_r($_GET['allotherinfo']);
			  print_r($_GET);
			  echo "</pre>";*/
			  
		?>