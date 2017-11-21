<?php

	require './config.php';

	$data=$_POST;
	$capcha = $_SESSION['rand_code'];
	$date = date("Y-m-d");

	$doFeedback = filter_input(INPUT_POST, 'do_feedback');
	
	if(isset($doFeedback)) {

		//массив сообшений ошибок
		$errors = array();

		$name = trim(filter_input(INPUT_POST, 'name'));
		$email = trim(filter_input(INPUT_POST, 'email'));
		$subject = trim(filter_input(INPUT_POST, 'subject'));
		$topic = trim(filter_input(INPUT_POST, 'topic'));
		$capcha = trim(filter_input(INPUT_POST, 'capcha'));
	
		//проверка на пустое значение
		if(empty($name)) {
			$errors[] = 'Введите ваше имя';
		}
		
		//проверка на пустое значение поля ввода email
		if(empty($email)) {
			$errors[] = 'Введите адрес электронной почты!';
		}
		
		//проверка на пустое значение поля ввода темы сообщения
		if(empty($subject)) {
			$errors[] = 'Введите тему сообщения!';
		}
		
		//проверка на пустое значение поля ввода сообщения
		if(empty($topic)) {
			$errors[] = 'Введите ваше сообщение!';
		}
		
		if(isset($data['send_email'])){
			if($data['send_email']==1){
				$send_email = 1;
			}
		}
		//проверка на капчу
		if(empty($capcha) OR $capcha != $capcha) {
			$errors[] = 'Введенный вами текст с картинки не совпадает!';
		}

		$all = array_shift($errors);
		//$name = htmlentities(mysql_real_escape_string($name), ENT_QUOTES, 'UTF-8');
		//$email = htmlentities(mysql_real_escape_string($email), ENT_QUOTES, 'UTF-8');
		//$subject = htmlentities(mysql_real_escape_string($subject), ENT_QUOTES, 'UTF-8');
		//$topic = htmlentities(mysql_real_escape_string($topic), ENT_QUOTES, 'UTF-8');

		if(empty($errors)) {

			// Добавление юзера через пользовательскую функцию
			$topic = $topic." <br> Email: ".$email;
			$result = Add_feedback($link, $name, $email, $subject, $topic, $date);

			if($result[0]==TRUE) {
				mysqli_close($link);
				//header('Refresh: 4; URL=/index.php');
				//include './blocks/success-feedback.php';
				require '/feedbackreply.php';
				exit;
			}

		} 
		
	}

?>

	<?php require 'blocks/header.php'; ?>

		<section class="section section_2 section_content">
			<div class="section__wrap">
				<div class="section-2">
					<div class="section-2__wrap">
						<p class="section-2__title">Если у Вас возникли проблемы, пожалуйста заполните форму обратной связи
						</p> 
						
						<?php if(!empty($errors)) { ?>
						<div style="color: red; text-align:center;"><?=$all?></div>
						<?php } ?>
						<div class="section-2__form-auth">

							<form action="feedback.php" method="POST" class="table-input-info">
							<p style = "font-size: 8pt">Все поля, отмеченные звездочкой, являются обязательными</p>
								<div class="table-input-info__row">
									<label class='table-input-info__label'>
										<div class="table-input-info__wrap-text">
											<span class="table-input-info__text">Имя *</span>
										</div>
										<div class="table-input-info__wrap-textfield">
											<input type="text" class="table-input-info__textfield" name="name" value="<?= @$data["name"] ?>">
										</div>
									</label>
								</div>

								<div class="table-input-info__row">
									<label class='table-input-info__label'>
										<div class="table-input-info__wrap-text">
											<span class="table-input-info__text">Email *</span>
										</div>
										<div class="table-input-info__wrap-textfield">
											<input type="text" class="table-input-info__textfield" name="email" placeholder = "abc@domain.com" pattern = "^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" value="<?= @$data["email"] ?>">
										</div>
									</label>
								</div>

								<div class="table-input-info__row">
									<label class='table-input-info__label'>
										<div class="table-input-info__wrap-text">
											<span class="table-input-info__text">Тема *</span>
										</div>
										<div class="table-input-info__wrap-textfield">
											<input type="text" class="table-input-info__textfield" name="subject" value="<?= @$data["subject"] ?>">
										</div>
									</label>
								</div>

								<div class="table-input-info__row">
									<label class='table-input-info__label'>
										<div class="table-input-info__wrap-text table-input-info__wrap-text_top">
											<span class="table-input-info__text">Сообщение *</span>
										</div>
										<div class="table-input-info__wrap-textfield">
											<textarea class="table-input-info__textfield table-input-info__textfield_textarea" name="topic"><?= @$data["topic"] ?></textarea>
										</div>
									</label>
								</div>

								<div class="table-input-info__row">
									<label class='table-input-info__label'>
										<div class="table-input-info__wrap-text table-input-info__wrap-text_top">
											<span class="table-input-info__text">Отправить копию этого сообщения на ваш адрес</span>
										</div>
										<div class="table-input-info__wrap-textfield">
										<input type="checkbox" name = "send_email" value = "1">
										</div>
									</label>
								</div>
								
								
								<div class="form-auth__buttons">
									<a href="/feedback.php"><img src="/capcha/captcha.php"></a>
									<input style="width: 200px; height: 25px;" type="text" name="capcha" placeholder="Введите текст с картинки"/> 
									<button class="button button_form-auth" name="do_feedback">Отправить</button>
								</div>

							</form>

						</div>
					</div>
				</div>
			</div>
		</section>
<?php require_once 'blocks/footer.php'; ?>
