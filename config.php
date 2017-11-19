<?php
session_start();

$host = "95.79.75.10:8888";
$db_name = "SOUZ";
$login = "admin";
$pswrd = "15istv1";
$connect = @mysql_connect ("$host", "$login", "$pswrd");		
//Если подключение не открылось на удалённый сервер, то используем локальный
if (!$connect) {
	$host = "127.0.0.1";
    $connect = @mysql_connect ("$host", "$login", "$pswrd");
	@mysql_set_charset("utf8");
}
if(!$connect) {
	header('Location: /errors/404.htm');
	
	
	//exit (mysql_error ());
}  
else {
	
    mysql_select_db ("$db_name", $connect);
	mysql_set_charset("utf8");
	global $connect; 
	mysql_query ("SET NAMES 'UTF-8'");
	$link = mysqli_connect($host, $login, $pswrd, $db_name) or die("Ошибка " . mysqli_error($link));
	include '/func/db.php';
	  
}
	

?>