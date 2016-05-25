<?php
	if (!isset($_GET['course']) && !isset($_GET['quantity'])) {
		header("Location: courses");
	}
	$course 	= htmlentities($_GET['course']);
	$index 		= htmlentities($_GET['index']);
	$quantity = htmlentities($_GET['quantity']);
?>
<div class="widget-title">
	<h1 style="text-align:center; font-size:30px;">Thank you<span>.</span></h1>
</div>
<h3 style="text-align:center; font-size:20px; color:#7a7c82; padding-bottom:5%;">Now, who is attending?</h3>
<form id="attendee" class="form-horizontal" style="margin-left:17%; margin-right:17%;">
	<p class="bg-danger contact-banner" style="display:none;">Please make sure you fill out all required fields *</p>
	<span style="margin-left:1%; font-weight:bold; font-size:15px;">Attendee Info</span>
	<hr style="width:98%; margin-top:3px;">
		<?php
		for ($i = 1; $i <=$quantity; ++$i) {
			if ($i!=1) {
		?>
				<div class="col-sm-12">
					<hr>
				</div>
		<?php
			}
		?>
			<div class="col-sm-2 padding" style="margin-bottom:3%;">
				<div class="col-sm-12 padding-inside">
					<div class="drop-caps full clearfix">
						<p><?php echo $i; ?></p>
					</div>
				</div>
			</div>
			<div class="col-sm-5 padding" style="margin-bottom:3%;">
				<div class="col-sm-12 padding-inside">
					<input type="text" class="form-control" id="attendee<?php echo $i; ?>_first_name" placeholder="First Name*" required>
				</div>
			</div>
			<div class="col-sm-5 padding" style="margin-bottom:3%;">
				<div class="col-sm-12 padding-inside">
					<input type="text" class="form-control" id="attendee<?php echo $i; ?>_last_name" placeholder="Last Name*" required>
				</div>
			</div>
			<div class="col-sm-5 padding" style="margin-bottom:3%;">
				<div class="col-sm-12 padding-inside">
					<input type="email" class="form-control" id="attendee<?php echo $i; ?>_email" placeholder="Email*" required>
				</div>
			</div>
			<div class="col-sm-5 padding" style="margin-bottom:3%;">
				<div class="col-sm-12 padding-inside">
					<input type="text" class="form-control" id="attendee<?php echo $i; ?>_phone" placeholder="Phone">
				</div>
			</div>
	<?php
		}
	?>
	<div style="padding-left:43%; padding-right:43%; padding-top:5%;" class="col-md-12 col-sm-12 col-xs-12">
		<button type="submit" id="customButton" class="btn btn-block btn-primary">Continue</button>
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

<script>
	function attendee_info_prefill() {
		var $quantity = "<?php echo $quantity; ?>";
		$quantity = parseInt($quantity);

		for (i=1; i <= $quantity; i++) {
			$first_name = "attendee"+i+"_first_name";
			$last_name	= "attendee"+i+"_last_name";
			$email			= "attendee"+i+"_email";
			$phone			= "attendee"+i+"_phone";

			$('#'+$phone).mask("(999) 999-9999");

			if(localStorage.getItem($first_name) !== null) {                            
				var attendee_data = localStorage.getItem($first_name);
				$('#'+$first_name).val(attendee_data);
			} 
			if(localStorage.getItem($last_name) !== null) {                            
				var attendee_data = localStorage.getItem($last_name);
				$('#'+$last_name).val(attendee_data);
			} 
			if(localStorage.getItem($email) !== null) {                            
				var attendee_data = localStorage.getItem($email);
				$('#'+$email).val(attendee_data);
			} 
			if(localStorage.getItem($phone) !== null) {                            
				var attendee_data = localStorage.getItem($phone);
				$('#'+$phone).val(attendee_data);
			} 
		}	
	}
	function attendee_save_data() {
		var $quantity = "<?php echo $quantity; ?>";
		$quantity = parseInt($quantity);

		for (i=1; i <= $quantity; i++) {
			$first_name = 'attendee'+i+'_first_name';
			$last_name	= 'attendee'+i+'_last_name';
			$email			= 'attendee'+i+'_email';
			$phone			= 'attendee'+i+'_phone';

			localStorage.setItem($first_name, $('#'+$first_name).val());
			localStorage.setItem($last_name, $('#'+$last_name).val());
			localStorage.setItem($email, $('#'+$email).val());
			localStorage.setItem($phone, $('#'+$phone).val());
			attendee_var = "1";
		}	
	}
