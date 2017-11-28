<?php

	$articles = Show_All_Articles($link, $auth_login);
	If(!empty($articles))
	{
		$articles = array_reverse($articles);
	}
	

?>