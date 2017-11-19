<?php
if(isset($_POST['delete_section'])){
	$section_name = "ОГОГО!";
	echo $data;
}
?>

<div class="section__wrap">
		<div class="new-topic">
		<!--action="/forum-action-section.php"-->
			<form  method="POST">
				<p class="new-material__title">Удаление раздела</p><br>
				<label>
					<p class="form-new-material__label">Название раздела: "<?=$section_name?>"</p>
					<br/>
					<?php if(!empty($errors)){?>
					<div style="color: red;text-align: left;"><?php echo array_shift($errors);?></div>
					<?php } ?>
				
					<input type="hidden" name="section_id" value = "<?=$data?>"/>
					<!--<p class="form-new-material__label">Скрытый раздел</p>-->
					<!-- <input  class="form-new-material__textarea" name="topic" placeholder="Ваше сообщение"></textarea>-->
					
				</label>
				<div><br/>
					<button class="button button_article" name="delete_section">Удалить раздел</button>
					<a href='/forum.php' ><div class="button button_cancel">Назад</div></a>
				</div>
			</form>
		</div>
	</div>