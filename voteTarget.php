<?php
	require "model/DBFactory.php";
	$db = DBFactory::getMysqlConnexionWithPDO();

	if(isset($_GET["postId"]) && isset($_GET["userId"]) && !empty($_GET["dir"]))
	{
		$vote = (int)$_GET["dir"];
		if($vote > 0)
			$vote = 1;
		elseif ($vote < 0) {
			$vote = -1;
		}

		$req = $db->prepare('INSERT INTO votes(id_billet, id_member, vote) VALUES (:postId, :userId, :vote)');


		$req->execute([
			'postId' => $_GET["postId"],
			'userId' => $_GET["userId"],
			'vote' => $vote
		]);
	}