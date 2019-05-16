<?php
	if(isset($_GET["postId"]) && isset($_GET["userId"]) && isset($_GET["dir"]))
	{
		require_once "../model/connect_mysql.php";
		require_once "../model/get_members.php";

		//INSERT INTO `votes`(`id_billet`, `id_member`, `vote`) SELECT 2,6,1 WHERE EXISTS( SELECT id FROM `billets` WHERE `id`=2) AND EXISTS(SELECT id FROM `members` WHERE `id`=6) AND NOT EXISTS(SELECT 1 FROM `votes` WHERE `id_billet`=2 AND `id_member`=6 AND `vote`=1) 
	}
?>