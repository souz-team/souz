<?php
require '/config.php';
//require '/func/db.php';

$data = $_POST;
$doSingup = trim(filter_input(INPUT_POST, 'do_singup'));
$err=0;
if( isset($doSingup))
	{
		$errors=array();//массив сообшений ошибок
	
		$loginuser = trim(filter_input(INPUT_POST, 'login'));
		$name = trim(filter_input(INPUT_POST, 'name'));
		$surname = trim(filter_input(INPUT_POST, 'surname'));
		$gender = trim(filter_input(INPUT_POST, 'gender'));
		$email = trim(filter_input(INPUT_POST, 'email'));
		$password = trim(filter_input(INPUT_POST, 'password'));
		$password_2 = trim(filter_input(INPUT_POST, 'password_2'));
		if(empty($loginuser)) //проверка на пустое значение поля ввода логина
		{
			$errors[] = 'Введите логин!';
		}
		if(mb_strlen($loginuser)>15 or mb_strlen($loginuser)<3) //проверка на пустое значение поля ввода логина
		{
			$errors[] = 'Логин должен содержать не менее 3 и не более 15 символов!';
		}
		
		if(empty($name))//проверка на пустое значение поля ввода имени
		{
			$errors[] = 'Введите имя!';
		}
		if( mb_strlen($name)>15 or mb_strlen($name)<3) //проверка на пустое значение поля ввода логина
		{
			$errors[] = 'Имя должно содержать не менее 3 и не более 15 символов!';
		}
		
		if(empty($surname))//проверка на пустое значение поля ввода gender
		{
			$errors[] = 'Введите фамилию!';
		}
		if( mb_strlen($surname)>15 or mb_strlen($surname)<2) //проверка на пустое значение поля ввода логина
		{
			$errors[] = 'Фамилия должна содержать не менее 2 и не более 15 символов!';
		}
		
		
		if( empty($gender))//проверка на пустое значение поля ввода gender
		{
			$errors[] = 'Выберите пол!';
		}
		if( empty($email))//проверка на пустое значение поля ввода email
		{
			$errors[] = 'Введите email!';
		}
		if( mb_strlen($email)>20 or mb_strlen($email)<5) //проверка на пустое значение поля ввода логина
		{
			$errors[] = 'Адрес почты должен содержать не менее 5 и не более 20 символов!';
		}		
		
		if( empty($password))//проверка на пустое значение поля ввода пароля
		{
			$errors[] = 'Введите пароль!';
		}
		if( strlen($password)>30 or strlen($password)<6) //проверка на пустое значение поля ввода логина
		{
			$errors[] = 'Пароль должен содержать не менее 6 и не более 30 символов!';
		}
		
		if( $password_2 != $password)//проверка на совпадение с ранее введенным паролем
		{
			$errors[] = 'Пароль не совпадает!';
		}
		
		//$link = mysqli_connect($host, $login, $pswrd, $db_name) or die("Ошибка " . mysqli_error($link)); 
		//$loginuser = htmlentities(mysqli_real_escape_string($link, $data['login']), ENT_QUOTES, 'UTF-8');
		//$name = htmlentities(mysqli_real_escape_string($link, $data['name']), ENT_QUOTES, 'UTF-8');
		//$surname = htmlentities(mysqli_real_escape_string($link, $data['surname']), ENT_QUOTES, 'UTF-8');
		//$gender = htmlentities(mysqli_real_escape_string($link, $data['gender']), ENT_QUOTES, 'UTF-8');
		//$email = htmlentities(mysqli_real_escape_string($link, $data['email']), ENT_QUOTES, 'UTF-8');
		$password = md5($password);
         
        $is_login = Login_Exist($link, $loginuser); // Проверка логина и пароля через пользовательскую функцию
        if ($is_login == true)                      // Если строка с логином найдена, возвращается 1 и выдаётся ошибка
                $errors[] = 'Такой логин уже существует!';
        else
             $is_email = Email_Exist($link, $email);

        if ($is_email == true)
                $errors[] = 'Такой email уже существует!';  
	if(empty($errors)){                                                                                  
		//"закидывание" данных в файл сессии
		$_SESSION['email']=$email;
		$_SESSION['fio']=$name." ".$surname;
		$_SESSION['login']=$loginuser;
		$_SESSION['name']=$name;
		$_SESSION['surname']=$surname;
		$_SESSION['gender']=$gender;
		$_SESSION['password']=$password;
		//подключения модуля отправки email с кодом подтверждения
		require '/mailto.php';
		//перенаправление на страницу проверки кода
		//header('Location: reg.php');
		require "/reg.php";
    }
	else
		{
			$err=1;
			//echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
		}
	}
