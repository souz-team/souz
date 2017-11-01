 <?php
	require 'config.php';
	$flag = 0;
	if($_SESSION['auch']==1)
		{
			// echo '<div class="form-auth">';
			// echo 'Вы авторизованы, <br/>';
			// echo $_SESSION["fio"].".";
			// echo '<br/><br/>';
			// echo '<a href="../logout.php">Выйти</a>';
			// echo '</div>';
			$flag = 1;

		}
		else
		{
			$flag = 0;
		}
?>
<?php require_once 'blocks/header.php'; ?>