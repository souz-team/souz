<?php

if(empty($errors)){
	if($edit == 1){
		$data = htmlentities(mysql_real_escape_string($data), ENT_QUOTES, 'UTF-8');	
		$name = htmlentities(mysql_real_escape_string($name), ENT_QUOTES, 'UTF-8');	
		$edit_section = update_section($link, $data, $name, $close);
		if($edit_section) $errors[] = 'Раздел изменен!';
	}
}
$razdel = Show_Razdel($link, $data);

$section_name = $razdel[0]['name'];
$section_close = $razdel[0]['close'];
if($section_close==1){
	$checked = "checked";
}
else {
	$checked = NULL;
	
	
	
}
?>

