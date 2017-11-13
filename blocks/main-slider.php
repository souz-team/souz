<div class="main-slider">

	<div class="main-slider__items">
		<div class="main-slider__item main-slider__item_1">
			<div class="main-slider__item-content">
				<p class="main-slider__title">Умеем покорять самые сложные вершины!</p>
				<p class="main-slider__description">Проекты на базе Naumen Service Desk и Naumen IT Asset Management стали победителями ежегодного конкурса «Проект года. Выбор ИТ директоров России»</p>
			</div>
		</div>
		<div class="main-slider__item main-slider__item_2">
			<div class="main-slider__item-content">
				<p class="main-slider__title">Система Обработки Юзерских Заявок</p>
				<p class="main-slider__description">Лидирующее российское решение.<br>
				и энергетических компаниях</p>
			</div>
		</div>
		<div class="main-slider__item main-slider__item_3">
			<div class="main-slider__item-content">
				<p class="main-slider__title">Система Обработки Юзерских Заявок</p>
				<p class="main-slider__description">Успешное импортозамещение в крупнейших промышленных<br>
				Повышайте качество и эффективность предоставляемых услуг</p>
			</div>
		</div>
	</div>
	
	<div class="main-slider__arrows">
		<img src='images/main-slider/arrow-prev.png' alt='' class="main-slider__arrow main-slider__arrow_prev">
		<img src='images/main-slider/arrow-next.png' alt='' class="main-slider__arrow main-slider__arrow_next">
	</div>
</div>

<script type="text/javascript">
	
	var slider = $('.main-slider');

	slider.find('.main-slider__items').slick({
		prevArrow: slider.find('.main-slider__arrow_prev'),
		nextArrow: slider.find('.main-slider__arrow_next'),
		draggable: false,
	});

</script>