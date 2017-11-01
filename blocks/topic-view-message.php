<div class="section-message">
	<div class="topic_author">
		<p class="author-name">Автор: <?= $row_posts['login'] ?></p>
		<div class="author-inf">
			<p class="value-message">Сообщений: 1 000 123</p>
			<p class="date">Дата регистрации: <?= $reg_info_post['reg_date'] ?></p>
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