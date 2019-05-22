<?php
	
	function connectDB()
	{
		$host = "localhost";
		$dbname = "test";
		$user = "ramzi";
		$pass = "pourquoi99";
		try {
			$db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch (PDOException $e) {
			die('Dumb error : ' . $e->getMessage());
		}
		return $db;
	}
