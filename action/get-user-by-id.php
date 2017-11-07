<?php

if(empty($errors)){
	if($edit == 1){
		$edit_user = update_user_by_id($link, $data, $user_login, $user_email, $user_name, $user_surname, $user_level);
		if($edit_user) $errors[] = 'Данные пользователя изменены!';
	}
}
$user = Edit_User($link, $data);
$user_pass = $user['pass'];
$user_id = $user['id'];
$user_login = $user['login'];
$user_email = $user['email'];
$user_name = $user['name'];
$user_surname = $user['surname'];
$user_level_id = $user['level_id'];
$level = array ('root', 'admin', 'user');
$total = count($level);
$user_level = $level[$user['level_id'] - 1];

	
?>