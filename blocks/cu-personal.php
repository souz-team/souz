<?php
$array = Show_Users ($link); // возвращение многомерного массива по всем строкам найденного в функции Search_id отдела.
?>
<table width='100%' border = '1'>
	<tr bgcolor="#00A6F2" align="center">

		<td rowspan="2">№</td>
		<td rowspan="2">Логин</td>
		<td rowspan="2">Имя</td>
		<td rowspan="2">Фамилия</td>
		<td rowspan="2">Email</td>
		<td rowspan="2">Дата регистрации</td>
		<td rowspan="2">Уровень пользователя</td>
		<td colspan="2">Операции с пользователем</td>
	
	</tr>
	<tr bgcolor="#00A6F2" align="center">
		<td width='10%'>Редактировать</td>
		<td width='10%'>Удалить</td>
	</tr>
	
	<?php for ($i=0; $i<count($array); $i++){ ?>
		<?php $a=$i+1; ?>
	<?php if($i%2 == 0) {?>
		<?php $bgcolor="#E6E7E9"?>
	<?php } else { ?>
		<?php $bgcolor="#D5D5D5"?>
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
