<?php
	$auth_login = $_SESSION['login'];
	$reg_info = Login_Exist($link, $auth_login);
	$errors=array();//массив сообшений ошибок
	if(empty($data['username'])) //проверка на пустое значение поля ввода логина
	{
		$errors[] = 'Введите имя!';
	}
	
	if(empty($data['usersurname']))//проверка на пустое значение поля ввода имени
	{
		$errors[] = 'Введите фамилию!';
	}
	
	if(empty($data['useremail']))//проверка на пустое значение поля ввода email
	{
	$errors[] = 'Введите email!';
	}
	if(empty($data['userpasswordold']) AND ((!empty($data['userpasswordnew'])) OR (!empty($data['userpasswordnew2']))))
	{
		$errors[] = 'Введите текущий пароль!';
	}
	
	if(!empty($data['userpasswordold']) AND (empty($data['userpasswordnew'])))
	{
		$errors[] = 'Введите новый пароль!';
	}
	
	if( $data['userpasswordnew2']!=$data['userpasswordnew'])//проверка на совпадение с ранее введенным паролем
	{
		$errors[] = 'Пароли не совпадают!';
	}
	
	if(empty($data['userpasswordold']) AND (empty($data['userpasswordnew'])) AND (empty($data['userpasswordnew2'])))
	{
		$no_change_pass = 1;
	}
	
	$username = htmlentities(mysqli_real_escape_string($link, $data['username']), ENT_QUOTES, 'UTF-8');
	$usersurname = htmlentities(mysqli_real_escape_string($link, $data['usersurname']), ENT_QUOTES, 'UTF-8');
	$useremail = htmlentities(mysqli_real_escape_string($link, $data['useremail']), ENT_QUOTES, 'UTF-8');
	$userpasswordnew = htmlentities(mysqli_real_escape_string($link, $data['userpasswordnew']), ENT_QUOTES, 'UTF-8');
	$userpasswordold =  htmlentities(mysqli_real_escape_string($link, $data['userpasswordold']), ENT_QUOTES, 'UTF-8');
	$userpasswordold = md5($userpasswordold);
	$userpasswordnew = md5($userpasswordnew);
	if($no_change_pass!=1 AND (empty($errors)))
	{
		if($userpasswordold != $reg_info['pass']){
			$errors[] = 'Текущий пароль введен неверно!';
		}
	}
	if($username==$reg_info['name'] AND $usersurname = $reg_info['surname'] AND  $useremail = $reg_info['email'] AND $no_change_pass==1){
		$errors[] = 'Ваши данные не изменились!';
	}
		
	if($no_change_pass==1 AND (empty($errors)))
	{
		$userpasswordnew = $reg_info['pass'];
	}

	if(empty($errors)){
		$user_update = update_user($link, $auth_login, $userpasswordnew, $useremail, $username, $usersurname, $reg_info['level_id']);
		if ($user_update)
			{
				$errors[] = 'Данные обновлены! <br/>Для корректного отображения перезайдите на сайт';
			}
			else
			{
				$errors[] = 'Данные не обновлены!';
			}

	}
?>