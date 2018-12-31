


		<?php 

			include '../php/dboperation.php';
			$db = new Db();
		  require_once("session_header.php");
			$msg = array();

			if (isset($_GET['allinfo'])) 
			{

			

               
                /* to perform an update operation we are deleting the previous product and inserting newly updated product*/
                 if (isset($_GET['editdata']) && $_GET['editdata'] == true) 
                {
	                $dd =  $db->joinQuery("SELECT COUNT(*) as rowexist FROM `sell` WHERE `billchallan`='".$_GET['billchallan']."'")->fetch(PDO::FETCH_ASSOC);
	                if ($dd['rowexist']>0) 
	                {
	                    $db->delete('sell',"`billchallan`='".$_GET['billchallan']."'");
	                }
               }
                /*end of product update*/
               

                 $datass = json_decode($_GET['item']);
                 if (!isset($_GET['editdata'])) 
			  {
			   if ($_GET['cashcheque']=="yes") 
			   {
                  $chquedata = array(
                  	'parent_table_id'  => "s_".$_GET['billchallan'],
                    'accountno' => $_GET['chequeno'],
                    'customerid' => $_GET['cutomername'],
                    'bankname' => $_GET['accounts'],
                    'expiredate' => $_GET['expredate'],
                    'amount' => $_GET['chequeamount'],
                    'userid' => $_SESSION['u_id'],
                    'carrier'     => $_SESSION['u_id'],
                    'fromtable' => "add"
                  );
                   if ($db->insert("cheque",$chquedata)) {
                   	array_push($msg, ["check"=>"Cheque has been saved"]);
                   
                   //echo "<h1 style='color:blue'>Cheque has been saved</h1>";
                 }
                 
                  
                }
            }


                if (isset($_GET['editdata'])) 
                {
                	$chequecash = "Cheque";
                }
                else
                {

      $chequecash = ($_GET['cashcheque']=="yes")?"Cheque":"Cash";
                }

			   for ($i=0; $i <count($datass); $i++) 
			   { 
			    	 $data = array(
			    	 	'selldate' => $_GET['datesell'],
			    	 	'sellby' =>(!empty($_GET['sellby'])?$_GET['sellby']:$_GET['dbsellby']),
			    	 	'billchallan' => $_GET['billchallan'],
			    	 	'weight' => $_GET['weght'],
			    	 	'transport' => $_GET['transport'],
			    	 	'vat' => $_GET['vat'],
			    	 	'payment_taka' => $_GET['nowpayment'],
			    	 	'payment_status' =>$chequecash,
			    	 	'comission' => $_GET['comision'],
			    	 	'discount' =>  $_GET['discount'],
			    	 	'customerid' => $_GET['cutomername'],
			    	 	'productid' => $datass[$i]->pname,
			    	 	'quantity' => $datass[$i]->quntity,
			    	 	'price' => $datass[$i]->price,
			    	 	'entryby' => $_SESSION['u_id'],
			    	 	'token'   => "s_".$chequecash
			    	 	 );

			    	 /*echo "<pre>";
			    	 print_r($data);
			    	echo "</pre>";*/
			    	$db->insert("sell",$data);
			    	  
			    }

			    if (count($datass) == $i) 
			    {
			    	array_push($msg, ["success"=>"Product has been sold out"]);
			    	
			    }
			    else 
			    {
			    	array_push($msg, ["err"=>"problem occured"]);
			    }

			    echo json_encode($msg);
				
			}

			  
			
			  /*echo "<pre>";
			   print_r($_GET['allotherinfo']);
			  print_r($_GET);
			  echo "</pre>";*/
			  
		?>