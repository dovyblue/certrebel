<!-- Main Page -->
<?php
	session_start();
	require_once('/var/www/certrebel/classes/courses/Courses.php');
	require_once('sendmail.php');
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

	<link rel="stylesheet" type="text/css" href="/css/dist/bootstyle.min.css?ver=<?php echo $version;?>">

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

		<header id="keep-position-fixed" style="background:linear-gradient(to bottom, #fdfdfd 0%,#f7f7f7 100%) ;" class="header clearfix">
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
						<a class="navbar-brand" href="/"><img src="/images/cert_logo.png" alt="" style="margin-top: -12px; margin-right: 0px;"></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
			      <ul class="nav navbar-nav navbar-right">
							<li class="dropdown active megamenu"><a href="/">Home</a></li>
       				<li><a href="/about">About</a></li>
							<li class="dropdown megamenu"><a href="/courses">Courses</a>
							<li class="dropdown megamenu"><a href="/contact">Contact</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</nav><!-- end nav -->
			</div><!-- end container -->
		</header><!-- end header -->

		<section class="slider-section" id="slider-section">
			<div class="tp-banner-container">
				<div class="tp-banner">
					<ul>
						<li data-transition="slidevertical" data-slotamount="1" data-masterspeed="500" data-thumb="images/slide4.png"  data-saveperformance="off"  data-title="Slide">
						  <img src="/images/slide4.png"  alt="fullslide1"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
	                        <div class="tp-caption slider_01 text-left skewfromright randomrotateout tp-resizeme"
	                            data-x="left"
	                            data-y="105" 
	                            data-speed="1000"
	                            data-start="800"
	                            data-easing="Power3.easeInOut"
	                            data-splitin="none"
	                            data-splitout="none"
	                            data-elementdelay="0.1"
	                            data-endelementdelay="0.1"
	                            data-endspeed="1000"
	                            style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
															<img src="/images/orange-county.png"  alt="Orange County Logo" style="height: 55px; background: #df4a43;">
	                        </div>
													<div class="tp-caption slider_01 text-left skewfromright randomrotateout tp-resizeme"
															data-x="left"
															data-y="180" 
															data-speed="1000"
															data-start="1400"
															data-easing="Power3.easeInOut"
															data-splitin="none"
															data-splitout="none"
															data-elementdelay="0.1"
															data-endelementdelay="0.1"
															data-endspeed="1000"
	                            style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><hr>
	                        </div>
	                        <div class="tp-caption slider_02 text-center skewfromright randomrotateout tp-resizeme"
	                            data-x="left"
	                            data-y="240" 
	                            data-speed="1000"
	                            data-start="1400"
	                            data-easing="Power3.easeInOut"
	                            data-splitin="none"
	                            data-splitout="none"
	                            data-elementdelay="0.1"
	                            data-endelementdelay="0.1"
	                            data-endspeed="1000"
	                            style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">Free! Lead Renovator (RRP)
	                        </div>
	                        <div class="tp-caption slider_03 text-left randomrotateout tp-resizeme"
	                            data-x="left"
	                            data-y="305" 
	                            data-speed="1000"
	                            data-start="1400"
	                            data-easing="Power3.easeInOut"
	                            data-splitin="none"
	                            data-splitout="none"
	                            data-elementdelay="0.1"
	                            data-endelementdelay="0.1"
	                            data-endspeed="1000"
	                            style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
															The Orange County Department of Health has provided funding for this training for free! <br>
															This course includes both training and EPA Certification for Lead Paint Safety during renovations.<br>
															Free for property owners and contractors.<br>
															**Students must reside in Orange County, Ulster County, Putnam County,<br>
															or surrounding areas to be eligible for the free class.<br>
															Please call <span style="font-size: 16px;">(646) 470-7119</span> or email info@certrebel.com if you have any questions.

	                        </div>
	                        <div class="tp-caption text-center randomrotateout tp-resizeme"
	                            data-x="left"
	                            data-y="560" 
	                            data-speed="1000"
	                            data-start="1400"
	                            data-easing="Power3.easeInOut"
	                            data-splitin="none"
	                            data-splitout="none"
	                            data-elementdelay="0.1"
	                            data-endelementdelay="0.1"
	                            data-endspeed="1000"
	                            style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;"><a href="course/rrpif" class="btn btn-slider">Register Now</a>
	                        </div>
							<div class="hidden tp-caption slider_01 text-left skewfromright randomrotateout tp-resizeme"
									data-x="left"
									data-y="240" 
									data-speed="1000"
									data-start="1400"
									data-easing="Power3.easeInOut"
									data-splitin="none"
									data-splitout="none"
									data-elementdelay="0.1"
									data-endelementdelay="0.1"
									data-endspeed="1000"
									style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">Find The Hidden Learner Within You<hr>
							</div>
							<div class="hidden tp-caption slider_02 text-center skewfromright randomrotateout tp-resizeme"
									data-x="left"
									data-y="330" 
									data-speed="1000"
									data-start="1400"
									data-easing="Power3.easeInOut"
									data-splitin="none"
									data-splitout="none"
									data-elementdelay="0.1"
									data-endelementdelay="0.1"
									data-endspeed="1000"
									style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">Certification Made Easy
							</div>
							<div class="hidden tp-caption slider_03 text-left randomrotateout tp-resizeme"
									data-x="left"
									data-y="395" 
									data-speed="1000"
									data-start="1400"
									data-easing="Power3.easeInOut"
									data-splitin="none"
									data-splitout="none"
									data-elementdelay="0.1"
									data-endelementdelay="0.1"
									data-endspeed="1000"
									style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">Our mission is to provide meaningful training courses that are <br> relevant, industry-specific, and most importantly, fun!
							</div>
						</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="section-white" style="padding-bottom: 42px;">
			<div class="container">
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
					<div class="col-md-4 col-sm-8" style="cursor: pointer; margin-bottom: 48px;">
					  <a style="color: #7a7c82" href="/courses">
							<div class="service-item text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
								<div class="rounded-icon">
									<i class="icon icon-Book"></i>
								</div><!-- end rounded-icon -->
								<div class="service-desc">
									<h4>Certification Courses</h4>
									<hr>
									<p>Find a local training course near you.<br><a href="/courses">Read More</a></p>
								</div><!-- end service-desc -->
							</div><!-- end item -->
						</a>
					</div>

					<div class="col-md-4 col-sm-8" id="myBtn" style="cursor: pointer; margin-bottom: 48px;" data-toggle="modal" data-target="#myModal">
						<div class="service-item text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
							<div class="rounded-icon">
								<i class="icon icon-Users"></i>
							</div><!-- end rounded-icon -->
							<div class="service-desc">
								<h4>Speak to a Consultant</h4>
								<hr>
								<p>Hand tailor a training program based on your needs. <br><a href="#">Contact Us</a></p>
							</div><!-- end service-desc -->
						</div><!-- end item -->
					</div>

					<div class="col-md-4 col-sm-8" id="quoteBtn" style="cursor: pointer; margin-bottom: 48px;" data-toggle="modal" data-target="#getQuote">
						<div class="service-item text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
							<div class="rounded-icon">
								<i class="icon icon-MessageLeft"></i>
							</div><!-- end rounded-icon -->
							<div class="service-desc">
								<h4>On-Site Training</h4>
								<hr>
								<p>CertRebel will send our expert instructors to you.<br> <a href="#">Get A Quote</a></p>
							</div><!-- end service-desc -->
						</div><!-- end item -->
					</div>
				</div><!-- end services -->
			</div>
		</section>

		<section class="section-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
							<h4>Latest Courses</h4>
							<hr>
							<p>Check Out Our Latest Professional Courses</p>
						</div><!-- end title -->
					</div><!-- end col -->
				</div><!-- end row -->
				
				<div id="owl-courses" class="section-container">
				<?php
				$course_ids = ['rrpif','rrpi','hazi'];
				foreach($course_ids as $id) {
					$course = new Courses\Course($id);
					$box = ($course->getAllSingleCourses()->getPrice() === "0") ? "box sample" : "";
				?>
					<div class="course-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
						<div class="<?php echo $box; ?> owl-image">
							<a href="/course/<?php echo $course->getId(); ?>" title=""><img src="/images/<?php echo $course->getPicture(); ?>" alt="" class="img-responsive"></a>
							<?php if($box) echo '<div class="ribbon"><span>FREE</span></div>'; ?>
						</div><!-- end image -->
						<div class="course-desc">
							<h5><a href="/course/<?php echo $course->getId(); ?>" title=""><?php echo $course->getShortTitle(); ?></a></h5>
							<span class="meta"><?php echo $course->getTagLine(); ?></span>
							<p><?php echo $course->getShortDetailLimited(); ?></p>
							<div class="course-big-meta clearfix">
								<div class="pull-left">
									<a href="/course/<?php echo $course->getId(); ?>" class="owl-button">Details</a>
								</div><!-- end left -->
								<div class="pull-right">
									<p>$<?php echo $course->getAllSingleCourses()->getPrice(); ?></p>
								</div><!-- end right -->
							</div><!-- end course-big-meta -->
						</div><!-- end desc -->
					</div><!-- end item -->
				<?php
				}
				?>
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
							<input name="phone" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="(555) 555-5555*" id="phone" required />
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

