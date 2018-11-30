

		<?php 

			include '../php/dboperation.php';
			$db = new Db();
			$sql =  "SELECT * FROM `product_info`";
			$data  =  $db->joinQuery($sql)->fetchAll();
			echo json_encode($data);
		?>