<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Manager</title>
</head>
<body>
	<?php
		try {
			$bdd = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "ramzi", "pourquoi99", array(PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION));
		} catch (Exception $e) {
			die('Dumb error : ' . $e->getMessage());
		}
	?>
	<div id="container">
		<section id="manageBillet">
			<div id="listBillet">
				<table>
				<?php
					$req = $bdd->query("SELECT * FROM billets ORDER BY dateCreation DESC") or die(print_r($bdd->errorInfo()));
					echo '<tr><th>Title</th><th>Author</th><th>Date</th><th>Upvotes</th></tr>';
					while ($data = $req->fetch())
					{
						echo '<tr>
							<td>'.$data["title"].'</td>
							<td>'.$data["author"].'</td>
							<td>'.$data["dateCreation"].'</td>
							
							<td><a href="delete_post.php?id_post='.$data['id'].'">Delete</a></td>
							<td><a href="manager.php?id_edit_post='.$data['id'].'">Edit</a></td>
						</tr>
						';
					}
				?>
				</table>
			</div>
			<?php
				$title = '';
				$author = '';
				$content = '';

				if(isset($_GET['id_edit_post']))
				{
					$req = $bdd->query('SELECT * FROM billets WHERE id='.$_GET['id_edit_post']) or die(print_r($bdd->errorInfo()));

					if(!empty($req))
					{
						$ligne = $req->fetch();
						$title = $ligne["title"];
						$author = $ligne["author"];
						$content = $ligne["content"];
						echo '<div id="editBillet">
							<h1>Edit post</h1>
							<form method="post" action="edit_post.php?id_update_post='.$_GET['id_edit_post'].'">
							
							<table>';
						echo '<tr><td><input type="text" name="author" placeholder="Author" value="'.$author.'"></td></tr>';
						echo '<tr><td><input type="text" name="title" placeholder="Title" value="'.$title.'"></td></tr>';
						echo '<tr><td><textarea name="content" placeholder="Post">'.$content.'</textarea></td></tr>';
						echo '<input type="submit" value="Validate" name="">
						</table></form></div>';
					}

				}
			
				
			?>
		</section>

		<section id="addBillet">
			<form method="post" action="manager_post.php">
				<table>
					<h1>New post</h1>								
					<tr><td><input type="text" name="author" placeholder="Author"></td></tr>
					<tr><td><input type="text" name="title" placeholder="Title"></td></tr>
					<tr><td><textarea name="content" placeholder="Post"></textarea></td></tr>		
				</table>
				<input type="submit" value="Validate" name="">
			</form>
		</section>
	</div>
</body>
</html>