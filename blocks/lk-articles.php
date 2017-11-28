<?php
require '/action/get_user_info.php';
require '/action/get-article-by-user.php';
?>
<div class="lk-topics manage-table">

	<div class="manage-table__header">
	
		<div class="manage-table__row manage-table__row_header">
		
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_header-name manage-table__cell_name">Название</div>
			
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_date">Опубликовано</div>
		</div>
	</div>
	<div class="manage-table__body manage-table__body_scroll">
	<?php if(!empty($articles)){?>
		<?php foreach($articles as $i => $article) { ?>
			<div class="manage-table__row manage-table__row_body">
				<div class="manage-table__cell manage-table__cell_name">
					<a href='/article.php?id=<?= $article['id']?>' class='manage-table__name-link'><?=($i+1).'. '.$article['Name']?></a>
				</div>
				
				<p class="manage-table__cell manage-table__cell_date"><?=$article['Date']?></p>
			</div>
		<?php } ?>
	<?php } else { ?>
	<p> Вы не написали ни одной статьи </p>
		<?php } ?>
	</div>
</div>