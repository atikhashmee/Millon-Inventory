   <?php 

			include '../php/dboperation.php';
			$db = new Db();
			$sql =  "SELECT * FROM `purchase` WHERE `purchasedate`='".$_GET['dateline']."'";
			$data  =  $db->joinQuery($sql)->fetchAll();
			echo json_encode($data);
		?>