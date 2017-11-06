<?php 
	require_once 'config.php';?>
						
	<?php if(isset($_SESSION['login']) AND ($_SESSION['userlevel']==1)){?>

		<div class='article__button article__button_new'>
			<a href='/forum-new-section.php'>
			<button class='button button_article'>Создать раздел</button>
			</a>
		</div>

	<?php } ?>

<div class="section-forum">
	<div class="forum-table">
		<div class="forum-table__header">
			<div class="forum-table__row forum-table__row_header">
				<div class="forum-table__cell forum-table__cell_sections">Раздел</div>
				<div class="forum-table__cell forum-table__cell_topics">Количество тем</div>
				<div class="forum-table__cell forum-table__cell_topics">Количество сообщений</div>
				<div class="forum-table__cell forum-table__cell_messages">Дата последнего сообщения</div>
				<?php if($_SESSION['userlevel']==1){ ?>
					<div class="forum-table__cell forum-table__cell_messages">Действия</div>
				<? } ?>
			</div>
		</div>
		<div class="forum-table__body">
			<?php 
			$id = $_GET['id'];
			//require_once 'config.php';
			$section = Show_Razdel($link, NULL); // Находим все разделы
			$tempo = array();
          
            for ($i=0; $i<count($section); $i++)
		    {
					$section_id = $section[$i]['section_id'];
				//Определение названия раздела
					$theme = Show_Topic ($link, $section_id); 
				//Подсчет количества тем в разделе
					$num_rows_theme = Topic_Amount($link, $section_id);
                    $num_rows_post = 0;
                    
					$tempdate = NULL;
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
                           // if ($maxdate == '0000-00-00') $maxdate = NULL;
                        }
						else 
						{
							$maxdate = NULL;
						}
                    }
				
				if ($section[$i]['close']!=1)
				{
					
				echo '	<div class="forum-table__row forum-table__row_body">
						<div class="forum-table__cell forum-table__cell_sections"><a  href="forum-topic.php?id='.$section[$i]['section_id'].'"><img src="/images/razdel.png" width = "15" height = "15"> '.$section[$i]['name'].'</a></div>
						<div class="forum-table__cell forum-table__cell_topics">'.$num_rows_theme.'</div>
						<div class="forum-table__cell forum-table__cell_topics">'.$num_rows_post.'</div>
						<div class="forum-table__cell forum-table__cell_messages">'.$maxdate.'</div>
					
					';
						
					if(!($_SESSION['userlevel']==1))
					{
						echo '</div>';
					}
					else{	
						echo '
						<div class="forum-table__cell forum-table__cell_messages">
							<a  href="/forum-action-section.php?edit='.$section[$i]['section_id'].'"><img src="/images/edit.png" width = "20" height = "20"></a>&nbsp;&nbsp;&nbsp;&nbsp;
							<a  href="/forum-action-section.php?delete='.$section[$i]['section_id'].'"><img src="/images/delete.png" width = "20" height = "20"></a>
						</div>
						</div>
						';
					}
				}
				elseif(($section[$i]['close']==1) and ($_SESSION['userlevel']==1))
				{
					echo '	<div class="forum-table__row forum-table__row_body">
						<div class="forum-table__cell forum-table__cell_sections"><a  href="forum-topic.php?id='.$section[$i]['section_id'].'"><img src="/images/lock.png" width = "15" height = "15">  '.$section[$i]['name'].'</a></div>
						<div class="forum-table__cell forum-table__cell_topics">'.$num_rows_theme.'</div>
						<div class="forum-table__cell forum-table__cell_topics">'.$num_rows_post.'</div>
						<div class="forum-table__cell forum-table__cell_messages">'.$maxdate.'</div>
							
						
					<div class="forum-table__cell forum-table__cell_messages">
						<a  href="/forum-action-section.php?edit='.$section[$i]['section_id'].'"><img src="/images/edit.png" width = "20" height = "20"></a>&nbsp;&nbsp;&nbsp;&nbsp;
						<a  href="/forum-action-section.php?delete='.$section[$i]['section_id'].'"><img src="/images/delete.png" width = "20" height = "20"></a>
					</div>
					</div>
					';
				}
			}
			?>
		</div>
	</div>
</div>