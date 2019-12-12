<!DOCTYPE html>
<html>
<head>
	<title><?php echo $billet->title();?></title>
	<link rel="stylesheet" type="text/css" href="public/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div id="container">
		<?php include("view/pageHeader.php");?>

		<!-- LIEN VERS LE BLOG -->
		<div id="underHeader"></div>
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