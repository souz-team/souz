<div class="lk-topics manage-table">
	<div class="manage-table__header">
		<div class="manage-table__row manage-table__row_header">
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_header-name manage-table__cell_name">Название</div>
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_date">Опубликовано</div>
		</div>
	</div>
	<div class="manage-table__body">
		<?php for($i=1; $i<10; $i++) { ?>
		<div class="manage-table__row manage-table__row_body">
			<div class="manage-table__cell manage-table__cell_name">
				<a href='#' class='manage-table__name-link'>Lorem ipsum. <?= $i ?></a>
			</div>
			<p class="manage-table__cell manage-table__cell_date">201<?= $i%3?>-1<?= $i%10?>-2<?= $i*2%10?></p>
		</div>
		<?php } ?>
	</div>
</div>