<?php
	session_start();
	require_once('../../functions.php');
	if (!isset($_GET['course']) && !isset($_GET['quantity'])) {
		header("Location: courses");
	}
	$course 	= htmlentities($_GET['course']);
	$index 		= htmlentities($_GET['index']);
	$quantity = htmlentities($_GET['quantity']);
?>
<div class="widget-title">
	<h1 style="text-align:center; font-size:30px;">Almost done <i class="fa fa-smile-o"></i></h1>
</div>
<h3 style="text-align:center; font-size:20px; color:#7a7c82; padding-bottom:5%;">Please review your info.</h3>
<div id="buyer_info" class="form-horizontal" style="margin-left:17%; margin-right:17%;">
	<span style="margin-left:1%; font-weight:bold; font-size:15px;">Course Info</span>
	<hr style="width:98%; margin-top:3px;">
	<div class="row" style="margin-top:0%; padding-left:1.5%; padding-right:1.5%;">
		<div class="col-md-7 col-sm-7" style="margin-bottom: 3%;">
				<div class="course-widget" style="width:100%;">
				<?php
					$course 		 		= htmlentities($_GET['course']);
					$index 		 			= htmlentities($_GET['index']);
					$course_info 		= course_info();
					$single_details = single_course_info()[$course];
					$count 					= count($single_details);
					$title	 				= isset($course_info[$course][0]['course_long_title']) ? $course_info[$course][0]['course_long_title']: 'N/A';
					for ($i = 0; $i < $count; ++$i) {
						if ($single_details[$i]['index'] == $index) {
							$date 	 			= isset($single_details[$i]['course_meeting_date']) ? $single_details[$i]['course_meeting_date'] : 'N/A';
							$time 	 			= isset($single_details[$i]['course_meeting_time']) ? $single_details[$i]['course_meeting_time'] : 'N/A';
							$address 			= isset($single_details[$i]['course_address']) ? $single_details[$i]['course_address'] : 'N/A';
							$cost 	 			= isset($single_details[$i]['course_price']) ? $single_details[$i]['course_price'] : '0';
							$cost					= number_format((float) $cost, 2);
							$subtotal     = $quantity*$cost;                                                                             
							$subtotal     = number_format((float) $subtotal, 2);
							$fee					= 0.02*$cost*$quantity;
							$fee					= number_format((float) $fee, 2);
							$total				= $cost*$quantity + $fee;
							$total				= number_format((float) $total, 2);
							break;
						}
					}
					?>
					<ul>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Course: </div>
							<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $title; ?></strong></a></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Date: </div>
							<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $date; ?></strong></a></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Time: </div>
							<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $time; ?></strong></a></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Address: </div>
							<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $address; ?></strong></a></div>
						</li>
					</ul>
				</div>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5" style="padding-left: 4%; padding-right:0;">
			<div class="row">
				<div class="col-xs-8">
					<p style="float: right; margin: 0; padding: 0;">Quantity:</p><br>
					<p style="float: right; margin: 0; padding: 0;">Unit Price:</p><br>
					<p style="float: right; margin: 0; padding: 0;">Subtotal:</p><br>
					<p style="float: right; margin: 0; padding: 0;">2% Processing Fee:</p><br>
					<p style="float: right; margin: 0; padding: 0;"><strong>Total:</strong></p><br>
				</div>
				<div class="col-xs-4" style="padding: 0;">
					<p style="margin: 0; padding: 0;"><span></span><span ><?php echo $quantity; ?></span></p>
					<p style="margin: 0; padding: 0;"><span>$</span><span ><?php echo $cost; ?></span></p>
					<p style="margin: 0; padding: 0;"><span>$</span><span ><?php echo $subtotal; ?></span></p>
					<p style="margin: 0; padding: 0;"><span>$</span><span ><?php echo $fee; ?></span></p>
					<p style="margin: 0; padding: 0;"><span>$</><span><strong><?php echo $total; ?></strong></span></p>
				</div>
			</div>
		</div>
	</div>
	<span style="margin-left:1%; font-weight:bold; font-size:15px;">Buyer Info</span>
	<hr style="width:98%; margin-top:3px;">
	<div style="margin-left: 0;" class="row">
		<div class="col-sm-6 padding" style="margin-bottom:3%;">
			<div class="col-sm-12 padding-inside">
				<span>
					<span id="firstName">xxxx</span>
					&nbsp;
					<span id="lastName">xxxx<br></span>
				</span>
				<span id="email">xxxx<br></span>
				<span id="phone">xxxx<br></span>
			</div>
		</div>
		<div class="col-sm-6 padding" style="margin-bottom:3%;">
			<div class="col-sm-12 padding-inside">
				<span id="company">xxxx<br></span>
				<span id="address1">xxxx</span>
				<span id="address2"> - xxxx</span>
				<span id="city"><br>xxxx</span><span>, </span>
				<span id="state_result">xx</span>&nbsp;<span id="zip_code">x<br></span>
				<span id="country_result">xx<br></span>
			</div>
		</div>
	</div>
	<span style="margin-left:1%; font-weight:bold; font-size:15px;">Attendee Info</span>
	<hr style="width:98%; margin-top:3px;">
	<div style="margin-left: 0;" class="row">
		<?php
		for ($i = 1; $i <=$quantity; ++$i) {
		?>
			<div class="col-sm-4 padding" style="margin-bottom:5%;">
				<div class="col-sm-1 padding-inside">
					<span style="padding: 1px; border: 1px solid black;"><?php echo $i; ?></span>
				</div>
				<div class="col-sm-10 padding-inside">
					<span>
						<span id="attendee<?php echo $i; ?>_first_name">xxxx</span>
						&nbsp;
						<span id="attendee<?php echo $i; ?>_last_name">xxxx<br></span>
					</span>
					<span id="attendee<?php echo $i; ?>_email">xxxx<br></span>
					<span id="attendee<?php echo $i; ?>_phone">xxxx<br></span>
				</div>
			</div>
		<?php
		}
		?>
	</div>
