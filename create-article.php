<?php
	require 'config.php';
	
	$authorName = $_SESSION['fio'];
	$idPodRazdel = $_POST['id_Podrazdel'];
	
	
	$uploaddir = 'images/article_images/';
	$apend=date('YmdHis').rand(100,1000).'.jpg'; 
	$uploadfile = "$uploaddir$apend"; 
	
	if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size']<=1024000)) 
	{ 
	//  до 1 mb
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
		{ 
			/*$size = getimagesize($uploadfile); 
			if ($size[0] < 501 && $size[1]<1501) 
			{ 
			*/
				echo "Файл загружен. Путь к файлу: <b>http://souz/manage-articles.php/".$uploadfile."</b>"; /*
			}
			else {
				echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 500; высота не более 1500)"; 
				unlink($uploadfile); 
			} */
		} 
		else{
			echo "Файл не загружен, вернитеcь и попробуйте еще раз";
		} 
	} 
	else{ 
		echo "Размер файла не должен превышать 1 Мб";
	} 
	//var_dump($uploadfile);
	
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
				
			$strSQL = "INSERT INTO `Articles` (`id_Podrazdel`, `Name`, `Author`, `Image_url`,`Text`, `Date`) VALUES( $idPodRazdel, '$artName', '$authorName', '$uploadfile', '$artText', Now() )";
			mysql_query($strSQL) or die (mysql_error());
	
		}
//var_dump($artText);
	header("Location: http://souz/manage-articles.php?podrazId=$idPodRazdel");
?>