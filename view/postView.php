<!DOCTYPE html>
<html>
<head>
	<title><?php echo $billet->title();?></title>
	<link rel="stylesheet" type="text/css" href="view/style.css">
</head>
<body>
	<!--<header><h1>Blog.</h1></header>-->
	<div id="container">
		<header>
			<h1>Blog.</h1>
			<div id="userSpace">
				<ul>
				<?php
					if(isset($member))
					{
						echo '<li class="first_link"><a href="#">'. $member["pseudo"] .'</a></li>';
						echo '<li class="second_link"><a class="userSpaceLink" href="deconnection.php">Deconnection</a></li>';
					}
					else
					{
						echo '<li><a class="first_link" href="connection.php">Login</a></li>';
						echo '<li><a class="second_link" href="registration.php">Create an account</a></li>';
					}
				?>
				<ul>
			</div>
		</header>
	
		<!-- LIEN VERS LE BLOG -->
		<a id="lien_retour" href="../blog.php">Retour</a>
		<!-- AFFICHAGE DU BILLET -->
		<?php
			include("view/billet.php");
		?>

		<!-- COMMENTAIREs -->
		
		<div id="comment_section">
			<?php if($_SESSION["loggedIn"])
			{
			?>
			<div id="ajouter_comment">
				<form action="../controller/commentaires_post.php" method="post">
					<!--
					<label for="nomUtil">Nom d'utilisateur :</label></br>
					<input type="text" name="nomUtil" id="nomUtil"></br>
					-->
					<label for="commentAjoute">Commentaire :</label><textarea name="commentAjoute" id="commentAjoute"></textarea>
					<input type="submit" value="Comment">
					<?php  
						echo '<input type="hidden" name="id_billet" value="'.$_GET['id_billet'].'">';
					?>

				</form>
			</div>
			<?php } ?>
			<!--
			<div id="ajouter_comment">
				<form action="../view/commentaires_post.php" method="post">
					<label for="nomUtil">Nom d'utilisateur :</label></br>
					<input type="text" name="nomUtil" id="nomUtil"></br>
					<label for="commentAjoute">Commentaire :</label><textarea name="commentAjoute" id="commentAjoute"></textarea>
					<input type="submit" value="Valider">
					<?php  
						//echo '<input type="hidden" name="id_billet" value="'.$_GET['id_billet'].'">';
					?>

				</form>
			</div>-->

			<!-- AFFICHAGE DES COMMENTAIRES -->
			<div id="commentaires">
				<?php
					foreach ($comments as $comment)
					{
						include("comment.php");
					}
				 ?>	
				
			</div>
		</div>

	</div>
</body>
</html>