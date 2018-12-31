 <?php 

			include '../php/dboperation.php';
			require_once("session_header.php");
			$db = new Db();
			$sql =  "SELECT * FROM `sell` WHERE `billchallan`='".$_GET['memo']."'";
			/*fetch data from sell return to see already some product or return or not */


			function getReturnedQ($bill,$proid)
			{
				
				$sql = "SELECT SUM(`quntity`) as alltoal  FROM `sell_return` WHERE `memono`='{$bill}' AND `productid`='{$proid}'";
				$selreturn = $GLOBALS['db']->joinQuery($sql)->fetch(PDO::FETCH_ASSOC);

				return $selreturn['alltoal'];
			}

			$data  =  $db->joinQuery($sql)->fetchAll();
			$products = [];
			foreach ($data as $dt) 
			{ 

				$quntity =   (int)$dt['quantity']-(int)getReturnedQ($dt['billchallan'],$dt['productid']);
				//getReturnedQ($dt['billchallan'],$dt['productid']);

				$comppose =  array(
					'customerid' => $dt['customerid'], 
					'productid' => $dt['productid'], 
					'quantity' => $quntity, 
					'price' => $dt['price']
				);
				array_push($products, $comppose);
			}
			echo json_encode($products);
		?>