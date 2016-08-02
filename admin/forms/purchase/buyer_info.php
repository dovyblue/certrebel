<?php
	require_once('/var/www/certrebel/functions.php');
	require_once('/var/www/certrebel/classes/courses/SingleCourses.php');
	if (!isset($_GET['course']) || !isset($_GET['index']))
		header("Location: /courses");

	$course 	= htmlentities($_GET['course']);
	$quantity = htmlentities($_GET['quantity']);
	$index 		= htmlentities($_GET['index']);
	
	$alternate_course  = new SingleCourses\SingleCourse('rrpifa');
	$alternate_course->setIndex($index);
	$alternate_price = $alternate_course->getPrice();
?>
<link rel="stylesheet" type="text/css" href="/libraries/swal/dist/sweetalert.min.css?ver=<?php echo $version;?>">
<div class="widget-title">
	<h1 style="text-align:center; font-size:30px;">Awesome!</h1>
</div>
<h3 style="text-align:center; font-size:20px; color:#7a7c82; padding-bottom:5%;">Who is buying this course?</h3>
<form id="buyer_info" class="form-horizontal" style="margin-left:17%; margin-right:17%;">
	<p class="bg-danger contact-banner" style="display:none;">Please make sure you fill out all required fields *</p>
	<span style="margin-left:1%; font-weight:bold; font-size:15px;">Buyer Info</span>
	<hr style="width:98%; margin-top:3px;">
	<div class="col-sm-6 padding" style="margin-bottom:3%;">
		<div class="col-sm-12 padding-inside">
			<input type="text" class="form-control" id="firstName" value="ZOTA" placeholder="First Name*" required>
		</div>
	</div>
	<div class="col-sm-6 padding" style="margin-bottom:3%;">
		<div class="col-sm-12 padding-inside">
			<input type="text" class="form-control" id="lastName" value="PRO" placeholder="Last Name*" required>
		</div>
	</div>
	<div class="col-sm-6 padding" style="margin-bottom:3%;">
		<div class="col-sm-12 padding-inside">
			<input type="email" class="form-control" id="email" value="registration@zotapro.com" placeholder="Email*" required>
		</div>
	</div>
	<div class="col-sm-6 padding" style="margin-bottom:3%;">
		<div class="col-sm-12 padding-inside">
			<input type="text" class="form-control" id="phone" value="(763) 318-6185" placeholder="Phone*" required>
		</div>
	</div>
	<div id="rest_of_form">
		<?php include_once('billing_address.php'); ?>
	</div>
	<div class="col-md-3 col-md-offset-5 col-sm-12 col-xs-12" style="margin-top:5%;">
		<button type="submit" id="buyerButton" class="btn btn-block btn-primary">Continue</button>
	</div>
</form>
<div style="padding-right: 17%; padding-left: 17%;" class="col-md-12 col-sm-12 col-xs-12">
	<hr style="margin-bottom: 10px;">
	<div class="general-info col-md-6 col-sm-6 col-xs-6">
			<div class="course-widget" style="width:90%;">
			<span style="cursor: pointer;" id="backButton"><i style="padding-right: 3%;" class="fa fa-chevron-left"></i>Back</span>
			</div>
	</div>
</div>

