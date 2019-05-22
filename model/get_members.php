<?php  
	function get_members()
	{
		global $db;
		$req = $db->prepare("SELECT * FROM members");
		$req->execute();
		$members = $req->fetchAll();
		return $members;
	}
	function get_member($pseudo, $pass)
	{
		global $db;
		$req = $db->prepare('SELECT * FROM members WHERE pseudo=:pseudo AND pass=:pass');
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

	function get_member_by_id($id)
	{
		global $db;
		$req = $db->prepare('SELECT * FROM members WHERE id=:id');
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

	function get_member_by_pseudo($pseudo)
	{
		global $db;
		$req = $db->prepare('SELECT * FROM members WHERE pseudo=:pseudo');
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

	function insert_member($pseudo, $pass, $mail)
	{
		global $db;
		$req = $db->prepare('INSERT INTO members(`pseudo`, `pass`, `mail`, `registration_date`) VALUES(:pseudo,:pass,:mail,CURRENT_DATE)');
		$req->bindParam(":pseudo", $pseudo);
		$req->bindParam(":pass", $pass);
		$req->bindParam(":mail", $mail);
		$req->execute();
	}
?>