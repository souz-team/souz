<section class="section section_breadcrumbs">
	<div class="section__wrap">
		<div class="section-breadcrumbs">
			<ul class="breadcrumbs">    
			<?php require_once 'action/get-breadcrumbs.php';
				if (!empty($crumbs)) {
					foreach ($crumbs as $item) {
						if (isset($item)) { ?>
						<li class="breadcrumbs__item">
						<?php if ($item != end($crumbs)) { ?>
							<a class="breadcrumbs__link" href="<?php echo $item['url'] ?>"><?php echo $item['text'] ?></a>
						<?php } else { 
							 echo $item['text'];
							} ?>  
						</li>
				<?php   } 
					}
				 } ?>
			</ul>
		</div>
	</div>
</section>
