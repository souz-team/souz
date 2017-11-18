<?php
require 'config.php';

if (isset($_GET['del_id'])) { 
	$article_delete = $_GET['del_id'];}
	$podrazdelId = $_GET['podrazId'];
    $delArt = mysql_query("DELETE FROM Articles WHERE id = '$article_delete'");
	
	header("Location: http://souz/manage-articles.php?podrazId=$podrazdelId");
?>