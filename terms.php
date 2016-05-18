<!-- Terms Page -->


<?php
	session_start();
	include_once('version_number.inc');
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">

	<title>CertRebel</title>

	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

	<link rel="stylesheet" type="text/css" href="libraries/swal/dist/sweetalert.css?ver=<?php echo $version;?>"> 
	<link rel="stylesheet" type="text/css" href="libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/stroke.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="css/animate.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="css/carousel.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="css/style.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="css/quote.css?ver=<?php echo $version;?>">

	<!-- COLORS -->
	<link rel="stylesheet" type="text/css" href="css/custom.css?ver=<?php echo $version;?>">

	<!-- RS SLIDER -->
	<link rel="stylesheet" type="text/css" href="libraries/rs-plugin/css/settings.css?ver=<?php echo $version;?>" media="screen" />

	<style>
		#keep-position-fixed {
			width: 100%;
			top: 0;
			right: 0;
			padding: 0;
			margin: 0;
			position: fixed;
			/*border-bottom: 1px solid #ececec;*/
			z-index: 9999;
			-webkit-transition: all 0.8s;
			-moz-transition: all 0.8s;
			transition: all 0.8s;
		}
		.modal-header, #myModal h4, #myModal .close {
				background-color: #df4a43 !important;
				color:white !important;
				text-align: center;
				font-size: 30px;
		}
		.modal-footer {
				background-color: #f9f9f9;
		}
	</style>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<?php include_once('js_scripts.php'); ?>

