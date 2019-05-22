<?php
	function get_billets($offset, $limit)
	{
		global $db;
		$offset = (int)$offset;
		$limit = (int)$limit;

		$req = $db->prepare('SELECT `id`,`title`,`content`,DATE_FORMAT(`dateCreation`, "%d %M %Y") as `date_creation`,`author` FROM `billets` ORDER BY dateCreation DESC LIMIT :offset, :limit');
		$req->bindParam(":offset", $offset, PDO::PARAM_INT);
		$req->bindParam(":limit", $limit, PDO::PARAM_INT);
		$req->execute();
		$billets = $req->fetchAll();
		return $billets;
	}

	function get_billet_byId($id)
	{
		global $db;
		$id = (int)$id;
		$req = $db->query('SELECT `id`,`title`,`content`,DATE_FORMAT(`dateCreation`, "%d %M %Y") as `date_creation`,`author` FROM billets WHERE id = '.$id) or die(print_r($db->errorInfo()));
		$data = $req->fetch();
		return $data;
	}