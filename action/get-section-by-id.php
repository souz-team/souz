<?php

if(empty($errors)){
	if($edit == 1){
		
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

