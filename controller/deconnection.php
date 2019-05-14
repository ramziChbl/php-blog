<?php
	session_start();
	if(isset($_SESSION["memberId"]))
	{
		unset($_SESSION['memberId']);
	}
	if(isset($_COOKIE['userId']))
	{
		unset($_COOKIE['userId']);
		setcookie('userId', null, -1, '/');
	}

	header('location: ../blog.php');
	die();
?>