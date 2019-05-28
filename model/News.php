<?php

	class News{
		private $id;
		private $title;
		private $content;
		private $creationDate;
		private $author;

		/*public function __construct($id, $title, $content, $creationDate, $author)
		{
			/*$this->setId($id);
			$this->setTitle($title);
			$this->setContent($content);
			$this->setCreationDate($creationDate);
			$this->setAuthor($author);
		}*/

		/*function __construct()
		{
		}
*/

		function __construct($values = [])
		{
			if(!empty($values))
				$this->hydrate($values);
		}

		public function hydrate($values)
		{
			foreach ($values as $attribut => $valeur)
		    {
		      $methode = 'set'.ucfirst($attribut);
		      
		      if (is_callable([$this, $methode]))
		      {
		        $this->$methode($valeur);
		      }
		    }
		}

		public function isNew(){
			return $this->id;
		}

		public function id(){
			return $this->id;
		}

		public function title(){
			return $this->title;
		}
		public function content(){
			return $this->content;
		}

		public function creationDate(){
			return $this->creationDate;
		}

		public function author(){
			return $this->author;
		}

		public function setTitle($title){
			$this->title = $title;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function setContent($content){
			$this->content = $content;
		}
		public function setCreationDate($creationDate){
			$this->creationDate = $creationDate;
		}
		public function setAuthor($author){
			$this->author = $author;
		}

		public function show(){
			echo "Content : ".$this->content;
		}
	}
?>