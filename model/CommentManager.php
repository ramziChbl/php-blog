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

			$req = $this->_db->query('SELECT * FROM comments WHERE id_billet = '.$idBillet.' ORDER BY date_comment DESC') or die(print_r($bdd->errorInfo()));

			$comments = $req->fetchAll();
			return $comments;
		}

		function insertComment($id, $comment, $authorId)
		{
			$req = $this->_db->prepare('INSERT INTO comments(id_billet, id_author, comment, date_comment) VALUES (?, ?, ?, ?);');
			$req->execute([
				$id,
				$authorId,
				$comment,
				date("Y-m-d H:i:s") 
			]);
		}

	}