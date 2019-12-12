<header>
	<h1><a href="./">Blog.</a></h1>
	<div id="userSpace">
		<ul>
		<?php
			if($currentUserController->logged())
			{
				echo '<li class="first_link"><a href="#">'. /*$member["pseudo"]*/ ($currentUserController->loggedUser())->pseudo() .'</a></li>';
				echo '<li class="second_link"><a class="userSpaceLink" href="?action=addPost">Write Post</a></li>';
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