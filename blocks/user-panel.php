<div class="user-panel">

	<div class="user-panel__avatar">
		<a href="lk.php" class="user-panel__link">
			<?php
				
				switch ($_SESSION['gender']) {
					case 0:
						$imageName = 'user-women.png';
						break;
					
					case 1:
						$imageName = 'user-man.png';
						break;
					
					default:
						$imageName = 'user-man.png';
						break;
				}
			?>
			<img src="images/avatars/<?= $imageName ?>" alt="<?= $_SESSION["fio"] ?>" class="user-panel__avatar-image">
		</a>
	
	</div>

	<p class="user-panel__name"><?= $_SESSION["fio"] ?></p></a>
	<p class="user-panel__link-wrap">
		<img src='/images/lk-image.png' width='20' height='20'>
		<a href="lk.php" class="user-panel__link">Личный кабинет</a>
	</p>

	<div class="user-panel__footer">
		<a href='logout.php' class="user-panel__button-exit">Выйти</a>
	</div>

</div>

