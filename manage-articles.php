<?php require 'config.php';?>

<?php require_once 'blocks/header.php';?>
<?php require_once 'blocks/popup-remove-article.php';?>

	<section class="section section_1 section-content">
		<div class="section__wrap">
			<div class="manage-articles">

				<?php
					$podrazdelId = $_GET['articleId'];
					$podrazdelName = mysql_query ("SELECT Name FROM Razdel WHERE id = '$podrazdelId'");
					$row = mysql_fetch_row($podrazdelName);
					
				?>
				<p class="manage-articles__title">Статьи подраздела <span class="manage-articles__name"><?= $row[0] ?></span></p>
				
				<div class="manage-articles__manage-table">
					<div class="manage-table">
						<div class="manage-table__header">
							<div class="manage-table__row manage-table__row_header">
								<div class="manage-table__cell manage-table__cell_header manage-table__cell_header-name manage-table__cell_name">Название</div>
								<!-- <div class="manage-table__cell manage-table__cell_header manage-table__cell_section">Раздел/подраздел</div> -->
								<div class="manage-table__cell manage-table__cell_header manage-table__cell_author">Автор</div>
								<div class="manage-table__cell manage-table__cell_header manage-table__cell_date">Опубликовано</div>
								<div class="manage-table__cell manage-table__cell_header manage-table__cell_actions">Действия</div>
							</div>
						</div>
						<div class="manage-table__body">
						<?php
									$article_item = mysql_query ("SELECT Name, Author, Date FROM Articles WHERE id_Podrazdel = '$podrazdelId'");
									$counter = 0;
									while ($row = mysql_fetch_assoc($article_item )) {
										/*$artName = $row['Name'];
										$authorName = $row['Author'];
										$artDate = $row['Date'];*/
										$counter+=1;
										//for($i=1; $i<20; $i++) { 
										?>
											<div class="manage-table__row manage-table__row_body" entity-id='<?=$counter ?>'>
											<div class="manage-table__cell manage-table__cell_name">
											<a href='#' class='manage-table__name-link'> <?echo $row['Name'] ?></a>
											</div>
											<!-- <div class="manage-table__cell manage-table__cell_section">Раздел<?= $i ?>/подраздел<?= $i ?></div> -->
											<div class="manage-table__cell manage-table__cell_author"><?echo $row['Author'] ?></div>
											<div class="manage-table__cell manage-table__cell_date"><?echo $row['Date'] ?></div>
											<div class="manage-table__cell manage-table__cell_actions">
											<a href="/new-article.php" class="manage-table__action-link">Изменить</a>
											<a href="#" class="manage-table__action-link manage-table__action-link_remove">Удалить</a>
											
									
									</div>
								</div>
							<?}  ?>
						</div>
					</div>
				</div>

				<div class="manage-articles__wrap-button">
					<a href="/new-article.php" class="manage-articles__link-new-article">
						<button class="button button_default">Создать статью</button>
					</a>
				</div>

			</div>
		</div>
	</section>

	
<?php require_once 'blocks/footer.php'; ?>
