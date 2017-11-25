<div class="section__wrap">
	<div class="new-topic">
		<form action="/forum-action-topic.php" method="POST">
			<p class="new-material__title">Редактирование темы
				<?php if(!empty($errors)){?>
				<div style="color: red;text-align: center; font-weight: 600;"><?php echo array_shift($errors);?></div>
				<?php } ?>
				</p><br>
			<label>
			<input type="hidden" name="id_topic" value = "<?=$id_topic?>"/>
			<input type="hidden" name="section_id" value = "<?=$topic_section_id?>"/>
				<p class="form-new-material__label">Название темы:
				<input class="form-new-material__label" name="topic_subject" type="text" value = "<?=$topic_subject?>"/></p>
				<p class="form-new-material__label">Текст темы:
				<textarea class="form-new-material__textarea" name="topic_msg"><?=$topic_msg?></textarea></p>
			</label>
			<div><br/>
				<button class="button button_article" name="edit_topic">Изменить</button>
				<button onclick='return confirm("Вы уверены?")' class="button button_cancel" name="delete_topic">Удалить тему</button>
				<a href='/forum-topic.php?id=<?=$topic_section_id?>'><div class="button button_cancel">Назад</div></a>
			</div>
		</form>
	</div>
</div>