<?php
session_start();
session_destroy();
?>
<script>
	window.location.href='index.php?msg=<?=$_GET['msg']?>';
</script>
