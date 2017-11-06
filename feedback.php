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
		
		//проверка на капчу
		if(empty($capcha) OR $capcha != $capcha) {
			$errors[] = 'Введенный вами текст с картинки не совпадает!';
		}

		$all = array_shift($errors);
		$name = htmlentities(mysqli_real_escape_string($link, $name), ENT_QUOTES, 'UTF-8');
		$email = htmlentities(mysqli_real_escape_string($link, $email), ENT_QUOTES, 'UTF-8');
		$subject = htmlentities(mysqli_real_escape_string($link, $subject), ENT_QUOTES, 'UTF-8');
		$topic = htmlentities(mysqli_real_escape_string($link, $topic), ENT_QUOTES, 'UTF-8');

		if(empty($errors)) {

			// Добавление юзера через пользовательскую функцию
			$result = Add_feedback($link, $name, $email, $subject, $topic, $date);

			if($result) {
				mysqli_close($link);
				header('Refresh: 4; URL=/index.php');
				include './blocks/success-feedback.php';
				exit;
			}

		} 
		//else {
		//	echo '<div style="color: red; text-align: center;">'.array_shift($errors).'</div><hr>';
		//}

	}

?>

	<?php require 'blocks/header.php'; ?>

		<section class="section section_2">
			<div class="section__wrap">
				<div class="section-2">
					<div class="section-2__wrap">
						<p class="section-2__title">Если у Вас возникли проблемы, пожалуйста заполните форму обратной связи
						</p> <br>
						<?php if(!empty($errors)) { ?>
						<div style="color: red; text-align:center;"><?=$all?></div>
						<?php } ?>
						<div class="section-2__form-auth">

							<form action="feedback.php" method="POST" class="table-input-info">

								<div class="table-input-info__row">
									<label class='table-input-info__label'>
										<div class="table-input-info__wrap-text">
											<span class="table-input-info__text">Ваше Имя</span>
										</div>
										<div class="table-input-info__wrap-textfield">
											<input type="text" class="table-input-info__textfield" name="name" value="<?= @$data["name"] ?>">
										</div>
									</label>
								</div>

								<div class="table-input-info__row">
									<label class='table-input-info__label'>
										<div class="table-input-info__wrap-text">
											<span class="table-input-info__text">Ваш Email</span>
										</div>
										<div class="table-input-info__wrap-textfield">
											<input type="text" class="table-input-info__textfield" name="email" value="<?= @$data["email"] ?>">
										</div>
									</label>
								</div>

								<div class="table-input-info__row">
									<label class='table-input-info__label'>
										<div class="table-input-info__wrap-text">
											<span class="table-input-info__text">Название темы</span>
										</div>
										<div class="table-input-info__wrap-textfield">
											<input type="text" class="table-input-info__textfield" name="subject" value="<?= @$data["subject"] ?>">
										</div>
									</label>
								</div>

								<div class="table-input-info__row">
									<label class='table-input-info__label'>
										<div class="table-input-info__wrap-text table-input-info__wrap-text_top">
											<span class="table-input-info__text">Ваше сообщение</span>
										</div>
										<div class="table-input-info__wrap-textfield">
											<textarea class="table-input-info__textfield table-input-info__textfield_textarea" name="topic"><?= @$data["topic"] ?></textarea>
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
