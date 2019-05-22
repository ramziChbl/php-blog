<?php
	function get_comments($idBillet)
	{
		global $db;
		$idBillet = (int)$idBillet;

		$req = $db->query('SELECT * FROM comments WHERE id_billet = '.$idBillet.' ORDER BY date_comment DESC') or die(print_r($db->errorInfo()));

		$comments = $req->fetchAll();
		return $comments;
	}