<span style="margin-left:1%; font-weight:bold; font-size:15px;">Terms of Service</span>
<hr style="width:98%; margin-top:3px;">
<div class="" style="margin-bottom: 3%; margin-left:2%;">
  <div class="checkbox" style="margin-bottom:3%;">
    <label>
      <input type="checkbox"> I agree to the Terms of Service
    </label>
  </div>
	<p>
	<strong>Changes and Cancellations to Your Registration for In-Person Courses:</strong><br>
	All courses are subject to a 25% administration fee if written notice is given at least 5 business days in advance to:  support@certrebel.com. Refunds are not given if written notice is not received at least 5 business days in advance. Attendee substitutions are permitted and must be emailed to support@certrebel.com to be processed. In the case of an event cancellation made by CertRebel, LLC, you may choose to receive a 100% refund or you can choose to apply your registration fee to another course. By submitting payment you agree to these Terms of Service.
	</p>
	<p>
	<strong>Changes and Cancellations to Your Registration for Live Webinars or On-Demand Courses:</strong><br>
	All sales are final and refunds are not issued for Live Webinar and On-Demand courses.
	</p>
</div>
</div>
<div style="padding-left:43%; padding-right:43%; padding-top:5%;" class="col-md-12 col-sm-12 col-xs-12">
	<script src="https://checkout.stripe.com/checkout.js"></script>
	<button id="payButton" class="btn btn-block btn-primary">Pay</button>
	<script>
		course 				   = "<?php echo $course; ?>";
		index 				   = "<?php echo $index; ?>";
		quantity 			   = "<?php echo $quantity; ?>";
		var $cost 			 = "<?php echo $total; ?>";
		var $cost 			 = parseFloat($cost)*100;
		var $quantity 	 = "<?php echo $quantity; ?>";
		var $buyer_email = localStorage.getItem("buyer_email");

			//key: 'pk_live_uJKTW3qOpa71wHf6DeVXft8K',
			//key: 'pk_test_AKb5rcrHRSKKAf3mkzlM05Yx',
		var handler = StripeCheckout.configure({
			key: 'pk_test_AKb5rcrHRSKKAf3mkzlM05Yx',
			image: '/images/small_logo.png',
			locale: 'auto',
			token: function(token) {
				orderData.stripe_token = token;
				orderData.cost				 = $cost;
				orderData.quantity		 = $quantity;
        $.ajax({  
          url: 'forms/purchase/sendToDB',
          async: false,
          data: orderData,
          type: 'POST',
          dataType: 'json',
          success: function(data) {
						if (data.status == "success")
						  window.location.replace('/thank_you');
						else if(data.status == "error" && data.error == "error")
						  window.location.replace('/index');
						else 
						  window.location.replace('/error');
          }
        });
				//window.location.replace('/thank_you');
				// Use the token to create the charge with a server-side script.
				// You can access the token ID with `token.id`
				//console.log(token);
			},
		});

		$('#payButton').on('click', function(e) {
			// Open Checkout with further options
			handler.open({
				name:    'CertRebel, LLC',
				amount:   $cost,
				email:    $buyer_email,
				zipCode: 'false'
			});
			e.preventDefault();
		});

		// Close Checkout on page navigation
		$(window).on('popstate', function() {
			handler.close();
		});
  </script>	
