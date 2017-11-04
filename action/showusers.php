<?php
$sort_id = array ('login','name','surname','email','reg_date','level_id');

$dir = array('login'=>'arrow.png', 'name'=>'arrow.png', 'surname'=>'arrow.png', 'email'=>'arrow.png', 'reg_date'=>'arrow.png', 'level_id'=>'arrow.png');

if(isset($_GET['sort']))
{
	$a = $_SESSION['direct'];
	if($a>2) $a=0;
	++$a;
	if($a%=2){
		$direct = 'DESC';
		$asc = '22.png';
	}
	else{
		$direct = 'ASC';
		$asc = '21.png';
	}

	$_SESSION['direct'] = $a;
	
	$get_sort= filter_input(INPUT_GET, 'sort', FILTER_VALIDATE_INT);
	$sort_key=$sort_id[$get_sort-1];
	$dir[$sort_key] = $asc;
	
}
$array = Show_Users ($link, $sort_key, $direct); // возвращение многомерного массива по всем строкам найденного в функции Search_id отдела.
?>