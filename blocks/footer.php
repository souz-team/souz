			<section class="section section_footer">
				<div class="section__wrap">
					<div class="section-footer">
						<div class="section-footer__links">
							<ul class="footer-links">
								<li class="footer-links__link-wrap"><a class="footer-links__link" href="/">Главная</a>
								</li>
								<li class="footer-links__link-wrap"><a class="footer-links__link" href="/article-menu.php">Статьи</a>
								</li>
								<li class="footer-links__link-wrap"><a class="footer-links__link" href="../forum.php">Форум</a>
								</li>
								<li class="footer-links__link-wrap"><a class="footer-links__link" href="../feedback.php">Обратная связь</a>
								</li>
								<li class="footer-links__link-wrap"><a class="footer-links__link" href="contact.php">Контакты</a>
								</li>
								<?php if ($_SESSION['userlevel']==1 OR $_SESSION['userlevel']==2){ ?>
											<li class="footer-links__link-wrap">
												<a class="footer-links__link" href="/manage-sections.php">Управление статьями</a>
												
											</li>
											<?php if ($_SESSION['userlevel']==1){ ?>
											<li class="footer-links__link-wrap">
												<a class="footer-links__link" href="control-user.php">Управление юзерами</a>
												
											</li>
											<?php } ?>
										</ul>
								<?php } ?>
							</ul>
						</div>
						<div class="section-footer__copyright">
							<p class="copyright">Copyright © 15-ИСТв-1
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>