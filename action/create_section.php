<?php
	$errors=array();//массив сообшений ошибок
	if(empty($data['section_name'])) //проверка на пустое значение поля ввода
	{
		$errors[] = 'Введите название раздела!';
	}
	
	if(isset($data['section_closed']) AND $data['section_closed']==1)//проверка на включенный chekbox
	{
		$section_closed= 1;
	}
	else {
		$section_closed= 0;
	}
	$section_name = htmlentities(mysql_real_escape_string($data['section_name']), ENT_QUOTES, 'UTF-8');

	
	if(empty($errors)){
		$section_create = create_section($link, $section_name, $section_closed);
		if ($section_create)
			{
				$errors[] = 'Раздел добавлен!';
			}
			else
			{
				$errors[] = 'Раздел не добавлен!';
			}

	}


?>