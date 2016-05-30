<?php
  session_start();
	require_once('/var/www/certrebel/functions.php');
	require_once('/var/www/certrebel/classes/courses/SingleCourses.php');
	if (!isset($_GET['course']) && !isset($_GET['quantity']))
		header("Location: /courses");
	
	$course 	= htmlentities($_GET['course']);
	$index 		= htmlentities($_GET['index']);
	$quantity = htmlentities($_GET['quantity']);
	$single_course  = new SingleCourses\SingleCourse($course);
	$single_course->setIndex($index);
?>
<div class="widget-title">
	<h1 style="text-align:center; font-size:30px;">Almost done <i class="fa fa-smile-o"></i></h1>
</div>
<h3 style="text-align:center; font-size:20px; color:#7a7c82; padding-bottom:5%;">Please review your info.</h3>
<div id="buyer_info" class="form-horizontal" style="margin-left:17%; margin-right:17%;">
	<span style="margin-left:1%; font-weight:bold; font-size:15px;">Course Info</span>
	<hr style="width:98%; margin-top:3px;">
	<div class="row" style="margin-top:0%; padding-left:1.5%; padding-right:1.5%;">
		<div class="col-md-7 col-sm-12 col-xs-12" style="margin-bottom: 3%;">
				<div class="course-widget" style="width:100%;">
					<ul>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Course: </div>
							<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $single_course->getLongTitle(); ?></strong></a></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Date: </div>
							<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $single_course->getMeetingDate(); ?></strong></a></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Time: </div>
							<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $single_course->getMeetingTime(); ?></strong></a></div>
						</li>
						<li>
							<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Address: </div>
							<div style="width: 78%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $single_course->getAddress(); ?></strong></a></div>
						</li>
					</ul>
				</div>
		</div>
		<div class="col-md-5 col-sm-12 col-xs-12" style="padding-left: 4%; padding-right:0;">
			<div class="row">
				<table class="table table-borderless">
					<tbody>
						<tr>
							<td style="float:right;">Quantity:</td>
							<td><span><?php echo $quantity; ?></td>
						</tr>
						<tr>
							<td style="float:right;">Unit Price:</td>
							<td><span>$</span><span><?php echo $single_course->getPrice('decimal'); ?></td>
						</tr>
						<tr>
							<td style="float:right;">Subtotal:</td>
							<td><span>$</span><span><?php echo $single_course->getPrice('decimal', $quantity); ?></span></td>
						</tr>
						<tr>
							<td style="float:right;">2% Processing Fee:</td>
							<td><span>$</span><span><?php echo $single_course->getFee('decimal', $quantity); ?></span></td>
						</tr>
						<tr>
							<td style="float:right;"><strong>Total:</strong></td>
							<td><span>$</span><span><strong><?php echo $single_course->getTotal('decimal', $quantity); ?></strong></span></td>
						</tr>
					</tbody>
				</table>
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
			<label style="cursor:default; float:left;">
				<input type="checkbox"> I agree to the Terms of Service and  
					<span id="inline-popups" style="cursor: pointer;" class="links"> 
						<a href="#test-popup" data-effect="mfp-zoom-in">Privacy Policy</a>
					</span>
				</input>
			</label>
		</div>
		<p>
		<strong>Changes and Cancellations to Your Registration for In-Person Courses:</strong><br>
		All courses are subject to a 25% administration fee if written notice is given at least 5 business days in advance to: support@certrebel.com. Refunds are not given if written notice is not received at least 5 business days in advance. Attendee substitutions are permitted and must be emailed to support@certrebel.com to be processed. In the case of an event cancellation made by CertRebel, LLC, you may choose to receive a 100% refund or you can choose to apply your registration fee to another course. By submitting payment you agree to these Terms of Service.
		</p>
		<p>
		<strong>Changes and Cancellations to Your Registration for Live Webinars or On-Demand Courses:</strong><br>
		All sales are final and refunds are not issued for Live Webinar and On-Demand courses.
		</p>
	</div>
