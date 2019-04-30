<!DOCTYPE html>
<html>
<head>
	<title>Registation</title>
	<link rel="stylesheet" type="text/css" href="style_members_signing.css">
</head>
<body>
	<div id="container">
		<div id="content">
			<section id="mainContent">
				<h1>Register</h1>
				<form method="post" action="../controller/registration.php">
					<input type="text" name="pseudo" placeholder="Pseudo"><br/>
					<input type="password" name="pass" placeholder="Password"><br/>
					<input type="password" name="passConfirm" placeholder="Confirm password"><br/>
					<input type="email" name="mail" placeholder="email"><br/>
					<input type="submit" name="" value="Register"><br/>
				</form>
			</section>
			<aside>
				<h2>Already have an account?</h2>
				<a href="../controller/connection.php">Login</a>
			</aside>
		</div>
	</div>
</body>
</html>