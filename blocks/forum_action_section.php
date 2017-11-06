<?php
if(isset($_GET['edit']) AND ($_SESSION['userlevel']==1)){
require_once '/action/get-section-by-id.php';





}




if(isset($_GET['delete']) AND ($_SESSION['userlevel']==1)){
	
	echo 'УДАЛИТЬ РАЗДЕЛ!';
	
	
}



?>