</script>
<script>
	$(document).ready(function(){
		attendee_info_prefill();
		var first_name = localStorage.getItem('buyer_first_name');
		if (first_name != null) {
			$('.widget-title h1 span').html(', '+first_name+'.').css('text-transform','capitalize');
		}
		$('#backButton').on('click', function(){
			$("#middle-box").load("/forms/purchase/buyer_info?course=<?php echo $course; ?>&index=<?php echo $index; ?>&quantity=<?php echo $quantity; ?>");
			$("html, body").stop().animate({ scrollTop: 0 }, 500);
		});
		$('body').on('submit', '#attendee', function(e){
			e.preventDefault();
			var check = true;
			$('#attendee [required]').each(function(){
				if ($(this).val() == "" || $(this).val() == null) {
					$(this).css('border-color','red');
					check = false;
				} else {
					$(this).css('border-color','#DADADC');
				}
			});
			if (check) {
				attendee_save_data();
				$("#middle-box").load("/forms/purchase/review_info?course=<?php echo $course; ?>&index=<?php echo $index; ?>&quantity=<?php echo $quantity; ?>", function(){
					buyer_first_name = localStorage.getItem('buyer_first_name');
					buyer_last_name = localStorage.getItem('buyer_last_name');
					buyer_email = localStorage.getItem('buyer_email');
					buyer_phone = localStorage.getItem('buyer_phone');
					buyer_company = localStorage.getItem('buyer_company');
					buyer_company = (buyer_company != "") ? buyer_company+'<br>' : "";
					buyer_address1 = localStorage.getItem('buyer_address1');
					buyer_address2 = localStorage.getItem('buyer_address2');
					buyer_address2 = (buyer_address2 != "") ? ' - '+buyer_address2 : "";
					buyer_city = localStorage.getItem('buyer_city');
					buyer_state_name = localStorage.getItem('buyer_state_name');
					buyer_country = localStorage.getItem('buyer_country');
					buyer_zip = localStorage.getItem('buyer_zip');
					$quantity = "<?php echo $quantity; ?>";
					$quantity = parseInt($quantity);

					for(i = 1; i <= $quantity; ++i){
						first_name = 'attendee'+i+'_first_name';
						last_name = 'attendee'+i+'_last_name';
						email = 'attendee'+i+'_email';
						phone = 'attendee'+i+'_phone';
						$('#'+first_name).html(localStorage.getItem(first_name));
						$('#'+last_name).html(localStorage.getItem(last_name)+'<br>');
						$('#'+email).html(localStorage.getItem(email)+'<br>');
						$('#'+phone).html(localStorage.getItem(phone)+'<br>');
					}

					$('#firstName').html(buyer_first_name);
					$('#lastName').html(buyer_last_name+'<br>');
					$('#email').html(buyer_email+'<br>');
					$('#phone').html(buyer_phone+'<br>');
					$('#company').html(buyer_company);
					$('#address1').html(buyer_address1);
					$('#address2').html(buyer_address2);
					$('#city').html('<br>'+buyer_city);
					$('#state_result').html(buyer_state_name);
					$('#zip_code').html(buyer_zip+'<br>');
					$('#country_result').html(buyer_country+'<br>');

					$("html, body").stop().animate({ scrollTop: 0 }, 500);
				});
			} else {
				$("html, body").stop().animate({ scrollTop: 0 }, 500);
				$('.contact-banner.bg-danger').fadeIn(1000, function(){$(this).delay(3000).fadeOut(1000)})
			}
		});
	});	
</script>
