<?php require 'config.php';?>

<?php require_once 'blocks/header.php';?>

		<section class="section section_1 section_content">
			<div class="section__wrap">
				<div class="section-1">
					<div class="section-1__menu">
						<?php require_once "menu.php"; ?>
					</div>
					<div class='section-1__articles'>
					<?php require_once "blocks/articles.php"; ?>
					</div>
				</div>
			</div>
		</section>

<?php require_once 'blocks/footer.php'; ?>