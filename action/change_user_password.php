<?php
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
		$errors[] = 'Введите введите новый пароль!';
	}
	
	if( $data['userpasswordnew2']!=$data['userpasswordnew'])//проверка на совпадение с ранее введенным паролем
	{
		$errors[] = 'Пароли не совпадают!';
	}

?>