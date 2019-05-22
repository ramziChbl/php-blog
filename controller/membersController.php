<?php
	include_once("model/get_members.php");
	$_SESSION["loggedIn"] = false;
	$member = NULL;
	if(isset($_COOKIE["userId"]))
	{
		$member = get_member_by_id(intval($_COOKIE["userId"]));
		if(empty($member))
		{
			$_SESSION["loggedIn"] = false;
		}
		else
		{
			$_SESSION["loggedIn"] = true;
			$_SESSION["memberId"] = $member["id"];
		}
	}

	else if(!isset($_SESSION["memberId"]))
	{
		if(!isset($_POST["pseudo"]) || !isset($_POST["pass"]))
		{
			$_SESSION["loggedIn"] = false;
		}
		else
		{
			$member = get_member($_POST["pseudo"], $_POST["pass"]);
			if(is_null($member))
			{
				$_SESSION["loggedIn"] = false;
			}
			{
				$_SESSION["loggedIn"] = true;
				$_SESSION["memberId"] = $member["id"];
			}
		}
	}
	else
	{
		$member = get_member_by_id(intval($_SESSION["memberId"]));
	}
?>