<?php require 'config.php'; ?>
<?php require_once 'blocks/header.php'; ?>

      	<section class="section section_article section_content">
      		<div class="section__wrap">
      			<div class="section-article">
					<?php
						$wwwlink=$_SERVER['HTTP_REFERER'];
						$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
						$row= Show_One_Article($link, $id);
						$name = $row['Name'];
					 	$author = $row['Author'];
						$image = $row['Image_url'];
					 	$text = $row['Text'];
					 	$date = $row['Date'];
					?>
					<p class="section-article__title"><?= $name ?></p>
					<div class="section-article__content">
					<?php
					if($image !='' && file_exists($image)){
					?>
						<img class="img-article" src="<?= $image ?>">
					<?	} ?>				
					<p class="section-article__text"><?= $text ?></p>
					</div>
					<div class="section-article__footer">
					<form action="<?php echo $wwwlink; ?>" method="POST">
						<button class="section-article__back-link button button_form-auth">Назад</a></button>
						</form>
						<div class='section-article__author'>
							<p>Автор: <span class='section-article__author-name'><?= $author ?></span></p>
							<p class='section-article__author-date'><?= $date ?></p>
						</div>
					</div>
      			</div>
      		</div>
      	</section>
<?php require_once 'blocks/footer.php'; ?>