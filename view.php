<?php
//header('Content-Type: text/html; charset=utf-8');
require('config.php');
?>
<?php
	$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	$proverka_na_razdel = is_razdel ($link, $id);
	if($proverka_na_razdel)
	{
		$child = Are_There_Children ($link, $id);
		if(!$child)
		{
			header('Location: /article-menu.php');
		}
	}
?>	

<?php
	require_once 'blocks/header.php'; ?>
	<section class="section section_1 section_content">
		<div class="section__wrap">
			<div class="section-1">
				<div class="section-1__menu">
					
						
						
					<?php	
						//$_SESSION['idfont']=$id;
						require_once "menu.php";						
					?>
				</div>
				<div class="section-1__list-link">
					<ul class="lu-link">
						<?php
						//переменная, задающая количество сообщений, выводимых на странице
						$per_page = 20;
						//вычисляем номер страницы
						if (isset($_GET['page'])) {
							$page = $_GET['page'] -1;
						} else {
							$page = 0;
						}
						$start = abs($page*$per_page);	
						$n=$start;
						$result = Show_Articles_Limit($link, $id, $start, $per_page);
						if (!$result){
							echo "В этом подразделе нет статей!";
						} else {
							for ($i=0; $i<count($result); $i++) {
								++$n;
								echo "<li class='li-link'>$n. <a  class='form-auth__link-signup-li' href='article.php?id={$result[$i]['id']}'>".$result[$i]['Name']."</a></li>";
							}
						}							
						$total_rows = Count_Articles($link, $id);
						$num_pages = ceil($total_rows/$per_page); // получится страниц
					?>
					</ul>
					<?php if($num_pages > 1){?>
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
				</div>			
			</div>
		</div>
	</section>		
<?php require_once 'blocks/footer.php'; ?>