

		<?php 

				require_once 'dboperation.php';
			    
               $db = new Db();
				if (isset($_POST['btn'])) {

					$name = $_POST['name'];
					$pass = md5($_POST['pass']);
					$qry = $db->selectAll("users","name = '$name' AND password = '$pass'");
					$data = $qry->fetch(PDO::FETCH_ASSOC);
					if (!empty($name) && !empty($pass)) {
						
							if ($name == $data['name'] && $pass == $data['password']) {

								session_start();
								$_SESSION['username'] = $name;
								$_SESSION['role']     =  $data['user_role'];
								$_SESSION['u_id']     = $data['u_id'];
								$_SESSION['e_type']   = $data['employeetype'];
								$_SESSION['start']    = time();
								$_SESSION['expire']    = $_SESSION['start'] + (60 * 60);

								?><script>
						         window.location.href='../home.php';
								</script><?php 
								
							}else{
								?><script>
						         window.location.href="../index.php?msg=username and password don't match";
								</script><?php 
								

								//echo " <a href='../index.php'>Go back</a>";
							}
					}else {
						
						?><script>
						         window.location.href="../index.php?msg=fields are empty , fill them first ..... ";
								</script><?php 
						
					}


				}	


		?>