<?php
	require 'config.php'; 
	require_once 'blocks/header.php';
	$id = $_GET['id'];
	$id_topic=$id;
	if(!$id)
	{
		$id_topic = $_SESSION['idview'];
	}
	else
	{
		$_SESSION['idview'] = $id;
	}
	$data = $_POST;
	$auth_login = $_SESSION['login'];
	$auth_email = $_SESSION['email'];
	$auth_fio = $_SESSION['fio'];
	$date = date("Y-m-d");

	$topic_start = mysqli_query($link, "SELECT * FROM boardt WHERE theme_id='$id_topic'");
	
	//$post = mysqli_query($link, "SELECT * FROM boardt WHERE theme_id='$id'");
	$row_topic = mysqli_fetch_array($topic_start);
	$topic_id = $row_topic['theme_id'];
	$topic_author = $row_topic['author'];
	$reg_info_topic = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM Users WHERE login='$topic_author'"));
	//$author_info_topic = mysqli_query($link, "SELECT * FROM boardt WHERE author='$topic_author'");
	//$num_rows_author_topic = mysqli_num_rows($author_info_topic);
	
	$posts = mysqli_query($link, "SELECT * FROM boardp WHERE theme_id='$topic_id'");
	//$author_info_post = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM boardp WHERE login='$topic_author'"));
	//$num_rows_author_topic = mysqli_num_rows($author_info_topic);
	
	
	$num_rows_post = mysqli_num_rows($posts);
	//$reg_info_post = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM Users WHERE login='$topic_author'"));
	//$row_posts = mysqli_fetch_array($posts);
	
	echo '<section class="section section_forum">
	<div class="section__wrap">
		<div class="view-topic">
			<div class="view-topic__wrap">
				<div class="topic_author">
					<div class="author-name">Написал: 
					'.$row_topic[author].'
					</div>
					<div class="author-inf">
						<p class="value-message">Сообщений:<br>  12</p>
						<p class="date">Дата регистрации:<br>'.$reg_info_topic[reg_date].'</p>
					</div>
				</div>
				<div class="topic__content">
					<div class="topic-title">
						'.$row_topic[subject].'
					</div>
					<div class="message-wrap">
						<div class="topic-body">
						'.$row_topic[topic].'
						</div>
						<div class="topic-inf">
							<p class="date">Дата создания: '.$row_topic[create_date].'</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>';
		echo '<div class="answers">
			Всего ответов: ['.$num_rows_post.']
		</div>';
		
	/*код вывода ответов по теме по 10 штук*/
	
	$per_page=4;																		//переменная, задающая количество ячеек выводимых на странице
	if (isset($_GET['page'])) $page=($_GET['page']-1); else $page=0;					//вычисляем номер страницы
	$start=abs($page*$per_page);														//вычисляем значение переменной, с которой начнется считывание с бд
	$sql = "SELECT * FROM boardp WHERE theme_id ='$topic_id' LIMIT $start,$per_page";	//забираем значения с бд	
	$res = mysqli_query($link, $sql);													//отправляем запрос
	while ($row_posts = mysqli_fetch_array($res)) {										//обрабатываем данные
	$post_author = $row_posts['login'];		
	$sql1 = "SELECT * FROM Users WHERE login='$post_author'";	
	$res1 = mysqli_query($link, $sql1);
	$reg_info_post = mysqli_fetch_assoc($res1);
	++$start;
	echo 		'
	<div class="section-message">
		<div class="topic_author">
			<div class="author-name">Автор:
				'.$row_posts[login].'
			</div>
			<div class="author-inf">
				<p class="value-message">Сообщений: <br> 1 000 123</p>
				<p class="date">Дата регистрации:<br>'.$reg_info_post[reg_date].'</p>
			</div>
		</div>
		<div class="topic__content">
			<div class="message-wrap">
				<div class="topic-body">
					'.$row_posts[comment].'
				</div>
				<div class="topic-inf">
					<p class="date">Дата: '.$row_posts[m_date].'</p>
				</div>
				
			</div>
		</div>
	</div>';
}

	/*небольшой код вывода номеров страничек*/

	$q="SELECT count(*) FROM boardp WHERE theme_id ='$topic_id'";   					//считаем сколько у нас записей, 
	$res=mysql_query($q);																//которые нужно 
	$row=mysql_fetch_row($res);															//разбить по страницам.
	$total_rows=$row[0];																//высчитываем сколько
	$num_pages=ceil($total_rows/$per_page);												// получится страниц,
	echo "<div class='pagination'>";
	for($i=1;$i<=$num_pages;$i++) {														//циклично выводим
	  if ($i-1 == $page) {																
		echo $i." ";
	  } else {
		echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.' ">['.$i."]</a> ";	//страницы как гиперссылки
	  }
	}
	echo "</div>";
	
	
	$comment = htmlentities(mysqli_real_escape_string($link, $data['comment']), ENT_QUOTES, 'UTF-8');
	if( isset($data['write']))
	{
		$errors=array();//массив сообшений ошибок
		if($data['comment']=='') //проверка на пустое значение поля ввода логина
		{
			$errors[] = 'Сообщение не должно быть пустым!';
		}
		
		if(empty($errors)){
			$query = "INSERT INTO `boardp`(`post_id`, `theme_id`, `login`, `comment`, `email`, `m_date`) VALUES (NULL, '$id_topic' ,'$auth_login','$comment','$auth_email','$date')";
			//$query ="INSERT INTO boardt SET subject = '$subject', topic = '$topic', author = '$login', create_date = '$date'";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

			if($result)
			{
				mysqli_close($link);
				header('Refresh: 0; URL=/topic-view.php?id='.$id_topic.''); //задержка 2 секунды перед перенаправлением на главную страницу
				//echo '<div class="section-corfim__wrap">Информация добавлена в БД</div>';
				exit;
			}
		}
			else
		{
			echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
		} 
		

	}
	
	if(isset($_SESSION['login'])){
		
	
				echo '
				
				<form action="../blocks/new_comment.php" method="POST">
				<input name="id_topic" type="hidden" value='.$id_topic.'/>
				<div class="section-message section-message_new-message">
					<div class="section-message__content">
						<p class="message-title">Ваше сообщение</p>
						<textarea id="editor1" name="comment" cols="132" rows="7"></textarea>';
							  /*<script type="text/javascript">
								 var ckeditor1 = CKEDITOR.replace( 'editor1' );
								 AjexFileManager.init({returnTo: 'ckeditor', editor: ckeditor1});
								</script><!-- <textarea class="message-textfield" placeholder="Ваше сообщение..."></textarea> -->*/
					echo '</div>
					<div class="section-message__wrap-button">
						<button class="button button_form-auth" type="submit" name="write">
							Написать
						</button>
					</div>
				</div>
				</form>';
				}
			echo '
			</div>
		</section>';?>
		
		<?php require_once 'blocks/footer.php'; ?>