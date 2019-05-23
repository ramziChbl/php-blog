<?php
	/**
	 * 
	 */
	class User
	{
		private $id;
		private $pseudo;
		private $pass;
		private $mail;
		private $registration_date;
		/*function __construct(argument)
		{
			# code...
		}*/

		function id()
		{
			return $this->id;
		}
		function pseudo()
		{
			return $this->pseudo;
		}
		function pass()
		{
			return $this->pass;
		}
		function mail()
		{
			return $this->mail;
		}
		function registration_date()
		{
			return $this->registration_date;
		}
		
	}