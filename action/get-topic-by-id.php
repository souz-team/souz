<?php

if(empty($errors)){
	if($edit == 1){
			//function update_topic ($connection, $id_topic, $id_section, $topic, $subject)
		$topic_msg = htmlentities(mysql_real_escape_string($topic_msg), ENT_QUOTES, 'UTF-8');
		$topic_subject = htmlentities(mysql_real_escape_string($topic_subject), ENT_QUOTES, 'UTF-8');	
			
		$edit_topic = update_topic($link, $id_topic, $section_id, $topic_msg, $topic_subject);
		if($edit_topic){
			$errors[] = 'Тема изменена!';
		}
	}
}
$topic = Show_Topic($link, NULL, $id_topic, NULL);
$topic_msg = $topic[0]['topic'];
$topic_subject = $topic[0]['subject'];
$topic_section_id = $topic[0]['id_section'];
$razdel = Show_Razdel($link, $topic_section_id);
$topic_section_name = $razdel[0]['name'];
$all_razdel = Show_Razdel($link, NULL);
$count_razdel = count($all_razdel);
?>
