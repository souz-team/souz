<?php
require_once 'config.php';?>

	<?php require_once 'blocks/header.php'; ?>
	<section class="section section_lk section_content">
		<div class="section__wrap">
			<div class="lk">
				
				<p class="lk__title"><img src='/images/lk-image.png' width='40' height='40'>Личный кабинет</p>

				<div class="lk__content">
					<div class="lk__side-bar lk__side-bar_left">

						<ul class="lk__navigation">
							<li class="lk__navigation-item lk__navigation-item_active" block='personal-information'>
								<a href="#" class="lk__navigation-link">Личная информация</a>
							</li>
							<li class="lk__navigation-item" block='lk-topics'>
								<a href="#" class="lk__navigation-link">Мои темы на форуме</a>
							</li>
							<li class="lk__navigation-item" block='lk-comments'>
								<a href="#" class="lk__navigation-link">Мои статьи</a>
							</li>
						</ul>
					</div>
					<div class="lk__side-bar lk__side-bar_right">
					
						<div class="lk__content-item lk__form" id='personal-information'>
							<?php require('./blocks/lk-personal-information.php') ?>
						</div>
						
						<div class="lk__content-item lk__topics" id='lk-topics'>
							<?php require('./blocks/lk-topics.php') ?>
						</div>

						<div class="lk__content-item lk__comments" id='lk-comments'>
							<?php require('./blocks/lk-comments.php') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php require_once 'blocks/footer.php'; ?>
