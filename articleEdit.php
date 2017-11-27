<?php
	require 'config.php';
	
	$authorName = $_SESSION['fio'];
	if (isset($_GET['podRazId'])){
			$idPodRazdel = $_GET['podRazId'];
		}
	if (isset($_GET['artID'])){
				$artId = $_GET['artID'];
			}
	
	
	$uploaddir = 'images/article_images/';
	$apend=date('YmdHis').rand(100,1000).'.jpg'; 
	$uploadfile = "$uploaddir$apend"; 
	$successfulUppload = 0;
	$previousImageUrl = $_GET[previousimageurl];
	
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
		
	if (isset($_POST["id_Podrazdel"]))
	{
		$id_Podrazdel = $_POST["id_Podrazdel"];
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
			
			$artName = htmlentities($str1, ENT_QUOTES);
			$artText = htmlentities($str2, ENT_QUOTES);
						
		}
		
	if($previousImageUrl =='' && $successfulUppload == 1) {
		
		$sql = mysql_query("UPDATE Articles SET	id_Podrazdel = '$id_Podrazdel', Name = '$artName', Author = '$authorName', Image_url = '$uploadfile', Text = '$artText', Date = Now() WHERE id = '$artId'")
					or die ("Error in query: $sql. ".mysql_error());	
	}
	else{
		if($previousImageUrl =='' && $successfulUppload == 2) {
		
			$sql = mysql_query("UPDATE Articles SET	id_Podrazdel = '$id_Podrazdel', Name = '$artName', Author = '$authorName', Image_url = '', Text = '$artText', Date = Now() WHERE id = '$artId'")
					or die ("Error in query: $sql. ".mysql_error());
		}
		else{
			if($previousImageUrl != '' && $successfulUppload == 2){
				$sql = mysql_query("UPDATE Articles SET	id_Podrazdel = '$id_Podrazdel', Name = '$artName', Author = '$authorName', Image_url = '$previousImageUrl', Text = '$artText', Date = Now() WHERE id = '$artId'")
					or die ("Error in query: $sql. ".mysql_error());
			}
			else{

				if($previousImageUrl != '' && $successfulUppload == 1) {
					$sql = mysql_query("UPDATE Articles SET	id_Podrazdel = '$id_Podrazdel', Name = '$artName', Author = '$authorName', Image_url = '$uploadfile', Text = '$artText', Date = Now() WHERE id = '$artId'")
						or die ("Error in query: $sql. ".mysql_error());
				}
				else
					echo"Ошибка";
				}
				
		}
	}	
	
	header("Location: /manage-articles.php?id=$id_Podrazdel");
	
?>