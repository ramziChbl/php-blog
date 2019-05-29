<!DOCTYPE html>
<html>
<head>
	<title>Add Post</title>
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
		<a id="lien_retour" href="?action=list">Home</a>
		<main>
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