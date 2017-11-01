<?php
	require '/config.php';

		
	$data = $_POST;
	$capcha = $_SESSION['rand_code'];
	$date = date("Y-m-d");
	
	if( isset($data['do_feedback']))
	{
	$errors=array();//массив сообшений ошибок
	
		if($data['name']=='') //проверка на пустое значение
		{
			$errors[] = 'Введите ваше имя';
		}
		
		if( trim($data['email'])=='')//проверка на пустое значение поля ввода email
		{
			$errors[] = 'Введите адрес электронной почты!';
		}
		
		if($data['subject']=='')//проверка на пустое значение поля ввода темы сообщения
		{
			$errors[] = 'Введите тему сообщения!';
		}
		
		if($data['topic']=='')//проверка на пустое значение поля ввода сообщения
		{
			$errors[] = 'Введите ваше сообщение!';
		}
		
		if( trim($data['capcha'])=='' OR trim($data['capcha'])!=$capcha )//проверка на капчу
		{
			$errors[] = 'Введенный вами текст с картинки не совпадает!';
		}
$all = array_shift($errors);
		$name = htmlentities(mysqli_real_escape_string($link, $data['name']), ENT_QUOTES, 'UTF-8');
		$email = htmlentities(mysqli_real_escape_string($link, $data['email']), ENT_QUOTES, 'UTF-8');
		$subject = htmlentities(mysqli_real_escape_string($link, $data['subject']), ENT_QUOTES, 'UTF-8');
		$topic = htmlentities(mysqli_real_escape_string($link, $data['topic']), ENT_QUOTES, 'UTF-8');
		
         
	if(empty($errors)){                                                                                  

			$result = Add_feedback ($link, $name, $email, $subject, $topic, $date); // Добавление юзера через пользовательскую функцию
			if($result)
			{
				mysqli_close($link);
				header('Refresh: 4; URL=/index.php');
				echo '<div style="color: red; text-align: center; vertical-align: middle;">Спасибо за обращение в нашу службу технической поддержки Мы обязательно свяжемся с вами в этом году!</div>';
				exit;
			}
		//подключения модуля отправки email с кодом подтверждения
		require '/mailto.php';
		//перенаправление на страницу проверки кода
		header('Location: reg.php');
    }
	else
		{
			echo '<div style="color: red; text-align: center;">'.array_shift($errors).'</div><hr>';
		}
	}	

?>		
	<?php require 'blocks/header.php';	?>

		<section class="section section_2">
			<div class="section__wrap">
				<div class="section-2">
					<div class="section-2__wrap">
						<p class="section-2__title">Если у Вас возникли проблемы, пожалуйста заполните форму обратной связи
						</p>
						<div class="section-2__form-auth">
							<form class="form-auth" action="feedback.php" method="POST">
								<label class="form-auth__textfield-wrap form-auth__textfield-wrap_with-label">
									<p class="form-auth__label">Ваше Имя
									</p><input class="form-auth__textfield form-auth__textfield_feedback" placeholder="Ваше Имя" name="name" type="text" value="<?php echo @$data["name"];?>"/>
								</label>
								<label class="form-auth__textfield-wrap form-auth__textfield-wrap_with-label">
									<p class="form-auth__label">Ваш Email
									</p><input class="form-auth__textfield form-auth__textfield_feedback" placeholder="Ваш Email" name="email" type="text" value="<?php echo @$data["email"];?>"/>
								</label>
								<label class="form-auth__textfield-wrap form-auth__textfield-wrap_with-label">
									<p class="form-auth__label">Название темы
									</p><input class="form-auth__textfield form-auth__textfield_feedback" placeholder="Название темы" type="text" name="subject" value="<?php echo @$data["subject"];?>"/>
								</label>
								<label class="form-auth__textfield-wrap form-auth__textfield-wrap_with-label">
									<p class="form-auth__label">Ваше сообщение
									</p><textarea class="form-auth__textfield form-auth__textfield_textarea" placeholder="Ваше сообщение..." name="topic" value="<?php echo @$data["topic"];?>"></textarea>
								</label>
								
								<div class="form-auth__buttons">
									<a href="/feedback.php"> <img src = "/capcha/captcha.php"></a>
								<input style="width: 200px; height: 25px;" type = "text"  name = "capcha" placeholder = "Введите текст с картинки"/>
								<button class="button button_form-auth" onclick="show_prompt()" name="do_feedback">Отправить
									</button>


								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php require_once 'blocks/footer.php'; ?>
