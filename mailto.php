<?php
	session_start();
	for ($i = 0; $i < 4; $i++) // Здесь задается количество символов
		$string .= rand(0, 9); //случайное число
	$email=$_SESSION['email'];
	$name=$_SESSION['fio'];
	$_SESSION['code']=$string;
	$message="Your code: ".$string;
	$message_2="Добро пожаловать на наш сайт, ".$name."!";
	$message_3="From: 15istv1@mail.ru \r\n";
	//отправка сообщения на почту
	mail($email, 'SOUZ', $message, $message_2, $message_3);
?>