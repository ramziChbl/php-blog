<?php
	session_start();
	if (empty($_SESSION["member"]) || !isset($_POST['id_billet']))
	{
		die('Erreur dans l\'ajout de commentaire.');
	}
	

	if ($_POST['commentAjoute'] == '')
	{
		die("Commentaire vide");
	}

	include("../model/connect_mysql.php");

	$req = $bdd->prepare('INSERT INTO comments(id_billet, id_author, comment, date_comment) VALUES (?, ?, ?, ?);');
	$req->execute([
		$_POST['id_billet'], $_SESSION["member"]["id"], $_POST['commentAjoute'], date("Y-m-d H:i:s") 
	]);
	header('location: ../controller/post.php?id_billet='.$_POST['id_billet']);
 ?>