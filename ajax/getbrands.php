


         <?php 

			include '../php/dboperation.php';
			$db = new Db();
			$sql =  "SELECT * FROM `p_brand`";
			$data  =  $db->joinQuery($sql)->fetchAll();
			echo json_encode($data);
		?>