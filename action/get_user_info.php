<?php
	$auth_login = $_SESSION['login'];
	$reg_info = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM Users WHERE login='$auth_login'"));
	$name = $reg_info['name'];
	$surname = $reg_info['surname'];
	$email = $reg_info['email'];
?>