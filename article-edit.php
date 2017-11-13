<?php
require 'config.php';

$article_item = mysql_query ("SELECT Name, Author, Date FROM Articles WHERE id_Podrazdel = '$podrazdelId'");
while ($row = mysql_fetch_assoc($article_item )) {
	$artName = $row['Name'];
	$authorName = $row['Author'];
	$artDate = $row['Date'];
	}
	

?>



