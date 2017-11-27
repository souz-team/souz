<?php require 'config.php';?>

<?php require_once 'blocks/header.php';?>
<?php require_once 'blocks/popup-remove-article.php';?>

	<section class="section section_1 section-content">
		<div class="section__wrap">
			<div class="manage-articles">
				<?php
                if (isset($_GET['id']))
					$podrazdelId = $_GET['id'];
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
									$per_page = 5;
									//вычисляем номер страницы
									if (isset($_GET['page'])) {
										$page = ($_GET['page']-1);
									} else {
										$page = 0;
									}
									$start = abs($page*$per_page);	
									$id = $_GET['id'];
									$n=0;
									//$link = mysqli_connect($host, $login, $pswrd, $db_name) or die("Ошибка " . mysqli_error($link));
									$array = Show_Articles_Limit($link, $id, $start, $per_page);
									if ($array) {
									for  ($i=0; $i<count($array); $i++) {
										++$start;
										?>
											<div class="manage-table__row manage-table__row_body" entity-id='<?=$array[$i]['id'] ?>' podrazdel-id='<?= $podrazdelId ?>'>
											<div class="manage-table__cell manage-table__cell_name"><?= $array[$i]['Name'] ?></div>
											<div class="manage-table__cell manage-table__cell_author"><?echo $array[$i]['Author'] ?></div>
											<div class="manage-table__cell manage-table__cell_date"><?echo $array[$i]['Date'] ?></div>
											<div class="manage-table__cell manage-table__cell_actions">
												<a href="/article-edit.php?artId=<?=$array[$i]['id']?>&podrazdelId=<?=$podrazdelId?>" class="manage-table__action-link">Изменить</a>
												<a href="#" class="manage-table__action-link manage-table__action-link_remove">Удалить</a>
											</div>
								</div>
							<?}  ?>
                            <?}  ?>
						</div>
					</div>
				</div>
					<?php
					$total_rows = Count_Articles($link, $id);
					$num_pages = ceil($total_rows/$per_page);
					if($num_pages != 0){?>
					<div class="section__pagination">
						<div class='pagination'>

							<div class="pagination__content">
								<span class="pagination__arrow pagination__arrow_prev pagination__item"><a href='<?= $_SERVER['PHP_SELF'] ?>?id=<?= $id ?>&page=<?= ($page < 2 ? 1 : $page) ?>' class='pagination__link'>&#10094;</a></span>

								<ul class="pagination__pages">
									<?php for($i=1; $i<=$num_pages; $i++) { ?>
										<li class="pagination__item <?= $i-1 == $page ? 'pagination__item_current' : '' ?>">
											<a href='<?= $_SERVER['PHP_SELF'] . "?id=$id&page=$i" ?>' class='pagination__link'><?= $i ?></a>
										</li>
									<?php } ?>
								</ul>
								<span class="pagination__arrow pagination__arrow_prev pagination__item"><a href='<?= $_SERVER['PHP_SELF'] ?>?id=<?= $id ?>&page=<?= ($page+1 >= $num_pages ? $num_pages : $page+2) ?>' class='pagination__link'>&#10095;</a></span>
							</div>

						</div>
					</div>
					<?}?>
				<div class="manage-articles__wrap-button">
					<a href="/new-article.php?idPodRazdel=<?= $podrazdelId ?>" class="manage-articles__link-new-article">
						<button class="button button_default">Создать статью</button>
					</a>
                    <a href='/manage-sections.php' ><div class="button button_cancel">Назад</div></a>
				</div>

			</div>
		</div>
	</section>
<?php require_once 'blocks/footer.php'; ?>
