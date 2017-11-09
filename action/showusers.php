<?php
	$sort_id = array ('login','name','surname','email','reg_date','level_id');
	$user_level = array('root', 'admin', 'user');
	$dir = array('login'=>'arrow.png', 'name'=>'arrow.png', 'surname'=>'arrow.png', 'email'=>'arrow.png', 'reg_date'=>'arrow.png', 'level_id'=>'arrow.png');

	if(isset($_GET['sort'])) {
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
	
	
	//переменная, задающая количество сообщений, выводимых на странице
	$per_page = 5;
	//вычисляем номер страницы
	if (isset($_GET['page'])) {
		$page = ($_GET['page']-1);
	} else { $page = 0; }
	//вычисляем значение переменной, с которой начнется считывание с бд
	$start = abs($page*$per_page);
	
	

	// возвращение многомерного массива по всем строкам найденного.
	$users = Show_Users ($link, $sort_key, $direct, $start, $per_page); 	
	
	
	if(!$total_rows = Count_Show_Users($link, $sort_key, $direct))
		echo "jgb";
	else	
	//$total_rows = $row['count']; //высчитываем сколько
	$num_pages = ceil($total_rows/$per_page); // получится страниц
?>