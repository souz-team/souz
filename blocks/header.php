<?php $key = 0 ?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=1024, initial-scale=1">
		<link rel="stylesheet" href="../css/index.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
		<link rel="shortcut icon" href="/images/favicon.ico" type="image/ico">
		<title>Союз
		</title>
		<script type="text/javascript" src='/js/jquery.min.js'></script>
		<script type="text/javascript" src='/js/index.js'></script>
	</head>
	<body>
		<div class="sections-association">
			<section class="section section_header">
				<div class="section__wrap">
					<header class="section-header">
						<div class="section-header__logo">
							<div class="logo">
								<a href="/" class="logo__link">
									<img class="logo__image" src="/images/logo.png" alt="" role="presentation">
								</a>
							</div>
						</div>
						<div class="section-header__service-name">Система Обработки <br>Юзерских Заявок
						</div>
						<div class="section-header__form-auth">
							
								<?php if($_SESSION['auch'] == 1)
								{
									require_once('./blocks/user-panel.php');
								}
								?>
								<?php if($_SESSION['auch']!=1){?>
									<form class="form-auth" action="/auth.php" method="POST">
										<div class="form-auth__textfield-wrap"><input class="form-auth__textfield" placeholder="Введите логин" type="text" name="login"/>
										</div>
										<div class="form-auth__textfield-wrap"><input class="form-auth__textfield" type="password" name="password" placeholder="Введите пароль"/>
										</div>
										<div class="form-auth__buttons">
										<button class="button button_form-auth" type="submit" name="do_login">Войти
										</button>
										<a class="form-auth__link-signup" href="/singup.php">Регистрация</a>
										</div>
									</form>
									<?php if($_SESSION['count']!=0){
										$_SESSION['form']=1;?>
										<p class="form-auth__forgot-password"><a class="form-auth__forgot-password-link" href="/remember.php">Забыли пароль?</a></p>
									<?php }	?>
								<?php } ?>
						</div>
					</header>
				</div>
			</section>
			<section class="section section_menu">
				<div class="section__wrap">
					<div class="section-menu">
						<div class="section-menu__navigation">
							<ul id="nav">
								<nav class="navigation">
									<li>
										<div class="navigation__item"><a class="navigation__link" href="/">Главная</a>
										</div>
									</li>
									<li>
										<div class="navigation__item"><a class="navigation__link" href="/article-menu.php">Статьи</a>
										</div>
									</li>
									<li>
										<div class="navigation__item"><a class="navigation__link" href="../forum.php">Форум</a>
										</div>
									</li>
									<li>
										<div class="navigation__item"><a class="navigation__link" href="../feedback.php">Обратная связь</a>
										</div>
									</li>
									<li>
										<div class="navigation__item"><a class="navigation__link" href="contact.php">Контакты</a>
										</div>
									</li>
									<?php if ($_SESSION['userlevel']==1){ ?>
										<li>
											<div class="navigation__item navigation__item_manage"><a class="navigation__link" href="">Управление</a>
											</div>
											<ul>
												<!-- <li>
													<div class="navigation__item"><a class="navigation__link" href="/manage-articles.php">Управление статьями</a>
													</div>
												</li> -->
												<li>
													<div class="navigation__item"><a class="navigation__link" href="/manage-sections.php">Управление разделами</a>
													</div>
												</li>
												<li>
													<div class="navigation__item"><a class="navigation__link" href="forum.php">Управление форумом</a>
													</div>
												</li>
												<li>
													<div class="navigation__item"><a class="navigation__link" href="control-user.php">Управление юзерами</a>
													</div>
												</li>
											</ul>
										</li>
										<?php } ?>
										<!-- <?php if($_SESSION['userlevel'] != 0) { ?>
										<li>
											<div class="navigation__item"><a class="navigation__link" href="lk.php">Личный кабинет</a>
											</div>
										</li>
									<?php } ?> -->
								</nav>
							</ul>
						</div>
					</div>
				</div>
			</section>
	<?php 
	require_once '/breadcrumbs.php';	
	?>