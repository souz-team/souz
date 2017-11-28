<?php
	require_once '../config.php'; 
	$data = $_POST;
	$auth_login = $_SESSION['login'];
	$auth_email = $_SESSION['email'];
	$auth_fio = $_SESSION['fio'];
	$date = date("Y-m-d H:i:s");
	$id_topic = $data['id_topic'];
	$page = $data['page']+1;

	$comment = htmlentities(mysqli_real_escape_string($link, $data['comment']), ENT_QUOTES, 'UTF-8');

		if( isset($data['write']))
		{
			$errors=array();//массив сообшений ошибок
			if(empty($data['comment'])) //проверка на пустое значение поля ввода логина
			{
				$errors[] = 'Сообщение не должно быть пустым!';
			}
			
			if(empty($errors)){
				$query = "INSERT INTO `boardp`(`post_id`, `theme_id`, `login`, `comment`, `email`, `m_date`) VALUES (NULL, '$id_topic' ,'$auth_login','$comment','$auth_email','$date')";
				//$query ="INSERT INTO boardt SET subject = '$subject', topic = '$topic', author = '$login', create_date = '$date'";
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

				if($result)
				{
					mysqli_close($link);
					header('Refresh: 0; URL=/topic-view.php?id='.$id_topic.'&page='.$page.''); //задержка 2 секунды перед перенаправлением на главную страницу
					//echo '<div class="section-corfim__wrap">Информация добавлена в БД</div>';
					
					exit;
				}
			}
				else
			{
				header('Refresh: 2; URL=/topic-view.php?id='.$id_topic.'&page='.$page.''); //задержка 2 секунды перед перенаправлением на главную страницу
				//echo '<div class="section-corfim__wrap">Информация добавлена в БД</div>';
				echo '<div style="color: red; font-size: 70px; text-align: center;">'.array_shift($errors).'</div><hr>';
			} 
			
		}
?>