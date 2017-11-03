<?php
	$auth_login = $_SESSION['login'];
	
	$reg_info = Login_Exist($link, $auth_login);
	
	$name = $reg_info['name'];
	$surname = $reg_info['surname'];
	$email = $reg_info['email'];
	//$password = $reg_info['pass'];
	
?>