<?php
	session_start();
	include_once("model/connect_mysql.php");
	$bdd = connectDB();
	include_once("controller/membersController.php");
	include_once("controller/index.php");
	/*unset($_SESSION['member']);
	session_write_close()*/
?>