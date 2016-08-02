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
	<meta name="description" content="Contact">
	<meta name="author" content="Rene Midouin">
	<meta name="keywords" content="">

	<title>Contact Us | CertRebel</title>

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

	<header id="keep-position-fixed" style="background:linear-gradient(to bottom, #fdfdfd 0%,#f7f7f7 100%) ;" class="header clearfix">
		<div id="wrapper">
			<div class="topbar clearfix" style="">
				<div class="container">
					<div class="clearfix">
						<div class="pull-left">
							<div class="contactwrap text-left">
								<ul class="list-inline">
									<li><i class="fa fa-phone"></i> Call Us: (646) 470-7119</li>
									<li><i class="fa fa-envelope"></i><a href="mailto:hello@certrebel.com"> Email Us: hello@certrebel.com</a></li>
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
							<li class="active"><a href="/contact">Contact</a></li>
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
						<section class="googlemap hidden">
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
						<form id="contact" class="row contact_form" style="padding-bottom:15%;">
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
							<p>If you are experiencing any difficulties or you want to leave us feedback on how we're doing, please send us a quick message.</p>
							<small>- hello@certrebel.com</small>
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
		<?php require_once("forms/footer/footer.php"); ?>
		<!-- End Footer -->
	</div><!-- end wrapper -->

	<script type="text/javascript" src="/js/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/js/dist/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/dist/wow.min.js"></script>
	<script type="text/javascript" src="/js/dist/clear.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/js/dist/contact.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			loadStyleSheet('/css/dist/stroke.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/animate.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css');
		});
	</script>

</body>
</html>
