<?php

	require '/config.php';

	if ($_SESSION['userlevel'] != 1 && $_SESSION['userlevel'] != 2) {
		header("Location: /");
		exit;
	}
	if(isset($_POST['delete_section']))//Проверяем, нажали ли кнопку "Удалить раздел"
	{
		$delrazdel=$_POST['section_id'];
		delete_razdelF($link, $delrazdel);
		header("location: /forum.php");
	}
?>

<?php require_once 'blocks/header.php'; ?>

<section class="section section_forum section_content">
	<div class="section__wrap">
		<?php require_once 'blocks/forum_action_section.php';?>
	</div>
</section>

<?php require_once 'blocks/footer.php'; ?>
