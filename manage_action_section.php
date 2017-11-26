<?php require 'config.php';
if ($_SESSION['userlevel']==1 || $_SESSION['userlevel']==2)
{
	if(isset($_POST['create']) AND (($_SESSION['userlevel']==1) || ($_SESSION['userlevel']==2))){
		$selected_admin = $_POST['selected_admin'];
		$parent_id = DoctorString ($_POST['id']);
		$name = DoctorString ($_POST['name']);
		if ($name != "" && $parent_id!="") {
			$result = Add_Podrazdel ($link, $parent_id, $name);
		}
		$id = $result[1];
		$section_admin = set_section_admin($link, $id, $selected_admin);
		
		
	}
	elseif(isset($_POST['change']) AND (($_SESSION['userlevel']==1) || ($_SESSION['userlevel']==2))){
		$name = DoctorString ($_POST['name']);
		$id = DoctorString ($_POST['id']);
		$selected_admin = $_POST['selected_admin'];
		$parent_id = DoctorString ($_POST['P_id']);
		if ($name != "" && $parent_id!="") {
			$result = Change_Razdel ($link, $id, $parent_id, $name);
		}
		$section_admin = change_section_admin($link, $id, $selected_admin);
		
	}
	header ("location: manage-sections.php");
	exit;
}
else
{
	header ("location: index.php");
	exit;
}
?>


