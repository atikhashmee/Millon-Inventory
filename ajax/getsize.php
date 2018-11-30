 <?php 

			include '../php/dboperation.php';
			$db = new Db();
			$sql =  "SELECT * FROM `p_size`";
			$data  =  $db->joinQuery($sql)->fetchAll();
			echo json_encode($data);
		?>