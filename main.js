var overlay = $('.overlay');
if ($('.callback_form').length != 0) {
	$('body').find('.callback_btn, .order_item_btn, .action_btn').on('click', function (e) {
		e.preventDefault();
		$(this).parents('body').find('.callback_form').fadeIn("fast");
		var Mtop = -($('.callback_form').outerHeight() / 2) + 'px';
		var Mleft = -($('.callback_form').outerWidth() / 2) + 'px';
		$('.callback_form').css({
			'margin-top': Mtop,
			'margin-left': Mleft,
			'left': '50%',
			'top': '50%'
		});
		overlay.fadeIn("fast");
	});

	$('body').find('.close-popup').on('click', function (e) {
		e.preventDefault();
		$(this).parents('body').find('.callback_form').fadeOut("fast");
		overlay.fadeOut("fast");
	});
}
 
$('input,textarea').focus(function () {
	$(this).data('placeholder', $(this).attr('placeholder'))
	$(this).attr('placeholder', '');
});
$('input,textarea').blur(function () {
	$(this).attr('placeholder', $(this).data('placeholder'));
});

$(document).ready(function(){
	$('input[name=phone]').mask("+7 (999) 999-9999");
	$('input[name=page_url]').val(window.location.href);
});
