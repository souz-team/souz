<div class='section-1__article'>
	<article class='article'>
		<div class='article__image-wrap'>
			<img class='article__image' src='images/315x230.png' alt='' role='presentation'/>
		</div>
		<div class='article__content-wrap'>
			<div class='article__content'>
				<p class='article__title'><?= $title ?></p>
				<p class='article__text'><?= $text ?></p>
			</div>
			<div class='article__content-bottom'>
				<div class='article__button'>
					<a href='article.php?id=<?= $acrtcleId ?>'>
						<button class='button button_article'>ПОДРОБНЕЕ</button>
					</a>
				</div>
				<div class='article__author'>
					<p>Автор: <span class='article__author-name'><?= $authorName ?></span></p>
					<p class='article__author-date'><?= $authorDate ?></p>
				</div>
			</div>
		</div>
	</article>
</div>