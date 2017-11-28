<?php
	$authorName = $_SESSION['fio'];
	$login = $_SESSION['login'];
	$idPodRazdel = $_POST['id_Podrazdel'];
	$artName = trim(filter_input(INPUT_POST, 'articleName'));
	$artText = trim(filter_input(INPUT_POST, 'articleText'));
	$msg = array();
	$error_file = array();
	$uploaddir = 'images/article_images/';
	$apend=date('YmdHis').rand(100,1000).'.jpg'; 
	//$uploadfile = "$uploaddir$apend"; 
	$uploadfile = $uploaddir.$apend; 
	$successfulUppload = 0;
	
	if(isset($_FILES['userfile']))
	{
		if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size']<=5242880)) 
		{ 
		 
			if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $uploadfile))
			{
				$successfulUppload = 1;
			}
			 
		}	 
		else{ 
			if ($_FILES['userfile']['size']!= 0){
			
			$error_file[] = "Размер файла не должен превышать 5Мб или формат файла не jpeg/png/gif!";
			}
			else 
			$successfulUppload = 2; // статья без изображения
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
	
	if( isset($_POST["articleName"]) && isset($_POST["articleText"])  && $all == NULL )
		{
			$str1 = cheсk_post($link, 'articleName');
			$str2 = cheсk_post($link, 'articleText');
			
			$artName = htmlentities($str1, ENT_QUOTES, 'UTF-8');
			$artText = htmlentities($str2, ENT_QUOTES, 'UTF-8');
			
			if($successfulUppload == 1){
			
			$strSQL = "INSERT INTO `Articles` (`id_Podrazdel`, `Name`, `Author`, `Image_url`,`Text`, `Date`, `login`) VALUES( '$idPodRazdel', '$artName', '$authorName', '$uploadfile', '$artText', Now(),'$login' )";
			mysql_query($strSQL) or die (mysql_error());}
			
			else{
				if($successfulUppload == 2){
				$strSQL = "INSERT INTO `Articles` (`id_Podrazdel`, `Name`, `Author`, `Image_url`,`Text`, `Date`, `login`) VALUES( '$idPodRazdel', '$artName', '$authorName', '', '$artText', Now(), '$login' )";
				mysql_query($strSQL) or die (mysql_error());}
			}
			//$msg[] = "Статья добавлена!";
		}
	
	if($all == NULL && $err_f == NULL){
	header("Location: /manage-articles.php?id=$idPodRazdel");
	}
?>