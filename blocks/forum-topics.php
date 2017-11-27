<?php 
	require_once 'config.php';
	$id = $_GET['id'];					
	if(isset($_SESSION['login'])){
	echo "	

		<div class='article__button article__button_new'>
				<a href='/forum-new-topic.php?id={$id}'>
				
					<button class='button button_article'>Создать тему</button>
				</a>
			</div>";
	}
?>
<div class="section-forum">
	<div class="forum-table">
		<div class="forum-table__header">
			<div class="forum-table__row forum-table__row_header">
				<div class="forum-table__cell forum-table__cell_sections">Название темы:</div>
				
				<div class="forum-table__cell forum-table__cell_topics">Автор темы:</div>
				<div class="forum-table__cell forum-table__cell_messages">Дата создания темы:</div>
				<div class="forum-table__cell forum-table__cell_messages">Дата последнего сообщения:</div>
				<?php if(!($_SESSION['userlevel']==1)): ?>
				
				<?php else: ?>
					<div class="forum-table__cell forum-table__cell_messages">Действия</div>
				<?php endif ?>
			</div>
		</div>
		
		<?php 
			
		?>
		
		<div class="forum-table__body">
			<?php
			$per_page = 10;
			if (isset($_GET['page'])) {
				$page = $_GET['page'] -1;
			} else {
				$page = 0;
			}
			$start = abs($page*$per_page);	
			
			$theme = mysqli_query($link, "SELECT * FROM boardt WHERE id_section='$id' LIMIT $start, $per_page");
			while ($row_t = mysqli_fetch_array ($theme)) {
				$theme_id = $row_t['theme_id'];	
				$date =  mysqli_query ($link, "SELECT MAX(m_date) FROM boardp WHERE theme_id='$theme_id'");
				$row_date = mysqli_fetch_array($date);
				$date_post = $row_date[0];
				
				$q = "SELECT count(*) as count FROM boardp WHERE theme_id='$row_t[theme_id]'"; //считаем сколько у нас записей,
				$res = mysql_query($q); 	//которые нужно 
				$row = mysql_fetch_assoc($res); //разбить по страницам.
				$total_rows = $row['count']; //высчитываем сколько
				$num_pages = ceil($total_rows/$per_page); // получится страниц
				
				echo '	<div class="forum-table__row forum-table__row_body">
						<div class="forum-table__cell forum-table__cell_sections"><a href="./topic-view.php?id='.$row_t[theme_id].'&page='.$num_pages.'"><img src="/images/folder_yellow.png" width = "15" height = "15"> '.$row_t[subject].'</a></div>
						<div class="forum-table__cell forum-table__cell_topics">'.$row_t[author].'</div>
						<div class="forum-table__cell forum-table__cell_topics">'.$row_t[create_date].'</div>
						<div class="forum-table__cell forum-table__cell_topics">'.$date_post.'</div>
					
					';
					if(!($_SESSION['userlevel']==1))
					{
						echo '</div>';
					}
					else{	
						echo '
						<div class="forum-table__cell forum-table__cell_messages">
							<a  href="/forum-action-topic.php?edit='.$row_t[theme_id].'"><img src="/images/edit.png" width = "20" height = "20"></a>
						</div>
						</div>
						';
					}
			}
			$q = "SELECT count(*) as count FROM boardt WHERE id_section='$id'"; //считаем сколько у нас записей,
			$res = mysql_query($q); 	//которые нужно 
			$row = mysql_fetch_assoc($res); //разбить по страницам.
			$total_rows = $row['count']; //высчитываем сколько
			$num_pages = ceil($total_rows/$per_page); // получится страниц
//<a href='/blocks/forum_topic_start.php'>
			?>
		</div>
	</div>
</div>