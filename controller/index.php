<?php
	//set_include_path("/opt/lampp/htdocs/tests/blog");
	include_once("model/get_billets.php");
	$bPerPage = 4;
	$currentPage = 1;
	$req = $bdd->query('SELECT COUNT(*) AS count FROM billets') or die(print_r($bdd->errorInfo()));
	$nbLines = $req->fetch();
	if(isset($_GET['page']) && is_numeric($_GET['page']))
	{
		$currentPage = $_GET['page'];
	}
	$billets = get_billets($bPerPage*($currentPage-1), ($bPerPage)*($currentPage));
	foreach ($billets as $key => $billet) {
		$billets[$key]["title"] = htmlspecialchars($billet["title"]);
		$billets[$key]["content"] = nl2br(htmlspecialchars($billet["content"]));
	}
	include_once("view/index.php");
?>