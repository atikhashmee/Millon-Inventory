


		<?php 

			include '../php/dboperation.php';
			$db = new Db();
			session_start();

			if (isset($_GET['allinfo'])) {

					 

                if (empty($_GET['billchallan'])) {
                	echo 'Bill/challan no is not given';
                	exit();
                }

                 $datass = json_decode($_GET['item']);
			   if ($_GET['cashcheque']=="yes") {
                  $chquedata = array(
                    'accountno' => $_GET['chequeno'],
                    'customerid' => $_GET['cutomername'],
                    'bankname' => $_GET['accounts'],
                    'expiredate' => $_GET['expredate'],
                    'amount' => $_GET['chequeamount'],
                    'userid' => $_SESSION['u_id'],
                    'fromtable' => "add"
                  );
                   if ($db->insert("cheque",$chquedata)) {
                   echo "<h1 style='color:blue'>Cheque has been saved</h1>";
                 }
                 
                  
                }
   
			   for ($i=0; $i <count($datass); $i++) { 
			    	 $data = array(
			    	 	'selldate' => $_GET['datesell'],
			    	 	'sellby' => $_GET['sellby'],
			    	 	'billchallan' => $_GET['billchallan'],
			    	 	'weight' => $_GET['weght'],
			    	 	'transport' => $_GET['transport'],
			    	 	'vat' => $_GET['vat'],
			    	 	'payment_taka' => $_GET['nowpayment'],
			    	 	'comission' => $_GET['comision'],
			    	 	'discount' =>  $_GET['discount'],
			    	 	'customerid' => $datass[$i]->name,
			    	 	'productid' => $datass[$i]->pname,
			    	 	'quantity' => $datass[$i]->quntity,
			    	 	'price' => $datass[$i]->price
			    	 	 );

			    	 echo "<pre>";
			    	 print_r($data);
			    	 echo "</pre>";
			    	$db->insert("sell",$data);
			    	  
			    }
				
			}

			  
			
			  /*echo "<pre>";
			   print_r($_GET['allotherinfo']);
			  print_r($_GET);
			  echo "</pre>";*/
			  
		?>