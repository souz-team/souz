<?php
require 'config.php';

$imageDelete = $_GET['deleteImage'];


	if (isset($imageDelete)) { 
				$queryImageToDelete = mysql_query("SELECT Image_url FROM Articles WHERE id = '$imageDelete'");
				$row = mysql_fetch_assoc($queryImageToDelete);
				$previousImageUrl = $row['Image_url'];
				
				
		$sql = mysql_query ("UPDATE Articles SET	Image_url = REPLACE(Image_url, '$previousImageUrl', '')  WHERE id = '$imageDelete'")
					or die ("Error in query: $sql. ".mysql_error());
					
		if($previousImageUrl !=''){
			unlink($previousImageUrl); 
		}
	}
	header("Location: /article-edit.php?artId=$imageDelete");
?>