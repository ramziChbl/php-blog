<?php
	echo '<article class="billet">
			<header>					
			 	<h1><a class="postTitle" href="?action=post&id='.$billet->id().'" >'.$billet->title().'</a></h1>
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
	echo '><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="#777777" d="M14,20H10V11L6.5,14.5L4.08,12.08L12,4.16L19.92,12.08L17.5,14.5L14,11V20Z" />
</svg></button></li>';

	echo '			<li><button';
	if($currentUserController->logged())
	{
		echo ' onclick="vote(this, '.$billet->id().', '.$currentUserController->loggedUser()->id().', -1)"';
	}
	echo '><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="#777777" d="M10,4H14V13L17.5,9.5L19.92,11.92L12,19.84L4.08,11.92L6.5,9.5L10,13V4Z" />
</svg></button></li>';

	if($showCommentButton)
	{
		echo '<li><a class="comment_link"  href="?action=post&id='.$billet->id().'" >Comments</a></li>';
	}
	echo '				</ul></footer>
				 </article>';
?>
