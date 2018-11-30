

		<?php 

			include '../php/dboperation.php';
			$db = new Db();
			  
			  $datass = json_decode($_GET['dclas']);

   					$cont = 0;
   					/* to perform an update operation we are deleting the previous product and inserting newly update product*/
                  if (isset($_GET['memo']))
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
			    	 	 );

			    	 /*echo "<pre>";
			    	 print_r($data);
			    	 echo "</pre>";*/
			    	 if ($db->insert("purchase_return",$data)) {
			    	 	$cont++;
			    	 }
			    	
			    	  
			    }

			    if (count($datass) == $cont) {
			    	echo "Product has been returned";
			    }else{
			    	echo "There has been a problem";
			    }
			  /*echo "<pre>";
			   print_r($_GET['allotherinfo']);
			  print_r($_GET);
			  echo "</pre>";*/
			  
		?>