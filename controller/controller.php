<?php
	/*require "model/NewsManager.php";
	require "model/CommentManager.php";*/

	function showListPosts()
	{
		//$newsManager = new NewsManagerPDO(DBFactory::db());
		//$db = DBFactory::getMysqlConnexionWithPDO();
		global $db;
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
		if(isset($_GET["id"]))
		{
			$postId = (int)$_GET["id"];

			//$db = DBFactory::getMysqlConnexionWithPDO();
			global $db;
			$newsManager = new NewsManagerPDO($db);
			$CommentManager = new CommentManager($db);

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

	}