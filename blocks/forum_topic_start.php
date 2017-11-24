<?php

			//$id = $_GET['id'];
			$id = filter_input(INPUT_GET, 'id');
			$data = $_POST;
		
			if(isset($data['new_topic'])){
				$id = $data['id_section'];
				//$id_section = $_SESSION['id'];
				require_once '/action/create_topic.php';
			}
			//else{
			
			//$_SESSION['id'] = $id;
				
			//}
			

			//$fio = $_SESSION['fio'];




	// echo '		
	// 				<form action="../blocks/forum_topic_start.php" method="POST">
	// 					<label>
	// 						<p>Название темы</p>
	// 						<input name="subject" placeholder="Название темы" type="text" />
	// 					</label>
	// 					<label>
	// 						<p>Сообщение</p>
	// 						<textarea name="topic" placeholder="Ваше сообщение" rows="10" cols="35"></textarea>
	// 					</label>

	// 					<div"><br/>
	// 						<button name="new_topic">Добавить тему</button>
							
	// 					</div>
	// 				</form>';
?>



	<div class="section__wrap">
		<div class="new-topic">
			<form action="/forum-new-topic.php?id=<?= $id ?>" method="POST">
			<input type = "hidden" name = "id_section" value = <?=$id?>>
				<p class="new-material__title">Создние темы</p>
								
					<?php if(!empty($errors)){?>
					<div style="color: red;text-align: center; font-weight: 600;"><?php echo array_shift($errors);?></div>
					<?php } ?>
				
				<label>
					<p class="form-new-material__label">Название темы</p>
					<input class="form-new-material__textfield" name="subject" placeholder="Название темы" type="text">
				</label>
				<label>
					<p class="form-new-material__label">Сообщение</p>
					<textarea  class="form-new-material__textarea" name="topic" placeholder="Ваше сообщение"></textarea>
				</label>

				<div>
					<div class="form-new-material__row form-new-material__row_buttons">
							<a href='/forum-topic.php?id=<?=$id?>'>
								<div class="button button_cancel">Назад
								</div>
							</a>
							<button class="button button_article" name="new_topic">Добавить тему</button>
							
						</div>
				</div>
			</form>
		</div>
	</div>


