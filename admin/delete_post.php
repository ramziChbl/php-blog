<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Dumb error : ' . $e->getMessage());
	}

	if (isset($_GET['id_post']) && is_numeric($_GET['id_post'])) 
	{
		$req = $bdd->query('DELETE FROM billets WHERE id='.$_GET['id_post']);
	}

	header('location: manager.php');
	die();
?>