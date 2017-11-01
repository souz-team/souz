<?php require 'config.php';?>

<?php require_once 'blocks/header.php';?>

	<section class="section">
		<div class="section__wrap">
			<div class="new-material">
				<p class="new-material__title">Создание статьи</p>
					
				<div class="new-material__form">
					<form action="" class="form-new-material">
						
						<label class="form-new-material__row">
							<p class="form-new-material__label">Название</p>
							<input type="text" class="form-new-material__textfield">
						</label>

						<div class="form-new-material__row form-new-material__row_selects">

							<div class="form-new-material__wrap-select">
								<p class="form-new-material__label">Раздел</p>
								<select class='form-new-material__select'>
									<option value="">Раздел 1</option>
									<option value="">Раздел 2</option>
									<option value="">Раздел 3</option>
									<option value="">Раздел 4</option>
									<option value="">Раздел 5</option>
								</select>
							</div>

							<div class="form-new-material__wrap-select">
								<p class="form-new-material__label">Подраздел</p>
								<select class='form-new-material__select'>
									<option value="">Подраздел 1</option>
									<option value="">Подраздел 2</option>
									<option value="">Подраздел 3</option>
									<option value="">Подраздел 4</option>
									<option value="">Подраздел 5</option>
								</select>
							</div>

						</div>

						<label class="form-new-material__row">
							<p class="form-new-material__label">Текст статьи</p>
							<textarea class="form-new-material__textarea"></textarea>
						</label>

						<div class="form-new-material__row form-new-material__row_buttons">
								
							<a href="/manage-articles.php">
								<button class="button button_cancel">Отмена
								</button>
							</a>



							<button class="button button_default">Создать</button>
						</div>

					</form>
				</div>

			</div>
		</div>
	</section>

<?php require_once 'blocks/footer.php'; ?>
