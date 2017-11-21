<?php

	require 'config.php';

	$id = filter_input(INPUT_POST, 'del_id', FILTER_VALIDATE_INT);

	if (isset($id)) { 

		$podrazdelId = filter_input(INPUT_POST, 'podrazdelId', FILTER_VALIDATE_INT);
		$delArt = mysql_query("DELETE FROM Articles WHERE id=$id");
		
		header("Location: /manage-articles.php?id=$podrazdelId");


	}
	?>