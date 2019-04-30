<?php
	session_start();
	include_once("../model/connect_mysql.php");
	include_once("../model/get_billets.php");
	include_once("../model/get_comments.php");
	include_once("../model/get_members.php");

	if(isset($_GET['id_billet']) && is_numeric($_GET['id_billet']))
	{
		$billet = get_billet_byId($_GET['id_billet']);
		if(is_null($billet))
		{
			die('Dumb error : Id inexistant');
		}
		$comments = get_comments($billet["id"]);
		$showCommentButton = false;

		//if(empty($_SESSION["member"]))
		$loggedIn = (bool)!empty($_SESSION["member"]);
		include_once("../view/post.php");
	}
	else
	{
		die('Dumb error in GET');
	}

?>