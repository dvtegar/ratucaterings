<?php include"inc/config.php"; ?>
<?php
	unset($_SESSION['iam_user']);
	//session_destroy();
	redir($url."index.php");
?>