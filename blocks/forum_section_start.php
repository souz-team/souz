<?php
$data = $_POST;

if(isset($data['new_section']))
{
	require_once '/action/create_section.php';

	if(!empty($errors))
	{ 
		$er=1;
		//echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	}
}
//require_once '/action/get_user_info.php';
?>


<section class="section section_1">
	<div class="section__wrap">
		<div class="new-topic">
			<form action="/forum-new-section.php" method="POST">
				<p class="new-material__title">Создние раздела</p>
				<label>
					<p class="form-new-material__label">Название раздела:
					<input class="form-new-material__label" name="section_name" type="text" /></p>
					<br/>
					<?php if(!empty($errors)){?>
					<div style="text-align: center;"><?php echo array_shift($errors);?></div>
					<?php } ?>
					<br/>
					<!--<p class="form-new-material__label">Скрытый раздел</p>-->
					<!-- <input  class="form-new-material__textarea" name="topic" placeholder="Ваше сообщение"></textarea>-->
					<p class="form-new-material__label"> Закрытый раздел: <input type='checkbox' name='section_closed' value='1'/> </p>
					
				</label>
				<div><br/>
					<button class="button button_article" name="new_section">Создать раздел</button>
					
				</div>
			</form>
		</div>
	</div>
</div>
