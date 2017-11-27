<?php
	
	
	$authorName = $_SESSION['fio'];
	
	$id_Podrazdel = $_POST['id_Podrazdel'];
	$artId = $_GET['artId'];
	//var_dump($id_Podrazdel);
	
	$artName = trim(filter_input(INPUT_POST, 'articleName'));
	$artText = trim(filter_input(INPUT_POST, 'articleText'));
	$msg = array();
	$error_file = array();
	$uploaddir = 'images/article_images/';
	$apend=date('YmdHis').rand(100,1000).'.jpg'; 
	$uploadfile =  "$uploaddir$apend";
	$successfulUppload = 0;
	$previousImageUrl = $_POST['previousimageurl'];
	//var_dump($previousImageUrl);
	
	if(isset($_FILES['userfile']))
	{
		if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size']<=5242880)) 
		{ 
		 
			if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploadfile))	{
				$successfulUppload = 1;
			}
			 
		}	 
		else{ 
			if ($_FILES['userfile']['size']!= 0){
			
			$error_file[] = "Размер файла не должен превышать 5Мб или формат файла не jpeg/png/gif!";
			}
			else 
			$successfulUppload = 2;// статья без изображения
		}
	}	
	
	
	$err_f = array_shift($error_file);

	if (empty($artName))
	{
		$msg[] = "Введите название статьи!";
	}
	if (mb_strlen ($artName) > 150)
	{
		$msg[] = "Название статьи не должно содержать более 150 символов!";
	}
			
	
	if (empty($artText))
	{
		$msg[] = "Вы забыли написать статью!";
	}
	
	$all = array_shift($msg);
		
		
	function cheсk_post($link, $var)
			{
				return mysqli_real_escape_string( $link,  $_POST[$var] );
			}
		
	if( isset($_POST["articleName"])&& isset($_POST["articleText"])&& $all == NULL )
		{
			$str1 = cheсk_post($link, 'articleName');
			$str2 = cheсk_post($link, 'articleText');
			
			$artName = htmlentities($str1, ENT_QUOTES);
			$artText = htmlentities($str2, ENT_QUOTES);
						
		}
//картинки нет и добавляем	
	if($previousImageUrl =='' && $successfulUppload == 1) {
		
		$sql = mysql_query("UPDATE Articles SET	id_Podrazdel = '$id_Podrazdel', Name = '$artName', Author = '$authorName', Image_url = '$uploadfile', Text = '$artText', Date = Now() WHERE id = '$artId'")
					or die ("Error in query: $sql. ".mysql_error());	
	}
	else{
// картинки нет и не добавляем
		if($previousImageUrl =='' && $successfulUppload == 2) {
		
			$sql = mysql_query("UPDATE Articles SET	id_Podrazdel = '$id_Podrazdel', Name = '$artName', Author = '$authorName', Image_url = '', Text = '$artText', Date = Now() WHERE id = '$artId'")
					or die ("Error in query: $sql. ".mysql_error());
		}
		else{
//картинка есть, и не меняем
			if($previousImageUrl != '' && $successfulUppload == 2){
				$sql = mysql_query("UPDATE Articles SET	id_Podrazdel = '$id_Podrazdel', Name = '$artName', Author = '$authorName', Image_url = '$previousImageUrl', Text = '$artText', Date = Now() WHERE id = '$artId'")
					or die ("Error in query: $sql. ".mysql_error());
			}
			else{
//картинка есть, но меняем
				if($previousImageUrl != '' && $successfulUppload == 1) {
					$sql = mysql_query("UPDATE Articles SET	id_Podrazdel = '$id_Podrazdel', Name = '$artName', Author = '$authorName', Image_url = '$uploadfile', Text = '$artText', Date = Now() WHERE id = '$artId'")
						or die ("Error in query: $sql. ".mysql_error());
						unlink($previousImageUrl); 
				}
				else
					$msg[] = "Ошибка";
					$all = array_shift($msg);
		
				}
				
		}
	}	
	if($all == NULL && $err_f == NULL){
	header("Location: /manage-articles.php?id=$id_Podrazdel");
	}
		
?>