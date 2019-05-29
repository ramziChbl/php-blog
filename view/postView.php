<!DOCTYPE html>
<html>
<head>
	<title><?php echo $billet->title();?></title>
	<link rel="stylesheet" type="text/css" href="public/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
						echo '<li class="second_link"><a class="userSpaceLink" href="?action=addPost">Write Post</a></li>';
						echo '<li class="second_link"><a class="userSpaceLink" href="?action=logout">Logout</a></li>';
						
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
		<!-- LIEN VERS LE BLOG -->
		<a id="lien_retour" href="?action=list">Home</a>
		<!-- AFFICHAGE DU BILLET -->
		<main id="content">
			<section id="billets">
				<?php
					include("view/billet.php");
				?>
			</section>
		</main>
			

		<!-- COMMENTAIREs -->
		
		<section id="commentSection">
			<?php if($currentUserController->logged())
			{
			?>
			<div id="addComment">
				<?php  
					echo '<form action="?action=addComment&id='.$billet->id().'" method="post">';
					echo '	<p>Comment as <a href="#">'.$currentUserController->loggedUser()->pseudo().'</a></p>';
				?>
					
					<textarea name="comment" id="commentAjoute" rows="6"></textarea>
					<input type="submit" name="submit" value="Comment">
					<?php  
						echo '<input type="hidden" name="id_billet" value="'.$billet->id().'">';
					?>

				</form>
			</div>
			<?php } ?>

			<!-- Show comments -->
			<div id="commentaires">
				<?php
					foreach ($comments as $comment)
					{
						include("comment.php");
					}
				 ?>	
				
			</div>
		</section>

	</div>
</body>
</html>