<?php
	if(isset($_POST["author"]) && isset($_POST["title"]) && isset($_POST["content"]))
	{
		if($_POST['author'] == '' || $_POST['title'] == '' || $_POST["content"] == '')
		{
			header('location: manager.php');
			die();
		}

		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch(Exception $e)
		{
			die('Dumb error : ' . $e->getMessage());
		}

		$req = $bdd->prepare('INSERT INTO billets(title, content, dateCreation, author) VALUES (:title, :content, :dateCreation, :author)');

		$req->execute([
			'title' => $_POST['title'],
			'content' => $_POST['content'],
			'dateCreation' => date("Y-m-d H:i:s"),
			'author' => $_POST['author'] 
		]);
	}

	header('location: manager.php');
	die();
?>