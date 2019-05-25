<?php
	//$commentAuthor = get_member_by_id($comment["id_author"]);
	//$commentAuthor = 
	/*if(empty($commentAuthor))
		$pseudoCommentAuthor = "[deleted]";
	else
		$pseudoCommentAuthor = $commentAuthor["pseudo"];
	echo' 
	<div class="comment">
		<header>
			<h1>'.$pseudoCommentAuthor.'</h1>
			<h2>'.$comment['date_comment'].'<h2>
		</header>
		<p>'.$comment['comment'].'</p>
	</div>';*/
	echo' 
	<div class="comment">
		<header>
			<h1>'.$comment->pseudo_author().'</h1>
			<h2>'.$comment->date_comment().'<h2>
		</header>
		<p>'.$comment->comment().'</p>
	</div>';
?>