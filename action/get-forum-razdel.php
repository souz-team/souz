<?php
$id = $_GET['id'];
			//require_once 'config.php';
			$section = Show_Razdel($link); // Находим все разделы
			$tempo = array();
            for ($i=0; $i<count($section); $i++)
		    {
					$section_id = $section[$i]['section_id'];
				//Определение названия раздела
					$theme = Show_Topic ($link, $section_id); 
				//Подсчет количества тем в разделе
					$num_rows_theme = Topic_Amount($link, $section_id);
                    $num_rows_post = 0;
                    $tempdate = '0000-00-00';
                    for ($j=0; $j<count($theme); $j++) {
                       
                        $theme_id = $theme[$j]['theme_id'];
			//Подсчет количества сообщений в разделе
                        $num_rows_post += Post_Amount($link, $theme_id);
			//Определение даты последнего сообщения
                        $date =  Last_Date($link, $theme_id);
                        $date_post = $date[0]; // Вернуть строку с датой последнего сообщения
                        if ($date)
                        {
                            $maxdate = max($date_post, $tempdate);
                            $tempdate = $maxdate;
                            if ($maxdate == '0000-00-00') $maxdate = NULL;
                        }
                    }
?>