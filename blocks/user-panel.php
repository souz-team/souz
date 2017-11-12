<div class="user-panel">

	<div class="user-panel__avatar">
	<?php if($_SESSION['gender']==0){ ?>
		<a href="lk.php" class="user-panel__link"><img src="images/avatars/user-women.png" alt="<?= $_SESSION["fio"] ?>" class="user-panel__avatar-image">
	<?php } elseif ($_SESSION['gender']==1){ ?>
		<a href="lk.php" class="user-panel__link"><img src="images/avatars/user-man.png" alt="<?= $_SESSION["fio"] ?>" class="user-panel__avatar-image">
	<?php }?>
	
	</div>

	<p class="user-panel__name"><?= $_SESSION["fio"] ?></p></a>
	<p class="user-panel__link-wrap">
		<a href="lk.php" class="user-panel__link"><img src='/images/lk-image.png' width='20' height='20'>Личный кабинет</a>
	</p>

	<div class="user-panel__footer">
		<a href='logout.php' class="user-panel__button-exit">Выйти</a>
	</div>

</div>

