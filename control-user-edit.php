<?php require '/config.php';
if ($_SESSION['userlevel']==1) { ?>
		<?php require_once 'blocks/header.php'; ?>
		<section class="section section_forum">
			<div class="section__wrap">
				<?php require_once 'blocks/cu_personal_edit.php';?>
			</div>
		</section>
<?php require_once 'blocks/footer.php';}
header ("location: index.php");
exit;
?>