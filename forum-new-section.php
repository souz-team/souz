<?php

	require '/config.php';

	if ($_SESSION['userlevel'] != 1 && $_SESSION['userlevel'] != 2) {
		header("Location: /");
		exit;
	}

?>

<?php require_once 'blocks/header.php'; ?>

<section class="section section_2 section_content">
	<div class="section__wrap">
		<?php require_once 'blocks/forum_section_start.php'; ?>
	</div>
</section>

<?php require_once 'blocks/footer.php'; ?>
