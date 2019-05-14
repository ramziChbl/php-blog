<?php
	include_once("../model/connect_mysql.php");
	include_once("../model/get_members.php");

	if(isset($_POST["pseudo"]) && isset($_POST["pass"]) && isset($_POST["passConfirm"]) && isset($_POST["mail"]))
	{
		if(!empty($_POST["pseudo"]) && !empty($_POST["pass"]) && !empty($_POST["passConfirm"]) && !empty($_POST["mail"]))
		{
			$existingMember = get_member_by_pseudo($_POST["pseudo"]);
			if(empty($existingMember))
			{
				if($_POST["pass"] == $_POST["passConfirm"])
				{
					insert_member($_POST["pseudo"], sha1($_POST["pass"]), $_POST["mail"]);
					$member = get_member($_POST["pseudo"], sha1($_POST["pass"]));
					session_start();
					$_SESSION["memberId"] = $member["id"];
					header('location: ../blog.php');
					die();
				}
				else
				{
					die("Wrong password");
				}
			}
			else
			{
				die("Pseudo already exists");
			}
		}
	}
	else
	{
		header('location: ../view/registration.php');
		die();
	}
?>