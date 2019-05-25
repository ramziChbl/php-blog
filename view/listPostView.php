<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="public/style.css">
</head>
<body>
	<div id="container">
		<header>
			<h1>Blog.</h1>
			<div id="userSpace">
				<ul>
				<?php
					if($currentUserController->logged())
					{
						echo '<li class="first_link"><a href="#">'. /*$member["pseudo"]*/ ($currentUserController->loggedUser())->pseudo() .'</a></li>';
						echo '<li class="second_link"><a class="userSpaceLink" href="?action=logout">Deconnection</a></li>';
					}
					else
					{
						echo '<li><a class="first_link" href="?action=login">Login</a></li>';
						echo '<li><a class="second_link" href="?action=register">Create an account</a></li>';
					}
				?>
				<ul>
			</div>
		</header>

		<main id="content">
		<?php
			$showCommentButton = true;
			foreach ($billets as $billet)
			{
				include("billet.php");
			}
		 ?>
		 </main>

		<nav id="pages_navigation">
			<ul>
			<?php
				$nbCases = 10;

				if($nbPages <= $nbCases) // Can show all pages in nav
				{
					for($i = 1; $i<$currentPage; $i++)
					{
						echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
					}

					echo '<li><a href="#" class="currentPage">'.$currentPage.'</a></li>';

					for ($i=$currentPage + 1; $i <= $nbPages; $i++)
					{ 
						echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
					}
					for ($i=$nbPages + 1; $i <= $nbCases; $i++)
					{ 
						echo "<li></li>";
					}
				}
				else
				{
					if($currentPage <= $nbCases-4) // current < 6 first pages => Show all first pages
					{
						for($i = 1; $i<$currentPage; $i++)
						{
							echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
						}
						echo '<li><a href="#" class="currentPage">'.$currentPage.'</a></li>';
						for ($i=$currentPage + 1; $i <= $nbCases - 2; $i++)
						{ 
							echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
						}
						echo '<li>...</li>';
						echo '<li><a href="?page='.$nbPages.'">'.$nbPages.'</a></li>';
					}
					elseif ($currentPage >= $nbPages - 6) //current >= 6 last pages
					{
						echo '<li><a href="?page=1">1</a></li>';
						echo "<li>...</li>";
				
						for($i=$nbPages - 7; $i <= $nbPages; $i++)
						{ 
							if($i == $currentPage)
								echo '<li><a href="#" class="currentPage">'.$currentPage.'</a></li>';
							else
								echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
						}
					}
					else // Page in the middle
					{
						echo '<li><a href="?page=1">1</a></li>';
						echo "<li>...</li>";
						for($i = 2; $i>0; $i--) // Show 2 pages before current
						{
							echo '<li><a href="?page='.($currentPage - $i).'">'.($currentPage - $i).'</a></li>';
						}
						echo '<li><a href="#" id="currentPage">'.$currentPage.'</a></li>';

						for ($i=$currentPage + 1; $i <= $nbCases - 2; $i++)
						{ 
							echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
						}
						echo '<li>...</li>';
						echo '<li><a href="?page='.$nbPages.'">'.$nbPages.'</a></li>';
					}
				}
			?>
			</ul>
		</nav>
	</div>
</body>
</html>