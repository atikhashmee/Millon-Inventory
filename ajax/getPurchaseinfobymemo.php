 <?php 

			include '../php/dboperation.php';
			$db = new Db();
			$sql =  "SELECT * FROM `purchase` WHERE `billchallan`='".$_GET['memo']."'";
			
			function getReturnedQ($bill,$proid)
			{
				
				$sql = "SELECT SUM(`quntity`) as alltoal FROM `purchase_return` WHERE `memono`='{$bill}' AND `productid`='{$proid}'";
				$return = $GLOBALS['db']->joinQuery($sql)->fetch(PDO::FETCH_ASSOC);

				return $return['alltoal'];
			}

			$data  =  $db->joinQuery($sql)->fetchAll();
			$products = [];
			foreach ($data as $dt) 
			{ 

				$quntity =   (int)$dt['quantity']-(int)getReturnedQ($dt['billchallan'],$dt['productid']);
				//getReturnedQ($dt['billchallan'],$dt['productid']);

				$comppose =  array(
					'supplier' => $dt['supplier'], 
					'productid' => $dt['productid'], 
					'quantity' => $quntity, 
					'price' => $dt['price']
				);
				array_push($products, $comppose);
			}
			echo json_encode($products);		?>