<?php
	/**
	 * 
	 */
	class Comment
	{
		private $id;
		private $id_billet;
		private $id_author;
		private $pseudo_author;
		private $comment;
		private $date_comment;
	
		function id()
		{
			return $this->id;
		}
		function id_billet()
		{
			return $this->id_billet;
		}
		function id_author()
		{
			return $this->id_author;
		}
		function pseudo_author()
		{
			return $this->pseudo_author;
		}
		function comment()
		{
			return $this->comment;
		}
		function date_comment()
		{
			return $this->date_comment;
		}
	}