<?php
	require_once '../config.php';

			$id = $_GET['id'];
			if(!$id){
				
				$id_section = $_SESSION['id'];
			}
			else{
			
			$_SESSION['id'] = $id;
				
			}
			$data = $_POST;
			$auth_login = $_SESSION['login'];
			$auth_email = $_SESSION['email'];
			//$fio = $_SESSION['fio'];
			$date = date("Y-m-d");
		$subject = htmlentities(mysqli_real_escape_string($link, $data['subject']), ENT_QUOTES, 'UTF-8');
		$topic = htmlentities(mysqli_real_escape_string($link, $data['topic']), ENT_QUOTES, 'UTF-8');

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
		
		if(empty($errors)){
			echo $id;
			$query = "INSERT INTO `boardt`(`theme_id`, `id_section`, `topic`, `author`, `subject`, `create_date`, `email`) VALUES (NULL, '$id_section' ,'$topic','$auth_login','$subject','$date', '$auth_email')";
			//$query ="INSERT INTO boardt SET subject = '$subject', topic = '$topic', author = '$login', create_date = '$date'";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

			if($result)
			{
				mysqli_close($link);
				header('Refresh: 0; URL=/forum-topic.php?id='.$id_section.''); //задержка 2 секунды перед перенаправлением на главную страницу
				//echo '<div class="section-corfim__wrap">Информация добавлена в БД</div>';
				exit;
			}
		}
			else
		{
			echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
		} 
	}

	// echo '		
	// 				<form action="../blocks/forum_topic_start.php" method="POST">
	// 					<label>
	// 						<p>Название темы</p>
	// 						<input name="subject" placeholder="Название темы" type="text" />
	// 					</label>
	// 					<label>
	// 						<p>Сообщение</p>
	// 						<textarea name="topic" placeholder="Ваше сообщение" rows="10" cols="35"></textarea>
	// 					</label>

	// 					<div"><br/>
	// 						<button name="new_topic">Добавить тему</button>
							
	// 					</div>
	// 				</form>';
?>
<?php require_once 'header.php';?>

<section class="section section_1">
	<div class="section__wrap">
		<div class="new-topic">
			<form action="../blocks/forum_topic_start.php" method="POST">
				<p class="new-material__title">Создние темы</p>
				<label>
					<p class="form-new-material__label">Название темы</p>
					<input class="form-new-material__label" name="subject" placeholder="Название темы" type="text" />
				</label>
				<label>
					<p class="form-new-material__label">Сообщение</p>
					<textarea  class="form-new-material__textarea" name="topic" placeholder="Ваше сообщение"></textarea>
				</label>

				<div"><br/>
					<button class="button button_article" name="new_topic">Добавить тему</button>
					
				</div>
			</form>
		</div>
	</div>
</div>
<?php require_once 'footer.php'; ?>
