<?php
	echo '<article class="billet">
			<header>					
			 	<h1>'.$billet['title'].'</h1>
			 	<p>Posted on <time datetime="'.$billet['date_creation'].'">'.$billet['date_creation'].'</time> by <a href="#" id="author">'. $billet['author'] .'</a></p>
			</header>

			<div id="billet_body">'. $billet['content'] .'</div>
			<footer>';

	if($showCommentButton)
	{
		echo '<a class="comment_link"  href="controller/post.php?id_billet='.$billet['id'].'" >Comments</a>';
	}
	echo '				</footer>
				 </article>';
?>
