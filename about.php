<!-- About Page -->


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
								<li class="active"><a href="/about">About</a></li>
								<li class="dropdown megamenu"><a href="/courses">Courses</a></li>
								<li class="dropdown megamenu"><a href="/contact">Contact</a></li>
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
							<h4>About Us</h4>
							<hr>
							<p>All You Want To Know About Us</p>
							<ol class="breadcrumb">
							  <li><a href="/">Home</a></li>
							  <li class="active">About</li>
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
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="widget about-widget wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
							<div class="widget-title">
								<h4>About Us</h4>
								<hr>
							</div><!-- end widget-title -->
							<img src="/css/upload/about_01.png" alt="" class="hidden img-responsive">
							<p>CertRebel, LLC is a family-owned business with over 45 years of teaching experience in the environmental health and safety field. We at CertRebel believe that our student-instructor relationship shouldn't end in the classroom. <span class="">Through our post-training consulting services, your company's continued compliance is our number one priority. Let CertRebel guide you with our custom instruction, expert consultations, and years of in-the-field work experience.</span>  <!-- <a id="read_more" class="readmore">Read More</a> --></p>
						</div><!-- end widget -->
					</div><!-- end col -->

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="widget about-widget wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
							<div class="widget-title">
								<h4>Why Us</h4>
								<hr>
							</div><!-- end widget-title -->
							<div>
							Founded in October 2015, CertRebel, LLC provides world class training and consulting services to a wide variety of professions, including general contractors, painting companies, home improvement professionals, general tradesman, code enforcement officials, construction industry professionals, disaster remediation firms, maintenance personnel and property managers. Our training courses provide students with the necessary skills to become certified in full compliance with their respective discipline.	
							</div>
						</div><!-- end widget -->
					</div><!-- end col -->

					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="widget about-widget wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
							<div class="widget-title">
								<h4>Testimonials</h4>
								<hr>
							</div><!-- end widget-title -->
							<div class="row dark-testimonials">
								<div style="margin-top:-21px;" class="col-md-12 col-sm-12 col-xs-12">
									<div class="testi-style-3 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s;">
										<p class="lead" style="font-size: 14px;"><i class="fa fa-quote-right"></i> CertRebel has excellent teachers, they relay all of the information in a way that it can be easily absorbed. Their experience in the real world along with their superb teaching skills and attention to the students questions allowed the course information to be relayed with ease.</p>
										<h4><img src="/css/upload/unknown.png" alt="" class="img-circle"> Bill W. <span>-- Certified by CertRebel --<small class="hidden">7oroof Agency</small></span></h4>
									</div><!-- end testi-style-2 -->
								</div>
							</div><!-- end skills -->
						</div><!-- end widget -->
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end container -->
		</section><!-- end section-white -->

		<section id="parallax4" class="section-white fullscreen" data-stellar-background-ratio="0.6" data-stellar-offset-parent="true">
			<div class="container relative">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
						<h4>Our Services</h4>
						<hr>
						<p class="hidden">Find The Hidden Learner Within You</p>
						</div><!-- end title -->
					</div><!-- end col -->
				</div><!-- end row -->

				<div class="row section-container">	
					<div class="col-md-4 col-sm-8"> 
						<div class="service-item text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
							<div class="rounded-icon">
								<i class="icon icon-Book"></i>
							</div><!-- end rounded-icon -->
							<div class="service-desc">
								<h4>Certification Courses</h4>
								<hr>
								<p>Find a local training course near you.<br><a href="/courses" style="display:none;">Read More</a></p>
							</div><!-- end service-desc -->
						</div><!-- end item --></a>
					</div>

					<div class="col-md-4 col-sm-8">
						<div class="service-item text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
							<div class="rounded-icon">
								<i class="icon icon-Users"></i>
							</div><!-- end rounded-icon -->
							<div class="service-desc">
								<h4>Speak to a Consultant</h4>
								<hr>
								<p>Hand tailor a training program based on your needs. <br><a href="#" style="display:none;">Read More</a></p>
							</div><!-- end service-desc -->
						</div><!-- end item -->
					</div>

					<div class="col-md-4 col-sm-8">
						<div class="service-item text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
							<div class="rounded-icon">
								<i class="icon icon-MessageLeft"></i>
							</div><!-- end rounded-icon -->
							<div class="service-desc">
								<h4>On-Site Training</h4>
								<hr>
								<p>CertRebel will send our expert instructors to you.<br> <a href="#" style="display:none;">Read More</a></p>
							</div><!-- end service-desc -->
						</div><!-- end item -->
					</div><!-- end row -->
				</div><!-- end services -->
			</div><!-- end container -->
	  </section>

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
	  });
	</script>

</body>
</html>
