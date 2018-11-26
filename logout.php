<?php
session_start();
session_destroy();
?>
<script language="javascript">
	location.href='index.php?msg=You Are Logged Out! Login again..';
</script>
