<?php
	/**
	 * 
	 */
	class UserManager
	{
		
		function __construct(argument)
		{
			# code...
		}

		function getUsers()
		{
			$req = $_db->prepare("SELECT * FROM members");
			$req->execute();
			$members = $req->fetchAll();
			return $members;
		}

		function getUser($pseudo, $pass)
		{
			$req = $_db->prepare('SELECT * FROM members WHERE pseudo=:pseudo AND pass=:pass');
			$req->bindParam(":pseudo", $pseudo);
			$req->bindParam(":pass", $pass);
			$req->execute();
			$member = $req->fetchAll();
			if(empty($member))
			{
				return $member;
			}
			else
			{
				return $member[0];
			}
		}

		function getUserById($id)
		{
			$req = $_db->prepare('SELECT * FROM members WHERE id=:id');
			$req->bindParam(":id", $id);
			$req->execute();
			$member = $req->fetchAll();
			if(empty($member))
			{
				return $member;
			}
			else
			{
				return $member[0];
			}
		}

		function getUserByPseudo($pseudo)
		{
			global $_db;
			$req = $_db->prepare('SELECT * FROM members WHERE pseudo=:pseudo');
			$req->bindParam(":pseudo", $pseudo);
			$req->execute();
			$member = $req->fetchAll();
			if(empty($member))
			{
				return $member;
			}
			else
			{
				return $member[0];
			}
		}

		function insertUser($pseudo, $pass, $mail)
		{
			$req = $_db->prepare('INSERT INTO members(`pseudo`, `pass`, `mail`, `registration_date`) VALUES(:pseudo,:pass,:mail,CURRENT_DATE)');
			$req->bindParam(":pseudo", $pseudo);
			$req->bindParam(":pass", $pass);
			$req->bindParam(":mail", $mail);
			$req->execute();
		}

	}