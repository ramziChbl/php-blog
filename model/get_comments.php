<?php
	function get_comments($idBillet/*, $offset, $limit*/)
	{
		global $bdd;
		$idBillet = (int)$idBillet;

		$req = $bdd->query('SELECT * FROM comments WHERE id_billet = '.$idBillet.' ORDER BY date_comment DESC') or die(print_r($bdd->errorInfo()));

		$comments = $req->fetchAll();
		return $comments;
	}