</head>
<body>
  <div id="loader">
		<div class="loader-container">
			<div class="wow zoomIn" data-wow-duration="1s" data-wow-offset="100">
				<div class="wow rubberBand" data-wow-delay="2000ms" data-wow-duration="1s">
					<div class="wow pulse" data-wow-delay="100ms" data-wow-iteration="infinite" data-wow-duration="1s">
						<img src="images/small_logo.png" alt="" class="loader-site">
					</div>
				</div>
			</div>
		</div>
	</div>
    
	<header id="keep-position-fixed" style="background:linear-gradient(to bottom, #fdfdfd 0%,#f7f7f7 100%) ;" class="header clearfix">
		<div id="wrapper">
			<div class="topbar clearfix" style="">
				<div class="container">
					<div class="clearfix">
						<div class="pull-left">
							<div class="contactwrap text-left">
								<ul class="list-inline">
									<li><i class="fa fa-phone"></i> Call Us: (646) 470-7119</li>
									<li><i class="fa fa-envelope"></i><a href="mailto:info@certrebel.com"> Email Us: info@certrebel.com</a></li>
								</ul>
							</div><!-- end contactwrap -->
						</div><!-- end col -->
						<div class="pull-right">
							<ul class="social">
							</ul>
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end container -->
			</div><!-- end topbar -->

			<div class="container">
				<nav class="yamm navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
										 <span class="sr-only">Toggle navigation</span>
										 <span class="icon-bar"></span>
										 <span class="icon-bar"></span>
										 <span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index"><img src="images/cert_logo.png" style="margin-top: -12px; margin-right: 0px;" alt="CertRebel logo"></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown megamenu"><a href="index">Home</a>
							</li>
									<li><a href="about">About</a></li>
							<li class="dropdown megamenu"><a href="courses">Courses</a>
							</li>
							<li><a id="contactBtn" href="#" data-toggle="modal" data-target="#myModal">Contact</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</nav><!-- end nav -->
			</div><!-- end container -->
	</header><!-- end header -->

	  <section id="faqs_parallax" class="section-white page-title-wrapper" data-stellar-background-ratio="1" data-stellar-offset-parent="true">
			<div class="container" style="padding-top:120px;">
				<div class="relative">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title text-center">
							<h4>Privacy Policy</h4>
							<hr>
							<ol class="breadcrumb">
							  <li><a href="index">Home</a></li>
							  <li class="active">Terms</li>
							</ol>
							</div><!-- end title -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end relative -->
			</div><!-- end container -->
		</section><!-- end section-white -->

		<section class="section-white">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="widget-title">
							<h4>Privacy Policy</h4>
							<hr>
						</div>
						<p style="padding-bottom:0;">
							This privacy policy discloses the privacy practices for <a style="color:#23527c;" href="http://certrebel.com" target="_blank">www.certrebel.com</a>.
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
							To read more about our web security, visit Stripe at: <a style="color:#23527c;" href="https://stripe.com/us/features#seamless-security" target="_blank">https://stripe.com/us/features#seamless-security</a>.
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
					</div><!-- end col -->

				</div><!-- end row -->
			</div><!-- end container -->
		</section><!-- end section-white -->

		<!-- Footer -->
		<?php require_once("footer.php"); ?>
		<!-- End Footer -->
	</div><!-- end wrapper -->

	<!-- Modal Contact Form -->
	<div id="myModal" class=" modal fade"  tabindex="-1">
		<div class="modal-dialog form-div">
			<div class="modal-content">
				<div class="modal-header" style="background-color:#df4a43">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#750909 !important">&times;</button>
					<h4 style="text-align:center; font-size: 25px; color:white;"><span class="glyphicon glyphicon-envelope" style="margin-right:10px"></span> Contact Us</h4>
				</div>
				
				<div class="modal-body">
					<form role="form" action="forms/contact/quote" method="post">
							<p class="name" style="padding-bottom:0;">
								<input style="width:50%; float:left;" name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="First Name*" id="name" required/>
								<input style="width:50%; border-left-color:#A9A9AE;" name="last_name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Last Name*" id="last_name" required/>
							</p>
							<p class="name" style="padding-bottom:0;">
								<input name="company" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Company" id="company" />
							</p>
							
							<p class="email" style="padding-bottom:0;">
								<input name="email" type="email" class="validate[required,custom[email]] feedback-input" placeholder="Email*" id="email" required/>
							</p>

							<p class="name" style="padding-bottom:0;">
								<input name="phone" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="(555)555-5555*" id="phone" required />
							</p>
							<p class="text" style="padding-bottom: 0;">
								<textarea style="max-height:90px;" name="text" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Message*" required></textarea>
							</p>
							<div class="modal-footer">
								<button id="sendForm" name="sendForm" type="submit" class="mc-btn btn-style-4">
									<i class="fa fa-paper-plane" style="margin-right:15px;"></i>SEND
								</button>
							</div>
					</form>
				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Modal Contact Form -->

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/retina.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/progress.js"></script>
	<script src="js/parallax.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/custom.js?ver=<?php echo $version;?>"></script>
	<script src="js/clear.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="libraries/swal/dist/sweetalert.min.js"></script>
	<script src="js/maskedinput.js" type="text/javascript"></script>

	<script>
		$("#contactBtn").click(function(){
			$('.header').fadeOut(0, "linear");
			$('#myModal input[name="phone"]').mask("(999) 999-9999");
		});
		$("#myBtn").click(function(){
			$('.header').fadeOut(0, "linear");
			$('#myModal input[name="phone"]').mask("(999) 999-9999");
		});
		$("#quoteBtn").click(function(){
			$('.header').fadeOut(0, "linear");
			$('#getQuote input[name="phone"]').mask("(999) 999-9999");
		});
		$('#myModal').on('hidden.bs.modal', function () {
			$('.header').fadeIn(0, "linear");
		});
		$('#getQuote').on('hidden.bs.modal', function () {
			$('.header').fadeIn(0, "linear");
		});
	</script>

	<script>
	$(document).ready(function(){
			$('select[name="selectOption"]').on('change', function() {
				$selectOption = $('#getQuote .mc-select select');
				$selectOption.css('cssText','color: #3c3c3c !important');
			});
			<?php
			if (isset($_SESSION['success'])) {
			?>	
				swal({
					title: "Awesome!", 
					text:  "<span style=\"font-size:19px;\">Your form has been sent.</span>", 
					type:  "success",
					html: 	true,
					confirmButtonColor: "#A5DC86"
				});
			<?php
				session_destroy();
			} else if (isset($_SESSION['error'])) {
			?>
				swal({
					title: "Oops!", 
					text:  "<span style=\"font-size:19px;\">Make sure you fill out all required fields.</span>", 
					type:  "error",
					html: 	true,
					confirmButtonColor: "#F27474"
				});
			<?php
				session_destroy();
			}
			?>
	});
	</script>
  	<!-- SLIDER REV -->
	<script src="libraries/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
  <script src="libraries/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
  <script>
		 /* ==============================================
		SLIDER -->
		=============================================== */   
		jQuery('.tp-banner').show().revolution(
		{
		dottedOverlay:"none",
		delay:16000,
		startwidth:1170,
		startheight:665,
		hideThumbs:200,     
		thumbWidth:100,
		thumbHeight:50,
		thumbAmount:5,  
		navigationType:"none",
		navigationArrows:"solo",
		navigationStyle:"preview3",  
		touchenabled:"on",
		onHoverStop:"on",
		swipe_velocity: 0.7,
		swipe_min_touches: 1,
		swipe_max_touches: 1,
		drag_block_vertical: false,          
		parallax:"mouse",
		parallaxBgFreeze:"on",
		parallaxLevels:[7,4,3,2,5,4,3,2,1,0],            
		keyboardNavigation:"off",   
		navigationHAlign:"center",
		navigationVAlign:"bottom",
		navigationHOffset:0,
		navigationVOffset:20,
		soloArrowLeftHalign:"left",
		soloArrowLeftValign:"center",
		soloArrowLeftHOffset:20,
		soloArrowLeftVOffset:0,
		soloArrowRightHalign:"right",
		soloArrowRightValign:"center",
		soloArrowRightHOffset:20,
		soloArrowRightVOffset:0,  
		shadow:0,
		fullWidth:"on",
		fullScreen:"off",
		spinner:"spinner4",  
		stopLoop:"off",
		stopAfterLoops:-1,
		stopAtSlide:-1,
		shuffle:"off",  
		autoHeight:"off",           
		forceFullWidth:"off",                         
		hideThumbsOnMobile:"off",
		hideNavDelayOnMobile:1500,            
		hideBulletsOnMobile:"off",
		hideArrowsOnMobile:"off",
		hideThumbsUnderResolution:0,
		hideSliderAtLimit:0,
		hideCaptionAtLimit:0,
		hideAllCaptionAtLilmit:0,
		startWithSlide:0
		});   
	</script>

	<script src="js/jquery.fitvids.js"></script>
	<script>
	  $(document).ready(function(){
	    $(".blog-media").fitVids();
	  });
	</script>

</body>
</html>
