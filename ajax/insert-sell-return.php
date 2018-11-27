

		<?php 

			include '../php/dboperation.php';
			$db = new Db();
			  session_start();
			  $datass = json_decode($_GET['dclas']);
			  //delete before update 
			  $mydate = $db->joinQuery("SELECT COUNT(*) as rowcount FROM `sell_return` WHERE `memono`='".$datass[0]->memo."'")->fetch(PDO::FETCH_ASSOC);
			  if ($mydate['rowcount']>0) {
			 $db->delete("sell_return","memono = '".$datass[0]->memo."'");
			  }
			  //end of updating things
   					$cont = 0;
			   for ($i=0; $i <count($datass); $i++) { 
			   	
			    	 $data = array(
			    	 	
			    	 	'memono' => $datass[$i]->memo,
			    	 	'productid' => $datass[$i]->prod,
			    	 	'customerid' => $_GET['custo'],
			    	 	'quntity' => $datass[$i]->quntity,
			    	 	'price' => $datass[$i]->price,
			    	 	'weight' => $_GET['weight'],
			    	 	'transport' => $_GET['transport'],
			    	 	'return_date' => $datass[$i]->date,
			    	 	'takenby' => $_SESSION['u_id']
			    	 	 );

			    	/* echo "<pre>";
			    	 print_r($data);
			    	 echo "</pre>";*/
			    	 if ($db->insert("sell_return",$data)) {
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