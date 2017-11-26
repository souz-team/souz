<?php require 'config.php';
if ($_SESSION['userlevel']==1 || $_SESSION['userlevel']==2){ ?>
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
								<div class="manage-table__cell manage-table__cell_header manage-table__cell_moderator">Модератор</div>
								<div class="manage-table__cell manage-table__cell_header manage-table__cell_count-articles">Кол-во статей</div>
								<div class="manage-table__cell manage-table__cell_header manage-table__cell_actions">Действия</div>
							</div>
						</div>
						<div class="manage-table__body">
							<?php
								// Передаём нуль для поиска всех корневых разделов
								$sections = Menu($link, 0);

							?>

							<?php foreach ($sections as $section) { ?>
								<?php $id_section_admin = show_section_admin($link, $section['id']); 
								$name_section_admin = edit_user($link, $id_section_admin['user_id']);
								?>
								<div class="manage-table__row manage-table__row_body" entity-id="<?= $section['id'] ?>">
									<div class="manage-table__cell manage-table__cell_name manage-table__cell_section-name">
										<a href='#' class='manage-table__name-link'><?= $section['Name'] ?></a>
									</div>

									<div class="manage-table__cell manage-table__cell_moderator"><?= $name_section_admin['login']?></div>
									<div class="manage-table__cell manage-table__cell_count-articles"></div>
									
									<div class="manage-table__cell manage-table__cell_actions">
									<?php if(($_SESSION['userlevel']==2 AND $id_section_admin['user_id'] == $_SESSION['user_id']) OR $_SESSION['userlevel']==1) {?>
										<a href="/section-change.php?id=<?= $section['id'] ?>" class="manage-table__action-link">Изменить</a>
										<a href="#" class="manage-table__action-link manage-table__action-link_remove">Удалить</a>
										<a href="/section-create.php?sectionParent=<?= $section['id'] ?>" class="manage-table__action-link">Создать подраздел</a>
									<?php } ?>
									</div>
									
								</div>

								<?php
									// Передаём id раздела для поиска всех подразделов. P_id == id
									$subsections = Menu($link, $section['id']);

								?>

								<?php if ($subsections) { ?>
									<?php foreach ($subsections as $subsection) { ?>

										<div class="manage-table__row manage-table__row_subsection manage-table__row_body" entity-id="<?= $subsection['id'] ?>">
											<div class="manage-table__cell manage-table__cell_name">
												<a href='manage-articles.php?id=<?= $subsection['id'] ?>' class='manage-table__name-link'><?= $subsection['Name'] ?></a>
											</div>
										<!--	<div class="manage-table__cell manage-table__cell_moderator">moderator</div> -->
											<div class="manage-table__cell manage-table__cell_count-articles"><?= Articles_Amount($link, $subsection['id']) ?></div>
											<div class="manage-table__cell manage-table__cell_actions">
												<a href="/section-change.php?id=<?= $subsection['id'] ?>" class="manage-table__action-link">Изменить</a>
												<a href="#" class="manage-table__action-link manage-table__action-link_remove">Удалить</a>
											</div>
										</div>

									<?php } ?>
								<?php } ?>

							<?php } ?>

						</div>
					</div>
				</div>
				
				<div class="manage-sections__wrap-button">
					<a href="/section-create.php?id=<?= 0 ?>" class="manage-sections__link-new-section">
						<button class="button button_default">Создать раздел</button>
					</a>
				</div>

			</div>
		</div>
	</section>
<?php require_once 'blocks/footer.php';}
else{
header ("location: index.php");
exit;
}
?>
