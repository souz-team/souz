<?php

	$auth_login = $_SESSION['login'];
	$auth_email = $_SESSION['email'];	
	$date = date("Y-m-d");
	$subject = htmlentities(mysql_real_escape_string($data['subject']), ENT_QUOTES, 'UTF-8');
	$topic = htmlentities(mysql_real_escape_string($data['topic']), ENT_QUOTES, 'UTF-8');
	$id_section = htmlentities(mysql_real_escape_string($data['id_section']), ENT_QUOTES, 'UTF-8');
	$errors=array();
		
		if(empty($data['subject']))//проверка на пустое значение
		{
			$errors[] = "Введите название темы!"; 
		}
		
		if(empty($data['topic']))//проверка на пустое значение
		{
			$errors[] = "Текст сообщения не может быть пустым!"; 
		}
		
		if(empty($errors)){
			
			$query = "INSERT INTO `boardt`(`theme_id`, `id_section`, `topic`, `author`, `subject`, `create_date`, `email`) VALUES (NULL, '$id_section' ,'$topic','$auth_login','$subject','$date', '$auth_email')";
			//$query ="INSERT INTO boardt SET subject = '$subject', topic = '$topic', author = '$login', create_date = '$date'";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

			if($result)
			{
				mysqli_close($link);
				$errors[] = 'Тема добавлена!';
				//header('Refresh: 0; URL=/forum-topic.php?id='.$id_section.''); //задержка 2 секунды перед перенаправлением на главную страницу
				//echo '<div class="section-corfim__wrap">Информация добавлена в БД</div>';
				//exit;
			}
			else {
				$errors[] = 'Тема не добавлена!';
			}
		}
		

?>