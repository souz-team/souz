<?php require '/config.php';
if ($_SESSION['userlevel']==1 || $_SESSION['userlevel']==2){ ?>
		<?php require_once 'blocks/header.php'; ?>
		<section class="section section_forum section-content">
			<div class="section__wrap">
				<?php require_once 'blocks/forum_action_section.php';?>
			</div>
		</section>
<?php require_once 'blocks/footer.php';}
header ("location: index.php");
exit;
?>