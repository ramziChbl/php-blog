<?php
	/**
	 * 
	 */
	class CurrentUserController
	{
		private $loggedUser;

		function __construct()
		{
			global $db;
			$manager = new UserManager($db);

			
			$member = NULL;

			if (isset($_SESSION["userId"]))
			{
				$this->loggedUser = $manager->getUserById(intval($_SESSION["userId"]));
				$_SESSION["loggedIn"] = true;
			}
			else if(isset($_COOKIE["userId"]))
			{
				$this->loggedUser = $manager->getUserById(intval($_COOKIE["userId"]));
				if(empty($member))
				{
					$_SESSION["loggedIn"] = false;
				}
				else
				{
					$_SESSION["loggedIn"] = true;
					$_SESSION["userId"] = $member["id"];
				}
			}
			else // No session, No cookie => not logged in
			{

			}

		}

		function loggedUser()
		{
			return $this->loggedUser;
		}

		function logged()
		{
			return (!is_null($this->loggedUser));
		}

		function login()
		{
			global $db;
			
			$userManager = new UserManager($db);
			if(isset($_POST['submit'])) // Login form filled
			{
				if(!empty($_POST["pseudo"]) && !empty($_POST["pass"]))
				{
					$pseudo = $_POST["pseudo"];
					$pass = sha1($_POST["pass"]);

					$user = $userManager->getUser($pseudo, $pass);
					
					if(!empty($user))
					{
						$this->loggedUser = $user;
						$_SESSION["userId"] = $this->loggedUser->id();
						if (isset($_POST["rememberMe"]) && $_POST["rememberMe"] == "yes")
						{
								setcookie("userId", strval($_GET["id"]), /*time()+3600*/time()+1, "/", null, false, true);
						}
						return true;
					}
					else
					{
						return false; // replace with error
					}
				}
				else
				{
					return false;
				}
			}
			return false;
		}

		private function safeLogin($pseudo, $pass)
		{
			global $db;
			$userManager = new UserManager($db);

			$user = $userManager->getUser($pseudo, $pass);
			$this->loggedUser = $user;
			$_SESSION["userId"] = $this->loggedUser->id();
		}

		function register()
		{
			global $db;
			$userManager = new UserManager($db);

			if(isset($_POST['submit'])) //register form filled
			{
				if(!empty($_POST["pseudo"]) && !empty($_POST["pass"]) && !empty($_POST["passConfirm"]) && !empty($_POST["mail"]))
				{
					$pseudo = $_POST["pseudo"];
					//$existingMember = get_member_by_pseudo($_POST["pseudo"]);
					$existingMember = $userManager->getUserByPseudo($pseudo);
					if(empty($existingMember))
					{
						if($_POST["pass"] == $_POST["passConfirm"])
						{
							$hashedPass = sha1($_POST["pass"]);
							$mail = $_POST["mail"];
							$userManager->insertUser($pseudo, $hashedPass, $mail);
							$this->safeLogin($pseudo, $hashedPass);
							return true;
						}
						else
						{
							echo("Wrong password");
						}
					}
					else
					{
						echo("Pseudo already exists");
					}
				}
			}
			return false;
		}

		function logout()
		{
			$this->loggedUser = NULL;
			if(isset($_SESSION["userId"]))
			{
				unset($_SESSION['userId']);
			}
			if(isset($_COOKIE['userId']))
			{
				unset($_COOKIE['userId']);
				setcookie('userId', null, -1, '/');
			}
		}
	}
?>