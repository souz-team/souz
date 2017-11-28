<div class='section-1__article'>
	<article class='article'>
	<?php if($articleImage !='' && file_exists($articleImage)) { ?>
		<div class='article__image-wrap'>
		
			<img class='article__image' src =<?= $articleImage?> height = '' width='315' role='presentation'/>
		</div>
		<?}
		
		else{
	?>	<div class='article__image-wrap'>
			<img class='article__image' src ="/images/article_images/No_photo.jpg"  role='presentation'/>
		</div>	
	<?	}?>
	
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