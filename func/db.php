<?php

// ВЫВОД МЕНЮ
 
function Menu ($connection, $var) 
{
	  $menu = "SELECT * FROM Razdel WHERE P_id = '$var'";
      $result = $connection->query ($menu);
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
    for ($i = 0; $i < count($all_podrazdels); $i++)
    {
        $podrazdel = $all_podrazdels[$i]['id'];
        $delete_podrazdel = Delete_Podrazdel($connection, $podrazdel);
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
        if ($result) 
            return true;
        else
            die ($connect->error);
}

// Удаление ПОДРАЗДЕЛА

function Delete_Podrazdel ($connection, $var) 
{
    $delete = "DELETE FROM Articles FROM Razdel WHERE Articles.id_Podrazdel = '$var' and Razdel.id = '$var'";
    $result = $connection->query ($delete);
        if ($result) return true;
        else
            die ($connect->error);
   /* $delete = "DELETE FROM Articles WHERE id_Podrazdel = '$var'"; // Удаляются все статьи подраздела
    $bet_result = $connection->query ($delete);
    if (!$bet_result) die ($connect->error);
    else {
        $delete_query = "DELETE FROM Razdel WHERE id = '$var'";
        $result = $connection->query ($delete_query);
        if ($result) return true;
        else
            die ($connect->error);
    }
    */
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
	/*//$res = mysql_query($q); 	//которые нужно 
	$row = mysql_fetch_assoc($result); //разбить по страницам.
	$total_rows = $row['count'];
	if (!$total_rows) return false;
    else
    {return $total_rows;}
	//return $total_row;*/
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
    $search = "SELECT * FROM Articles WHERE id_Podrazdel = '$var'";
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
	mysql_close();
}

function Show_Last ($connection)
{
    $search = "SELECT * FROM Articles ORDER BY id DESC LIMIT 3";
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
    $delete_query = "DELETE FROM Articles WHERE id = '$var'";
    $result = $connection->query ($delete_query);
    if ($result) return true;
    else
        die ($connect->error); // TODO: Каскадное удаление сообщений из личного форума
}

// Обрезание текста

function Cut ($string, $length)
{
	$string = mb_substr($string, 0, $length,'UTF-8'); // обрезаем и работаем со всеми кодировками и указываем исходную кодировку
	$position = mb_strrpos($string, ' ', 'UTF-8'); // определение позиции последнего пробела. Именно по нему и разделяем слова
	$string = mb_substr($string, 0, $position, 'UTF-8'); // Обрезаем переменную по позиции
	return $string;
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

function Show_Topic ($connection, $var_s, $var_t) // Принимает подключение и id, возвращает массив пользователей
{
    if(isset($var_s)){
	$search = "SELECT * FROM boardt WHERE id_section='$var_s'";
	}
	elseif(isset($var_t))
	{
		$search = "SELECT * FROM boardt WHERE theme_id='$var_t'";
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

