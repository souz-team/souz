<?php
	require 'config.php';
	
	$authorName = $_SESSION['fio'];
	if (isset($_GET['podRazId'])){
			$idPodRazdel = $_GET['podRazId'];
		}
	if (isset($_GET['artID'])){
				$artId = $_GET['artID'];
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
		$id_Podrazdel1 = $_POST["id_Podrazdel"];
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
			//var_dump($idPodRazdel);	
				
				
		}
	$sql = mysql_query("UPDATE Articles SET	id_Podrazdel = '$id_Podrazdel1', Name = '$artName', Author = '$authorName', Text = '$artText', Date = Now() WHERE id = '$artId'")
					or die ("Error in query: $sql. ".mysql_error());	

	header("Location: http://souz/manage-articles.php?podrazId=$idPodRazdel");
	
?>