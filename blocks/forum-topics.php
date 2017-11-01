<?php 
	require_once 'config.php';
	$id = $_GET['id'];					
	if(isset($_SESSION['login'])){
	echo "	

		<div class='article__button article__button_new'>
				<a href='../blocks/forum_topic_start.php?id={$id}'>
				
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
			</div>
		</div>
		<div class="forum-table__body">
			<?php
			$theme = mysqli_query($link, "SELECT * FROM boardt WHERE id_section='$id'");
			while ($row_t = mysqli_fetch_array ($theme)) {
				$theme_id = $row_t['theme_id'];	
				$date =  mysqli_query ($link, "SELECT MAX(m_date) FROM boardp WHERE theme_id='$theme_id'");
				$row_date = mysqli_fetch_array($date);
				$date_post = $row_date[0];
				
				echo '	<a class="forum-table__row forum-table__row_body" href="./topic-view.php?id='.$row_t[theme_id].'">
						<div class="forum-table__cell forum-table__cell_sections">'.$row_t[subject].'</div>
						<div class="forum-table__cell forum-table__cell_topics">
						'.$row_t[author].'</div>
						<div class="forum-table__cell forum-table__cell_topics">
						'.$row_t[create_date].'
						</div>
						<div class="forum-table__cell forum-table__cell_topics">
						'.$date_post.'
						</div>
						<!-- <div class="forum-table__cell forum-table__cell_messages">500</div> -->
					</a>
								';
			} 
//<a href='/blocks/forum_topic_start.php'>
			?>
		</div>
	</div>
</div>