<?php

?>

<div class="section__wrap">
		<div class="section-2">
			<div class="section-2__wrap">
			<p class="section-2__title">Редактирование раздела</p>

				<div class="section-2__form-auth">
					<form action="/forum-action-section.php" method="POST" class='table-input-info'>
						<div class="table-input-info__row">
							<label class='table-input-info__label'>
								<div class="table-input-info__wrap-text">
									<span class="table-input-info__text">Название раздела:</span>
								</div>
								<div class="table-input-info__wrap-textfield">
									<input type="hidden" name="section_id" value = "<?=$data?>"/>
									<input class="table-input-info__textfield" name="section_name" type="text" value = "<?=$section_name?>"/>
								</div>
							</label>
						</div>
						<div class="table-input-info__row">
								
								<?php if(!empty($errors)){?>
									<div style="color: red;text-align: left;"><?php echo array_shift($errors);?></div>
								<?php } ?>
								<br/>
								<label class='table-input-info__label'>
									<div class="table-input-info__wrap-text table-input-info__wrap-text_top">
										<span class="table-input-info__text">Закрытый раздел:</span>
									</div>
									<div class="table-input-info__wrap-textfield">
										<input type='checkbox' <?=$checked?> name='section_closed' value='1'/>
									</div>
								</label>
								
							
							<div>
								<button class="button button_article" name="edit_section">Изменить
								</button>
								<button onclick='return confirm("Вы уверены?")' class="button button_cancel" name="delete_section">Удалить раздел
								</button>
								<a href='/forum.php' >
									<div class="button button_cancel">Назад
									</div>
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>




