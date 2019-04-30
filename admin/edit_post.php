<?php
	if (isset($_GET["id_update_post"]) && is_numeric($_GET["id_update_post"]))
	{
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (Exception $e) {
			die('Dumb error : ' . $e->getMessage());
		}

		$req = $bdd->query('SELECT * FROM billets WHERE id='.$_GET['id_update_post']) or die(print_r($bdd->errorInfo()));
		if(!empty($req))
		{
			if(isset($_POST["author"]) && isset($_POST["title"]) && isset($_POST["content"]))
			{
				if($_POST['author'] != '' && $_POST['title'] != '' && $_POST["content"] != '')
				{
					$req = $bdd->query('UPDATE `billets` SET `title`=\''.$_POST['title'].'\',`content`=\''.$_POST["content"].'\',`author`=\''.$_POST['author'].'\' WHERE id='.$_GET['id_update_post']);/*
					echo 'UPDATE `billets` SET `title`=\''.$_POST['title'].'\',`corps`=\''.$_POST["content"].'\',`auteur`=\''.$_POST['author'].'\' WHERE id='.$_GET['id_update_post'];
				*/}
			}					
		}
	}

	header('location: manager.php');
	die();
?>