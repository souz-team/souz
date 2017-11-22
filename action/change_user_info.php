<?php
	$auth_login = $_SESSION['login'];
	$reg_info = Login_Exist($link, $auth_login);
	$errors=array();//массив сообшений ошибок
	$username = trim(filter_input(INPUT_POST, 'username'));
	$usersurname = trim(filter_input(INPUT_POST, 'usersurname'));
	$useremail = trim(filter_input(INPUT_POST, 'useremail'));
	$userpasswordold =  trim(filter_input(INPUT_POST, 'userpasswordold'));
	$userpasswordnew = trim(filter_input(INPUT_POST, 'userpasswordnew'));
	$userpasswordnew2 =  trim(filter_input(INPUT_POST, 'userpasswordnew2'));
	if(empty($username)) //проверка на пустое значение поля ввода логина
	{
		$errors[] = 'Введите имя!';
	}
	
	if(empty($usersurname))//проверка на пустое значение поля ввода имени
	{
		$errors[] = 'Введите фамилию!';
	}
	
	if(empty($useremail))//проверка на пустое значение поля ввода email
	{
	$errors[] = 'Введите email!';
	}
	if(empty($userpasswordold) AND ((!empty($userpasswordnew)) OR (!empty($userpasswordnew2))))
	{
		$errors[] = 'Введите текущий пароль!';
	}
	
	if(!empty($data['userpasswordold']) AND (empty($data['userpasswordnew'])))
	{
		$userpasswordold = md5($userpasswordold);
		if($userpasswordold != $reg_info['pass'])
		{
			$errors[] = 'Текущий пароль введен неверно!';
		}
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

	
	$userpasswordold = md5($userpasswordold);
	$userpasswordnew = md5($userpasswordnew);
	if($no_change_pass!=1 AND (empty($errors)))
	{
		if($userpasswordold != $reg_info['pass']){
			$errors[] = 'Текущий пароль введен неверно!';
		}
	}
	if($username == $reg_info['name'] AND $usersurname == $reg_info['surname'] AND  $useremail == $reg_info['email'] AND $no_change_pass==1){
		$errors[] = $reg_info['name'].', хватит тыкать на кнопки! Меняй что-нибудь!';
	}
		
	if($no_change_pass==1 AND (empty($errors)))
	{
		$userpasswordnew = $reg_info['pass'];
	}

	if(empty($errors)){
		$user_update = update_user($link, $auth_login, $userpasswordnew, $useremail, $username, $usersurname, $reg_info['level_id']);
		if ($user_update)
			{
				$errors[] = 'Данные обновлены! <br/>Для корректного отображения перезайдите на сайт.';
			}
			else
			{
				$errors[] = 'Данные не обновлены!';
			}

	}
?>