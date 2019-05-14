<?php
	include_once(dirname(__FILE__)."/../model/get_members.php");
	$loggedIn = false;
	$member = NULL;
	if(isset($_COOKIE["userId"]))
	{
		$member = get_member_by_id(intval($_COOKIE["userId"]));
		if(empty($member))
		{
			$loggedIn = false;
		}
		else
		{
			$loggedIn = true;
			$_SESSION["memberId"] = $member["id"];
		}
	}

	else if(!isset($_SESSION["memberId"]))
	{
		if(!isset($_POST["pseudo"]) || !isset($_POST["pass"]))
		{
			$loggedIn = false;
		}
		else
		{
			$member = get_member($_POST["pseudo"], $_POST["pass"]);
			if(is_null($member))
			{
				$loggedIn = false;
			}
			{
				$loggedIn = true;
				$_SESSION["memberId"] = $member["id"];
			}
		}
	}
	else
	{
		$member = get_member_by_id(intval($_SESSION["memberId"]));
	}
?>