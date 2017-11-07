<?php

?>

<div class="section__wrap">
		<div class="new-topic">
			<form action="/forum-action-section.php" method="POST">
				<p class="new-material__title">Редактирование раздела</p><br>
				<label>
					<p class="form-new-material__label">Название раздела:
					<input type="hidden" name="section_id" value = "<?=$data?>"/>
					<input class="form-new-material__label" name="section_name" type="text" value = "<?=$section_name?>"/></p>
					<br/>
					<?php if(!empty($errors)){?>
					<div style="color: red;text-align: left;"><?php echo array_shift($errors);?></div>
					<?php } ?>
					<br/>
					<!--<p class="form-new-material__label">Скрытый раздел</p>-->
					<!-- <input  class="form-new-material__textarea" name="topic" placeholder="Ваше сообщение"></textarea>-->
					<p class="form-new-material__label"> Закрытый раздел: <input type='checkbox' <?=$checked?> name='section_closed' value='1'/> </p>
					
				</label>
				<div><br/>
					<button class="button button_article" name="edit_section">Изменить</button>
					
				</div>
			</form>
		</div>
	</div>




