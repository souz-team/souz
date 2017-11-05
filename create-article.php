<?php
	require 'config.php';
	
	$authorName = $_SESSION['fio'];
	$idPodRazdel = $_POST['id_Podrazdel'];
	$artName = $_POST['articleName'];
	$artText = $_POST['articleText'];
	$strSQL = "INSERT INTO `Articles` (`id_Podrazdel`, `Name`, `Author`, `Text`, `Date`) VALUES( $idPodRazdel, '$artName', '$authorName', '$artText', Now() )";

	mysql_query($strSQL) or die (mysql_error());

	header('Location: manage-articles.php');
?>