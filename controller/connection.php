<?php
	include_once("../model/connect_mysql.php");
	connectDB();
	include_once("../model/get_members.php");

	if(!isset($_POST["pseudo"]) || !isset($_POST["pass"]))
	{
		header('location: ../view/connection.php');
		die();
	}
	else
	{
		$member = get_member($_POST["pseudo"], sha1($_POST["pass"]));
		
		if(!(empty($member)))
		{
			session_start();
			$_SESSION["memberId"] = $member["id"];

			if (isset($_POST["rememberMe"]) && $_POST["rememberMe"] == "yes")
			{
				// Remember user : Save Cookie
				// PROBLEM COOKIE NOT ACCESSIBLE FROM blog
				// I THINK IT MUST BE SET IN BLOG 
				// CREATED A PHP SCRIPT IN BLOG TO SET COOKIE
				
				header('location: ../cookieSetter.php?id='.$member["id"]); // Script where cookie is set
			}
			else
			{
				header('location: ../blog.php');
				die();
			}	
			
		}
		else
		{
			header('location: ../view/connection.php');
			die();
		}
	}
?>