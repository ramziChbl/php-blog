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
						echo '<li class="second_link"><a class="userSpaceLink" href="?action=logout">Deconnection</a></li>';
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

		<main>
			<section id="addBillet">
				<form method="post" action="?action=addPost">
					<table>
						<h1>New post</h1>								
						<!--<tr><td><input type="text" name="author" placeholder="Author" required="required"></td></tr>-->
						<tr><td><input type="text" name="title" placeholder="Title" required="required"></td></tr>
						<tr><td><textarea name="content" placeholder="Post" required="required"></textarea></td></tr>		
					</table>
					<input type="submit" value="Validate" name="submit">
				</form>
			</section>
		</main>
	</div>
</body>
</html>