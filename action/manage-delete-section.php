<?php require '../config.php';
if ($_SESSION['userlevel']==1 || $_SESSION['userlevel']==2){
    
$id = filter_input(INPUT_POST, 'del_id', FILTER_VALIDATE_INT);
	if (isset($id) && Is_Razdel($link, $id) === true) { 
        $result = Delete_Razdel ($link, $id);
    }
    elseif (isset($id) && Is_Razdel($link, $id) === false) { 
        $result = Delete_Podrazdel ($link, $id);
    }
header ("location: ../manage-sections.php");
exit;}
else {
header ("location: /index.php");
exit;
}
