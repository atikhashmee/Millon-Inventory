 <?php 

			include '../php/dboperation.php';
			$db = new Db();
			$sql =  "SELECT * FROM `sell` WHERE `billchallan`='".$_GET['memo']."'";
			$data  =  $db->joinQuery($sql)->fetchAll();
			echo json_encode($data);
		?>