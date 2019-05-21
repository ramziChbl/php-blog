<?php
	session_start();
	if (empty($_SESSION["memberId"]) || !isset($_POST['id_billet']))
	{
		die('Erreur dans l\'ajout de commentaire.');
	}
	

	if ($_POST['commentAjoute'] == '')
	{
		die("Commentaire vide");
	}

	require("../model/connect_mysql.php");
	require("../model/post_comment.php");

	post_comment($_POST['id_billet'], $_POST['commentAjoute'], $_SESSION["memberId"], $bdd);

	/*$req = $bdd->prepare('INSERT INTO comments(id_billet, id_author, comment, date_comment) VALUES (?, ?, ?, ?);');
	$req->execute([
		$_POST['id_billet'], $_SESSION["memberId"], $_POST['commentAjoute'], date("Y-m-d H:i:s") 
	]);*/
	header('location: ../controller/post.php?id_billet='.$_POST['id_billet']);
 ?>