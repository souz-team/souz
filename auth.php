<?php
require 'config.php';
$wwwlink=$_SERVER['HTTP_REFERER'];
$data=$_POST;
if( isset($data['do_login']))
	{
		$_SESSION['count']=0;
		$count = $_SESSION['count'];
		$link = mysqli_connect($host, $login, $pswrd, $db_name) or die("Ошибка " . mysqli_error($link)); 
		$loginuser = htmlentities(mysqli_real_escape_string($link, $data['login']), ENT_QUOTES, 'UTF-8');
		$password = md5($data['password']);
		$checkpassword=mysqli_query($link, "SELECT * FROM Users WHERE pass='$password' AND login='$loginuser'")or die("Ошибка " . mysqli_error($link));	
		$results=mysqli_num_rows($checkpassword);
			

		if($results!=0)
		{
			$username=mysqli_query($link, "SELECT * FROM Users WHERE login='$loginuser'")or die("Ошибка " . mysqli_error($link));
			
			if($username) 
			{
				$row = mysqli_fetch_row($username);
				$user_id = $row[0];
				$login = $row[1];
				$email = $row[3];
				$name = $row[4];
				$surname = $row[5];
				$userlevel=$row[6];
				$gender = $row[8];
/* 				$level= mysqli_query($link, "SELECT * FROM `SOUZ`.`users_level` WHERE `level` = '$userlevel'") or die("Ошибка " . mysqli_error($link));
				if($level)
				{
					$rowlevel = mysqli_fetch_array($level);
					$userlevelname=$rowlevel['name'];
				} */
				$_SESSION['user_id'] = $user_id;
				$_SESSION['login'] = $login;
				$_SESSION['email'] = $email;
				$_SESSION['fio']=$name." ".$surname;
				$_SESSION['userlevel']=$userlevel;
				$_SESSION['gender'] = $gender;
				//$_SESSION['userlevelname']=$userlevelname;
			}
			
			
			
			$_SESSION['auch']=1;
			unset($_SESSION['count']);
			mysqli_close($link);
			header('Location:'.$wwwlink.'');
		}
		else 
		{
			$count++;
			$_SESSION['auch']=2;
			$_SESSION['count']=$count;
			mysqli_close($link);
			header('Location:'.$wwwlink.'');
		}
	}
?>