<!-- Modal Contact Form -->
<div id="getQuote" class=" modal fade"  tabindex="-1">
	<div class="modal-dialog form-div">
		<div class="modal-content">
			<div class="modal-header" style="background-color:#df4a43">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color:#750909 !important">&times;</button>
				<h4 style="text-align:center; font-size: 25px; color:white;"><span class="glyphicon glyphicon-envelope" style="margin-right:10px"></span> Get a quote!</h4>
			</div>
			
			<div class="modal-body">
				<form role="form" action="/forms/contact/onsite" method="post">
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
							<input name="phone" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="(555) 555-5555*" id="phone" required />
						</p>
						<div id="question" class="mc-select-wrap feedback-input">
							<div class="mc-select">
									<select name="selectOption" class="select" required>
											<option id="dummySelect" value="" disabled selected hidden>Course Category*</option>
											<option value="Lead Certification">Lead Certification</option>
											<option value="Asbestos Training">Asbestos Training</option>
											<option value="Hazardous Materials">Hazardous Materials</option>
											<option value="OSHA Construction Safety">OSHA Construction Safety</option>
											<option value="Mold Training">Mold Training</option>
											<option value="Other">Other</option>
											<i class="fa fa-angle-down"></i>
									</select>
							</div>
            </div>
						<p class="text" style="padding-bottom: 0;">
							<textarea style="height:90px;" name="text" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Message*" required></textarea>
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

	<script type="text/javascript" src="/js/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/js/dist/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/dist/wow.min.js"></script>
	<script type="text/javascript" src="/js/dist/carousel.min.js"></script>
	<script type="text/javascript" src="/js/dist/progress.min.js"></script>
	<script type="text/javascript" src="/js/dist/parallax.min.js"></script>
	<script type="text/javascript" src="/js/dist/jquery.prettyPhoto.min.js"></script>
	<script type="text/javascript" src="/js/dist/custom.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/js/dist/clear.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/js/dist/maskedinput.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/libraries/swal/dist/sweetalert.min.js"></script>

	<script type="text/javascript">
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

<script type="text/javascript">
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
	<script type="text/javascript" src="/libraries/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
  <script type="text/javascript" src="/libraries/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
  <script type="text/javascript">
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
	<script type="text/javascript">
		$(document).ready(function(){
			loadStyleSheet('/libraries/swal/dist/sweetalert.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/libraries/rs-plugin/css/settings.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/quote.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/onsite.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/stroke.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/animate.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/carousel.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/ribbon.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css');
		});
	</script>

 </body>
</html>
