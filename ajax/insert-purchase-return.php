

		<?php 

			include '../php/dboperation.php';
			$db = new Db();
			  
			  $datass = json_decode($_GET['dclas']);
   					$cont = 0;
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

			    	/* echo "<pre>";
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