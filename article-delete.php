<?php

	require 'config.php';

	$id = filter_input(INPUT_POST, 'del_id', FILTER_VALIDATE_INT);

	if (isset($id)) { 

		$podrazdelId = filter_input(INPUT_POST, 'podrazdelId', FILTER_VALIDATE_INT);
		$queryImageToDelete = mysql_query("SELECT Image_url FROM Articles WHERE id = '$id'");
		$row = mysql_fetch_assoc($queryImageToDelete);
		$previousImageUrl = $row['Image_url'];
		$delArt = mysql_query("DELETE FROM Articles WHERE id=$id");
		if($previousImageUrl !=''){
			unlink($previousImageUrl); 
		}
		
		
		header("Location: /manage-articles.php?id=$podrazdelId");

	}
	?>