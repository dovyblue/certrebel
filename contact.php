<!-- Contact Page -->


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

	<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">

	<link rel="stylesheet" type="text/css" href="/libraries/swal/dist/sweetalert.css?ver=<?php echo $version;?>"> 
	<link rel="stylesheet" type="text/css" href="/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/stroke.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/animate.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/carousel.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/prettyPhoto.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-select.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/style.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/quote.css?ver=<?php echo $version;?>">

	<!-- COLORS -->
	<link rel="stylesheet" type="text/css" href="/css/custom.css?ver=<?php echo $version;?>">

	<!-- RS SLIDER -->
	<link rel="stylesheet" type="text/css" href="/libraries/rs-plugin/css/settings.css?ver=<?php echo $version;?>" media="screen" />

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
						<img src="/images/small_logo.png" alt="" class="loader-site">
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
						<a class="navbar-brand" href="/"><img src="/images/cert_logo.png" style="margin-top: -12px; margin-right: 0px;" alt="CertRebel logo"></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown megamenu"><a href="/">Home</a></li>
							<li><a href="/about">About</a></li>
							<li class="dropdown megamenu"><a href="/courses">Courses</a></li>
							<li class="active"><a href="#">Contact</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</nav><!-- end nav -->
			</div><!-- end container -->
		</header><!-- end header -->

	  <section id="about_parallax" class="section-white page-title-wrapper" data-stellar-background-ratio="1" data-stellar-offset-parent="true">
			<div class="container" style="padding-top: 90px;">
				<div class="relative">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title text-center">
							<h4>Contact Us</h4>
							<hr>
							<p>We Want To Hear From You </p>
							<ol class="breadcrumb">
							  <li><a href="/">Home</a></li>
							  <li class="active">Contact</li>
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
					<div class="col-md-12">
						<section class="googlemap">
							<!--<iframe class="mapmarker" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8351118085707!2d144.955652!3d-37.817330999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4c2b349649%3A0xb6899234e561db11!2sEnvato!5e0!3m2!1sen!2s!4v1433492479787"></iframe>-->
							<iframe class="mapmarker" style="pointer-events:none;" width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=175%20Varick%20Street%2C%20New%20York%2C%20NY%2010014&key=AIzaSyB6b4JwW29ht9cPue50gBMKr6DpAYOd1Lk" allowfullscreen></iframe>
						</section>
					</div><!-- end col -->
				</div><!-- end row -->

				<div class="row section-container">
					<div class="col-md-12">
						<div class="section-title text-center">
						<h4>Quick Contact</h4>
						<hr>
						<p>We Want To Hear From You Soon!</p>
						</div><!-- end title -->
					</div><!-- end col -->
				</div><!-- end row -->

				<div class="row section-container">
					<div class="col-md-8">
						<form id="contact" class="row contact_form">
							<p class="bg-success contact-banner">Your message has been successfully sent!</p>
							<p class="bg-danger contact-banner">You need to fill out every required field.</p>
							<p class="bg-warning contact-banner">Oops! Something went wrong and we couldn't send your message.<br>Please try again later.</p>
							<div class="col-md-6 col-sm-6">
							    <input id="user_name" type="text" class="form-control" placeholder="Your Name*" required>
							</div>
							<div class="col-md-6 col-sm-6">
							    <input id="user_email" type="email" class="form-control" placeholder="Your Email*" required>
							</div>
							<div class="col-md-12 col-sm-6">
							    <textarea id="user_message" class="form-control" placeholder="Message*" required></textarea>
							</div>
							<div class="col-md-12 col-sm-6">
							    <button class="btn btn-primary btn-block">Send Message</button>
							</div>
						</form>
					</div>
					<div class="col-md-4">
						<div class="contact-widget">
							<h4>Contact Information :</h4>
							<i class="fa fa-envelope"></i>
							<p>If you are experiencing any difficulties or you want to leave us a quick feedback on how we're doing, please send us a quick message.</p>
							<small>- info@certrebel.com</small>
							<small>- (646) 470-7119</small>
						</div><!-- end contact-widget -->

						<div class="contact-widget">
							<h4>Business Hours :</h4>
							<i class="fa fa-clock-o"></i>
							<p>Monday – Friday : 9am to 8pm<br>
							Saturday : 9am to 5pm<br>
							Sunday : Closed</p>
						</div><!-- end contact-widget -->

					</div><!-- end col -->
				</div>
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
					<form role="form" action="/forms/contact/quote" method="post">
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

	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/retina.js"></script>
	<script src="/js/wow.js"></script>
	<script src="/js/carousel.js"></script>
	<script src="/js/progress.js"></script>
	<script src="/js/parallax.js"></script>
	<script src="/js/jquery.prettyPhoto.js"></script>
	<script src="/js/custom.js?ver=<?php echo $version;?>"></script>
	<script src="/js/clear.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/libraries/swal/dist/sweetalert.min.js"></script>
	<script src="/js/maskedinput.js" type="text/javascript"></script>
	<script src="/js/contact.js?ver=<?php echo $version;?>"></script>

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
	<script src="/libraries/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
  <script src="/libraries/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
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

	<script src="/js/jquery.fitvids.js"></script>
	<script>
	  $(document).ready(function(){
	    $(".blog-media").fitVids();
			$('.googlemap').on('click', function(){
			  $('.googlemap iframe').css("pointer-events", "auto");
			});
      $('.googlemap').mouseleave(function(){ 
			  $('.googlemap iframe').css("pointer-events", "none");
		  });
	  });
	</script>

</body>
</html>
