<?php
	/**
	 * 
	 */
	class DBFactory
	{
		//public static $_db;
		
		public static function getMysqlConnexionWithPDO()
		{
			$_host = "localhost";
			$_dbname = "test";
			$_user = "ramzi";
			$_pass = "pourquoi99";

			try {
				$db = new PDO('mysql:host='.$_host.';dbname='.$_dbname.';charset=utf8', $_user, $_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

				//$self->_db = $db;
			} catch (PDOException $e) {
				die('Dumb error : ' . $e->getMessage());
			}
			finally
			{
				return $db;
			}
		}
		/*
		public static function db()
		{
			return $self->_db;
		}*/
	}
?>