<script type="text/javascript" src="/libraries/swal/dist/sweetalert.min.js"></script>
<script>
	function buyer_info_prefill() {
		var buyer_info = ['buyer_first_name',
											'buyer_last_name',
											'buyer_email',
											'buyer_phone'];

		var buyer_val = [$('#firstName'),
										 $('#lastName'),
										 $('#email'),
										 $('#phone')];

		$.each(buyer_info, function(key, value) {
			if(localStorage.getItem(value) !== null) {                            
				var buyer_data = localStorage.getItem(value);
				// We're putting .change() for select options to prefill also.
				$(buyer_val[key]).val(buyer_data).change();
			} 
		});
	}
	function buyer_address_prefill() {
		var buyer_info = ['buyer_company',
											'buyer_address1',
											'buyer_address2',
											'buyer_city',
											'buyer_state',
											'buyer_country',
											'buyer_zip'];

		var buyer_val = [$('#company'),
										 $('#address1'),
										 $('#address2'),
										 $('#city'),
										 $('#state_result'),
										 $('#country_result'),
										 $('#zip_code')];

		$.each(buyer_info, function(key, value) {
			if(localStorage.getItem(value) !== null) {                            
				var buyer_data = localStorage.getItem(value);
				// We're putting .change() for select options to prefill also.
				$(buyer_val[key]).val(buyer_data).change();
			} 
		});
	}
	function buyer_save_data() {
		var buyer_info = ['buyer_first_name',
											'buyer_last_name',
											'buyer_email',
											'buyer_phone',
											'buyer_company',
											'buyer_address1',
											'buyer_address2',
											'buyer_city',
											'buyer_state',
											'buyer_state_name',
											'buyer_country',
											'buyer_zip'];

		var buyer_val = [$('#firstName').val(),
										 $('#lastName').val(),
										 $('#email').val(),
										 $('#phone').val(),
										 $('#company').val(),
										 $('#address1').val(),
										 $('#address2').val(),
										 $('#city').val(),
										 $('#state_result').val(),
										 $('#state_result option:selected').text(),
										 $('#country_result').val(),
										 $('#zip_code').val()];

		$.each(buyer_info, function(key, value) {
			localStorage.setItem(value, buyer_val[key]);
		});

		$attendee_first_name = 'attendee1_first_name';
		$attendee_last_name	 = 'attendee1_last_name';
		$attendee_email 		 = 'attendee1_email';
		$attendee_phone	 		 = 'attendee1_phone';

		if(localStorage.getItem($attendee_first_name) == null) {                            
			localStorage.setItem($attendee_first_name, $('#firstName').val());
		} 
		if(localStorage.getItem($attendee_last_name) == null) {                            
			localStorage.setItem($attendee_last_name, $('#lastName').val());
		} 
		if(localStorage.getItem($attendee_email) == null) {                            
			localStorage.setItem($attendee_email, $('#email').val());
		} 
		if(localStorage.getItem($attendee_phone) == null) {                            
			localStorage.setItem($attendee_phone, $('#phone').val());
		} 
	}
	function check_zip($zip) {
		var result = null;
		$.ajax({
			url: '/scripts/php/validate_orange_county_zip',
			data: {zip_code: $zip},
			async: false,
			type: 'GET',
			dataType: 'json',
			success: function(data) {
				if(data.success == true)
					result = true;	
				else
					result = false;
			}
		});
		return result;
	}
