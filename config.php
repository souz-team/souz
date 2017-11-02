<?php
session_start();

$host = "5.164.244.129:8888";
// $host = "localhost";
$db_name = "SOUZ";
$login = "admin";
$pswrd = "15istv1";
$connect = mysql_connect ("$host", "$login", "$pswrd");
mysql_set_charset("utf8");

if (!$connect) {
	
    echo "dont work";
    exit (mysql_error ()); 
}
else {
	
    mysql_select_db ("$db_name", $connect);
	  
}
   global $connect; 
mysql_query ("SET NAMES 'UTF-8'");
$link = mysqli_connect($host, $login, $pswrd, $db_name) or die("Ошибка " . mysqli_error($link));
include '/func/db.php';
?>