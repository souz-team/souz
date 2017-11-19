<?php require 'config.php';
if(isset($_POST['create']) AND (($_SESSION['userlevel']==1) || ($_SESSION['userlevel']==2))){
	$parent_id = DoctorString ($_POST['id']);
    $name = DoctorString ($_POST['name']);
    if ($name != "" && $parent_id!="") {
        $result = Add_Podrazdel ($link, $parent_id, $name);
    }
}
header ("location: manage-sections.php");
exit;
?>


