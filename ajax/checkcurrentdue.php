  



		<?php 

			include '../php/dboperation.php';
			$db = new Db();
			$hjhasfjsad = $db->joinQuery("SELECT  `quantity`, `price` FROM `sell` WHERE `customerid`='".$_GET['custom_id']."'")->fetchAll();
			 $sum  = 0;
			 foreach ($hjhasfjsad as $dd) {
			 	$sum +=  $dd['quantity']  *  $dd['price'];
			 }
			 echo $sum;
			  
		?>