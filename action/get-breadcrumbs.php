<?php 
	$crumbs = array();    
	$cur_url = $_SERVER['REQUEST_URI'];
	//echo $cur_url;
	$page1 = parse_url($cur_url,  PHP_URL_PATH);
	//echo $page1;
	$id1 = $_GET['id'];
	//echo $id1;
	$flag=1;
	$num_razd=0;
	do{
		if($cur_url == "/index.php" || $cur_url == "/"){
			$flag = 0;
		} else if($page1 == "/index.php"){
			array_unshift($crumbs, array('text' => "Главная", 'url' => "/"));
			$flag = 0;
		} else if($page1 == "/article-menu.php"){
			array_unshift($crumbs, array('text' => "Статьи", 'url' => "article-menu.php"));
			$page1 = "/index.php";
		} else if($page1 == "/forum.php"){
			array_unshift($crumbs, array('text' => "Форум", 'url' => 'forum.php'));
			$page1 = "/index.php";
		} else if($page1 == "/feedback.php"){
			array_unshift($crumbs, array('text' => "Обратная связь", 'url' => "feedback.php"));
			$page1 = "/index.php";
		} else if($page1 == "/contact.php"){
			array_unshift($crumbs, array('text' => "Контакты", 'url' => "contact.php"));
			$page1 = "/index.php";
		} else if($page1 == "/forum-topic.php"){
			$row = queryNameRazdel($id1, 'boardsection', 'section_id', $link);
			$name = $row['name'];
			array_unshift($crumbs, array('text' => $name, 'url' => "forum-topic.php?id=$id1"));
			$page1 = "/forum.php";
		} else if($page1 == "/topic-view.php"){
			$row = queryNameRazdel($id1, 'boardt', 'theme_id', $link);
			$name = $row['subject'];
			array_unshift($crumbs, array('text' => $name, 'url' => "topic-view.php?id=$id1"));
			$page1 = "/forum-topic.php";
			$id1 = $row['id_section'];
		} else if($page1 == "/view.php" && $id1==0){
			$row = queryNameRazdel($num_razd, 'Razdel', 'id', $link);
			$name = $row['Name'];
			array_unshift($crumbs, array('text' => $name, 'url' => "view.php?id=$id1"));
			$page1 = "/article-menu.php";
		} else if ($page1 == "/view.php" && $id1>0){
			$row = queryNameRazdel($id1, 'Razdel', 'id', $link);
			$name = $row['Name'];
			array_unshift($crumbs, array('text' => $name, 'url' => "view.php?id=$id1"));
			$num_razd = $row['P_id'];
			$id1 = 0;
		} else if ($page1 == "/article.php"){
			$row = queryNameRazdel($id1, 'Articles', 'id', $link);
			$name = $row['Name'];
			array_unshift($crumbs, array('text' => $name, 'url' => "article.php?id=$id1"));
			$page1 = "/view.php";
			$id1 = $row['id_Podrazdel'];
		} else if ($page1 == "/lk.php"){
			array_unshift($crumbs, array('text' => "Личный кабинет", 'url' => "lk.php"));
			$page1 = "/index.php";
		} else if ($page1 == "/manage-sections.php"){
			array_unshift($crumbs, array('text' => "Управление статьями", 'url' => "manage-sections.php"));
			$page1 = "/index.php";
		} else if ($page1 == "/manage-articles.php"){			
			$row = queryNameRazdel($id1, 'Razdel', 'id', $link);
			$name = $row['Name'];
			array_unshift($crumbs, array('text' => $name, 'url' => "manage-articles.php"));
			$page1 = "/manage-sections.php";
		} else if ($page1 == "/control-user.php"){
			array_unshift($crumbs, array('text' => "Управление пользователями", 'url' => "control-user.php"));
			$page1 = "/index.php";
		} else if($page1 == "/forum-new-section.php"){
			array_unshift($crumbs, array('text' => "Создание раздела", 'url' => "forum-new-section.php"));
			$page1 = "/forum.php";
		} else if($page1 == "/control-user-edit.php"){
			array_unshift($crumbs, array('text' => "Редактирование данных пользователя", 'url' => "control-user-edit.php"));
			$id1 = filter_input(INPUT_GET, 'id');
			$page1 = "/control-user.php";
		} else if($page1 == "/forum-new-topic.php"){
			array_unshift($crumbs, array('text' => "Создание темы", 'url' => "forum-new-topic.php"));
			$id1 = filter_input(INPUT_GET, 'id');
			$page1 = "/forum-topic.php";
		} else{
			$page1 = "/index.php";
		}
	}while($flag!=0);
?>