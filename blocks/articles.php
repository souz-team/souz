
<div class='section-1__articles'>

	<?php

		require_once './config.php';

		//задаем количество символов в статье на главной
		$maxLengthText = 260;

		$articles = Show_Last($link);

		foreach ($articles as $article) {

			// Разбиваем статью по переменным
			$fullText = $article["Text"];
			$lengthText = mb_strlen($fullText, 'utf-8'); 
			$text = Cut($fullText, $maxLengthText);

			//условие добавления многоточия в конце текста
			if($lengthText > $maxLengthText) {
				$text = "$text...";
			}

			$acrtcleId = $article['id'];
			$authorName = $article['Author'];
			$authorDate = $article['Date'];
			$title = $article['Name'];

			// подключаем файл статьи
			include './parts/article-preview.php';

		}

	?>

</div>