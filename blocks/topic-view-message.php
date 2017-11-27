<div class="section-message">
	<div class="topic_author">
		<p class="author-name" title='<?php echo $row_posts['email']?>'>Автор: <?= $row_posts['login'] ?></p>
		<div class="author-inf">
			<p class="value-message">Сообщений: <?= $num_author_message ?></p>
			<?php if(isset($reg_info_post['reg_date'])){ ?>
			<p class="date">Дата регистрации: <?= $reg_info_post['reg_date'] ?></p>
			<?php } else {?>
			<p class="date"></p>
			<?php } ?>
		</div>
	</div>
	<div class="topic__content">
		<div class="message-wrap">
			<p class="topic-body"><?= $row_posts['comment'] ?></p>
			<div class="topic-inf">
				<p class="date">Дата: <?= $row_posts['m_date'] ?></p>
			</div>
		</div>
	</div>
</div>