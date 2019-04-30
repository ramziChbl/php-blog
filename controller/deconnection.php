<?php
	session_start();
	if(isset($_SESSION["member"]))
	{
		unset($_SESSION['member']);
	}
	if(isset($_COOKIE['userId']))
	{
		unset($_COOKIE['userId']);
		setcookie('userId', null, -1, '/');
	}

	header('location: ../blog.php');
	die();
?>