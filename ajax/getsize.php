 <?php 

			include '../php/dboperation.php';
			require_once("session_header.php");
			$db = new Db();
			$sql =  "SELECT * FROM `p_size`";
			$data  =  $db->joinQuery($sql)->fetchAll();
			echo json_encode($data);
		?>