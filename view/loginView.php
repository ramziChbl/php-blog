<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="public/style.css">
	<link rel="stylesheet" type="text/css" href="public/style_members_signing.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div id="container">
		<?php include("view/pageHeader.php");?>
		<div id="underHeader"></div>
		<a id="lien_retour" href="?action=list">Home</a>
		<main id="Usercontent">	
			<section id="mainContent">
				<h1>Login</h1>
				<form method="post" action="?action=login">
					<input type="text" name="pseudo" placeholder="Pseudo"><br/>
					<input type="password" name="pass" placeholder="Password"><br/>
					<input type="checkbox" name="rememberMe" value="yes"><label for="rememberMe">Remember me</label><br/>
					<input type="submit" name="submit" value="Connect">
				</form>
			</section>
			<aside>
				<h2>New member?</h2>
				<a href="?action=register">Register</a>
			</aside>
		</main> 
	</div>
</body>
</html>