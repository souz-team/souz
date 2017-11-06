<?php
$data = $_GET['edit'];
$razdel = Show_Razdel($link, $data);
$section_name = $razdel[0]['name'];
$section_close = $razdel[0]['close'];
?>

