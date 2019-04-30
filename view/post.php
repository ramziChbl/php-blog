<!DOCTYPE html>
<html>
<head>
	<title><?php echo $billet["title"];?></title>
	<link rel="stylesheet" type="text/css" href="../view/style.css">
</head>
<body>
	<!--<header><h1>Blog.</h1></header>-->
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
	
		<!-- LIEN VERS LE BLOG -->
		<a id="lien_retour" href="../blog.php">Retour</a>
		<!-- AFFICHAGE DU BILLET -->
		<?php
			include("../view/billet.php");
		?>

		<!-- COMMENTAIREs -->
		
		<div id="comment_section">
			<?php if($loggedIn)
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