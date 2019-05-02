<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="view/style.css">
</head>
<body>
	<div id="container">
		<header>
			<h1>Blog.</h1>
			<div id="userSpace">
				<ul>
				<?php
					if(isset($_SESSION["member"]))
					{
						echo '<li>Hello '. $_SESSION["member"]["pseudo"] .'</li>';
						echo '<li><a class="userSpaceLink" href="controller/deconnection.php">Deconnection</a></li>';
					}
					else
					{
						echo '<li><a class="userSpaceLink" href="controller/connection.php">Connection</a></li>';
						echo '<li><a class="userSpaceLink" href="controller/registration.php">Registration</a></li>';
					}
				?>
				<ul>
			</div>
		</header>

		<section id="content">
		<?php
			$showCommentButton = true;
			foreach ($billets as $billet)
			{
				include("billet.php");
			}
		 ?>
		 </section>
	
		<nav id="pages_navigation">
			<ul>
			<?php
				$nbCases = 10;
				if($currentPage <= $nbCases - 2) // Show first pages
				{
					for($i = 1; $i<$currentPage; $i++)
					{
						echo '<li><a href="blog.php?page='.$i.'">'.$i.'</a></li>';
					}
					echo '<li id="currentPage">'.$currentPage.'</li>';

					if($nbPages <= $nbCases) // 
					{
						for ($i=$currentPage + 1; $i < $nbPages; $i++)
						{ 
							echo '<li><a href="blog.php?page='.$i.'">'.$i.'</a></li>';
						}
						for ($i=$nbPages; $i <= $nbCases; $i++)
						{ 
							echo "<li></li>";
						}
					}
					else
					{
						for ($i=$currentPage + 1; $i < $nbCases - 2; $i++)
						{ 
							echo '<li><a href="blog.php?page='.$i.'">'.$i.'</a></li>';
						}
						echo '<li>...</li>';
						echo '<li><a href="blog.php?page='.$nbPages.'">'.$nbPages.'</a></li>';
					}	
				}
				else // currentPage > nbCases - 2
				{
						echo '<li><a href="blog.php?page=1">1</a></li>';
						echo '<li>...</li>';
						for($i = $currentPage - 4; $i<$currentPage; $i++)
						{
							echo '<li><a href="blog.php?page='.$i.'">'.$i.'</a></li>';
						}
						echo '<li id="currentPage">'.$currentPage.'</li>';
						for ($i=0;$i < 3 ;$i++)
						{ 
							echo "<li></li>";
						}
						//NOT FINISHED
				}
				//======= PAGE PREC ==========
				/*echo "<li><span><a ";
				
				if ($currentPage > 1)
				{
					echo('href="blog.php?page='.($currentPage - 1).'"');
				}
				else
				{
					//echo('href="#"');
				}
				echo ">previous</a></span></li>";

				//======= PAGE COURANTE ==========
				echo '<li><span>'.($currentPage).'</span></li>';

				//======= PAGE SUIVANTE ==========
				echo "<li><span><a ";

		
				if ($currentPage +1 < $nbLines['count']/$bPerPage)
				{
					echo('href="blog.php?page='.($currentPage + 1).'"');
				}
				else
				{
					//echo('href="#"');
				}
				echo ">next</a></span></li>";*/
			?>
			</ul>
		</nav>
	</div>
</body>
</html>