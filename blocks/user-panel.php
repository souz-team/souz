<div class="user-panel">

	<div class="user-panel__avatar">
		<img src="images/avatars/user-women.png" alt="<?= $_SESSION["fio"] ?>" class="user-panel__avatar-image">
	</div>

	<p class="user-panel__name"><?= $_SESSION["fio"] ?></p>
	<p class="user-panel__link-wrap">
		<a href="lk.php" class="user-panel__link">Личный кабинет</a>
	</p>

	<div class="user-panel__footer">
		<a href='logout.php' class="user-panel__button-exit">Выйти</a>
	</div>

</div>

