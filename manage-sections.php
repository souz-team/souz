<?php require 'config.php';?>

<?php require_once 'blocks/header.php';?>
<?php require_once 'blocks/popup-remove-section.php';?>

	<section class="section section-content">
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
							<?php 
							$razdel = Menu($link, 0); // Передаём нуль для поиска всех корневых разделов
								for ($i=0; $i<count($razdel); $i++) { 
									$id = $razdel[$i]['id'];?>
								<div class="manage-table__row manage-table__row_body" entity-id='<?= $id ?>'>
									<div class="manage-table__cell manage-table__cell_name manage-table__cell_section-name">
										<a href='#' class='manage-table__name-link'><?php echo $razdel[$i]['Name']?></a>
									</div>
									<div class="manage-table__cell manage-table__cell_count-articles"></div>
									<div class="manage-table__cell manage-table__cell_actions">
										<a href="/section.php?id=<?= $id ?>" class="manage-table__action-link">Изменить</a>
										<a href="#" class="manage-table__action-link manage-table__action-link_remove">Удалить</a>
										<a href="/section.php?sectionParent=<?= $id ?>" class="manage-table__action-link">Создать подраздел</a>
									</div>
								</div>
								<?php 
            						$podrazdel = Menu($link, $id); // Передаём id раздела для поиска всех подразделов. P_id == id
           						    for ($j=0; $j<count($podrazdel); $j++) { 
           						    	$id = $podrazdel[$j]['id']?>
									<div class="manage-table__row manage-table__row_subsection manage-table__row_body" entity-id='<?= $id ?>'>
										<div class="manage-table__cell manage-table__cell_name">
											<a href='manage-articles.php' class='manage-table__name-link'> <?echo $podrazdel[$j]['Name']?></a>
										</div>
										<div class="manage-table__cell manage-table__cell_count-articles"><?= Articles_Amount($link, $id) ?></div>
										<div class="manage-table__cell manage-table__cell_actions">
											<a href="/section.php?id=<?= $id ?>" class="manage-table__action-link">Изменить</a>
											<a href="#" class="manage-table__action-link manage-table__action-link_remove">Удалить</a>
										</div>
									</div>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				</div>
				
				<div class="manage-sections__wrap-button">
					<a href="/section.php?id=<?= 0 ?>" class="manage-sections__link-new-section">
						<button class="button button_default">Создать раздел</button>
					</a>
				</div>

			</div>
		</div>
	</section>

<?php require_once 'blocks/footer.php'; ?>
