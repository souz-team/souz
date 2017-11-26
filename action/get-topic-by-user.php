<?php

	$topics = Show_Topic($link, NULL, NULL, $email);
	If(!empty($topics))
	{
		$topics = array_reverse($topics);
	}
	

?>