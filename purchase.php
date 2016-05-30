<?php
	session_start();
	require_once('sendmail.php');
	require_once('/var/www/certrebel/classes/courses/SingleCourses.php');
	$course_id = htmlentities($_GET['course']);
	$single_course = new SingleCourses\SingleCourse($course_id);
	include_once('version_number.inc');
  if (!isset($_GET['course']) || !isset($_GET['index']) || !$single_course->single_course_success) {
    header("Location: /courses");
  } 
	$course = htmlentities($_GET['course']);
	$index	= htmlentities($_GET['index']);
	$attendee_var = isset($_GET['attendee_var'])? $_GET['attendee_var'] : 1;
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
	<link rel="stylesheet" type="text/css" href="/css/style.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/quote.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/onsite.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/terms_of_service.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/magnific-popup.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/squares.css?ver=<?php echo $version;?>">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="/libraries/bootstrap-select/dist/css/bootstrap-select.css?ver=<?php echo $version;?>">


	<!-- COLORS -->
	<link rel="stylesheet" type="text/css" href="/css/custom.css?ver=<?php echo $version;?>">

	<!-- RS SLIDER -->
	<link rel="stylesheet" type="text/css" href="/libraries/rs-plugin/css/settings.css?ver=<?php echo $version;?>" media="screen" />

	<style>
		.drop-caps p:first-child::first-letter {
			margin-top:0px;
			padding-bottom: 15px;
		}
		.drop-caps.full p:first-child::first-letter {
			padding-bottom: 15px;
		}
		.padding {
			padding-right:0px;
			padding-left:0px;
		}
		.padding-inside {
			padding-right:10px;
			padding-left:10px;
		}
		.form-control {
			text-transform: none;
			color: black;
		}		
		::-webkit-input-placeholder {
			text-transform: uppercase;
		}
		:-moz-placeholder {
			text-transform: uppercase;
		}
		::-moz-placeholder {
			text-transform: uppercase;
		}
		:-ms-input-placeholder {
			text-transform: uppercase;
		}
		.center-block {
				float: none;
				margin-left: auto;
				margin-right: auto;
		}

		.input-group .icon-addon .form-control {
				border-radius: 0;
		}

		.icon-addon {
				position: relative;
				color: #555;
				display: block;
		}

		.icon-addon:after,
		.icon-addon:before {
				display: table;
				content: " ";
		}

		.icon-addon:after {
				clear: both;
		}

		.icon-addon.addon-md .glyphicon,
		.icon-addon .glyphicon, 
		.icon-addon.addon-md .fa,
		.icon-addon .fa {
				position: absolute;
				z-index: 2;
				left: 10px;
				font-size: 14px;
				width: 20px;
				margin-left: -2.5px;
				text-align: center;
				padding: 10px 0;
				top: 1px
		}

		.icon-addon.addon-lg .form-control {
				line-height: 1.33;
				height: 46px;
				font-size: 18px;
				padding: 10px 16px 10px 40px;
		}

		.icon-addon.addon-sm .form-control {
				height: 30px;
				padding: 5px 10px 5px 28px;
				font-size: 12px;
				line-height: 1.5;
		}

		.icon-addon.addon-lg .fa,
		.icon-addon.addon-lg .glyphicon {
				font-size: 18px;
				margin-left: 0;
				left: 11px;
				top: 4px;
		}

		.icon-addon.addon-md .form-control,
		.icon-addon .form-control {
				padding-left: 30px;
				float: left;
				font-weight: normal;
		}

		.icon-addon.addon-sm .fa,
		.icon-addon.addon-sm .glyphicon {
				margin-left: 0;
				font-size: 12px;
				left: 5px;
				top: -1px
		}

		.icon-addon .form-control:focus + .glyphicon,
		.icon-addon:hover .glyphicon,
		.icon-addon .form-control:focus + .fa,
		.icon-addon:hover .fa {
				color: #2580db;
		}
		.bold {
			font-weight: bold;
		}
		.general-info {
			font-weight: bold;
			font-size: 15px;
		}
		div#middle-box {
			background: white;
			margin-top: 5%;
			width: 90%;
			margin-left: 5%;
			padding-top: 2%;
			padding-bottom: 5%;
		}
		#keep-position-fixed {
			width: 100%;
			top: 0;
			right: 0;
			padding: 0;
			margin: 0;
			position: fixed;
			border-bottom: 1px solid #ececec;
			z-index: 9999;
			-webkit-transition: all 0.8s;
			-moz-transition: all 0.8s;
			transition: all 0.8s;
		}
		.navbar-nav li {
			border-bottom: 2px solid #ffffff;	
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

	<?php include_once('scripts/js/seo.php'); ?>

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

	<div id="wrapper">

		<header id="keep-position-fixed" style="background:linear-gradient(to bottom, #fdfdfd 0%,#ffffff 100%) ;" class="header clearfix">
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
				<nav style="background:linear-gradient(to bottom, #fdfdfd 0%,#ffffff 100%) ;" class="yamm navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
										 <span class="sr-only">Toggle navigation</span>
										 <span class="icon-bar"></span>
										 <span class="icon-bar"></span>
										 <span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="/"><img src="/images/cert_logo.png" alt="" style="margin-top: -12px; margin-right: 0px;"></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
			      <ul class="nav navbar-nav navbar-right">
							<li class="dropdown megamenu"><a href="/">Home</a></li>
       				<li><a href="/about">About</a></li>
							<li class="dropdown megamenu"><a href="/courses">Courses</a>
							<li class="dropdown megamenu"><a href="/contact">Contact</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</nav><!-- end nav -->
			</div><!-- end container -->
		</header><!-- end header -->

		<section style="background-color: #f7f7f7;" class="section-white">
			<div class="container">
				<div class="row">
					<div id="middle-box" class="col-md-12 col-sm-12 col-xs-12">
						<div class="widget-title">
							<h1 style="text-align:center; font-size:30px;">We're curious ...</h1>
						</div>
						<h3 style="text-align:center; font-size:20px; color:#7a7c82; padding-bottom:5%;">How did you hear about us?</h3>
							<form class="form-horizontal" style="margin-left:20%; margin-right:10%;">
								<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
									<div id="hear_internet" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
										<i class="fa fa-search" style="font-size: 100px; margin-top:15%; margin-left: 11%;"></i>
									</div>
									<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
										<p style="text-align: center;padding-top: 8px;font-size: 16px;">Internet Search</p>
									</div>
								</div>
								<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
									<div id="hear_email" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
										<i class="fa fa-paper-plane-o" style="font-size: 100px; margin-top:15%; margin-left: 11%;"></i>
									</div>
									<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
										<p style="text-align: center;padding-top: 8px;font-size: 16px;">Email</p>
									</div>
								</div>
								<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
									<div id="hear_company" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
										<i class="fa fa-building-o" style="font-size: 100px; margin-top:19%; margin-left: 19%;"></i>
									</div>
									<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
										<p style="text-align: center;padding-top: 8px;font-size: 16px;">My Company</p>
									</div>
								</div>
								<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
									<div id="hear_friend" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
										<i class="fa fa-users" style="font-size: 100px; margin-top:20%; margin-left: 11%;"></i>
									</div>
									<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
										<p style="text-align: center;padding-top: 8px;font-size: 16px;">Colleague/Friend</p>
									</div>
								</div>
								<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
									<div id="hear_customer" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
										<i class="fa fa-user" style="font-size: 100px; margin-top:19%; margin-left: 19%;"></i>
									</div>
									<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
										<p style="text-align: center;padding-top: 8px;font-size: 16px;">I'm a Customer</p>
									</div>
								</div>
								<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
									<div id="hear_mail" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
										<i class="fa fa-envelope-o" style="font-size: 100px; margin-top:15%; margin-left: 11%;"></i>
									</div>
									<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
										<p style="text-align: center;padding-top: 8px;font-size: 16px;">Mail</p>
									</div>
								</div>
								<div class="col-sm-3 padding" style="margin-bottom:3%;height: 50%;">
									<div id="hear_other" class="col-sm-12 padding-inside" style="cursor: pointer; width: 150px; height: 150px; background: #F7F7F7;">
										<i class="fa fa-question" style="font-size: 100px; margin-top:20%; margin-left: 25%;"></i>
									</div>
									<div class="col-sm-12 padding-inside" style="width: 150px; height: auto;">
										<p style="text-align: center;padding-top: 8px;font-size: 16px;">Other</p>
									</div>
								</div>
							</form>
							<div style="padding-left:43%; padding-right:43%; padding-top:5%;" class="col-md-12 col-sm-12 col-xs-12">
								<button id="customButton" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">Continue</button>
							</div>
					</div><!-- end col -->

				</div><!-- end row -->
			</div><!-- end container -->
		</section><!-- end section-white -->

		<div id="loading" style="display:none; padding-left:45%;">
			<div class="loader-container">
				<div class='uil-squares-css loader-site' style='transform:scale(0.6);'>
					<div><div></div></div>
					<div><div></div></div>
					<div><div></div></div>
					<div><div></div></div>
					<div><div></div></div>
					<div><div></div></div>
					<div><div></div></div>
					<div><div></div></div>
				</div>
			</div>
		</div>
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
	<script src="/js/jquery-1.12.3.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/retina.js"></script>
	<script src="/js/wow.js"></script>
	<script src="/js/carousel.js"></script>
	<script src="/js/progress.js"></script>
	<script src="/js/parallax.js"></script>
	<script src="/js/jquery.prettyPhoto.js"></script>
	<script src="/js/custom.js?ver=<?php echo $version;?>"></script>
	<script src="https://checkout.stripe.com/checkout.js"></script>
	<script type="text/javascript" src="/libraries/swal/dist/sweetalert.min.js"></script>
	<script src="/js/maskedinput.js?ver=<?php echo $version;?>" type="text/javascript"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="/libraries/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
	<script src="/js/terms_of_service.js?ver=<?php echo $version;?>" type="text/javascript"></script>

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
			$course = "<?php echo $course; ?>";
			$index = "<?php echo $index; ?>";
			var att_var = "<?php echo $attendee_var; ?>";
			$("#middle-box").load("/forms/purchase/general_info?course="+$course+"&index="+$index+"&attendee_var="+att_var, function(){
				$('#quantity_result').selectpicker('refresh');
				$("html, body").animate({ scrollTop: 0 }, 500);
			});
	  });
	</script>
</body>
</html>
