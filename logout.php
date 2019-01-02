<?php
session_start();
session_destroy();
 if (!isset($_GET['msg'])) 
 {
 	$msg =  "You have logged out";
 }
 else 
 {
 	$msg = $_GET['msg'];
 }
?>
<script>
	window.location.href='index.php?msg=<?=$msg?>';
</script>
