<?php
	require '/config.php';
	//require '/func/db.php';
	$form=$_SESSION['form'];
	$link = mysqli_connect($host, $login, $pswrd, $db_name) or die("Ошибка " . mysqli_error($link)); 
	$data = $_POST;
	//Проверка наличия пароля в базе и отправка на email кода
	if(isset($data['enter_data'])){
		$errors=array();//массив сообшений ошибок
		if( trim($data['ver_data'])=='') //проверка на пустое значение поля ввода
		{
			$errors[] = 'Введите логин или email';
		}
		$ver_data = htmlentities(mysqli_real_escape_string($link, $data['ver_data']), ENT_QUOTES, 'UTF-8');
		//$check_data=mysqli_query($link, "SELECT * FROM Users WHERE login='$enter_data' OR email='$enter_data'")or die("Ошибка " . mysqli_error($link));
		//$results=mysqli_num_rows($check_data);
		$row = User_Exist ($link, $ver_data);
		
		//if($results==0){
		if(!$row){
			$errors[] = 'Логин или Email не найдены!';
		}
		if(empty($errors)){
		$_SESSION['email']=$row['email'];
		$_SESSION['fio']=$row['Name']." ".$row['Surname'];
		require '/mailto.php';
		$form=2;
		}
		else
		{
			$form=1;
			//вывод на экран сообщения об ошибке
			echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
		}
	}
	//Проверка кода
	if(isset($data['enter_code'])){
		$code = $_SESSION['code'];
		if($data['ver_code'] != $code)
		{
			echo '<div style="color: red;">Код не совпадает!</div><hr>';
			$form=2;
		}
		else
		{
			$form=3;
		}
	}
	//Ввод нового пароля
	if( isset($data['enter_password'])){
		
		$email=$_SESSION['email'];
		$errors=array();//массив сообщений ошибок
		
		if( $data['ver_password']=='')//проверка на пустое значение поля ввода пароля
		{
			$errors[] = 'Введите пароль!';
		}
		
		if( $data['ver_password_2']!=$data['ver_password'])//проверка на совпадение с ранее введенным паролем
		{
			$errors[] = 'Пароль не совпадает!';
		}
			//шифрование пароля
		if(empty($errors)){    
		$password = md5($data['ver_password']);
		//обновление пароля в таблице Users
			//$update_password=mysqli_query($link, "UPDATE Users SET pass='$password' WHERE email='$email'")or die("Ошибка " . mysqli_error($link));
            $update_password = Update_Passwort ($link, $password, $email);
			if ($update_password)
			{
				unset($_SESSION['form']);
				unset($_SESSION['email']);
				mysqli_close($link);
				header('Refresh: 3; URL=/index.php');
				echo '<div class="section-corfim__wrap">Ваш пароль изменен.</div>';
				exit;
			}
			else
			{
			echo "Данные не обновлены!";
			}
		}
		else
		{
			echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
		}
	}
?>
<?php require_once 'blocks/header.php'; ?>
<div class="section section sectin_1">
	<div class="section-confirm__wrap-main">
		<div class="section-confirm">
			<div class="section-corfim__wrap">
				<?php
				
				if($form==1){
				//форма ввода логина или email
				echo'<form action="/remember.php" class="section-confirm__form" method="POST">
					<p class="section-confirm__title-main">Восстановление пароля</p>
					<div class="section-confirm__content">
						<p class="section-confirm__title">Введите логин или e-mail, указанные при регистрации:</p>
						
						<div class="section-confirm__form-wrap">
							<input class="section-confirm__textfield" name="ver_data" placeholder="Введите логин или email" type="text"/>
							<button class="button section-confirm_button" type="submit"  name="enter_data" >Отправить</button>
							<!--<p class="section-confirm__label">Введите код</p>-->
							<br/><br/>
							<a href="../index.php">Вернуться на главную страницу</a>
						</div>
					</div>
				</form>';
				}
				if($form==2){
					//форма ввода кода подтверждения
				echo'<form action="/remember.php" class="section-confirm__form" method="POST">
					<p class="section-confirm__title-main">Восстановление пароля</p>
					<div class="section-confirm__content">
						<p class="section-confirm__title">На ваш email отправлен проверочный код.<br/> Введите его:</p>
						
						<div class="section-confirm__form-wrap">
							<input class="section-confirm__textfield" name="ver_code" placeholder="Введите код" type="text"/>
							<button class="button section-confirm_button" type="submit" name="enter_code" >Ввести</button>
							<!--<p class="section-confirm__label">Введите код</p>-->
							<br/><br/>
							<a href="../index.php">Вернуться на главную страницу</a>
						</div>
					</div>
				</form>';
				}
				if($form==3){
				//форма ввода нового пароля
				echo'<form action="/remember.php" class="section-confirm__form" method="POST">
					<p class="section-confirm__title-main">Восстановление пароля</p>
					<div class="section-confirm__content">
						<p class="section-confirm__title">Введите ваш новый пароль:</p>
							<div class="section-confirm__form-wrap">
							<p><input class="section-confirm__textfield" name="ver_password" placeholder="Введите пароль" type="password"/></p><br/>
							<input class="section-confirm__textfield" name="ver_password_2" placeholder="Подтвердите пароль" type="password"/>
							<button class="button section-confirm_button" type="submit" name="enter_password" >Отправить</button>
							<!--<p class="section-confirm__label">Введите код</p>-->
							<br/><br/>
							<a href="../index.php">Вернуться на главную страницу</a>
						</div>
					</div>
				</form>';
				}
				
				?>
			</div>
		</div>
	</div>
</div>
<?php require_once 'blocks/footer.php'; ?>
