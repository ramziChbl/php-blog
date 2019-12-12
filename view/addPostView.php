<!DOCTYPE html>
<html>
<head>
	<title>Add Post</title>
	<link rel="stylesheet" type="text/css" href="public/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div id="container">
		<?php include("view/pageHeader.php");?>
		
		<main>
			<a id="lien_retour" href="?action=list">Home</a>
			<section id="addBillet">
				<h1>New post</h1>
				<form method="post" action="?action=addPost">
						<div>
						<input type="text" name="title" placeholder="Title" required="required">
						</div>
						<div>
						<textarea name="content" placeholder="Post" required="required" rows="10"></textarea>
						</div>
					<input type="submit" value="Validate" name="submit">
				</form>
			</section>
		</main>
	</div>
</body>
</html>