jQuery(document).ready(function($){
	if (localStorage.getItem("update") === null)
		$update_val = 0;

	$('.middle-box li').on('mouseenter', function(){
		$div = $(this).find('div');
		if ($div.hasClass('load-address'))
			$(this).find('div.load-address').removeClass('hidden');
		if ($div.hasClass('DOB'))
			$(this).find('div.DOB').removeClass('hidden');
		if ($div.hasClass('load-phone'))
			$(this).find('div.load-phone').removeClass('hidden');
		if ($div.hasClass('load-company'))
			$(this).find('div.load-company').removeClass('hidden');
	});
	$('.middle-box li').on('mouseleave', function(){
		$div = $(this).find('div');
		if ($div.hasClass('load-address'))
			$(this).find('div.load-address').addClass('hidden');
		if ($div.hasClass('DOB'))
			$(this).find('div.DOB').addClass('hidden');
		if ($div.hasClass('load-phone'))
			$(this).find('div.load-phone').addClass('hidden');
		if ($div.hasClass('load-company'))
			$(this).find('div.load-company').addClass('hidden');
	});

	var formModal = $('.cd-user-modal'),
		formDOB = formModal.find('#cd-DOB'),
		formAddress = formModal.find('#cd-address'),
		formCompany = formModal.find('#cd-company'),
		formPhone = formModal.find('#cd-phone'),
		formForgotPassword = formModal.find('#cd-reset-password'),
		formModalTab = $('.cd-switcher'),
		DOB = $('.DOB');
		load_address = $('.load-address');
		load_company = $('.load-company');
		load_phone = $('.load-phone');

	DOB.on('click', '.cd-DOB', DOB_selected);
	load_address.on('click', '.cd-address', address_selected);
	load_company.on('click', '.cd-company', company_selected);
	load_phone.on('click', '.cd-phone', phone_selected);

	formModal.on('click', function(event){
		if( $(event.target).is(formModal) || $(event.target).is('.cd-close-form') ) {
			formModal.removeClass('is-visible');
			$('.header').fadeIn(0, "linear");
		}	
	});

	//close modal when clicking the esc keyboard button
	$(document).keyup(function(event){
		if(event.which=='27') {
			formModal.removeClass('is-visible');
			$('.header').fadeIn(0, "linear");
		}
  });

	function address_selected(){
		$('.header').fadeOut(0, "linear");
		formModal.addClass('is-visible');
		formDOB.removeClass('is-selected').addClass('hidden');
		formCompany.removeClass('is-selected').addClass('hidden');
		formPhone.removeClass('is-selected').addClass('hidden');
		formAddress.removeClass('hidden').addClass('is-selected');
		$address = $(this);
		$attendee_id = $address.closest('.middle-box').data('attendee_id');
		$address_field = $address.parent().siblings('.load-data-info');
		formAddress.find('input[type="submit"]').on('click', function(event) {
			var formData = {
				'attendee_id'  				: $attendee_id,
				'attendee_address1'  	: $('input[id=attendee-address1]').val(),
				'attendee_address2'  	: $('input[id=attendee-address2]').val(),
				'attendee_city'  			: $('input[id=attendee-city]').val(),
				'attendee_state_name' : $('input[id=attendee-state_name]').val(),
				'attendee_zip'  			: $('input[id=attendee-zip]').val()
			};
			event.preventDefault();
			$.ajax({
							type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
							url         : '/forms/update/update_address.php', // the url where we want to POST
							data        : formData, // our data object
							dataType    : 'json', // what type of data do we expect back from the server
							encode      : true
					})
			.done(function(data) {
				formAddress.find('input[id=attendee-address1]').removeClass('has-error').next('span').removeClass('is-visible');
				formAddress.find('input[id=attendee-city]').removeClass('has-error').next('span').removeClass('is-visible');
				formAddress.find('input[id=attendee-state_name]').removeClass('has-error').next('span').removeClass('is-visible');
				formAddress.find('input[id=attendee-zip]').removeClass('has-error').next('span').removeClass('is-visible');
				if (data.status == 'error') {
					formAddress.find('input[id=attendee-address1]').addClass('has-error').next('span').addClass('is-visible');
					formAddress.find('input[id=attendee-city]').addClass('has-error').next('span').addClass('is-visible');
					formAddress.find('input[id=attendee-state_name]').addClass('has-error').next('span').addClass('is-visible');
					formAddress.find('input[id=attendee-zip]').addClass('has-error').next('span').addClass('is-visible');
				}
				if (data.status.address == 'error') {
					formAddress.find('input[id=attendee-address1]').addClass('has-error').next('span').addClass('is-visible');
				}
				if (data.status.city == 'error') {
					formAddress.find('input[id=attendee-city]').addClass('has-error').next('span').addClass('is-visible');
				}
				if (data.status.state == 'error') {
					formAddress.find('input[id=attendee-state_name]').addClass('has-error').next('span').addClass('is-visible');
				}
				if (data.status.zip == 'error') {
					formAddress.find('input[id=attendee-zip]').addClass('has-error').next('span').addClass('is-visible');
				}
				if (data.status == 'success') {
					if (localStorage.getItem("update") === null)
						localStorage.setItem("update", $update_val);
					else
						localStorage.setItem("update", $update_val++);

					$attendee_address2 = ($('input[id=attendee-address2]').val() == "") ? "" : ", "+$('input[id=attendee-address2]').val();
					$attendee_address1 = $('input[id=attendee-address1]').val();
					$attendee_city = $('input[id=attendee-city]').val();
					$attendee_state_name = $('input[id=attendee-state_name]').val();
					$attendee_zip = $('input[id=attendee-zip]').val();
					$attendee_address = $attendee_address1 + $attendee_address2 + ', ' + $attendee_city + ', ' + $attendee_state_name + ', ' + $attendee_zip;
					$address_field.html($attendee_address).css('textTransform', 'capitalize');

					formAddress.find('input[id=attendee-address1]').removeClass('has-error').next('span').removeClass('is-visible');
					formAddress.find('input[id=attendee-city]').removeClass('has-error').next('span').removeClass('is-visible');
					formAddress.find('input[id=attendee-state_name]').removeClass('has-error').next('span').removeClass('is-visible');
					formAddress.find('input[id=attendee-zip]').removeClass('has-error').next('span').removeClass('is-visible');
					formModal.removeClass('is-visible');
					$('.header').fadeIn(0, "linear");
				}
			});
		});
	}

	function DOB_selected(){
		$('input[id="attendee-DOB"]').mask("99/99/9999");
		$('.header').fadeOut(0, "linear");
		formModal.addClass('is-visible');
		formCompany.removeClass('is-selected').addClass('hidden');
		formAddress.removeClass('is-selected').addClass('hidden');
		formPhone.removeClass('is-selected').addClass('hidden');
		formDOB.removeClass('hidden').addClass('is-selected');
		$DOB = $(this);
		$attendee_id = $DOB.closest('.middle-box').data('attendee_id');
		$attendee_field = $DOB.parent().siblings('.load-data-info');
		formDOB.find('input[type="submit"]').on('click', function(event) {
			var formData = {
				'attendee_DOB'  : $('input[id=attendee-DOB]').val(),
				'attendee_id'  : $attendee_id
			};
			event.preventDefault();
			$.ajax({
							type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
							url         : '/forms/update/update_DOB.php', // the url where we want to POST
							data        : formData, // our data object
							dataType    : 'json', // what type of data do we expect back from the server
							encode      : true
					})
			.done(function(data) {
				if (data.status == 'error') {
					formDOB.find('input[id=attendee-DOB]').addClass('has-error').next('span').addClass('is-visible');
				} else {
					if (localStorage.getItem("update") === null)
						localStorage.setItem("update", $update_val);
					else
						localStorage.setItem("update", $update_val++);

					$attendee_field.html($('input[id=attendee-DOB]').val());
					formDOB.find('input[id=attendee-DOB]').removeClass('has-error').next('span').removeClass('is-visible');
					formModal.removeClass('is-visible');
					$('.header').fadeIn(0, "linear");
				}
			});
		});
	}
	function company_selected(){
		$('.header').fadeOut(0, "linear");
		formModal.addClass('is-visible');
		formDOB.removeClass('is-selected').addClass('hidden');
		formAddress.removeClass('is-selected').addClass('hidden');
		formPhone.removeClass('is-selected').addClass('hidden');
		formCompany.removeClass('hidden').addClass('is-selected');
		$company = $(this);
		$attendee_id = $company.closest('.middle-box').data('attendee_id');
		$order_number = $company.closest('.middle-box').data('order_number');
		$company_field = $company.parent().siblings('.load-data-info');
		formCompany.find('input[type="submit"]').on('click', function(event) {
			var formData = {
				'buyer_company' : $('input[id=buyer-company]').val(),
				'order_number'  : $order_number,
				'attendee_id'   : $attendee_id
			};
			event.preventDefault();
			$.ajax({
							type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
							url         : '/forms/update/update_company.php', // the url where we want to POST
							data        : formData, // our data object
							dataType    : 'json', // what type of data do we expect back from the server
							encode      : true
					})
			.done(function(data) {
				if (data.status == 'error') {
					formCompany.find('input[id=buyer-company]').addClass('has-error').next('span').addClass('is-visible');
				} else {
					if (localStorage.getItem("update") === null)
						localStorage.setItem("update", $update_val);
					else
						localStorage.setItem("update", $update_val++);

					$company_field.html($('input[id=buyer-company]').val());
					$company_field.css('textTransform', 'capitalize');
					formCompany.find('input[id=buyer-company]').removeClass('has-error').next('span').removeClass('is-visible');
					formModal.removeClass('is-visible');
					$('.header').fadeIn(0, "linear");
				}
			});
		});
	}
	function phone_selected(){
		$('input[id="attendee-phone"]').mask("(999) 999-9999");
		$('.header').fadeOut(0, "linear");
		formModal.addClass('is-visible');
		formDOB.removeClass('is-selected').addClass('hidden');
		formAddress.removeClass('is-selected').addClass('hidden');
		formCompany.removeClass('is-selected').addClass('hidden');
		formPhone.removeClass('hidden').addClass('is-selected');
		$phone = $(this);
		$attendee_id = $phone.closest('.middle-box').data('attendee_id');
		$order_number = $phone.closest('.middle-box').data('order_number');
		$phone_field = $phone.parent().siblings('.load-data-info');
		formPhone.find('input[type="submit"]').on('click', function(event) {
			var formData = {
				'attendee_phone' : $('input[id=attendee-phone]').val(),
				'attendee_id'   : $attendee_id
			};
			event.preventDefault();
			$.ajax({
							type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
							url         : '/forms/update/update_phone.php', // the url where we want to POST
							data        : formData, // our data object
							dataType    : 'json', // what type of data do we expect back from the server
							encode      : true
					})
			.done(function(data) {
				if (data.status == 'error') {
					formPhone.find('input[id=attendee-phone]').addClass('has-error').next('span').addClass('is-visible');
				} else {
					if (localStorage.getItem("update") === null)
						localStorage.setItem("update", $update_val);
					else
						localStorage.setItem("update", $update_val++);

					$phone_field.html($('input[id=attendee-phone]').val());
					formPhone.find('input[id=attendee-phone]').removeClass('has-error').next('span').removeClass('is-visible');
					formModal.removeClass('is-visible');
					$('.header').fadeIn(0, "linear");
				}
			});
		});
	}



	//IE9 placeholder fallback
	//credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
	if(!Modernizr.input.placeholder){
		$('[placeholder]').focus(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
		  	}
		}).blur(function() {
		 	var input = $(this);
		  	if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.val(input.attr('placeholder'));
		  	}
		}).blur();
		$('[placeholder]').parents('form').submit(function() {
		  	$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
			 		input.val('');
				}
		  	})
		});
	}

});


//credits http://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
jQuery.fn.putCursorAtEnd = function() {
	return this.each(function() {
    	// If this function exists...
    	if (this.setSelectionRange) {
      		// ... then use it (Doesn't work in IE)
      		// Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
      		var len = $(this).val().length * 2;
      		this.focus();
      		this.setSelectionRange(len, len);
    	} else {
    		// ... otherwise replace the contents with itself
    		// (Doesn't work in Google Chrome)
      		$(this).val($(this).val());
    	}
	});
};
