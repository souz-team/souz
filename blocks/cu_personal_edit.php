<?php
if(isset($_GET['edit']) AND ($_SESSION['userlevel']==1)){
	$data = $_GET['edit'];
	
require_once '/action/get-user-by-id.php';
require_once '/blocks/cu_personal_change.php';

}

if(isset($_GET['delete']) AND ($_SESSION['userlevel']==1)){
	$id_user = $_GET['delete'];
	require_once '/action/get-user-by-id.php';
	$query ="DELETE FROM Users WHERE id = '$id_user'";
	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	mysqli_close($link);
	echo 'Пользователь удален!';
}

if(isset($_POST['edit_user']))
{
	$errors=array();//массив сообшений ошибок

	$edit = 1;
	$data = $_POST['user_id'];
	
	$user_login = $_POST['user_login'];
	$user_email = $_POST['user_email'];
	$user_name = $_POST['user_name'];
	$user_surname = $_POST['user_surname'];
	$user_gender = $_POST['user_gender'];
	$user_level = $_POST['user_level'];
	
	
	require_once '/action/get-user-by-id.php';
	require_once '/blocks/cu_personal_change.php';
	
}

?>