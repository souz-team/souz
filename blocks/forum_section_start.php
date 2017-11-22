<?php

	$data = $_POST;

	if(isset($data['new_section'])) {

		require_once '/action/create_section.php';

		if(!empty($errors)) { 
			$er=1;
		}

	}

?>

<div class="section__wrap">
	<div class="section-2">
		<div class="section-2__wrap">
			<p class="section-2__title">Создание раздела</p>

			<div class="section-2__form-auth">
				<form action="/forum-new-section.php" method="POST" class='table-input-info'>

					<?php if(!empty($errors)){?>
						<div style="color: red;text-align: center; font-weight: 600;"><?= array_shift($errors) ?></div>
					<?php } ?>

					<div class="table-input-info__row">
						<label class='table-input-info__label'>
							<div class="table-input-info__wrap-text">
								<span class="table-input-info__text">Название раздела</span>
							</div>
							<div class="table-input-info__wrap-textfield">
								<input type="text" class="table-input-info__textfield" name="section_name">
							</div>
						</label>
					</div>

					<div class="table-input-info__row">
						<label class='table-input-info__label'>
							<div class="table-input-info__wrap-text table-input-info__wrap-text_top">
								<span class="table-input-info__text">Закрытый раздел</span>
							</div>
							<div class="table-input-info__wrap-textfield">
								<input type="checkbox" name="section_closed" value="1">
							</div>
						</label>
					</div>

					<div>
						<button class="button button_article" name="new_section">Создать раздел</button>
						<a href='/forum.php' class='button button_cancel'>Назад</a>
					</div>

				</form>
			</div>

		</div>
	</div>
</div>

