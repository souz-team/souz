<?php

// ВЫВОД МЕНЮ

function Is_Razdel ($connection, $var)
{
    $search = "SELECT * FROM Razdel WHERE id = '$var'";
    $result = $connection->query ($search);
    if ($result) {
        $rows = $result->fetch_array (MYSQLI_ASSOC);
    }
    if ($rows ['P_id'] == 0) return true;
    else return false;
}

function Menu ($connection, $var) 
{
	  $menu = "SELECT * FROM Razdel WHERE P_id = '$var'";
      $result = $connection->query ($menu);
      if ($result)
      {
      $rows = $result->num_rows;
      if ($rows==0) return $rows; 
      else {
        $array = array ();
        for ($i=0; $i<$rows; $i++) {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
            return $array;
      }
      }
      else return 0;
}

// Возврат одного подраздела
function Show_Podrazdel ($connection, $var) // Принимает подключение и id
{
    $search = "SELECT * FROM Razdel WHERE id = '$var'";
    $result = $connection->query ($search);
    if ($result)
    {
        $rows = $result->fetch_array (MYSQLI_ASSOC);
    }
    if ($rows) return $rows;
    else return 0;
}
// Добаление РАЗДЕЛА

function Add_Razdel ($connection, $Name)
{
		$add_query ="INSERT INTO Razdel VALUES(NULL, '0','$Name')";
		$result = $connection->query($add_query); 
        if ($result) 
            return true;
        else
            die ($connect->error);
}

// Удаление РАЗДЕЛА

function Delete_Razdel ($connection, $var) 
{
    $all_podrazdels = Menu ($connection, $var);
    if ($all_podrazdels) {
    foreach ($all_podrazdels as $all_podrazdels) {
        $podrazdel = $all_podrazdels['id'];
        $delete_podrazdel = Delete_Podrazdel($connection, $podrazdel);
    }
    }
    $delete = "DELETE FROM Razdel WHERE id = '$var'";
    $result = $connection->query ($delete);
    if ($result) return true;
    else
        die ($connect->error);
}

// Добаление ПОДРАЗДЕЛА

function Add_Podrazdel ($connection, $P_id, $Name)
{
		$add_query ="INSERT INTO Razdel VALUES(NULL, '$P_id','$Name')";
		$result = $connection->query($add_query);
		$id = mysqli_insert_id($connection);
        if ($result) {
			$podrazdel = array(true, $id);
			return $podrazdel;
			mysqli_close($connection);
        }
        else
            die ($connect->error);
}

// Добаление РАЗДЕЛА

function Change_Razdel ($connection, $id, $P_id, $Name)
{
		$change_query ="UPDATE Razdel SET P_id = '$P_id', Name = '$Name' WHERE id = '$id'";
		$result = $connection->query($change_query); 
        if ($result) 
            return true;
        else
            die ($connect->error);
} 


// Удаление ПОДРАЗДЕЛА

function Delete_Podrazdel ($connection, $var) 
{
    $all_articles = Show_Articles ($connection, $var);
    for ($i = 0; $i < count($all_articles); $i++) {
        $article_id = $all_articles[$i]['id'];
        $delete_article = Delete_Article($connection, $article_id);
    }
    $delete = "DELETE FROM Razdel WHERE id = '$var'";
    $result = $connection->query ($delete);
    if ($result) return true;
    else
        die ($connect->error);
}
function Name_Podrazdel ($connection, $var) // Поиск имени раздела || подраздела по id
{
    $name_query = "SELECT Name FROM Razdel WHERE id = '$var'";
    $result = $connection->query ($name_query);
    if (!$result) die ($connect->error);
    else
    $value = $result->fetch_array(MYSQLI_NUM);
    return is_array($value) ? $value[0] : "";
}

// Добаление ПОЛЬЗОВАТЕЛЯ

function Login_Exist ($connection, $var)
{
    $select_query = "SELECT * FROM Users WHERE login='$var'";	
	$result=$connection->query ($select_query);
    $rows = $result->fetch_array(MYSQLI_ASSOC);
    if ($rows) return $rows;
    else
       return 0;
	mysqli_close($link);
}

function Email_Exist ($connection, $var)
{
    $checkmail= "SELECT * FROM Users WHERE email='$var'";	
	$result = $connection->query ($checkmail);
    $rows = $result->fetch_array(MYSQLI_ASSOC);
    if ($rows) return $rows;
    else
        return 0;
}

function User_Exist ($connection, $var)
{
    $checkuser = "SELECT * FROM Users WHERE login='$var' OR email='$var'";
    $result = $connection->query ($checkuser);
    $rows = $result->fetch_array(MYSQLI_ASSOC);
    if ($rows) return $rows;
    else
        return 0;
}

function Add_User ($connection, $login, $name, $surname, $email, $password, $reg_date, $gender)
{
    // создание строки запроса
	
		
		$add_query ="INSERT INTO Users VALUES(NULL, '$login','$password','$email','$name', '$surname', '3', '$reg_date', '$gender')";
		// выполняем запрос
		$result = $connection->query($add_query); 
        if ($result) 
            return true;
        else
            die ($connect->error);
    
}


// Редактирование ПОЛЬЗОВАТЕЛЯ

function Edit_User ($connection, $var) // Принимает подключение и id
{
    $search = "SELECT * FROM Users WHERE id = '$var'";
    $result = $connection->query ($search);
    if ($result)
    {
        $rows = $result->fetch_array (MYSQLI_ASSOC);
    }
    if ($rows) return $rows;
    else return 0;
}

// Показ пользователей по правам доступа 
function Show_Admin ($connection) // Принимает подключение и id
{
    $search = "SELECT * FROM Users WHERE level_id = '1' OR level_id = '2'";
    $result = $connection->query ($search);
    if (!$result) die ($connect->error);
      $rows = $result->num_rows;
     if (!$rows) return 0;
       else
    {
        $array = array ();
        for ($i=0; $i<$rows; $i++)
        {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
    }
    return $array; 
}

// Редактирование ПАРОЛЯ
function Update_Passwort ($connection, $password_, $email_)
{
    $update = "UPDATE Users SET pass='$password_' WHERE email='$email_'";
    $result = $connection->query ($update);
    if ($result) return true;
    else
        die ($connect->error);
}

// Показ ПОЛЬЗОВАТЕЛЕЙ 

function Show_Users ($connection, $sort, $direct, $start, $per_page) // Принимает подключение и возвращает массив пользователей
{
	if(isset($sort) AND isset($direct)){
		$search = "SELECT * FROM Users ORDER BY $sort $direct LIMIT $start, $per_page";
	}
	else {
		$search = "SELECT * FROM Users ORDER BY id ASC LIMIT $start, $per_page";
	}
    //$search = "SELECT * FROM Users";
    $result = $connection->query ($search);
    if (!$result) die ($connect->error);
    $rows = $result->num_rows;
    if (!$rows) return false;
    else
    {
        $array = array ();
        for ($i=0; $i<$rows; $i++)
        {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
    }
    return $array; 
}

function Count_Show_Users($connection, $sort, $direct){
	//считаем сколько у нас записей
	if(isset($sort) AND isset($direct)){
		$q = "SELECT * FROM Users ORDER BY $sort $direct";
	}
	else {
		$q = "SELECT * FROM Users ORDER BY id ASC";
	}	
	$result = $connection->query ($q);
    if (!$result) die ($connect->error);
    $rows = $result->num_rows;
	if (!$rows) return false;
    else
    {return $rows;}
}

function countAuthorMess($connection, $login){
	$sql = "SELECT * FROM boardp WHERE login = '$login'";
	$result = $connection->query ($sql);
	if (!$result) die ($connect->error);
	$rowsComm = $result->num_rows;
	
	$sql = "SELECT * FROM boardt WHERE author = '$login'";
	$result = $connection->query ($sql);
	if (!$result) die ($connect->error);
	$rowsTheam = $result->num_rows;
	
	if (!$rowsComm) $rowsComm = 0;
	if (!$rowsTheam) $rowsComm = 0;
    return ($rowsComm + $rowsTheam);
}

// Удаление ПОЛЬЗОВАТЕЛЯ

function Delete_User ($connection, $var) // Принимает подключение и id
{
    $delete_query = "DELETE FROM Users WHERE id = '$var'";
    $result = $connection->query ($delete_query);
    if ($result) return true;
    else
        die ($connect->error); // TODO: Каскадное удаление сообщений из личного форума
}

// Показ СТАТЕЙ 
function Show_All_Articles ($connection) // Принимает подключение и id, возвращает массив пользователей
{
    $search = "SELECT * FROM Articles";
    $result = $connection->query ($search);
    if (!$result) die ($connect->error);
    $rows = $result->num_rows;
    if (!$rows) return 0;
    else
    {
        $array = array ();
        for ($i=0; $i<$rows; $i++)
        {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
    }
    return $array; 
} 



function Show_Articles ($connection, $var) // Принимает подключение и id, возвращает массив пользователей
{
    $search = "SELECT * FROM Articles WHERE id_Podrazdel = $var";
    $result = $connection->query ($search);
    if (!$result) die ($connect->error);
    $rows = $result->num_rows;
    if (!$rows) {
		return 0;
	}
    else
    {
        $array = array ();
        for ($i=0; $i<$rows; $i++)
        {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
    }
    return $array; 
}

function Show_Articles_Limit($connection, $var, $start, $per_page) // Принимает подключение и id, возвращает массив пользователей
{
    $search = "SELECT * FROM Articles WHERE id_Podrazdel = $var LIMIT $start, $per_page";
    $result = $connection->query ($search);
    if (!$result) die ($connect->error);
    $rows = $result->num_rows;
    if (!$rows) {
		return 0;
	}
    else
    {
        $array = array ();
        for ($i=0; $i<$rows; $i++)
        {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
    }
    return $array; 
}

function Count_Articles($connection, $var){
	$q = "SELECT * FROM Articles WHERE id_Podrazdel = '$var'";
	$result = $connection->query ($q);
    if (!$result) die ($connect->error);
    $rows = $result->num_rows;
	if (!$rows){ return false;
		print ("dfghenen");}
    else
    {return $rows;}
}



function Show_One_Article ($connection, $var) // Принимает подключение и id
{
    $search = "SELECT * FROM Articles WHERE id = '$var'";
    $result = $connection->query ($search);
    if ($result)
    {
        $rows = $result->fetch_array (MYSQLI_ASSOC);
    }
    if ($rows) return $rows;
    else return 0;
	mysql_close(); // Зачем mysql_close()?
}

function Show_Last ($connection)
{
    $search = "SELECT * FROM Articles ORDER BY id DESC LIMIT 5";
    $result = $connection->query ($search);
     if (!$result) die ($connect->error);
    $rows = $result->num_rows;
    if (!$rows) return 0;
    else
    {
        $array = array ();
        for ($i=0; $i<$rows; $i++)
        {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
    }
    return $array; 
}

//Количество статей в подразделе

function Articles_Amount ($connection, $var)
{
    $search = "SELECT * FROM Articles WHERE id_Podrazdel='$var'";
    $result = $connection->query ($search);
     if (!$result) die ($connect->error);
    $sum = $result->num_rows;
    return $sum; 
}


// Добавление СТАТЬИ

function Add_Article ($connection, $id_Podrazdel, $Name, $Author, $Text, $Date)
{
    // создание строки запроса
	
		
		$add_query ="INSERT INTO Articles VALUES(NULL, '$id_Podrazdel','$Name','$Author','$Text', '$Date')";
		// выполняем запрос
		$result = $connection->query($add_query); 
        if ($result) 
            return true;
        else
            die ($connect->error);
    
}

// Удаление СТАТЬИ

function Delete_Article ($connection, $var) // Принимает подключение и id
{
    $search = "SELECT * FROM Articles WHERE id ='$var'";
    $result = $connection->query ($search);
    if (!$result) die ($connect->error);
    $row =$result->fetch_array (MYSQLI_ASSOC);
    if ($row['Image_url']) {
        $path = "../".$row['Image_url']; // Работает только в том случае, если удаляющий файл находится ниже основной директории
        $is_delete = Delete_Photo($connection, $path);
    }
    if ($is_delete || $row['Image_url'] == "")
    {
    $delete_query = "DELETE FROM Articles WHERE id = '$var'";
    $result = $connection->query ($delete_query);
    if ($result) return true;
    else
        die ($connect->error); 
    }
}

function Delete_Photo ($connection, $var)
{
    $is_delete = unlink($var);
    if ( $is_delete)
        return 1;
    else return 0;  
}
// Обрезание текста

function Cut ($string, $length)
{
	$string = mb_substr($string, 0, $length,'UTF-8'); // обрезаем и работаем со всеми кодировками и указываем исходную кодировку
	$position = mb_strrpos($string, ' ', 'UTF-8'); // определение позиции последнего пробела. Именно по нему и разделяем слова
	$string = mb_substr($string, 0, $position, 'UTF-8'); // Обрезаем переменную по позиции
	return $string;
}

function queryNameRazdel($id, $table, $atributWhere, $connection){
	$sql = "SELECT * FROM $table WHERE $atributWhere = $id";
	$result = $connection->query ($sql);
	if (!$result) die ($connect->error);
	$row =$result->fetch_array (MYSQLI_ASSOC);
	return $row;
}

function Show_Subsection_Limit($connection, $id, $start, $per_page){
	$search = "SELECT * FROM Razdel WHERE P_id = $id LIMIT $start, $per_page";
    $result = $connection->query ($search);
    if (!$result) die ($connect->error);
    $rows = $result->num_rows;
    if (!$rows) {
		return 0;
	}
    else
    {
        $array = array ();
        for ($i=0; $i<$rows; $i++)
        {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
    }
    return $array;
}

function countSubsection($connection, $id){
	$q = "SELECT * FROM Razdel WHERE P_id = $id";
	$result = $connection->query ($q);
    if (!$result) die ($connect->error);
    $rows = $result->num_rows;
	if (!$rows){ return false;
		print ("dfghenen");}
    else
    {return $rows;}
}

//Хлебные крошки
function breadcrumbs($array,$id) {
	if(!$id) return false;
	$count = count($array) ;
	$breadcrumbs_array = array();
	for($i = 0; $i < $count; $i++){
		if($array[$id]){
		$breadcrumbs_array[$array[$id]['id']] = $array[$id]['Name'];
		$id = $array[$id]['P_id'];
		} else break;
	}
           
	return array_reverse($breadcrumbs_array, true);
} 
   
//Вывод читабельного массива для ХК
function print_arr($array){
	echo "<pre>" . print_r($array, true). "</pre>";
}

//Получение массива ХК
function get_menu(){
	$res = mysql_query ("SELECT * FROM Razdel");
	$arr_menu = array();
	while ($row = mysql_fetch_assoc($res)){
		$arr_menu[$row['id']] = $row;
	}
	return $arr_menu;
}

//Построение дерева ХК
function map_tree($dataset){
	$tree = array();
	foreach ($dataset as $id => &$node){
		if (!$node['P_id']){
			$tree[$id] = &$node;
		} 
		else{
			$dataset[$node['P_id']]['childs'][$id] = &$node;
		}
	}
	return $tree;
}
   
//Дерево в строку HTML ХК
function menu_to_string ($data){
	foreach($data as $item){
		$string .= menu_to_template($item);
	}
	return $string;
}
        
//шаблон вывода меню выпадающего     
function menu_to_template ($menu){
	ob_start();
	include 'menu_template.php';
	return ob_get_clean();
}

//Получение id подразделов ХК
function podrazdel_id ($array, $id){
	if (!$id) return false;
		foreach ($array as $item){
			if($item['P_id'] == $id){
				$data .= $item['id'] . ",";
				$data .= podrazdel_id($array, $item['id']);
			}
		}
	return $data;
}

//Получение списка статей ХК
function get_articles($ids){
	if ($ids){
		$query = mysql_query("SELECT * FROM articles WHERE id_Podrazdel IN($ids) ");
	}
	else {
		$query = mysql_query("SELECT * FROM articles");
    }
	$articles = array();
	while($row = mysql_fetch_assoc($query)){
		$articles[] = $row;
	}
	return $articles;
} 

// Показ РАЗДЕЛОВ ФОРУМА
 
function Show_Razdel ($connection, $id) // Принимает подключение и id, возвращает массив пользователей
{
	if(isset($id)){
		$search = "SELECT * FROM boardsection WHERE section_id = '$id'";
	}
	else {
		$search = "SELECT * FROM boardsection ORDER BY close";
	}
    $result = $connection->query ($search);
    if (!$result) die ($connect->error);
    $rows = $result->num_rows;
    if (!$rows) return 0;
    else
    {
        $array = array ();
        for ($i=0; $i<$rows; $i++)
        {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
    }
    return $array; 
} 

// Подсчёт количества тем (Форум)

function Topic_Amount ($connection, $var)
{
    $search = "SELECT * FROM boardt WHERE id_section='$var'";
    $result = $connection->query ($search);
     if (!$result) die ($connect->error);
    $sum = $result->num_rows;
    return $sum; 
}

// Возврат массива тем

function Show_Topic ($connection, $var_s, $var_t, $var_e) // Принимает подключение и id, возвращает массив пользователей
{
    if(isset($var_s)){
		$search = "SELECT * FROM boardt WHERE id_section='$var_s'";
	}
	elseif(isset($var_t))
	{
		$search = "SELECT * FROM boardt WHERE theme_id='$var_t'";
	}
	elseif(isset($var_e))
	{
		$search = "SELECT * FROM boardt WHERE email='$var_e'";
	}
    $result = $connection->query ($search);
    if (!$result) die ($connect->error);
    $rows = $result->num_rows;
    if (!$rows) return 0;
    else
    {
        $array = array ();
        for ($i=0; $i<$rows; $i++)
        {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
    }
    return $array; 
} 

// Подсчёт количества сообщений (Форум)

function Post_Amount ($connection, $var)
{
    $search = "SELECT * FROM boardp WHERE theme_id='$var'";
    $result = $connection->query ($search);
     if (!$result) die ($connect->error);
    $sum = $result->num_rows;
    return $sum; 
}

// Возврат массива постов

function Show_Post ($connection, $var) // Принимает подключение и id, возвращает массив пользователей
{
    $search = "SELECT * FROM boardp WHERE id_section='$var'";
    $result = $connection->query ($search);
    if (!$result) die ($connect->error);
    $rows = $result->num_rows;
    if (!$rows) return 0;
    else
    {
        $array = array ();
        for ($i=0; $i<$rows; $i++)
        {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
    }
    return $array; 
} 

// Возврат строки с последней датой

function Last_Date ($connection, $var) // Принимает подключение и id
{
    $search = "SELECT MAX(m_date) FROM boardp WHERE theme_id='$var'";
    $result = $connection->query ($search);
    if ($result)
    {
        $rows = $result->fetch_array (MYSQLI_NUM);
    }
    if ($rows) return $rows;
    else return 0;
}

// Добавление обратной связи

function Add_feedback ($connection, $name, $email, $subject, $topic, $date)
{
		$add_query ="INSERT INTO boardt VALUES(NULL, 4, '$topic','$name','$subject', '$date', '$email')";
		// выполняем запрос
		$result = $connection->query($add_query);
		$id = mysqli_insert_id($connection);
        if ($result) {
			$feedback = array(true, $id);
            return $feedback;
			mysqli_close($connection);
		}
        else
            die ($connection->error);
}

// Редактирование пользовательских данных
function update_user ($connection, $login, $password, $email, $name, $surname, $level_id)
{
    $update = "UPDATE Users SET pass='$password', email='$email', name='$name', surname='$surname', level_id='$level_id'  WHERE login='$login'";
    $result = $connection->query ($update);
    if ($result) return true;
    else
        die ($connect->error);
	mysqli_close($link);
}

function update_section ($connection, $id, $name, $close)
{
    $update = "UPDATE boardsection SET name='$name', close='$close' WHERE section_id='$id'";
    $result = $connection->query ($update);
    if ($result) return true;
    else
        die ($connect->error);
	
}
function create_section($connection, $name, $closed)
{
	$new_section ="INSERT INTO boardsection VALUES(NULL, '$name','$closed')";
	// выполняем запрос
	$result = $connection->query($new_section);
	if ($result) 
		return true;
	else
		die ($connection->error);
	mysqli_close($link);
}

function update_user_by_id ($connection, $id, $login, $email, $name, $surname, $level_id, $gender)
{
    $update = "UPDATE Users SET login='$login', email='$email', name='$name', surname='$surname', level_id='$level_id', gender='$gender'  WHERE id='$id'";
    $result = $connection->query ($update);
    if ($result) return true;
    else
        die ($connect->error);
	mysqli_close($link);
}

function search_user($connection, $search)
{
	$query="SELECT * FROM `Users` WHERE `login` LIKE '%$search%' OR `email` LIKE '%$search%' OR `name` LIKE '%$search%' 
	OR `surname` LIKE '%$search%'";
	 $result = $connection->query ($query);
    //if (!$result) die ($connect->error);
    $rows = $result->num_rows;
    //if (!$rows) return false;
   // else
    //{
        $array = array ();
        for ($i=0; $i<$rows; $i++)
        {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
   // }
   
    return $array; 
}

function update_topic ($connection, $id_topic, $id_section, $topic, $subject)
{
    $update = "UPDATE boardt SET subject='$subject', id_section='$id_section', topic='$topic' WHERE theme_id='$id_topic'";
    $result = $connection->query ($update);
    if ($result) return true;
    else
        die ($connect->error);
	mysqli_close($link);
}

function DoctorString ($var)
{
    $var = trim (stripslashes ($var));    //избавление от нежелательных слеш-символов, например, вставленных с помощью устаревшей директории magic_quotes_gpc
    //$var = strip_tags ($var); // очистка введенных данных от HTML
    $var = htmlentities ($var, ENT_QUOTES, "UTF-8"); //заменяет все угловые скобки, используемые в качестве составляющих HTML-тегов
    return $var;
}

function set_section_admin($connection, $section_id, $user_id)
{
	$section_admin ="INSERT INTO section_admin VALUES('$section_id','$user_id')";
	// выполняем запрос
	$result = $connection->query($section_admin);
	if ($result) 
		return true;
	else
		die ($connection->error);
	mysqli_close($link);
}

function change_section_admin($connection, $section_id, $user_id)
{
	$sql = "SELECT * FROM section_admin WHERE section_id = $section_id";
	$resultsql = $connection->query ($sql);
	$rows = $resultsql->num_rows;
	if(!empty($rows))
	{
		$update = "UPDATE section_admin SET user_id='$user_id' WHERE section_id='$section_id'";
		
		$result = $connection->query ($update);
		if ($result){
			return true;
		}
		else
			die ($connect->error);
	}
	else
	{
		$section_admin ="INSERT INTO section_admin VALUES('$section_id','$user_id')";
	// выполняем запрос
	$result = $connection->query($section_admin);
	if ($result) 
		return true;
	else
		die ($connection->error);
	}
	
	mysqli_close($link);
}

function show_section_admin($connection, $section_id)
{
	$sql = "SELECT * FROM section_admin WHERE section_id = $section_id";
	$result = $connection->query ($sql);
	if (!$result) die ($connect->error);
	$row =$result->fetch_array (MYSQLI_ASSOC);
	return $row;
}

function delete_section_admin($connection, $section_id)
{
	$sql = "SELECT * FROM section_admin WHERE section_id = $section_id";
	$resultsql = $connection->query ($sql);
	$rows = $resultsql->num_rows;
	if(!empty($rows))
	{
		$delete = "DELETE FROM section_admin WHERE section_id = '$section_id'";
		$result = $connection->query ($delete);
		if ($result) return true;
		else
			die ($connect->error);
	
	}	
}
//Удаление поста на форуме
function delete_boardpF ($link, $var){
	/* Автор: Шпанеров Станислав
	Функция удаляет пост на форуме по post_id в таблице boardp
	В случае успеха возвращает true
	*/
	$delete_query = "DELETE FROM boardp WHERE post_id = '$var'"; 
    $result = $link->query ($delete_query);
    if ($result) return true;
    else
        die ($link->error); 
}
//Удаление темы и сообщений в ней на форуме.
function delete_themeF ($link, $var){
	/* Автор: Шпанеров Станислав
	Функция удаляет сообщения по theme_id из таблицы boardp,
	а затем удаляет саму тему по theme_id из таблицы boardt.
	*/
	$delete_query = "DELETE FROM boardp WHERE theme_id = '$var'"; 
    $result = $link->query ($delete_query); //Удаляем все сообщения в теме из таблицы boardp.
	$delete_query = "DELETE FROM boardt WHERE theme_id = '$var'"; 
    $result = $link->query ($delete_query);// Удаляем тему из таблицы boardt.
	if ($result) return true; //В случае успеха возвращает true
    else
        die ($link->error);
}
//Каскадное удаление раздела на форуме.
function delete_razdelF ($link, $var){
	/* Автор: Шпанеров Станислав
	Функция получает подключение($link) и значение раздела(номер)($var)
	Затем в таблице boardt ищет записи тем которые относятся к этому разделу.
	Список тем записывается в массив $array
	Циклом текущее значение массива $array передаётся в функцию delete_themeF для удаления топиков в этой теме и самой темы.
	Когда все темы удалены, удаляется раздел из таблицы boardsection
	*/
	$select = "SELECT theme_id FROM boardt WHERE id_section = '$var'";
    $result = $link->query ($select);
	if ($result)
    {
        $rows = $result->num_rows;
    }
	//Пытаемся получить список ID тем, которые относятся к $var разделу
	$array = array(); 
        for ($i=0; $i<$rows; $i++) {
            $result->data_seek($i);
            $row = $result->fetch_array(MYSQLI_NUM);
			$array[$i] = $row[$i];			
	}   
	for ($i=0; $i<$rows; $i++) {// циклом удаляем все темы и топики в них
		delete_themeF ($link, $array[$i][0]);
	}
	$delete_query = "DELETE FROM boardsection WHERE section_id = '$var'"; 
    $result = $link->query ($delete_query);// Удаляем раздел из таблицы boardsection.
	if ($result) return true; //В случае успеха возвращает true
    else
        die ($link->error);
}

function show_admin_section($connection, $user_id)
{
	$sql = "SELECT * FROM section_admin WHERE user_id = $user_id";
	$result = $connection->query ($sql);
	if (!$result) die ($connect->error);
    $rows = $result->num_rows;
    if (!$rows) return 0;
    else
    {
        $array = array ();
        for ($i=0; $i<$rows; $i++)
        {
            $result->data_seek ($i);
            $row =$result->fetch_array (MYSQLI_ASSOC);
            $array["$i"] = $row;
        }   
    }
    return $array; 

}

function Are_There_Children ($connection, $var)
{
    $search = "SELECT * FROM Razdel WHERE P_id = '$var'";
    $result = $connection->query ($search);
    if ($result) {
        $rows = $result->fetch_array (MYSQLI_ASSOC);
    }
    if ($rows) return true;
    else return false;
}




?>