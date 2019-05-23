<!DOCTYPE html>
<html>
<head>
	<title>Connection</title>
	<link rel="stylesheet" type="text/css" href="view/style_members_signing.css">
</head>
<body>
	<div id="container">
		<div id="content">
			
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
				<a href="?action=register">Registration</a>
			</aside>
		</div>
	</div>
</body>
</html>