

		<?php 

			include '../php/dboperation.php';
			$db = new Db();
			$sql =  "SELECT * FROM `product_info` WHERE `product_cat`='".$_POST['id']."'";
			$data  =  $db->joinQuery($sql)->fetchAll();
			echo json_encode($data);
		?>