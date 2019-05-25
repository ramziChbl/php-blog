<?php
	/*require "model/NewsManager.php";
	require "model/CommentManager.php";*/

	function showListPosts()
	{
		//$newsManager = new NewsManagerPDO(DBFactory::db());
		//$db = DBFactory::getMysqlConnexionWithPDO();
		global $db;
		global $currentUserController;
		$newsManager = new NewsManagerPDO($db);
		$nbLines = $newsManager->count();

		$nbPages = ceil($nbLines / $newsManager->newsPerPage());

		$currentPage = 1;
		if(isset($_GET['page']) && is_numeric($_GET['page']))
		{
			if($_GET['page'] > 0 && $_GET['page'] <= $nbPages)
				$currentPage = $_GET['page'];
		}
		
		$billets = $newsManager->getList(($currentPage - 1)*$newsManager->newsPerPage(), $newsManager->newsPerPage());
		
		foreach ($billets as $key => $billet) {
			$billets[$key]->setTitle(htmlspecialchars($billet->title()));
			$billets[$key]->setContent(htmlspecialchars($billet->content()));

			// FOR ARRAY
			/*$billets[$key]["title"] = htmlspecialchars($billet["title"]);
			$billets[$key]["content"] = nl2br(htmlspecialchars($billet["content"]));*/
		}

		$showCommentButton = true;

		include "view/listPostView.php";
	}

	function showPost()
	{
		global $currentUserController;

		if(isset($_GET["id"]))
		{
			$postId = (int)$_GET["id"];

			//$db = DBFactory::getMysqlConnexionWithPDO();
			global $db;
			$newsManager = new NewsManagerPDO($db);
			$CommentManager = new CommentManager($db);
			$UserManager = new UserManager($db);

			$billet = $newsManager->getNews($postId);
			$comments = $CommentManager->getComments($postId);

			$showCommentButton = false;

			include "view/postView.php";
		}
		else
			echo "Post not found."; // Change to Error
	}

	function addPost()
	{

	}

	function addComment()
	{
		global $db;
		$newsManager = new NewsManagerPDO($db);
		$CommentManager = new CommentManager($db);
		$UserManager = new UserManager($db);
		$currentUserController = new CurrentUserController();

		if (isset($_POST['submit']))
		{
			if(!empty($_POST['comment']))
			{
				$CommentManager->insertComment($_POST['id_billet'], $_POST['comment'], $currentUserController->loggedUser()->id());
			}
		}
		showPost();
	}

	function showLoginPage()
	{
		global $currentUserController;
		if(!($currentUserController->logged()) && !($currentUserController->login()))
		{
			include "view/loginView.php";
		}
		//$userManager = new UserManager();
		/*if(isset($_POST['submit'])) // Login form filled
		{
			if(!empty($_POST["pseudo"]) && !empty($_POST["pass"]))
			{

			}
		}*/
		else
		{
			showListPosts();
		}
	}

	function showRegisterPage()
	{
		global $currentUserController;
		if(!$currentUserController->register())
		{
			include "view/registerView.php";
		}
		else
		{
			showListPosts();
		}
	}

	function logout()
	{
		global $currentUserController;
		$currentUserController->logout();
		showListPosts();
	}