</script>
<script>
	$(document).ready(function(){
		$('#phone').mask("(999) 999-9999");
		$('#state_result').selectpicker('refresh');
		$('#country_result').selectpicker('refresh');
		buyer_info_prefill();
		buyer_address_prefill();
		$('#buyer_info [required]').each(function(){
			$(this).css('border-color','#DADADC');
		});
		$('#backButton').on('click', function(){
			$("#middle-box").load("/forms/purchase/general_info?course=<?php echo $course; ?>&index=<?php echo $index; ?>&quantity=<?php echo $quantity; ?>", function(){
				$('#quantity_result').selectpicker('refresh');
				$("html, body").stop().animate({ scrollTop: 0 }, 500);
			});
		});

		function buyerFunc(e){
				e.preventDefault();
				var check = true;
				$('#buyer_info [required]').each(function(){
					if ($(this).val() == "" || $(this).val() == null) {
						$(this).css('border-color','red');
						check = false;
					} else {
						$(this).css('border-color','#DADADC');
					}
				});
				if (check) {
					var course = "<?php echo $course; ?>";
					var $zip = $('#zip_code').val();
					if (course == 'rrpif') {
							if (check_zip($zip)) {
								buyer_save_data();
								if(localStorage.getItem('quantity') !== null) {                            
									$quantity = localStorage.getItem('quantity');
								} 
								$("#middle-box").load("/forms/purchase/attendee_info?course=<?php echo $course; ?>&index=<?php echo $index; ?>&quantity="+$quantity, function(){
									$('#quantity_result').selectpicker('refresh');
									$("html, body").stop().animate({ scrollTop: 0 }, 500);
									$('body').unbind('submit', buyerFunc);
								});
							} else {
								var isMobile = window.matchMedia("only screen and (max-width: 768px)").matches;
								var alternate_price = "<?php echo $alternate_price; ?>";
								if (isMobile) {
									swal({
										title: "<span style=\"font-size:18px;\">Invalid ZIP Code</span>", 
										text:  "<span style=\"font-size:15px; line-height:25px; text-align:left;\">"+
															"Click <a href=\"#\" id=\"list_of_zip_codes\">here </a>to see the list of acceptable ZIP codes"+
															" or  purchase a ticket at <strong>our competitive price of $"+alternate_price+"!</strong>"+
													 "</span>", 
										html: 	true,
										showCancelButton: true,
										cancelButtonText: "Close",
										confirmButtonText: "Pay $"+alternate_price,
										confirmButtonColor: "#F27474",
									},
									function(){
										buyer_save_data();
										if(localStorage.getItem('quantity') !== null) {                            
											$quantity = localStorage.getItem('quantity');
										} 
										$("#middle-box").load("/forms/purchase/attendee_info?course=rrpifa&index=<?php echo $index; ?>&quantity="+$quantity, function(){
											$('#quantity_result').selectpicker('refresh');
											$("html, body").stop().animate({ scrollTop: 0 }, 500);
											$('body').unbind('submit', buyerFunc);
										});
									});
									$('#list_of_zip_codes').on('click', function(){
										$('header .container:nth-child(2)').css('display','none');
										swal.close();
										$('a[href="#test-popup"]').click();
									});
								} else {
									swal({
										title: "Invalid ZIP Code", 
										text:  "<span style=\"line-height:40px;\">"+
															"Click <a href=\"#\" id=\"list_of_zip_codes\">here </a>to see the list of acceptable ZIP codes"+
															" or  purchase a ticket at <strong>our competitive price of $200!</strong>"+
													 "</span>", 
										html: 	true,
										type: 'warning',
										showCancelButton: true,
										cancelButtonText: "Close",
										confirmButtonText: "Pay $200",
										confirmButtonColor: "#F27474",
									},
									function(){
										buyer_save_data();
										if(localStorage.getItem('quantity') !== null) {                            
											$quantity = localStorage.getItem('quantity');
										} 
										$("#middle-box").load("/forms/purchase/attendee_info?course=rrpifa&index=<?php echo $index; ?>&quantity="+$quantity, function(){
											$('#quantity_result').selectpicker('refresh');
											$("html, body").stop().animate({ scrollTop: 0 }, 500);
											$('body').unbind('submit', buyerFunc);
										});
									});
									$('#list_of_zip_codes').on('click', function(){
										$('header .container:nth-child(2)').css('display','none');
										swal.close();
										$('a[href="#test-popup"]').click();
									});
								}
							}
					} else {
						buyer_save_data();
						if(localStorage.getItem('quantity') !== null) {
							$quantity = localStorage.getItem('quantity');
						} 
						$("#middle-box").load("/forms/purchase/attendee_info?course=<?php echo $course; ?>&index=<?php echo $index; ?>&quantity="+$quantity, function(){
							$('#quantity_result').selectpicker('refresh');
							$("html, body").stop().animate({ scrollTop: 0 }, 500);
						});
					}
				} else {
					$("html, body").stop().animate({ scrollTop: 0 }, 500);
					$('.contact-banner.bg-danger').fadeIn(1000, function(){$(this).delay(3000).fadeOut(1000)})
				}
			};

		$('body').on('submit', '#buyer_info', buyerFunc);
	});
</script>
