<?php
	/**
	 * 
	 */
	class CommentManager
	{
		private $_db;

		function __construct($db)
		{
			$this->_db = $db;
		}

		function getComments($idBillet)
		{
			$idBillet = (int)$idBillet;

			//$req = $this->_db->prepare('SELECT * FROM comments WHERE id_billet =:id ORDER BY date_comment DESC') or die(print_r($bdd->errorInfo()));

			$req = $this->_db->prepare('SELECT comments.*, members.pseudo AS pseudo_author FROM comments INNER JOIN members ON comments.id_author = members.id WHERE comments.id_billet =:idBillet ORDER BY date_comment DESC') or die(print_r($bdd->errorInfo()));
			//SELECT comments.*, members.pseudo FROM comments INNER JOIN members ON comments.id_author = members.id WHERE comments.id_billet = 12;

			$req->execute([
				'idBillet' => $idBillet
			]);

			$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Comment');

			$comments = $req->fetchAll();
			return $comments;
		}

		function insertComment($idNews, $comment, $authorId)
		{
			$req = $this->_db->prepare('INSERT INTO comments(id_billet, id_author, comment, date_comment) VALUES (?, ?, ?, ?);');
			$req->execute([
				$idNews,
				$authorId,
				$comment,
				date("Y-m-d H:i:s") 
			]);
		}

	}