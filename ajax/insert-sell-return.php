

		<?php 

			include '../php/dboperation.php';
			$db = new Db();
			  session_start();
			  $datass = json_decode($_GET['dclas']);

			  //delete before update 
			  if (isset($_GET['update']) && $_GET['update'] == true) 
			  {
			  	$mydate = $db->joinQuery("SELECT COUNT(*) as rowcount FROM `sell_return` WHERE `memono`='".$datass[0]->memo."'")->fetch(PDO::FETCH_ASSOC);
					  if ($mydate['rowcount']>0) {
					 $db->delete("sell_return","memono = '".$datass[0]->memo."'");
					  }
			  }
			  
			  //end of updating things
   					$cont = 0;
			   for ($i=0; $i <count($datass); $i++) 
			   { 
			   	
			    	 $data = array(
			    	 	
			    	 	'memono' => trim($datass[$i]->memo),
			    	 	'productid' => trim($datass[$i]->prod),
			    	 	'customerid' => trim($_GET['custo']) ,
			    	 	'quntity' => trim($datass[$i]->quntity),
			    	 	'price' => trim($datass[$i]->price),
			    	 	'weight' => trim($_GET['weight']) ,
			    	 	'transport' => trim($_GET['transport']),
			    	 	'return_date' => trim($datass[$i]->date),
			    	 	'takenby' => trim($_SESSION['u_id'])
			    	 	 );

			    	/* echo "<pre>";
			    	 print_r($data);
			    	 echo "</pre>";*/
			    	 if ($db->insert("sell_return",$data)) {
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