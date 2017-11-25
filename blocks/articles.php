
<div class='section-1__articles'>

	<?php

		require_once 'config.php';
		
		//задаем количество символов в статье на главной
		$maxLengthText = 260;

		$articles = Show_Last($link);
		$iMaxWidth = 315;
		$iMaxHeight = 230;
		$strFileThumb = '';
		
		
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
			$articleImage = $article['Image_url'];
			$authorDate = $article['Date'];
			$title = $article['Name'];
			
					
			// подключаем файл статьи
			include './parts/article-preview.php';

		
			if($articleImage !=''){
				$objImageData = AdjustPicture( $articleImage, $iMaxWidth, $iMaxHeight, '' );
				var_dump($objImageData);
			}
		}	
		
		// Функция подгонки размера изображения
		function AdjustPicture( $articleImage, $iMaxWidth, $iMaxHeight, $strFileThumb )
		{
			$iWidth  = ($iMaxWidth  > 10 && $iMaxWidth  < 5000)?$iMaxWidth:5000;
			$iHeight = ($iMaxHeight > 10 && $iMaxHeight < 5000)?$iMaxHeight:5000;
			
			// Получаем характеристики изображения
				list($x, $y, $t, $attr) = getimagesize($articleImage);
				
				// Загружаем изображение в память
				switch( $t )
				{
					case IMAGETYPE_JPEG: $imgSource=imagecreatefromjpeg($articleImage); break;
					case IMAGETYPE_GIF : $imgSource=imagecreatefromgif ($articleImage); break;
					case IMAGETYPE_PNG : $imgSource=imagecreatefrompng ($articleImage); break;
					default: return null;
				}
				
				// Подгоняем размеры
				if( $iWidth > $x )
				{
					$iWidth = $x;
				}
				if( $iHeight > $y )
				{
					$iHeight = $y;
				}
				if($iWidth < $x || $iHeight < $y)
				{
					$dCoefCurrent = $x / $y;
					$dCoefEtalon = $iWidth / $iHeight;
					if( $dCoefEtalon > $dCoefCurrent )
					{
						$ys=$iHeight;
						$xs=$iHeight * $dCoefCurrent;
					}
					else
					{
						$xs=$iWidth;
						$ys=$iWidth / $dCoefCurrent;
					}
					// Если где-то перебор, корректируем
					if($xs<1)$yx=1;
					if($ys<1)$ys=1;
					$xs = intval( $xs );
					$ys = intval( $ys );
					
					// Создаем результирующую картинку
					$imgResult=imagecreatetruecolor($xs,$ys);
					imagecopyresampled($imgResult,$imgSource,0,0,0,0,$xs,$ys,$x,$y);
					$bResult = false;
					if( $strFileThumb == '' )
					{
						switch( $t )
						{
							case IMAGETYPE_JPEG: $bResult = imagejpeg($imgResult,$articleImage,100); break;
							case IMAGETYPE_GIF : $bResult = imagegif($imgResult,$articleImage); break;
							case IMAGETYPE_PNG : $bResult = imagepng($imgResult,$articleImage); break;
							default: return null;
						}
					}
					else
					{
						$bResult = imagejpeg($imgResult,$strFileThumb,100);
					}
					if( !$bResult )
					{
						return null;
					}
					$x = $xs;
					$y = $ys;
					
					// Очищаем память
					imagedestroy($imgSource);
					imagedestroy($imgResult);
				}
				
				// Возвращаем информацию о картинке
				$objImageData = new stdClass();
				$objImageData->width = $x;
				$objImageData->height = $y;
				return $objImageData;
								
		}

			

	?>

</div>