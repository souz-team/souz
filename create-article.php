<?php
	require 'config.php';
	
	$authorName = $_SESSION['fio'];
	$idPodRazdel = $_POST['id_Podrazdel'];
	
	
	$uploaddir = 'images/article_images/';
	$apend=date('YmdHis').rand(100,1000).'.jpg'; 
	$uploadfile = "$uploaddir$apend"; 
	$successfulUppload = 0;
	
	if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size']<=1024000)) 
	{ 
	 
		move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
		 
			/*$size = getimagesize($uploadfile); 
			if ($size[0] < 501 && $size[1]<1501) 
			{ */
			//	echo "Файл загружен. Путь к файлу: <b>http://souz/manage-articles.php/".$uploadfile."</b>"; 
			/*}
			else {
				echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 500; высота не более 1500)"; 
				unlink($uploadfile); 
			} */
			
		$successfulUppload = 1;
		
		
	} 
	else{ 
		if ($_FILES['userfile']['size']!= 0){
		
		echo "Размер файла не должен превышать 1Мб или формат файла не jpeg/png/gif";
		}
		else 
		$successfulUppload = 2;
	} 
	//var_dump($successfulUppload);
	
	if (isset($_POST["articleName"]))
	{
		$artName = $_POST["articleName"];
	}
	if ($artName == "")
	{
		$err_str.='Поле "Название" пустое <br>';
	}
	if (strlen ($artName) > 200)
	{
		$err_str.= 'Поле "Название" слишком длинное <br>';
	}
		
		
	if (isset($_POST["articleText"]))
	{
		$artText = $_POST["articleText"];
	}
	if ($artText == "")
	{
		$err_str.='Поле "Текст статьи" пустое <br>';
	}
	
	if( isset($_POST["articleName"])
	 && isset($_POST["articleText"]))
		{
		echo $err_str;
		}
	
	function cheсk_post($link, $var)
			{
				return mysqli_real_escape_string( $link,  $_POST[$var] );
			}
	
	if( isset($_POST["articleName"])
	 && isset($_POST["articleText"])
	 && $err_str == null )
		{
			$str1 = cheсk_post($link, 'articleName');
			$str2 = cheсk_post($link, 'articleText');
			
			$artName = htmlentities($str1, ENT_QUOTES, 'UTF-8');
			$artText = htmlentities($str2, ENT_QUOTES, 'UTF-8');
			
			if($successfulUppload == 1){
				
			$strSQL = "INSERT INTO `Articles` (`id_Podrazdel`, `Name`, `Author`, `Image_url`,`Text`, `Date`) VALUES( $idPodRazdel, '$artName', '$authorName', '$uploadfile', '$artText', Now() )";
			mysql_query($strSQL) or die (mysql_error());}
			
			else{
				if($successfulUppload == 2){
				$strSQL = "INSERT INTO `Articles` (`id_Podrazdel`, `Name`, `Author`, `Image_url`,`Text`, `Date`) VALUES( $idPodRazdel, '$artName', '$authorName', '', '$artText', Now() )";
				mysql_query($strSQL) or die (mysql_error());}
			}
	
		}

	header("Location: /manage-articles.php?id=$idPodRazdel");
?>