<?php
$sort_id = array ('login','name','surname','email','reg_date','level_id');

$dir = array('login'=>0, 'name'=>0, 'surname'=>0, 'email'=>0, 'reg_date'=>0, 'level_id'=>0);
$asc = 0;
if(isset($_GET['sort']))
{
	$a = $_SESSION['direct'];
	if($a>2) $a=0;
	++$a;
	if($a%=2){
		$direct = 'DESC';
		$asc = 31;
	}
	else{
		$direct = 'ASC';
		$asc = 30;
	}

	$_SESSION['direct'] = $a;
	
	$get_sort= filter_input(INPUT_GET, 'sort', FILTER_VALIDATE_INT);
	$sort_key=$sort_id[$get_sort-1];
	$dir[$sort_key] = $asc;
}
$array = Show_Users ($link, $sort_key, $direct); // возвращение многомерного массива по всем строкам найденного в функции Search_id отдела.
?>