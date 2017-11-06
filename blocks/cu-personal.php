<?php

require_once '/action/showusers.php';
?>
<div class="manage-sections__manage-table">
<div class="manage-table">
	<div class="manage-table__header">
		<div class="manage-table__row manage-table__row_header">
			<!-- <th rowspan="2">№</th> -->
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_num">№
			</div>
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_login">
				<a href='<?= $_SERVER[PHP_SELF]?>?sort=1' title = 'Сортировка по логину'><img src='/images/<?=$dir[login]?>' alt=''> Логин</a>
			</div>
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_name1">
				<a href='<?= $_SERVER[PHP_SELF]?>?sort=2' title = 'Сортировка по имени'><img src='/images/<?=$dir[name]?>'> Имя</a>
			</div>
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_surname">
				<a href='<?= $_SERVER[PHP_SELF]?>?sort=3' title = 'Сортировка по фамилии'><img src='/images/<?=$dir[surname]?>'> Фамилия</a>
			</div>
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_email">
				<a href='<?= $_SERVER[PHP_SELF]?>?sort=4' title = 'Сортировка по email'><img src='/images/<?=$dir[email]?>'> Email</a>
			</div>
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_date1">
				<a href='<?= $_SERVER[PHP_SELF]?>?sort=5' title = 'Сортировка по дате регистрации'><img src='/images/<?=$dir[reg_date]?>'> Дата регистрации</a>
			</div>
			<div class="manage-table__cell manage-table__cell_header  manage-table__cell_lvl">
				<a href='<?= $_SERVER[PHP_SELF]?>?sort=6' title = 'Сортировка по уровню'><img src='/images/<?=$dir[level_id]?>'> Уровень пользователя</a>
			</div>
			<div class="manage-table__cell manage-table__cell_header manage-table__cell_admintools">Операции с пользователем
			</div>
	</div>
	
	<div class="manage-table__body">
		<?php for ($i=0; $i<count($array); $i++){ ?>
			<?php $a=$i+1; ?>
		<?php if($i%2 == 0) {?>
			<?php $bgcolor="#F0F8FF"?>
		<?php } else { ?>
			<?php $bgcolor="#E3EBF2"?>
		<?php } ?>
		<div class="manage-table__row manage-table__row_body" entity-id='<?= $id ?>'>

				<div class="manage-table__cell manage-table__cell_header manage-table__cell_num"><?=$a?></div>
				<div class="manage-table__cell manage-table__cell_login">
					<?=$array[$i]['login']?>
						
				</div>
				<div class="manage-table__cell manage-table__cell_name1">
					<?=$array[$i]['name']?>
				</div>
				<div class="manage-table__cell manage-table__cell_surname">
					<?=$array[$i]['surname']?>
				</div>
				<div class="manage-table__cell manage-table__cell_email">
					<?=$array[$i]['email']?>
				</div>
				<div class="manage-table__cell manage-table__cell_date">
					<?=$array[$i]['reg_date']?>
				</div>
				<div class="manage-table__cell manage-table__cell_lvl">
					<?=$array[$i]['level_id']?>
				</div>
				<div class="manage-table__cell manage-table__cell_admintools">
					<a href='edit_expenses.php?id=<?=$array[$i]['id']?>'><img src='/images/edit.png' width = '20' height = '20'>
					</a>
					<a href='showdelete_expenses.php?id=<?=$array[$i]['id']?>'><img src='/images/delete.png' width = '15' height = '15'>
					</a>
				</div>
			<!-- </tr> -->
		</div>
		<?php  }?>
	</div>


   
</div>
</div>
