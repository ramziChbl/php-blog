<?php
	require 'model/DBFactory.php';
	require 'model/NewsManager.php';
	require 'model/NewsManagerPDO.php';
	require 'model/CommentManager.php';
	require 'model/News.php';
	require 'model/UserManager.php';
	require 'model/User.php';
	require 'controller/CurrentUserController.php';

	$db = DBFactory::getMysqlConnexionWithPDO();
	$newsManager = new NewsManagerPDO($db);
	$commentManager = new CommentManager($db);
	$currentUserController = new CurrentUserController();