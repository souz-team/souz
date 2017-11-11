<div class="control-user">
	<div class="control-user__wrap">

		<p class="control-user__title">Пользователи</p>
<?php
	require_once '/blocks/cu_search.php';
	require_once '/action/showusers.php';
?>
		<div class="control-user__manage-table">
			<div class="manage-table manage-table_control-user">
				<div class="manage-table__header">
					<div class="manage-table__row manage-table__row_header">
						<div class="manage-table__cell manage-table__cell_header manage-table__cell_number">
							№
						</div>
						<div class="manage-table__cell manage-table__cell_header manage-table__cell_login">
							<a href='<?= $_SERVER[PHP_SELF] ?>?sort=1' title='Сортировка по логину' class='manage-table__title-column'>
								<span class=''>Логин</span>
								<img class='manage-table__sort-image' src='/images/<?= $dir[login] ?>' alt=''> 
							</a>
						</div>
						<div class="manage-table__cell manage-table__cell_header manage-table__cell_username">
							<a href='<?= $_SERVER[PHP_SELF] ?>?sort=2' title='Сортировка по имени' class='manage-table__title-column'>
								<span class=''>Имя</span>
								<img class='manage-table__sort-image' src='/images/<?= $dir[name] ?>' alt=''>
							</a>
						</div>
						<div class="manage-table__cell manage-table__cell_header manage-table__cell_surname">
							<a href='<?= $_SERVER[PHP_SELF] ?>?sort=3' title='Сортировка по фамилии' class='manage-table__title-column'>
								<span class=''>Фамилия</span>
								<img class='manage-table__sort-image' src='/images/<?= $dir[surname] ?>' alt=''>
							</a>
							
						</div>
						<div class="manage-table__cell manage-table__cell_header manage-table__cell_surname">
							<a href='<?= $_SERVER[PHP_SELF] ?>?sort=4' title='Сортировка по полу' class='manage-table__title-column'>
								<span class=''>Пол</span>
								<img class='manage-table__sort-image' src='/images/<?= $dir[gender] ?>' alt=''>
							</a>
						</div>
						<div class="manage-table__cell manage-table__cell_header manage-table__cell_email">
							<a href='<?= $_SERVER[PHP_SELF] ?>?sort=5' title='Сортировка по email' class='manage-table__title-column'>
								<span class=''>Email</span>
								<img class='manage-table__sort-image' src='/images/<?= $dir[email] ?>' alt=''>
							</a>
						</div>
						<div class="manage-table__cell manage-table__cell_header manage-table__cell_date">
							<a href='<?= $_SERVER[PHP_SELF] ?>?sort=6' title='Сортировка по дате регистрации' class='manage-table__title-column'>
								<span class=''>Дата регистрации</span>
								<img class='manage-table__sort-image' src='/images/<?= $dir[reg_date] ?>' alt=''>
							</a>
						</div>
						<div class="manage-table__cell manage-table__cell_header manage-table__cell_lvl">
							<a href='<?= $_SERVER[PHP_SELF] ?>?sort=7' title='Сортировка по уровню' class='manage-table__title-column'>
								<span class=''>Роль</span>
								<img class='manage-table__sort-image' src='/images/<?= $dir[level_id] ?>' alt=''>
							</a>
						</div>
						<div class="manage-table__cell manage-table__cell_header manage-table__cell_admintools">
							Операции
						</div>
					</div>
				</div>

				<div class="manage-table__body">

					<?php foreach($users as $i => $user) { ?>
						<div class="manage-table__row manage-table__row_body">
							<div class="manage-table__cell manage-table__cell_body manage-table__cell_number">
								<?= $i+1 ?>
							</div>
							<div class="manage-table__cell manage-table__cell_body manage-table__cell_login">
								<?= $user['login'] ?>
							</div>
							<div class="manage-table__cell manage-table__cell_body manage-table__cell_username">
								<?= $user['name'] ?>
							</div>
							<div class="manage-table__cell manage-table__cell_body manage-table__cell_surname">
								<?= $user['surname'] ?>
							</div>
							<div class="manage-table__cell manage-table__cell_body manage-table__cell_surname">
								<?= $user_gender[$user['gender']] ?>
							</div>
							<div class="manage-table__cell manage-table__cell_body manage-table__cell_email">
								<?= $user['email'] ?>
							</div>
							<div class="manage-table__cell manage-table__cell_body manage-table__cell_date">
								<?= $user['reg_date'] ?>
							</div>
							<div class="manage-table__cell manage-table__cell_body manage-table__cell_lvl">
								<?= $user_level[$user['level_id']-1] ?>
							</div>
							<div class="manage-table__cell manage-table__cell_body manage-table__cell_admintools">
								<a href='/control-user-edit.php?edit=<?= $user['id'] ?>'>
									<img src='/images/edit.png' width='20' height='20'>
								</a>
								<a href='/control-user-edit.php?delete=<?= $user['id'] ?>'>
									<img src='/images/delete.png' width='15' height='15'>
								</a>
							</div>
						</div>
					<?php } ?>

				</div>
			
			</div>
		</div>

	</div>
</div>
<?php if($show_pag!=0){ ?>
<div class='pagination'>Страницы: 
	<?php for($i=1; $i<=$num_pages; $i++) { ?>
			<?php if ($i-1 == $page) { ?>
				<?= $i ?>
			<?php } else { ?>
			<a href='<?= $_SERVER[PHP_SELF] ?>?page=<?= $i ?>'>[<?= $i ?>]</a>
			
			<?php } ?>
	<?php } ?>	
<?php }?>
</div>
