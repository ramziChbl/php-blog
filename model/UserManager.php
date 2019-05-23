<?php
	/**
	 * 
	 */
	class UserManager
	{
		private $_db;
		function __construct($db)
		{
			$this->_db = $db;
		}

		function getUsers()
		{
			$req = $this->_db->prepare("SELECT * FROM members");
			$req->execute();

			$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');

			$members = $req->fetchAll();
			return $members;
		}

		function getUser($pseudo, $pass)
		{
			$req = $this->_db->prepare('SELECT * FROM members WHERE pseudo=:pseudo AND pass=:pass');
			$req->bindParam(":pseudo", $pseudo);
			$req->bindParam(":pass", $pass);
			$req->execute();

			$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');

			$user = $req->fetch();
			//echo $user->id();
			return $user;
			/*if(empty($member))
			{
				return $member;
			}
			else
			{
				return $member[0];
			}*/
		}

		function getUserById($id)
		{
			$req = $this->_db->prepare('SELECT * FROM members WHERE id=:id');
			$req->bindParam(":id", $id);
			$req->execute();

			$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');

			$member = $req->fetch();
			return $member;
			/*if(empty($member))
			{
				return $member;
			}
			else
			{
				return $member[0];
			}*/
		}

		function getUserByPseudo($pseudo)
		{
			$req = $this->_db->prepare('SELECT * FROM members WHERE pseudo=:pseudo');
			$req->bindParam(":pseudo", $pseudo);
			$req->execute();

			$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');

			$member = $req->fetch();
			return $member;
			/*if(empty($member))
			{
				return $member;
			}
			else
			{
				return $member[0];
			}*/
		}

		function insertUser($pseudo, $pass, $mail)
		{
			$req = $this->_db->prepare('INSERT INTO members(`pseudo`, `pass`, `mail`, `registration_date`) VALUES(:pseudo,:pass,:mail,CURRENT_DATE)');
			$req->bindParam(":pseudo", $pseudo);
			$req->bindParam(":pass", $pass);
			$req->bindParam(":mail", $mail);
			$req->execute();
		}

	}