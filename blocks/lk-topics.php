<?php
require '/action/get_user_info.php';
require '/action/get-topic-by-user.php';
?>

<div class="lk-topics manage-table">
	<div class="manage-table__header">
	
		<div class="manage-table__row manage-table__row_header">
		
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_header-name manage-table__cell_name">Название</div>
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_date">Опубликовано</div>
		</div>
	</div>
	<div class="manage-table__body">
	<?php if(!empty($topics)){?>
		<?php foreach($topics as $topic) { ?>
		<div class="manage-table__row manage-table__row_body">
			<div class="manage-table__cell manage-table__cell_name">
				<a href='/topic-view.php?id=<?= $topic['theme_id']?>' class='manage-table__name-link'><?=$topic['subject']?></a>
			</div>
			<p class="manage-table__cell manage-table__cell_date"><?=$topic['create_date']?></p>
		</div>
		<?php } ?>
	<?php } else { ?>
	<p> Вы не создали ни одной темы на форуме </p>
		<?php } ?>
	</div>
</div>