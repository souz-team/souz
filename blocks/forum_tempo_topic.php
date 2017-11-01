<?php
	require_once '../config.php';
			$id = $_GET['id'];
			
			if(!$id){
				echo "Privet!";
			}
			else{
				echo "Poka!";
			}
			
			$id=$new_id;

			$data = $_POST;
			$auth_login = $_SESSION['login'];
			$auth_email = $_SESSION['email'];
			//$fio = $_SESSION['fio'];
			$date = date("Y-m-d");
		$subject = htmlentities(mysqli_real_escape_string($link, $data['subject']), ENT_QUOTES, 'UTF-8');
		$topic = htmlentities(mysqli_real_escape_string($link, $data['topic']), ENT_QUOTES, 'UTF-8');
		echo $id;
	if(isset($data['new_topic']))
	{
		$errors=array();
		
		if($data['subject'] == '')//проверка на пустое значение
		{
			$errors[] = "Введите название темы!"; 
		}
		
		if($data['topic'] == '')//проверка на пустое значение
		{
			$errors[] = "Текст сообщения не может быть пустым!"; 
		}
		
		echo $id;
/* 		if(empty($errors)){
			echo $id;
			$query = "INSERT INTO `boardt`(`theme_id`, `id_section`, `topic`, `author`, `subject`, `create_date`, `email`) VALUES (NULL, '$id' ,'$topic','$auth_login','$subject','$date', '$auth_email')";
			//$query ="INSERT INTO boardt SET subject = '$subject', topic = '$topic', author = '$login', create_date = '$date'";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

			if($result)
			{
				mysqli_close($link);
				header('Refresh: 2; URL=/forum-topic.php?id='.$id); //задержка 2 секунды перед перенаправлением на главную страницу
				echo '<div class="section-corfim__wrap">Информация добавлена в БД</div>';
				exit;
			}
		}
			else
		{
			echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
		} */
		
		
		
	}

			
			
			/*
			
			$theme = mysqli_query($link, "SELECT * FROM boardt WHERE id_section='$id'");
			while ($row_t = mysqli_fetch_array ($theme)) {
			$theme_id = $row_t['theme_id'];	
			$date =  mysqli_query ($link, "SELECT MAX(m_date) FROM boardp WHERE theme_id='$theme_id'");
			$row_date = mysqli_fetch_array($date);
			$date_post = $row_date[0];
			*/


	echo '		
					<form action="../blocks/forum_topic_start.php" method="POST">
						<label>
							<p>Название темы</p>
							<input name="subject" placeholder="Название темы" type="text" />
						</label>
						<label>
							<p>Сообщение</p>
							<textarea name="topic" placeholder="Ваше сообщение" rows="10" cols="35"></textarea>
						</label>

						<div"><br/>
							<button name="new_topic">Добавить тему</button>
							
						</div>
					</form>';
/* 						<label class="form-signup__textfield-wrap form-signup__textfield-wrap_with-label">
							<p class="form-signup__label">Фамилия
							</p><input class="form-auth__textfield form-signup__textfield_signup" name="surname" placeholder="Фамилия" type="text" value="<?php echo @$data['surname'];?>"/>
						</label>
						<label class="form-signup__textfield-wrap form-signup__textfield-wrap_with-label">
							<p class="form-signup__label">Email
							</p><input class="form-auth__textfield form-signup__textfield_signup" name="email" placeholder="Email" type="text" value="<?php echo @$data['email'];?>"/>
						</label>
						<label class="form-signup__textfield-wrap form-signup__textfield-wrap_with-label">
							<p class="form-signup__label">Пароль
							</p><input class="form-auth__textfield form-signup__textfield_signup" name="password" placeholder="Пароль" type="password"/>
						</label>
						<label class="form-signup__textfield-wrap form-signup__textfield-wrap_with-label">
							<p class="form-signup__label">Подтвердите пароль
							</p><input class="form-auth__textfield form-signup__textfield_signup" name="password_2" placeholder="Подтвердите пароль" type="password"/>
						</label> */
?>

