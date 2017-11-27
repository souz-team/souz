<?php
if(isset($_GET['edit']) AND ($_SESSION['userlevel']==1)){
	$data = $_GET['edit'];
require_once '/action/get-section-by-id.php';
require_once '/blocks/forum-change-section.php';

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
	require_once '/blocks/forum-change-section.php';
	
}
if(isset($_POST['delete_section']))
{
	$section_id = $_POST['section_id'];
	if($section_id==4){
		$errors[] = 'Этот раздел нельзя удалять!';
		require_once '/forum-action-section.php';
	}
	else 
	{
		$del_sec = delete_razdelF($link, $section_id);
		if($del_sec)
		{
		$errors[] = 'Раздел удален!'; ?>
		<script>
		setTimeout(function() {
		
			window.location.href = '/forum.php';
		
		}, 3000);
	</script>
<?php }
	}
}
?>


