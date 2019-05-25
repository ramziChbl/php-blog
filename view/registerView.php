<!DOCTYPE html>
<html>
<head>
	<title>Registation</title>
	<link rel="stylesheet" type="text/css" href="public/style_members_signing.css">
</head>
<body>
	<div id="container">
		<a id="lien_retour" href="?action=list">Home</a>
		<div id="content">
			<section id="mainContent">
				<h1>Register</h1>
				<form method="post" action="?action=register">
					<input type="text" name="pseudo" placeholder="Pseudo"><br/>
					<input type="password" name="pass" placeholder="Password"><br/>
					<input type="password" name="passConfirm" placeholder="Confirm password"><br/>
					<input type="email" name="mail" placeholder="email"><br/>
					<input type="submit" name="submit" value="Register"><br/>
				</form>
			</section>
			<aside>
				<h2>Already have an account?</h2>
				<a href="?action=login">Login</a>
			</aside>
		</div>
	</div>
</body>
</html>