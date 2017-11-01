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
function Menu1 ($connection) 
{
      $menu = "SELECT * FROM Razdel WHERE P_id = '0'";
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
// Добаление пользователя
function Login_Exist ($connection, $var)
{
    $select_query = "SELECT * FROM Users WHERE login='$var'";	
	$result=$connection->query ($select_query);
    $rows = $result->fetch_array(MYSQLI_ASSOC);
    if ($rows) return rows;
    else
       return 0;
}

function Email_Exist ($connection, $var)
{
    $checkmail= "SELECT * FROM Users WHERE email='$var'";	
	$result = $connection->query ($checkmail);
    $rows = $result->fetch_array(MYSQLI_ASSOC);
    if ($rows) return rows;
    else
        return 0;
}

function User_Exist ($connection, $var)
{
    $checkuser = "SELECT * FROM Users WHERE login='$var' OR email='$var'";
    $result = $connection->query ($checkuser);
    $rows = $result->fetch_array(MYSQLI_ASSOC);
    if ($rows) return rows;
    else
        return 0;
}

function Add_User ($connection, $login, $name, $surname, $email, $password, $reg_date)
{
    // создание строки запроса
	
		
		$add_query ="INSERT INTO Users VALUES(NULL, '$login','$password','$email','$name', '$surname', '3', '$reg_date')";
		// выполняем запрос
		$result = $connection->query($add_query); 
        if ($result) 
            return true;
        else
            die ($connect->error);
    
}


// Редактирование пользователя

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

// Редактирование пароля
function Update_Passwort ($connection, $password_, $email_)
{
    $update = "UPDATE Users SET pass='$password_' WHERE email='$email_'";
    $result = $connection->query ($update);
    if ($result) return true;
    else
        die ($connect->error);
}

// Показ пользователей 

function Show_Users ($connection) // Принимает подключение и возвращает массив пользователей
{
    $search = "SELECT * FROM Users";
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

// Вспомогательные фунции

// Существует ли Id?

function Search_id ($connection, $var, $table) //Принимает подключение и id
{
    $search = "SELECT * FROM $table WHERE id = '$var'";
    $result = $connection->query ($search);
    if ($result)
    {
        $rows = $result->fetch_array (MYSQLI_ASSOC);
    }
    if ($rows) return $rows;
    else return 0;
}
//Обрезание текста статьи для превью
function Cut ($string, $length)
{
	$string = mb_substr($string, 0, $length,'UTF-8'); // обрезаем и работаем со всеми кодировками и указываем исходную кодировку
	$position = mb_strrpos($string, ' ', 'UTF-8'); // определение позиции последнего пробела. Именно по нему и разделяем слова
	$string = mb_substr($string, 0, $position, 'UTF-8'); // Обрезаем переменную по позиции
	return $string;
}

function Add_feedback ($connection, $name, $email, $subject, $topic, $date)
{
    // создание строки запроса
	
		
		$add_query ="INSERT INTO boardt VALUES(NULL, '4','$topic','$name','$subject', '$date', '$email')";
		// выполняем запрос
		$result = $connection->query($add_query); 
        if ($result) 
            return true;
        else
            die ($connect->error);
    
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
 
function Show_Razdel ($connection) // Принимает подключение и id, возвращает массив пользователей
{
    $search = "SELECT * FROM boardsection";
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

function Show_Topic ($connection, $var) // Принимает подключение и id, возвращает массив пользователей
{
    $search = "SELECT * FROM boardt WHERE id_section='$var'";
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
