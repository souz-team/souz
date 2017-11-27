<?php require 'config.php'; ?>
		<?php require_once 'blocks/header.php'; ?>
		<section class="section section_forum section_content">
			<div class="section__wrap">
				<?php require_once 'blocks/forum-topics.php'; 
					
				
				?>
			</div>
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
		</section>
<?php require_once 'blocks/footer.php'; ?>
