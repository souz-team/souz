<?php
if(isset($_GET['edit']) AND ($_SESSION['userlevel']==1)){
	$data = $_GET['edit'];
require_once '/action/get-section-by-id.php';
require_once '/action/forum-change-section.php';

}

if(isset($_GET['delete']) AND ($_SESSION['userlevel']==1)){
	
	echo 'УДАЛИТЬ РАЗДЕЛ!';
}

if(isset($_POST['edit_section']))
{
	$errors=array();//массив сообшений ошибок

	$edit = 1;
	//$datasection = $_POST['edit_section'];
	$data = $_POST['section_id'];
	$name = $_POST['section_name'];
	$close = $_POST['section_closed'];
		if(empty($name)) //проверка на пустое значение поля ввода
	{
		$errors[] = 'Введите название раздела!';
	}
	
	
	require_once '/action/get-section-by-id.php';
	require_once '/action/forum-change-section.php';
	
}



?>