?>
<?php require_once 'blocks/header.php'; ?>
	<section class="section section_1 section_content">
	<div class="section__wrap-signup">
		<div class="section-signup">
			<div class="section-signup__wrap">
				<div class="section-signup__main-title">
					
				</div>
				<p class="section-signup__main-title"><span class="section-signup__first-letter">С</span>ервис <span class="section-signup__first-letter">О</span>бработки <span class="section-signup__first-letter">Ю</span>зерских <span class="section-signup__first-letter">З</span>аявок</p>
				<p class="section-signup__title">Регистрация</p>
				<div class="section-signup__form">
				<?php if($err==1){?>
				<div style="color: red; text-align: center;"><?=array_shift($errors)?></div>
				<?php }?>
					<form class="form-signup" action="/singup.php" method="POST">
						<label class="form-signup__textfield-wrap form-signup__textfield-wrap_with-label">
							<p class="form-signup__label">Логин
							</p><input class="form-auth__textfield form-signup__textfield_signup" name="login" placeholder="Логин" type="text" value="<?php echo @$data['login'];?>"/>
						</label>
						<label class="form-signup__textfield-wrap form-signup__textfield-wrap_with-label">
							<p class="form-signup__label">Имя
							</p><input class="form-auth__textfield form-signup__textfield_signup" name="name" placeholder="Имя" type="text" value="<?php echo @$data['name'];?>"/>
						</label>
						<label class="form-signup__textfield-wrap form-signup__textfield-wrap_with-label">
							<p class="form-signup__label">Фамилия
							</p><input class="form-auth__textfield form-signup__textfield_signup" name="surname" placeholder="Фамилия" type="text" value="<?php echo @$data['surname'];?>"/>
						</label>
						<label class="form-signup__textfield-wrap form-signup__textfield-wrap_with-label">
							<p class="form-signup__label">Пол:</p>
							<select class="form-auth__textfield form-signup__textfield_signup" name = "gender" size="1" required>
								<option disabled selected>Пол:</option>
								<option value="1">мужской</option>
								<option value="0">женский</option>
							</select>
							<!--</p><input class="form-auth__textfield form-signup__textfield_signup" name="email" placeholder="Email" type="text" value="<?php echo @$data['email'];?>"/> -->
						</label>
						<label class="form-signup__textfield-wrap form-signup__textfield-wrap_with-label">
							<p class="form-signup__label">Email
							</p><input class="form-auth__textfield form-signup__textfield_signup" name="email" placeholder="abc@domain.com" type="text" pattern = "^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" value="<?php echo @$data['email'];?>"/>
						</label>
						<label class="form-signup__textfield-wrap form-signup__textfield-wrap_with-label">
							<p class="form-signup__label">Пароль
							</p><input class="form-auth__textfield form-signup__textfield_signup" name="password" placeholder="Пароль" type="password"/>
						</label>
						<label class="form-signup__textfield-wrap form-signup__textfield-wrap_with-label">
							<p class="form-signup__label">Подтвердите пароль
							</p><input class="form-auth__textfield form-signup__textfield_signup" name="password_2" placeholder="Подтвердите пароль" type="password"/>
						</label>
						<div class="form-signup__buttons">
							<button class="button button_form-signup" name="do_singup">Зарегистрироваться
							</button>
							<a href="/" class="form-signup__buttons-signup">На главную</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>	
<?php require_once 'blocks/footer.php'; ?>	
