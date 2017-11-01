$(function() {

	// Для popup окон

	var popup = $('.popup').css({
		display: 'none',
		opacity: 1
	});

	popup.find('.popup__close, .button_cancel').click(function() {
	
		$(this).parents('.popup').fadeOut();

	});

	var manageTable = $('.manage-table');
	manageTable.find('.manage-table__action-link_remove').click(function() {
		
		var row = $(this).parents('.manage-table__row');

		var id = row.attr('entity-id');
		var name = row.find('.manage-table__name-link').text();

		if (!id) {
			console.error('id не определен');
			return;
		}
		if (!name) {
			console.error('name не определен');
			return;
		}

		var popup = $('.form-remove').parents('.popup');
		popup.find('.form-remove__name').text(name);

		popup.fadeIn();

		popup.find('.button_default').click(function() {
		
			$.ajax({
				method: 'GET',
				url: '', // blocks/file-code.php
				data: {
					id: id
				}
			}).then(function() {
			
				popup.fadeOut();
			
			});
		
		});
	
	});


});


$(function() {

	// Для личного кабинета

	var navItems = $('.lk__navigation-item');
	$('#personal-information').show(); // Первоначально открыта первая вкладка

	navItems.click(function() {
	
		navItems.removeClass('lk__navigation-item_active');

		var currentItem = $(this);
		currentItem.addClass('lk__navigation-item_active');
	
		var blockName = currentItem.attr('block');

		$('.lk__content-item').hide();
		$('#'+blockName).show();

	});

});