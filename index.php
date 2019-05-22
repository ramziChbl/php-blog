<?php
	session_start();
	require "lib/autoload.php";

	require "controller/controller.php";
	require("controller/membersController.php");
	


	if(!isset($_GET["action"]))
		showListPosts();
	else
	{
		switch ($_GET["action"]) {
			case 'list':
				showListPosts();
				break;

			case 'post':
				showPost();
				break;

			case 'addPost':
				# code...
				break;

			case 'posts':
				# code...
				break;
			
			default:
				showListPosts();
				break;
		}
	}