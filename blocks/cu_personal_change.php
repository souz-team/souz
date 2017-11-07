<div class="section__wrap">
		<div class="new-topic">
			<form action="/control-user-edit.php" method="POST">
				<p class="new-material__title">Редактирование данных пользователя</p><br>
				<label>
					<p class="form-new-material__label">Логин:
					<input type="hidden" name="user_id" value = "<?=$data?>"/>
					<input  class="form-new-material__label" name="user_login" type="text" value = "<?=$user_login?>"/></p>
					<p class="form-new-material__label">Email:
					<input  class="form-new-material__label" name="user_email" type="text" value = "<?=$user_email?>"/></p>
					<p class="form-new-material__label">Имя:
					<input  class="form-new-material__label" name="user_name" type="text" value = "<?=$user_name?>"/></p>
					<p class="form-new-material__label">Фамилия:
					<input  class="form-new-material__label" name="user_surname" type="text" value = "<?=$user_surname?>"/></p>
					<p class="form-new-material__label">Уровень:
					<!--<input class="form-new-material__label" name="section_name" type="text" value = "<?=$user_level?>"/></p>-->
					<select name="user_level" size="">
						<option disabled>Выберите значение:</option>
						<?php for($i = 1; $i < $total+1; $i++) { ?>
						<option  value="<?php echo($i); ?>" <?=($i == $user_level_id) ? 'selected' : ''?> ><?php echo($level[$i-1]); ?></option>
						<?php } ?>
					</select>
					<?php if(!empty($errors)){?>
					<div style="color: red;text-align: left;"><?php echo array_shift($errors);?></div>
					<?php } ?>
				</label>
				<div><br/>
					<button class="button button_article" name="edit_user">Изменить</button>
				</div>
			</form>
		</div>
	</div>