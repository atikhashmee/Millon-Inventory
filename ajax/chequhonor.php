


<?php

     	include '../php/dboperation.php';
			$db = new Db();

			if (isset($_GET['str'])) {

				 if ($_GET['str'] == "honer") {
				 		$decoded = json_decode(stripslashes($_GET['ids']));
				for ($i=0; $i <count($decoded); $i++) { 
					$data = array(
						'approve' =>1,
						 );
					$db->update("cheque",$data,"chequeno=".$decoded[$i]);
					
				}
				 	
				 }else if ($_GET['str'] == "dishoner") {
				 		$decoded = json_decode(stripslashes($_GET['ids']));
				for ($i=0; $i <count($decoded); $i++) { 
					$data = array(
						'approve' =>2,
						 );
					$db->update("cheque",$data,"chequeno=".$decoded[$i]);
					
				}

				 }
else if ($_GET['str'] == "default") {
				 		$decoded = json_decode(stripslashes($_GET['ids']));
				for ($i=0; $i <count($decoded); $i++) { 
					$data = array(
						'approve' =>0,
						 );
					$db->update("cheque",$data,"chequeno=".$decoded[$i]);
					
				}

				 }
				
				

			
			}
		

?>