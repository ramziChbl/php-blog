<?php
	/**
	 * 
	 */
	class NewsManagerPDO extends NewsManager
	{
		private $_db;
		private $_newsPerPage = 2;
		/*private $_host;
		private $_dbname;
		private $_user;
		private $_pass;*/

		function __construct($db)
		{
			$this->_db = $db;
			/*$_host = "localhost";
			$_dbname = "test";
			$_user = "ramzi";
			$_pass = "pourquoi99";

			try {
				$_db = new PDO('mysql:host='.$_host.';dbname='.$_dbname.';charset=utf8', $_user, $_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			} catch (PDOException $e) {
				die('Dumb error : ' . $e->getMessage());
			}*/
		}

		function newsPerPage()
		{
			return $this->_newsPerPage;
		}

		function count()
		{
			$req = $this->_db->query('SELECT COUNT(*) AS count FROM billets') or die(print_r($bdd->errorInfo()));
			$nbLines = $req->fetch();
			return (int)$nbLines["count"];
		}

		function add(News $news)
		{
			$req = $this->_db->prepare('INSERT INTO billets(title, content, dateCreation, author) VALUES (:title, :content, :dateCreation, :author)');

			$req->execute([
				'title' => $news->title(),
				'content' => $news->content(),
				'dateCreation' => date("Y-m-d H:i:s"),
				'author' => $news->author()
			]);
		}

		function update(News $news)
		{
			$req = $this->_db->prepare('UPDATE `billets` SET `title`=:title,`content`=:content,`author`=:author WHERE id=:id');
			$req->execute([
				'title' => $news->title(),
				'content' => $news->content(),
				'author' => $news->author(),
				'id' => $news->id()
			]);
		}


		function getList($offset, $limit)
		{
			$offset = (int)$offset;
			$limit = (int)$limit;

			$req = $this->_db->prepare('SELECT `id`,`title`,`content`,DATE_FORMAT(`dateCreation`, "%d %M %Y") as `date_creation`,`author` FROM `billets` ORDER BY dateCreation DESC LIMIT :offset, :limit');
			$req->bindParam(":offset", $offset, PDO::PARAM_INT);
			$req->bindParam(":limit", $limit, PDO::PARAM_INT);
			$req->execute();
			//$news = $req->fetchAll();

			$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
    
    		$listeNews = $req->fetchAll();

			return $listeNews;
		}

		function getNews($id)
		{
			$id = (int)$id;
			$req = $this->_db->query('SELECT `id`,`title`,`content`,DATE_FORMAT(`dateCreation`, "%d %M %Y") as `date_creation`,`author` FROM billets WHERE id = '.$id) or die(print_r($_db->errorInfo()));

			$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'News');
			$news = $req->fetch();
			/*$news_values = $req->fetch();
			$news = new News($news_values);*/
			//$news->hydrate($news_values);
			return $news;
		}
		/*
		function getMembers()
		{
			$req = $_db->prepare("SELECT * FROM members");
			$req->execute();
			$members = $req->fetchAll();
			return $members;
		}

		function getMember($pseudo, $pass)
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

		function get_member_by_id($id)
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

		function get_member_by_pseudo($pseudo)
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

		function insert_member($pseudo, $pass, $mail)
		{
			$req = $_db->prepare('INSERT INTO members(`pseudo`, `pass`, `mail`, `registration_date`) VALUES(:pseudo,:pass,:mail,CURRENT_DATE)');
			$req->bindParam(":pseudo", $pseudo);
			$req->bindParam(":pass", $pass);
			$req->bindParam(":mail", $mail);
			$req->execute();
		}*/

	}
?>