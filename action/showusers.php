<?php
	$sort_id = array ('login','name','surname','gender','email','reg_date','level_id');
	$user_level = array('root', 'admin', 'user');
	$user_gender = array('девушка', 'парень');
	$dir = array('login'=>'arrow.png', 'name'=>'arrow.png', 'surname'=>'arrow.png', 'gender'=>'arrow.png', 'email'=>'arrow.png', 'reg_date'=>'arrow.png', 'level_id'=>'arrow.png');

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
	$per_page = 10;
	//вычисляем номер страницы
	if (isset($_GET['page'])) {
		$page = ($_GET['page']-1);
	} else { $page = 0; }
	//вычисляем значение переменной, с которой начнется считывание с бд
	$start = abs($page*$per_page);
	
	if(isset($_POST['search']) AND !empty($_POST['search']))
	{
		$search_clear = htmlentities(mysql_real_escape_string($_POST['search']), ENT_QUOTES, 'UTF-8');
		$search = $search_clear;
		
		$users = search_user($link, $search);
		$show_pag = 0;
	}
	else{
	// возвращение многомерного массива по всем строкам найденного.
	$users = Show_Users ($link, $sort_key, $direct, $start, $per_page); 
	$show_pag = 1;	
	}
	
	if(!$total_rows = Count_Show_Users($link, $sort_key, $direct))
		echo "jgb";
	else	
	//$total_rows = $row['count']; //высчитываем сколько
	$num_pages = ceil($total_rows/$per_page); // получится страниц
?>