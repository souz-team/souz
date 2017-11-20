<?php require 'config.php';
if ($_SESSION['userlevel']==1 || $_SESSION['userlevel']==2){
if(isset($_GET['id'])){
	$id = DoctorString ($_GET['id']);
    if ($id!="") {
        $result = Delete_Razdel ($link, $id);
    }
}
header ("location: manage-sections.php");
exit;}
else {
header ("location: index.php");
exit;
}
?>


