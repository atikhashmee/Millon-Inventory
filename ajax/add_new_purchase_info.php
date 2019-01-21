

		<?php 

			include '../php/dboperation.php';
			$db = new Db();
			require_once("session_header.php");
			  $datass = json_decode($_GET['item']);
			  $msg = array();


			  
			  	if ($_GET['cashcheque']=="yes") {
                  $chquedata = array(
                    'parent_table_id'  => "p_".$_GET['billchallan'],
                    'accountno'  => $_GET['chequeno'],
                    'customerid' => $_GET['suppliername'],
                    'bankname'   => $_GET['accounts'],
                    'expiredate' => $_GET['expredate'],
                    'amount'     => $_GET['cheqamount'],
                    'userid'     => $_SESSION['u_id'],
                    'carrier'     => $_SESSION['u_id'],
                    'fromtable'  => "minus"
                  );
                   if ($db->insert("cheque",$chquedata)) {
                   array_push($msg, ["check"=>"Cheque has been saved"]);
                 }
                }
                else if ($_GET['cashcheque']=="no")
                 {
                 	$chequequntity = $db->selectAll('cheque','parent_table_id="p_'.$_GET['billchallan'].'"')->rowCount();
                		if ($chequequntity>0 && $_GET['editdata'] == true) 
                		{
                			$db->delete('cheque','parent_table_id="p_'.$_GET['billchallan'].'"');
                		}
                 }
                
			  
			   

                	
                /* to perform an update operation we are deleting the previous product and inserting newly update product*/
                if (isset($_GET['editdata']) && $_GET['editdata'] == true) 
                {
                	 $dd =  $db->joinQuery("SELECT COUNT(*) as rowexist FROM `purchase` WHERE `billchallan`='".$_GET['billchallan']."'")->fetch(PDO::FETCH_ASSOC);
		                if ($dd['rowexist']>0) 
		                {
		                   $db->delete('purchase',"`billchallan`='".$_GET['billchallan']."'");
		                }
                }


              
              

            $chequecash = ($_GET['cashcheque']=="yes")?"Cheque":"Cash";
   
			   for ($i=0; $i <count($datass); $i++) { 
			    	 $data = array(
			    	 	'purchasedate' => $_GET['datepurchase'],
			    	 	'billchallan'  => $_GET['billchallan'],
			    	 	'weight'       => $_GET['weght'],
			    	 	'transport'    => $_GET['transport'],
			    	 	'vat'          => $_GET['vat'],
			    	 	'comission'    => $_GET['comision'],
			    	 	'discount'     => $_GET['discount'],
			    	 	'payment_taka' => $_GET['nowpayment'],
			    	 	'payment_status' =>$chequecash,
			    	 	'purchaseentryby' => $_SESSION['u_id'],
			    	 	'supplier'     => $_GET['suppliername'],
			    	 	'productid'    => $datass[$i]->pname,
			    	 	'quantity'     => $datass[$i]->quntity,
			    	 	'price'        => $datass[$i]->price,
			    	 	'token'        => "p_".$chequecash
			    	 	 );

			    	
			    	$db->insert("purchase",$data);
			    	  
			    }
			    if (count($datass) == $i) 
			    {
			    array_push($msg, ["success"=>"Product has been purchased out"]);
			    	
			    }
			    else 
			    {
			    	array_push($msg, ["err"=>"problem occured"]);
			    }

			    echo json_encode($msg);
			  /*echo "<pre>";
			   print_r($_GET['allotherinfo']);
			  print_r($_GET);
			  echo "</pre>";*/
			  
		?>