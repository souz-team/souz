<div class="section-table-input">

	<p class="section-table-input__title">Данные пользователя</p>

	<div class="section-table-input__content">

		<?php if (isset($messages)) { ?>

			<div class="section-table-input__messages">
				<?php foreach ($messages as $message) { ?>
					<p class="section-table-input__message"><?= $message ?></p>
				<?php } ?>
			</div>

		<?php } ?>
		
		<div class="section-table-input__table">

			<form action="/control-user-edit.php" method="POST" class='table-input-info'>
				
				<input type="hidden" name="user_id" value="<?= $data ?>">

				<div class="table-input-info__row">
					<label class="table-input-info__label">
						<div class="table-input-info__wrap-text">
							<span class="table-input-info__text">Логин</span>
						</div>
						<div class="table-input-info__wrap-textfield">
							<input type="text" class="table-input-info__textfield" name='user_login' value='<?= $user_login ?>'>
						</div>
					</label>
				</div>

				<div class="table-input-info__row">
					<label class="table-input-info__label">
						<div class="table-input-info__wrap-text">
							<span class="table-input-info__text">Email</span>
						</div>
						<div class="table-input-info__wrap-textfield">
							<input type="text" class="table-input-info__textfield" name='user_email' value='<?= $user_email ?>'>
						</div>
					</label>
				</div>

				<div class="table-input-info__row">
					<label class="table-input-info__label">
						<div class="table-input-info__wrap-text">
							<span class="table-input-info__text">Имя</span>
						</div>
						<div class="table-input-info__wrap-textfield">
							<input type="text" class="table-input-info__textfield" name='user_name' value='<?= $user_name ?>'>
						</div>
					</label>
				</div>

				<div class="table-input-info__row">
					<label class="table-input-info__label">
						<div class="table-input-info__wrap-text">
							<span class="table-input-info__text">Фамилия</span>
						</div>
						<div class="table-input-info__wrap-textfield">
							<input type="text" class="table-input-info__textfield" name='user_surname' value='<?= $user_surname ?>'>
						</div>
					</label>
				</div>

				<div class="table-input-info__row">
					<label class="table-input-info__label">
						<div class="table-input-info__wrap-text">
							<span class="table-input-info__text">Пол</span>
						</div>
						<div class="table-input-info__wrap-textfield">
							<select name='user_gender' class="table-input-info__textfield">
								<option disabled>Выберите значение:</option>
									<?php for($i = 0; $i < $total_gender; $i++) { ?>
										<option  value="<?= $i ?>" <?= ($i == $user_gender) ? 'selected' : '' ?>><?= $gender[$i] ?></option>
									<?php } ?>
							</select>
						</div>
					</label>
				</div>

				<div class="table-input-info__row">
					<label class="table-input-info__label">
						<div class="table-input-info__wrap-text">
							<span class="table-input-info__text">Уровень</span>
						</div>
						<div class="table-input-info__wrap-textfield">
							<select name='user_level' class="table-input-info__textfield">
								<option disabled>Выберите значение:</option>
								<?php for($i = 1; $i < $total+1; $i++) { ?>
									<option  value="<?= $i ?>" <?= ($i == $user_level_id) ? 'selected' : ''?>><?= $level[$i-1] ?></option>
								<?php } ?>
							</select>
						</div>
					</label>
				</div>

				<div class="table-input-info__row table-input-info__row_buttons">

					<button class="button button_article" name="edit_user">Изменить</button>
					<button onclick='return confirm("Вы уверены?")' class="button button_cancel" name="delete_user">Удалить пользователя</button>
					<a href='/control-user.php' class='button button_cancel'>Назад</a>

				</div>

			</form>

		</div>

	</div>

</div>