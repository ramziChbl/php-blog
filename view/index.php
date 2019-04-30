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
	

		<section id="pages_navigation">
			<ul>
			<?php
				//======= PAGE PREC ==========
				echo "<li><a ";
				if ($currentPage > 1)
				{
					echo('href="blog.php?page='.($currentPage - 1).'"');
				}
				else
				{
					//echo('href="#"');
				}
				echo ">&larr; previous</a></li>";

				//======= PAGE COURANTE ==========
				echo '<li>'.($currentPage).'</li>';

				//======= PAGE SUIVANTE ==========
				echo "<li><a ";

		
				if ($currentPage +1 < $nbLines['count']/$bPerPage)
				{
					echo('href="blog.php?page='.($currentPage + 1).'"');
				}
				else
				{
					//echo('href="#"');
				}
				echo ">next &rarr;</a></li>";
			?>
			</ul>
		</section>
	</div>
</body>
</html>