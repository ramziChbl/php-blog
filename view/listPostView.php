<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="public/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="text/javascript">

		function getXMLHttpRequest()
		{
			var xhr = null;
			
			if (window.XMLHttpRequest || window.ActiveXObject) {
				if (window.ActiveXObject) {
					try {
						xhr = new ActiveXObject("Msxml2.XMLHTTP");
					} catch(e) {
						xhr = new ActiveXObject("Microsoft.XMLHTTP");
					}
				} else {
					xhr = new XMLHttpRequest(); 
				}
			} else {
				alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
				return null;
			}
			return xhr;
		}

		function sendxhr(button, postId, userId,vote)
		{
			var xhr = getXMLHttpRequest();
			xhr.onreadystatechange = function()
			{
	        	if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
	                alert("Done"); // Données textuelles récupérées
	                changeColor(button, vote);
	            }
	        }
	        var dir = 1;
	        if(vote < 0)
	        {
	        	dir = -1;
	        }

			xhr.open("GET", "voteTarget.php?postId="+ postId +"&userId="+ userId +"&dir=" + vote, true);
			xhr.send();
			//if POST ====> xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		}

		function changeColor(button, vote)
		{
			//button.style.color = "white";

			if(vote > 0)
			{
				//button.style.background="green";
				//button.svg.path.setAttribute("fill", "#10EE10");
				//button.firstChild().firstChild().setAttribute("fill", "#10EE10");
				//button.childNodes[0].childNodes[0].setAttribute("fill", "#10EE10");
				alert(button.childNodes[0].childNodes[0]);
			}
			else
			{
				//button.style.background="red";
				//button.svg.path.setAttribute("fill", "#EE1010");
				//button.firstChild().firstChild().setAttribute("fill", "#EE1010");
				//button.childNodes[0].childNodes[0].setAttribute("fill", "#EE1010");
				alert(button);
			}

		}

		function vote(button, postId, userId,vote)
		{					
			sendxhr(button, postId, userId,vote);
		}
	</script>

</head>
<body>
	<div id="container">
		<?php include("view/pageHeader.php");?>

		<main id="content">
			<div id="imgContainer">
				<img src="public/image.jpg">
			</div>
		<?php
			$showCommentButton = true;
			foreach ($billets as $billet)
			{
				include("view/billet.php");
			}
		 ?>
		 </main>

		<nav id="pages_navigation">
			<ul>
			<?php
				$nbCases = 10;

				if($nbPages <= $nbCases) // Can show all pages in nav
				{
					for($i = 1; $i<$currentPage; $i++)
					{
						echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
					}

					echo '<li><a href="#" id="currentPage">'.$currentPage.'</a></li>';

					for ($i=$currentPage + 1; $i <= $nbPages; $i++)
					{ 
						echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
					}
					for ($i=$nbPages + 1; $i <= $nbCases; $i++)
					{ 
						echo "<li></li>";
					}
				}
				else
				{
					if($currentPage <= $nbCases-4) // current < 6 first pages => Show all first pages
					{
						for($i = 1; $i<$currentPage; $i++)
						{
							echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
						}
						echo '<li><a href="#" id="currentPage">'.$currentPage.'</a></li>';
						for ($i=$currentPage + 1; $i <= $nbCases - 2; $i++)
						{ 
							echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
						}
						echo '<li>...</li>';
						echo '<li><a href="?page='.$nbPages.'">'.$nbPages.'</a></li>';
					}
					elseif ($currentPage >= $nbPages - 6) //current >= 6 last pages
					{
						echo '<li><a href="?page=1">1</a></li>';
						echo "<li>...</li>";
				
						for($i=$nbPages - 7; $i <= $nbPages; $i++)
						{ 
							if($i == $currentPage)
								echo '<li><a href="#" id="currentPage">'.$currentPage.'</a></li>';
							else
								echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
						}
					}
					else // Page in the middle
					{
						echo '<li><a href="?page=1">1</a></li>';
						echo "<li>...</li>";
						for($i = 2; $i>0; $i--) // Show 2 pages before current
						{
							echo '<li><a href="?page='.($currentPage - $i).'">'.($currentPage - $i).'</a></li>';
						}
						echo '<li><a href="#" id="currentPage">'.$currentPage.'</a></li>';

						for ($i=$currentPage + 1; $i <= $nbCases - 2; $i++)
						{ 
							echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
						}
						echo '<li>...</li>';
						echo '<li><a href="?page='.$nbPages.'">'.$nbPages.'</a></li>';
					}
				}
			?>
			</ul>
		</nav>
	</div>
</body>
</html>