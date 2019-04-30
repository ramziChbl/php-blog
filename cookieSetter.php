<?php
	setcookie("userId", strval($_GET["id"]), time()+3600, "/", null, false, true);
	header('location: blog.php');
?>