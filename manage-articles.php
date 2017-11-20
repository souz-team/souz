<?php require 'config.php';?>

<?php require_once 'blocks/header.php';?>
<?php require_once 'blocks/popup-remove-article.php';?>

	<section class="section section_1 section_content">
		<div class="section__wrap">
			<div class="manage-articles">

				<?php
                if (isset($_GET['podrazId']))
					$podrazdelId = $_GET['podrazId'];
					//$podrazdelName = mysql_query ("SELECT Name FROM Razdel WHERE id = '$podrazdelId'");
					//$row = mysql_fetch_row($podrazdelName);
                   // $row = Name_Podrazdel($link, $podrazdelId);
					
				?>
				<p class="manage-articles__title">Статьи подраздела <span class="manage-articles__name"><?= Name_Podrazdel($link, $podrazdelId) ?></span></p>
				
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
									$array = Show_Articles($link, $podrazdelId);
									$counter = 0;
									for  ($i=0; $i<count($array); $i++) {
										?>
											<div class="manage-table__row manage-table__row_body" entity-id='<?=$array[$i]['id'] ?>'> 
											<div class="manage-table__cell manage-table__cell_name">
                                        
											<?echo $array[$i]['Name'] ?></a>
											</div>
											<div class="manage-table__cell manage-table__cell_author"><?echo $array[$i]['Author'] ?></div>
											<div class="manage-table__cell manage-table__cell_date"><?echo $array[$i]['Date'] ?></div>
											<div class="manage-table__cell manage-table__cell_actions">
											<a href="/article-edit.php?artId=<?=$array[$i]['id']?>&podrazId=<?=$podrazdelId?>" class="manage-table__action-link">Изменить</a>
											<a href="/article-delete.php?del_id=<?=$array[$i]['id']?>&podrazId=<?=$podrazdelId?>" onclick="return confirm('Подтвердите удаление')? true : false;" class="manage-table__action-link manage-table__action-link_remove" >Удалить</a>
											
									
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
                    <a href='/manage-sections.php' ><div class="button button_cancel">Назад</div></a>
				</div>

			</div>
		</div>
	</section>

	
<?php require_once 'blocks/footer.php'; ?>
