<?php
	/**
	 * 
	 */
	class NewsManagerPDO extends NewsManager
	{
		private $_db;
		private $_newsPerPage = 2;
	
		function __construct($db)
		{
			$this->_db = $db;
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
			return $news;
		}
	}
?>