<?php
	//set_include_path("/opt/lampp/htdocs/tests/blog");
	include_once("model/get_billets.php");
	$bPerPage = 2;
	
	$req = $bdd->query('SELECT COUNT(*) AS count FROM billets') or die(print_r($bdd->errorInfo()));
	$nbLines = $req->fetch();
	$nbLines = $nbLines["count"];

	$nbPages = ceil($nbLines / $bPerPage);

	$currentPage = 1;
	if(isset($_GET['page']) && is_numeric($_GET['page']))
	{
		if($_GET['page'] > 0 && $_GET['page'] <= $nbPages)
			$currentPage = $_GET['page'];
	}
	//$billets = get_billets($bPerPage*($currentPage-1), ($bPerPage)*($currentPage));
	$billets = get_billets(($currentPage - 1)*$bPerPage, $bPerPage);
	
	
	if(empty($billets))
		$currentPage = 1;
	foreach ($billets as $key => $billet) {
		$billets[$key]["title"] = htmlspecialchars($billet["title"]);
		$billets[$key]["content"] = nl2br(htmlspecialchars($billet["content"]));
	}
	include_once("view/index.php");
?>