</div>
<div class="col-md-2 col-md-offset-5 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
	<script src="https://checkout.stripe.com/checkout.js"></script>
	<button id="payButton" class="btn btn-block btn-primary">Pay</button>
	<script>
		course 				   = "<?php echo $course; ?>";
		index 				   = "<?php echo $index; ?>";
		quantity 			   = "<?php echo $quantity; ?>";
		var $cost 			 = "<?php echo $single_course->getTotal('decimal', $quantity); ?>";
		var $cost 			 = parseFloat($cost)*100;
		var $quantity 	 = "<?php echo $quantity; ?>";
		var $buyer_email = localStorage.getItem("buyer_email");

			//key: 'pk_live_uJKTW3qOpa71wHf6DeVXft8K',
			//key: 'pk_test_AKb5rcrHRSKKAf3mkzlM05Yx',
		var handler = StripeCheckout.configure({
			key: 'pk_live_uJKTW3qOpa71wHf6DeVXft8K',
			image: '/images/small_logo.png',
			locale: 'auto',
			token: function(token) {
				console.log('token');
				orderData.stripe_token = token;
				orderData.cost				 = $cost;
				orderData.quantity		 = $quantity;
        $.ajax({  
          url: '/forms/purchase/sendToDB',
          async: false,
          data: orderData,
          type: 'POST',
          dataType: 'json',
          success: function(data) {
						if (data.status == "success")
						  //window.location.replace('/thank_you');
							console.log('thank_you');
						else if(data.status == "error" && data.error == "error")
						  //window.location.replace('/index');
							console.log('index');
						else 
						  //window.location.replace('/error');
							console.log('error');
          }
        });
			},
			closed: function(){
				$('#loading').delay(300).fadeOut('slow');                                    
				$('#loader-container').delay(200).fadeOut('slow');
				$('body').delay(300).css({'overflow':'visible'});
			}
		});

		$('#payButton').on('click', function(e) {
			// Open Checkout with further options
			handler.open({
				name:    'CertRebel, LLC',
				amount:   $cost,
				email:    $buyer_email,
				zipCode: 'false'
			});
			$('#loading').show();
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

<!-- Terms of Service Popup -->
<div id="test-popup" class="white-popup mfp-with-anim mfp-hide">
  <header style="text-align:center;">
		<span class="start">Privacy Policy</span>
	</header>
  <div class="popup-scroll">
		<p style="padding-bottom:0;">
			This privacy policy discloses the privacy practices for <a href="http://certrebel.com" target="_blank">www.certrebel.com</a>.
			This privacy policy applies solely to information collected by this web site. It will notify you of the following:
			<ol>
				<li>What personally identifiable information is collected from you through the web site, how it is used and with whom it may be shared.</li>
				<li>What choices are available to you regarding the use of your data.</li>
				<li>The security procedures in place to protect the misuse of your information.</li>
				<li>How you can correct any inaccuracies in the information.</li>
			</ol>
		</p>
		<p>
			<strong>Information Collection, Use, and Sharing</strong><br>
			We are the sole owners of the information collected on this site. 
			We only have access to/collect information that you voluntarily give us via email or other direct contact from you. 
			We will not sell or rent this information to anyone.
			<br>
			<br>
			We will use your information to respond to you, regarding the reason you contacted us. 
			We will not share your information with any third party outside of our organization, other than as necessary to fulfill your request, i.e. to ship an order.
			<br>
			<br>
			Unless you ask us not to, we may contact you via email in the future to tell you about specials, new products or services, or changes to this privacy policy.
		</p>	
		<p style="padding-bottom:0;">
			<strong>Your Access to and Control Over Information</strong><br>
			You may opt out of any future contacts from us at any time. 
			You can do the following at any time by contacting us via the email address or phone number given on our website:
			<ul>
				<li>See what data we have about you, if any.</li>
				<li>Change/correct any data we have about you.</li>
				<li>Have us delete any data we have about you.</li>
				<li>Express any concern you have about our use of your data.</li>
			</ul>
		</p>	
		<p>
			<strong>Security</strong><br>
			We take precautions to protect your information. 
			When you submit sensitive information via the website, your information is protected both online and offline.
			To read more about our web security, visit Stripe at: <a href="https://stripe.com/us/features#seamless-security" target="_blank">https://stripe.com/us/features#seamless-security</a>.
			<br>
			<br>
			Wherever we collect sensitive information (such as credit card data), that information is encrypted and transmitted to us in a secure way.
			You can verify this by looking for a closed lock icon at the bottom of your web browser, or looking for "https" at the beginning of the address of the web page.
			<br>
			<br>
			While we use encryption to protect sensitive information transmitted online, we also protect your information offline.
			Only employees who need the information to perform a specific job (for example, billing or customer service) are granted access to personally identifiable information.
			The computers/servers in which we store personally identifiable information are kept in a secure environment.
		</p>	
		<p>
			<strong>Registration</strong><br>
			In order to use this website, a user must first complete the registration form.
			During registration a user is required to give certain information (such as name and email address).
			This information is used to contact you about the products/services on our site in which you have expressed interest.
			At your option, you may also provide demographic information (such as gender or age) about yourself, but it is not required.
		</p>	
		<p>
			<strong>Orders</strong><br>
			We request information from you on our order form.
			To buy from us, you must provide contact information (like name and shipping address) and financial information (like credit card number, expiration date). 
			This information is used for billing purposes and to fill your orders. If we have trouble processing an order, we'll use this information to contact you.
		</p>	
		<p>
			<strong>Updates</strong><br>
			Our Privacy Policy may change from time to time and all updates will be posted on this page. 
			If you feel that we are not abiding by this privacy policy, you should contact us immediately via telephone at <strong>646-470-7119</strong> or via email.
		</p>	
  </div>
</div>
<!-- End Terms of Service Popup -->

<script>
	$(document).ready(function(){
		$('#inline-popups').magnificPopup({
			delegate: 'a',
			removalDelay: 800,
			callbacks: {
				beforeOpen: function() {
					 this.st.mainClass = this.st.el.attr('data-effect');
				},
				close: function() {
					$('header .container:nth-child(2)').fadeIn(800, "linear");
				}
			},
			midClick: true
		});

		$('button#payButton').prop('disabled',true);

		$('input[type="checkbox"]').on('click', function() {
			if ($('input[type="checkbox"]').is(":checked")) {
				$('button#payButton').prop('disabled',false);
			} else {
				$('button#payButton').prop('disabled',true);
			}	
		});

		$('a[href="#test-popup"]').on('click', function() {
			$('header .container:nth-child(2)').css('display','none');
			$('button#payButton').prop('disabled',false);
			$('input[type="checkbox"]').prop('checked',true);
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
			$("#middle-box").load("/forms/purchase/attendee_info?course=<?php echo $course; ?>&index=<?php echo $index; ?>&quantity=<?php echo $quantity; ?>");
			$("html, body").stop().animate({ scrollTop: 0 }, 500);
		});
	});
</script>
