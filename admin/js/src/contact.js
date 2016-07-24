$(document).ready(function(){
	$('.googlemap').on('click', function(){
		$('.googlemap iframe').css("pointer-events", "auto");
	});
	$('.googlemap').mouseleave(function(){ 
		$('.googlemap iframe').css("pointer-events", "none");
	});

	$('.contact-banner.bg-success').hide();
	$('.contact-banner.bg-danger').hide();
	$('.contact-banner.bg-warning').hide();

	$('form#contact').on('submit', function(e){
		e.preventDefault();
		var name    = $('#user_name').val();
		var email   = $('#user_email').val();
		var message = $('#user_message').val();
		var data    = {
			name: name,
			email: email,
			message: message
		};

		if (name == "" || email == "" || message == "") {
			$('.contact-banner.bg-danger')
			.fadeIn(1000, function(){$(this).delay(3000).fadeOut(1000)})
		} else {
			$.ajax({  
				url: '/forms/contact/contact',
				async: false,
				data: data,
				type: 'POST',
				dataType: 'json',
				success: function(data) {
					if (data.status == "success") {
						$('.contact-banner.bg-success').fadeIn(1000, function(){$(this).delay(3000).fadeOut(1000)});
						$('#user_name').val('');
						$('#user_email').val('');
						$('#user_message').val('');
					} else {
						$('.contact-banner.bg-warning').fadeIn(1000, function(){$(this).delay(3000).fadeOut(1000)});
					}
				}
			});
		}
	});
});
