<?php
require '/action/get_user_info.php';
require '/action/get-topic-by-user.php';
?>
<div class="lk-topics manage-table">

	<div class="manage-table__header">
	
		<div class="manage-table__row manage-table__row_header">
		
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_header-name manage-table__cell_name">Название</div>
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_date">Дата последнего ответа</div>
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_date">Опубликовано</div>
		</div>
	</div>
	<div class="manage-table__body manage-table__body_scroll">
	<?php if(!empty($topics)){?>
		<?php foreach($topics as $i => $topic) { ?>
			<div class="manage-table__row manage-table__row_body">
				<div class="manage-table__cell manage-table__cell_name">
					<a href='/topic-view.php?id=<?= $topic['theme_id']?>' class='manage-table__name-link'><?=($i+1).'. '.$topic['subject']?></a>
				</div>
				<?php
					$date =  mysqli_query ($link, "SELECT MAX(m_date) FROM boardp WHERE theme_id=$topic[theme_id]");
					$row_date = mysqli_fetch_array($date);
					$date_post = $row_date[0];
				?>
				<p class="manage-table__cell manage-table__cell_date"><?=$date_post?></p>
				<p class="manage-table__cell manage-table__cell_date"><?=$topic['create_date']?></p>
			</div>
		<?php } ?>
	<?php } else { ?>
	<p> Вы не создали ни одной темы на форуме </p>
		<?php } ?>
	</div>
</div>