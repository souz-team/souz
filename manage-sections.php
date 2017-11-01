<?php require 'config.php';?>

<?php require_once 'blocks/header.php';?>
<?php require_once 'blocks/popup-remove-section.php';?>

	<section class="section">
		<div class="section__wrap">
			<div class="manage-sections">

				<p class="manage-sections__title">Разделы / Подразделы</p>

				<div class="manage-sections__manage-table">
					<div class="manage-table">
						<div class="manage-table__header">
							<div class="manage-table__row manage-table__row_header">
								<div class="manage-table__cell manage-table__cell_header manage-table__cell_header-name manage-table__cell_name">Название</div>
								<div class="manage-table__cell manage-table__cell_header manage-table__cell_count-articles">Кол-во статей</div>
								<div class="manage-table__cell manage-table__cell_header manage-table__cell_actions">Действия</div>
							</div>
						</div>
						<div class="manage-table__body">
							<?php for($j=1; $j<rand(3,10); $j++) { ?>
								<?php $sectionId = rand(1,99); ?>
								<div class="manage-table__row manage-table__row_body" entity-id='<?= $sectionId ?>'>
									<div class="manage-table__cell manage-table__cell_name manage-table__cell_section-name">
										<a href='#' class='manage-table__name-link'>Раздел <?= $j ?></a>
									</div>
									<div class="manage-table__cell manage-table__cell_count-articles"></div>
									<div class="manage-table__cell manage-table__cell_actions">
										<a href="/new-section.php?sectionId=<?= $sectionId ?>" class="manage-table__action-link">Изменить</a>
										<a href="#" class="manage-table__action-link manage-table__action-link_remove">Удалить</a>
										<a href="/new-section.php?sectionParent=<?= $sectionId ?>" class="manage-table__action-link">Создать подраздел</a>
									</div>
								</div>
								<?php for($i=1; $i<rand(2,5); $i++) { ?>
									<div class="manage-table__row manage-table__row_subsection manage-table__row_body" entity-id='<?= $sectionId ?>'>
										<div class="manage-table__cell manage-table__cell_name">
											<a href='manage-articles.php' class='manage-table__name-link'>Подраздел <?= $sectionId ?></a>
										</div>
										<div class="manage-table__cell manage-table__cell_count-articles"><?= $sectionId ?></div>
										<div class="manage-table__cell manage-table__cell_actions">
											<a href="#" class="manage-table__action-link">Изменить</a>
											<a href="#" class="manage-table__action-link manage-table__action-link_remove">Удалить</a>
										</div>
									</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>
				
				<div class="manage-sections__wrap-button">
					<a href="/new-section.php" class="manage-sections__link-new-section">
						<button class="button button_default">Создать раздел</button>
					</a>
				</div>

			</div>
		</div>
	</section>

<?php require_once 'blocks/footer.php'; ?>
