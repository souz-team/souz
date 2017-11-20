<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Регистрация прошла успешно</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/ico">
	<link rel="stylesheet" href="css/index.css">

</head>
<body>
	
	<div class="sign-up-success">
		<div class="sign-up-success__image-success-wrap">
			<img src="images/success.jpg" alt="Регистрация прошла успешно" class="sign-up-success__image-success">
		</div>

		<div class="sign-up-success__content">

			<p class="sign-up-success__text">Регистрация прошла успешно</p>
			<p class="sign-up-success__second-text">Через 3 секунды вы перейдете обратно на
				<a href='/' class='sign-up-success__link'>сайт СОЮЗ</a>
			</p>

		</div>
	</div>

	<script>
		setTimeout(function() {
		
			window.location.href = '/';
		
		}, 3000);
	</script>

</body>
</html>