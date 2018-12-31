

		<?php 

			include '../php/dboperation.php';
			require_once("session_header.php");
			$db = new Db();
			$sql =  "SELECT * FROM `product_info` WHERE `product_cat`='".$_POST['id']."'";
			$data  =  $db->joinQuery($sql)->fetchAll();
			echo json_encode($data);
		?>