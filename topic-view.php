<?php
	require_once 'config.php';
	$id_topic = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

	/*if (!$id_topic) {
		header('Location: /');
		die();
	}*/

	/*if (!$id_topic) {
		$id_topic = $_SESSION['idview'];
	} else {
		$_SESSION['idview'] = $id_topic;
	}*/

	$data = $_POST;
	//$auth_login = $_SESSION['login'];
	//$auth_email = $_SESSION['email'];
	//$auth_fio = $_SESSION['fio'];
	$date = date("Y-m-d H:i:s");

	$topic_start = mysqli_query($link, "SELECT * FROM boardt WHERE theme_id=$id_topic") or die("Ошибка " . mysqli_error($link));
	
	//$post = mysqli_query($link, "SELECT * FROM boardt WHERE theme_id='$id'");
	$row_topic = mysqli_fetch_array($topic_start);
	
		if(empty($row_topic)){
			
		header('Location: /errors/404.htm');
		die();		
	}
	if ($_SESSION['userlevel']!=1 AND $row_topic['id_section']==4)
		{
			header('Location: /');
			exit;
		}
	$topic_id = $row_topic['theme_id'];
	$topic_author = $row_topic['author'];
	$reg_info_topic = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM Users WHERE login='$topic_author'"));
	//$author_info_topic = mysqli_query($link, "SELECT * FROM boardt WHERE author='$topic_author'");
	//$num_rows_author_topic = mysqli_num_rows($author_info_topic);
	
	$posts = mysqli_query($link, "SELECT * FROM boardp WHERE theme_id='$topic_id'");
	//$author_info_post = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM boardp WHERE login='$topic_author'"));
	//$num_rows_author_topic = mysqli_num_rows($author_info_topic);
	
	
	$num_rows_post = mysqli_num_rows($posts);
	$reg_info_post = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM Users WHERE login='$topic_author'"));
	//$row_posts = mysqli_fetch_array($posts);
	
	$num_author_message = countAuthorMess($link, $row_topic['author']);
	//echo $num_author_message;

?>
<?php require_once 'blocks/header.php';?>
<section class="section section_forum section_content">
	<div class="section__wrap">
		<div class="view-topic">
			<div class="view-topic__wrap">
				<div class="topic_author">
					<p class="author-name" title='<?php echo "Email: ".$row_topic['email']?>'> Написал: <?= $row_topic['author'] ?></p>
					<div class="author-inf">
						<p class="value-message">Сообщений: <?= $num_author_message ?></p>
						<?php if(isset($reg_info_post['reg_date'])){ ?>
							 <p class="date">Дата регистрации: <?= $reg_info_topic['reg_date'] ?></p>
						<?php } else {?>
							<p class="date"></p>
						<?php } ?>
					</div>
				</div>
				<div class="topic__content">
					<p class="topic-title"><?= $row_topic['subject'] ?></p>
					<div class="message-wrap">
						<p class="topic-body"><?= $row_topic['topic'] ?></p>
						<div class="topic-inf">
							<p class="date">Дата создания: <?= $row_topic['create_date'] ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="answers">
			Всего ответов: [<?= $num_rows_post ?>]
		</div>

		<?php
			//переменная, задающая количество сообщений, выводимых на странице
			$per_page = 10;

			//вычисляем номер страницы
			if (isset($_GET['page'])) {
				$page = ($_GET['page']-1);
			} else {
				$page = 0;
			}

			//вычисляем значение переменной, с которой начнется считывание с бд
			$start = abs($page*$per_page);

			//забираем значения с бд
			$sql = "SELECT * FROM boardp WHERE theme_id='$topic_id' LIMIT $start, $per_page";

			$res = mysqli_query($link, $sql);	//отправляем запрос

			while ($row_posts = mysqli_fetch_array($res)) {
				$post_author = $row_posts['login'];
				$sql1 = "SELECT * FROM Users WHERE login='$post_author'";
				$res1 = mysqli_query($link, $sql1);
				$reg_info_post = mysqli_fetch_assoc($res1);
				++$start;
				$num_author_message = countAuthorMess($link, $post_author);
				include './blocks/topic-view-message.php';
			}
			/*небольшой код вывода номеров страничек*/
			$q = "SELECT count(*) as count FROM boardp WHERE theme_id='$topic_id'"; //считаем сколько у нас записей,
			$res = mysql_query($q); 	//которые нужно 
			$row = mysql_fetch_assoc($res); //разбить по страницам.
			$total_rows = $row['count']; //высчитываем сколько
			$num_pages = ceil($total_rows/$per_page); // получится страниц
		?>

		<?php if($num_pages > 1){?>
		<div class="section__pagination">
			<div class='pagination'>

				<div class="pagination__content">
					<span class="pagination__arrow pagination__arrow_prev pagination__item"><a href='<?= $_SERVER['PHP_SELF'] ?>?id=<?= $id_topic ?>&page=<?= ($page < 2 ? 1 : $page) ?>' class='pagination__link'>&#10094;</a></span>

					<ul class="pagination__pages">
						<?php for($i=1; $i<=$num_pages; $i++) { ?>
							<li class="pagination__item <?= $i-1 == $page ? 'pagination__item_current' : '' ?>">
								<a href='<?= $_SERVER['PHP_SELF'] . "?id=$id_topic&page=$i" ?>' class='pagination__link'><?= $i ?></a>
							</li>
						<?php } ?>
					</ul>

					<span class="pagination__arrow pagination__arrow_prev pagination__item"><a href='<?= $_SERVER['PHP_SELF'] ?>?id=<?= $id_topic ?>&page=<?= ($page+1 >= $num_pages ? $num_pages : $page+2) ?>' class='pagination__link'>&#10095;</a></span>
				</div>

			</div>
		</div>

		<br>
		<?}?>
		<?php

/* 			$comment = htmlentities(mysqli_real_escape_string($link, $data['comment']), ENT_QUOTES, 'UTF-8');

			if (isset($data['write'])) {

				$errors = array(); //массив сообшений ошибок

				//проверка на пустое значение поля ввода логина
				if (empty($data['comment'])) {
					$errors[] = 'Сообщение не должно быть пустым!';
				}
				
				if (empty($errors)) {

					$query = "INSERT INTO boardp (post_id, theme_id, login, comment, email, m_date)
										VALUES (NULL, $id_topic, '$auth_login', '$comment','$auth_email','$date')";

					$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

					if($result) {
						mysqli_close($link);
						if(!empty($page)){
							header("Refresh: 0; URL=/topic-view.php?id='$id_topic'&page='$page'"); 	
						}
						else {
							header("Refresh: 0; URL=/topic-view.php?id=$id_topic");
						}
						exit;
					}

				}	else {
					echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
				}
			} */
		?>
		<?php if(isset($_SESSION['login'])) { ?>
			<form action="./blocks/new_comment.php" method="POST">
				<input name="id_topic" type="hidden" value='<?= $id_topic ?>'>
				<input name="page" type="hidden" value='<?= $page ?>'>
				<div class="section-message section-message_new-message">
					<div class="section-message__content">
						<p class="message-title">Ваше сообщение</p>
						<textarea id="editor1" name="comment" cols="132" rows="7"></textarea>
					</div>
					<div class="section-message__wrap-button">
						<button class="button button_form-auth" type="submit" name="write">Написать</button>
					</div>
				</div>
			</form>
		<?php } ?>
	</div>
</section>
<?php require_once 'blocks/footer.php'; ?>