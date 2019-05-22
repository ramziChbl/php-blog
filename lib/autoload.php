<?php
	require 'model/DBFactory.php';
	require 'model/NewsManager.php';
	require 'model/NewsManagerPDO.php';
	require 'model/CommentManager.php';
	require 'model/News.php';
	require 'model/UserManager.php';

	$db = DBFactory::getMysqlConnexionWithPDO();
	$newsManager = new NewsManagerPDO($db);
	$commentManager = new CommentManager($db);