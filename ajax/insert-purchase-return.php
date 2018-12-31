

		<?php 

			include '../php/dboperation.php';
			$db = new Db();

			require_once("session_header.php");
			  
			  $datass = json_decode($_GET['dclas']);

   					$cont = 0;
   					/* to perform an update operation we are deleting the previous product and inserting newly update product*/
                  if (isset($_GET['update']) && $_GET['update'] == true)
                  {
                  	   $dd =  $db->joinQuery("SELECT COUNT(*) as rowexist FROM `purchase_return` WHERE `memono`='".$_GET['memo']."'")->fetch(PDO::FETCH_ASSOC);
	                if ($dd['rowexist']>0) {
	                   $db->delete('purchase_return',"`memono`='".$_GET['memo']."'");
	                }
                  }
                
                /*end of product update*/

			   for ($i=0; $i <count($datass); $i++) { 
			   	
			    	 $data = array(
			    	 	'memono' => $datass[$i]->memo,
			    	 	'productid' => $datass[$i]->prod,
			    	 	'supplierId' => $_GET['supplier'],
			    	 	'quntity' => $datass[$i]->quntity,
			    	 	'price' => $datass[$i]->price,
			    	 	'weight' => $_GET['weight'],
			    	 	'transport' => $_GET['transport'],
			    	 	'return_date' => $datass[$i]->date,
			    	 	'entryby' => $_SESSION['u_id']
			    	 	 );

			    	 /*echo "<pre>";
			    	 print_r($data);
			    	 echo "</pre>";*/
			    	 if ($db->insert("purchase_return",$data)) {
			    	 	$cont++;
			    	 }
			    	
			    	  
			    }

			    $msg = [];

			    if (count($datass) == $cont) 
			    {
			    	array_push($msg, ["success"=>"Product has been returned"]);
			    	//echo "Product has been returned";
			    }
			    else
			    {
			    	array_push($msg, ["error"=>"Problem occured"]);

			    	//echo "There has been a problem";
			    }
			    echo json_encode($msg);
			  /*echo "<pre>";
			   print_r($_GET['allotherinfo']);
			  print_r($_GET);
			  echo "</pre>";*/
			  
		?>