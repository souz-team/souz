<?php
	require '/config.php';
	//require '/func/db.php';
	$link = mysqli_connect($host, $login, $pswrd, $db_name) or die("Ошибка " . mysqli_error($link)); 
	$data = $_POST;
	$code = $_SESSION['code'];
	$email = $_SESSION['email'];
	$loginuser = $_SESSION['login'];
	$name = $_SESSION['name'];
	$surname = $_SESSION['surname'];
	$password = $_SESSION['password'];
	$date = date("Y-m-d");
	if(isset($data['enter_code']))
	{
		if($data['code'] != $code)
		{
			echo "Код не совпадает";
		}
		else 
		{
			$result = Add_User ($link, $loginuser, $name, $surname, $email, $password, $date); // Добавление юзера через пользовательскую функцию
			unset($_SESSION['code']);
			unset($_SESSION['email']);
			unset($_SESSION['login']);
			unset($_SESSION['name']);
			unset($_SESSION['surname']);
			unset($_SESSION['password']);
			if($result)
			{
				mysqli_close($link);
				header('Refresh: 2; URL=/index.php');
				echo '<div class="section-corfim__wrap"> Спасибо за регистрацию на нашем сайте!</div>';
				exit;
			}
		}
	}
?>
<?php require_once 'blocks/header.php'; ?>
<div class="section section sectin_1 section-content">
	<div class="section-confirm__wrap-main">
		<div class="section-confirm">
			<div class="section-corfim__wrap">
				<form action="/reg.php" class="section-confirm__form" method="POST">
					<p class="section-confirm__title-main">Подтверждение</p>
					<div class="section-confirm__content">
						<p class="section-confirm__title">Вам на почту отправлен код подтверждения авторизации.</p>
						<p class="section-confirm__label">Введите код</p>
						<div class="section-confirm__form-wrap">
							<input class="section-confirm__textfield" name="code" placeholder="Введите код" type="text"/>
							<button class="button section-confirm_button" type="submit"  name="enter_code" >Подтвердить</button>
							<br/><br/>
							<a href="../index.php">Вернуться на главную страницу</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php require_once 'blocks/footer.php'; ?>
