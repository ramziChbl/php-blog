<?php 
	function post_comment($id, $comment, $authorId, $bdd)
	{
		$req = $bdd->prepare('INSERT INTO comments(id_billet, id_author, comment, date_comment) VALUES (?, ?, ?, ?);');
		$req->execute([
			$id,
			$authorId,
			$comment,
			date("Y-m-d H:i:s") 
		]);
	}