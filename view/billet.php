<?php
	echo '<article class="billet">
			<header>					
			 	<h1>'.$billet->title().'</h1>
			 	<p>Posted on <time datetime="'.$billet->creationDate().'">'.$billet->creationDate().'</time> by <a href="#" id="author">'. $billet->author() .'</a></p>
			</header>

			<div id="billet_body">'. $billet->content() .'</div>
			<footer>
				<ul>';
	echo '			<li><button';
	if($currentUserController->logged())
	{
		echo ' onclick="vote(this, '.$billet->id().', '.$currentUserController->loggedUser()->id().', 1)"';
	}
	echo '>up</button></li>';

	echo '			<li><button';
	if($currentUserController->logged())
	{
		echo ' onclick="vote(this, '.$billet->id().', '.$currentUserController->loggedUser()->id().', -1)"';
	}
	echo '>down</button></li>';

	if($showCommentButton)
	{
		echo '<li><a class="comment_link"  href="?action=post&id='.$billet->id().'" >Comments</a></li>';
	}
	echo '				</ul></footer>
				 </article>';
?>
