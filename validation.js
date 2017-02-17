$( document ).ready(function() {
	$(".callback_form form").validate({
		rules:{
			name:{
				required: true
			},
			phone:{
				required: true
			},
			email:{
				email:true,
				required: true
			}
		},
		messages:{
			name:{
				required: ""
			},
			phone:{
				required: ""
			},
			email:{
				required: ""
			}
		}, 
		submitHandler: function(form) {
		$(form).ajaxSubmit();

		$('.callback_form').find('input[type=text], input[type=hidden], textarea').val('');
		$('.callback_form').find('.tit').text("Сообщение успешно отправлено"); 
		return false;
		}
	});
});	