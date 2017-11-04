<?php

require_once '/action/showusers.php';
?>

<table width='100%' >
	<tr bgcolor="#FFFFFF" align="center">

		<th rowspan="2">№</th>
		<th rowspan="2"><a href='<?= $_SERVER[PHP_SELF]?>?sort=1' title = 'Сортировка по логину'><img src='/images/<?=$dir[login]?>' alt=''> Логин</a></th>
		<th rowspan="2"><a href='<?= $_SERVER[PHP_SELF]?>?sort=2' title = 'Сортировка по имени'><img src='/images/<?=$dir[name]?>'> Имя</a></th>
		<th rowspan="2"><a href='<?= $_SERVER[PHP_SELF]?>?sort=3' title = 'Сортировка по фамилии'><img src='/images/<?=$dir[surname]?>'> Фамилия</th>
		<th rowspan="2"><a href='<?= $_SERVER[PHP_SELF]?>?sort=4' title = 'Сортировка по email'><img src='/images/<?=$dir[email]?>'> Email</th>
		<th rowspan="2"><a href='<?= $_SERVER[PHP_SELF]?>?sort=5' title = 'Сортировка по дате регистрации'><img src='/images/<?=$dir[reg_date]?>'> Дата регистрации</th>
		<th rowspan="2"><a href='<?= $_SERVER[PHP_SELF]?>?sort=6' title = 'Сортировка по уровню'><img src='/images/<?=$dir[level_id]?>'> Уровень пользователя</th>
		<th colspan="2">Операции с пользователем</th>
	
	</tr>
	<tr bgcolor="#FFFFFF" align="center">
		<td width='12%'>Редактировать</td>
		<td width='12%'>Удалить</td>
	</tr>
	
	<?php for ($i=0; $i<count($array); $i++){ ?>
		<?php $a=$i+1; ?>
	<?php if($i%2 == 0) {?>
		<?php $bgcolor="#F0F8FF"?>
	<?php } else { ?>
		<?php $bgcolor="#E3EBF2"?>
	<?php } ?>
		<tr bgcolor='<?=$bgcolor?>' align="center">

		<td><?=$a?></td>
		<td><?=$array[$i]['login']?></td>
		<td><?=$array[$i]['name']?></td>
		<td><?=$array[$i]['surname']?></td>
		<td><?=$array[$i]['email']?></td>
		<td><?=$array[$i]['reg_date']?></td>
		<td><?=$array[$i]['level_id']?></td>
		<td>#</td>
		<td>@</td>
		
		</tr>
        <!-- 
		<td width = '10%'><a href='edit_expenses.php?id={$array[$i]['id']}'><img src='edit.png' width = '15' height = '15'></a></td>";
        <td width = '10%'><a href='showdelete_expenses.php?id={$array[$i]['id']}'><img src='delete.png' width = '15' height = '15'></a></td></tr>";
		-->
   <?php  }?>



   
</table>
