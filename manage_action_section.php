<?php require 'config.php';
if(isset($_POST['create']) AND (($_SESSION['userlevel']==1) || ($_SESSION['userlevel']==2))){
	$parent_id = DoctorString ($_POST['id']);
    $name = DoctorString ($_POST['name']);
    if ($name != "" && $parent_id!="") {
        $result = Add_Podrazdel ($link, $parent_id, $name);
    }
}
if(isset($_POST['change']) AND (($_SESSION['userlevel']==1) || ($_SESSION['userlevel']==2))){
    $name = DoctorString ($_POST['name']);
    $id = DoctorString ($_POST['id']);
	$parent_id = DoctorString ($_POST['P_id']);
    if ($name != "" && $parent_id!="") {
        $result = Change_Razdel ($link, $id, $parent_id, $name);
    }
}
header ("location: manage-sections.php");
exit;
?>


