<?php
$data = $_POST;

if(isset($data['do_change']))
{
	require_once '/action/change_user_password.php';
	
	
	
	
	if(!empty($errors))
{ 
	$er=1;
	//echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
}
	
	
}
require_once '/action/get_user_info.php';

	

?>





<form action="/lk.php" class="table-input-info" method="POST">
	<div class="table-input-info__row">
		<label class='table-input-info__label'>
			<div class="table-input-info__wrap-text">
				<span class="table-input-info__text">Имя</span>
			</div>
			<div class="table-input-info__wrap-textfield">
				<input type="text" class="table-input-info__textfield" name='username'value='<?=$name?>'>
			</div>
		</label>
	</div>
	<div class="table-input-info__row">
		<label class='table-input-info__label'>
			<div class="table-input-info__wrap-text">
				<span class="table-input-info__text">Фамилия</span>
			</div>
			<div class="table-input-info__wrap-textfield">
				<input type="text" class="table-input-info__textfield" name='usersurname' value='<?=$surname?>'>
			</div>
		</label>
	</div>
	<div class="table-input-info__row">
		<label class='table-input-info__label'>
			<div class="table-input-info__wrap-text">
				<span class="table-input-info__text">Email</span>
			</div>
			<div class="table-input-info__wrap-textfield">
				<input type="email" class="table-input-info__textfield" name='useremail' value='<?=$email?>'>
			</div>
		</label>
	</div>
	<div class="table-input-info__row table-input-info__row_delimiter"></div>
	<!--<div style="text-align: center;">Для изменения пароля введите текущий пароль</div>-->
	<?php if(!empty($errors)){?>
	<div style="text-align: center;"><?php echo array_shift($errors);?></div>
	<?php } ?>
	<div class="table-input-info__row table-input-info__row_delimiter"></div>
	<div class="table-input-info__row">
		<label class='table-input-info__label'>
			<div class="table-input-info__wrap-text">
				<span class="table-input-info__text">Текущий пароль</span>
			</div>
			<div class="table-input-info__wrap-textfield">
				<input type="password" class="table-input-info__textfield" name='userpasswordold'>
			</div>
		</label>
	</div>
	<div class="table-input-info__row">
		<label class='table-input-info__label'>
			<div class="table-input-info__wrap-text">
				<span class="table-input-info__text">Новый пароль</span>
			</div>
			<div class="table-input-info__wrap-textfield">
				<input type="password" class="table-input-info__textfield" name='userpasswordnew'>
			</div>
		</label>
	</div>
	<div class="table-input-info__row">
		<label class='table-input-info__label'>
			<div class="table-input-info__wrap-text">
				<span class="table-input-info__text">Повторите новый пароль</span>
			</div>
			<div class="table-input-info__wrap-textfield">
				<input type="password" class="table-input-info__textfield" name='userpasswordnew2'>
			</div>
		</label>
	</div>
	<div class="table-input-info__buttons">
		<button class="button button_default" name="do_change">Сохранить</button>
	</div>
</form>