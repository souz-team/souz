<?php
	$wwwlink=$_SERVER['HTTP_REFERER'];
	require '/config.php';
	unset($_SESSION['auch']);
	unset($_SESSION['count']);
	unset($_SESSION['fio']);
	unset($_SESSION['userlevel']);
	unset($_SESSION['login']);
	unset($_SESSION['email']);
	header('location:'.$wwwlink.'');
?>