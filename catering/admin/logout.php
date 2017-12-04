<?php include"../inc/config.php"; ?>
<?php

	unset($_SESSION['iam_admin']);
	//session_destroy();
	redir($url."index.php");
?>