</div>
<div style="padding-right: 17%; padding-left: 17%;" class="col-md-12 col-sm-12 col-xs-12">
	<hr style="margin-bottom: 10px;">
	<div class="general-info col-md-6 col-sm-6 col-xs-6">
		<div class="course-widget" style="width:90%;">
		  <span style="cursor: pointer;" id="backButton"><i style="padding-right: 3%;" class="fa fa-chevron-left"></i>Back</span>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('button#payButton').prop('disabled',true)
		$('input[type="checkbox"]').on('click', function() {
			if ($('input[type="checkbox"]').is(":checked")) {
				$('button#payButton').prop('disabled',false)
			} else {
				$('button#payButton').prop('disabled',true)
			}	
		});
		buyer_first_name = localStorage.getItem('buyer_first_name');
		buyer_last_name = localStorage.getItem('buyer_last_name');
		buyer_email = localStorage.getItem('buyer_email');
		buyer_phone = localStorage.getItem('buyer_phone');
		buyer_company = localStorage.getItem('buyer_company');
		buyer_address1 = localStorage.getItem('buyer_address1');
		buyer_address2 = localStorage.getItem('buyer_address2');
		buyer_city = localStorage.getItem('buyer_city');
		buyer_state_name = localStorage.getItem('buyer_state_name');
		buyer_country = localStorage.getItem('buyer_country');
		buyer_zip = localStorage.getItem('buyer_zip');
		quantity = "<?php echo $quantity; ?>";
		quantity = parseInt(quantity);
		attendee_info = {
			first_name: [],
			last_name: [],
			email: [],
			phone: []
		};
		for(i = 1; i <= $quantity; ++i){
			first_name = 'attendee'+i+'_first_name';
			last_name = 'attendee'+i+'_last_name';
			email = 'attendee'+i+'_email';
			phone = 'attendee'+i+'_phone';
			attendee_info.first_name.push(localStorage.getItem(first_name));
			attendee_info.last_name.push(localStorage.getItem(last_name));
			attendee_info.email.push(localStorage.getItem(email));
			attendee_info.phone.push(localStorage.getItem(phone));
		}

		orderData = {
			buyer_first_name : buyer_first_name,
			buyer_last_name  : buyer_last_name,
			buyer_email 		 : buyer_email,
			buyer_phone 		 : buyer_phone,
			buyer_company		 : buyer_company,
			buyer_address1	 : buyer_address1,
			buyer_address2	 : buyer_address2,
			buyer_city 	     : buyer_city ,
			buyer_state_name : buyer_state_name,
			buyer_country		 : buyer_country,
			buyer_zip				 : buyer_zip,
			attendee_info		 : attendee_info,
			stripe_token		 : {},
			quantity				 : quantity,
			index						 : index,
			course					 : course
		}
		$('#backButton').on('click', function(){
			$("#middle-box").load("forms/purchase/attendee_info?course=<?php echo $course; ?>&index=<?php echo $index; ?>&quantity=<?php echo $quantity; ?>");
			$("html, body").animate({ scrollTop: 0 }, 500);
		});
	});
</script>
