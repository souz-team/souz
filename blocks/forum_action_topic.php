<?php
if(isset($_GET['edit']) AND ($_SESSION['userlevel']==1)){
	$id_topic = $_GET['edit'];
require_once '/action/get-topic-by-id.php';
require_once '/blocks/forum-change-topic.php';

}

if(isset($_GET['delete']) AND ($_SESSION['userlevel']==1)){
	
	echo 'УДАЛИТЬ РАЗДЕЛ!';
}

if(isset($_POST['edit_topic']))
{
	$errors=array();//массив сообшений ошибок

	$edit = 1;
	//$datasection = $_POST['edit_section'];
	$id_topic = $_POST['id_topic'];
	$section_id = $_POST['section_id'];
	$topic_subject = $_POST['topic_subject'];
	$topic_msg = $_POST['topic_msg'];
		if(empty($topic_subject)) //проверка на пустое значение поля ввода
	{
		$errors[] = 'Введите название темы!';
	}
		if(empty($topic_msg)) //проверка на пустое значение поля ввода
	{
		$errors[] = 'А где же содержание темы?';
	}
	
	
	
	
	
require_once '/action/get-topic-by-id.php';
require_once '/blocks/forum-change-topic.php';
	
}



?>