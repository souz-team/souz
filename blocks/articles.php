
<div class='section-1__articles'>

	<?php
		require_once './config.php';
		//require_once './func/db.php';
		//dirname(_FILE_)."/connect.php";
		/*
		$host = "localhost";
		$db_name = "SOUZ";
		$login = "root";
		$pswrd = "2901";
		$connect = mysql_connect ("$host", "$login", "$pswrd");
		mysql_set_charset("utf8");

		if (!$connect) {
		echo "dont work";
		exit (mysql_error ()); 
		}
		else {
		mysql_select_db ("$db_name", $connect);

		}*/
		$maxlength=260;//задаем количество символов в статье на главной
		mysql_query("SET NAMES 'UTF-8'"); 

          $result = Show_Last($link);

		for ($i=0; $i < count($result); $i++) {
				$text=$result[$i]["Text"]; //присваиваем значение ячейки массива переменной
				$len=mb_strlen($text, 'utf-8'); 
				$temptext = Cut($text, $maxlength);
				if($len>$maxlength){ //условие добавления многоточия в конце текста
					$temptext=$temptext."...";	
                    //$text=$text."...";	
				}
           
				echo "
				<div class='section-1__article'>
					<article class='article'>
						<div class='article__image-wrap'>
							<img class='article__image' src='images/315x230.png' alt='' role='presentation'/>
						</div>
						<div class='article__content-wrap'>
							<div class='article__content'>
								<p class='article__title'>".$result[$i]['Name']."</p>
								<p class='article__text'>".$temptext."</p>   
							</div>
							<div class='article__content-bottom'>
								<div class='article__button'>
									<a href='article.php?id={$result[$i]['id']}".$result[$i][0]."'>
										<button class='button button_article'>ПОДРОБНЕЕ</button>
									</a>
								</div>
								<div class='article__author'>
									<p>Автор: <span class='article__author-name'>".$result[$i]['Author']."</span></p>
									<p class='article__author-name'>".$result[$i]['Date']."</p>
								</div>
							</div>
						</div>
					</article>
				</div>
			";
		}
	?>
</div>