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
	<meta name="description" content="Privacy Policy">
	<meta name="author" content="Rene Midouin">
	<meta name="keywords" content="">

	<title>Privacy Policy | CertRebel</title>

	<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">

	<link rel="stylesheet" type="text/css" href="/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/dist/bootstrap.min.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/dist/style.min.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/dist/animate.min.css?ver=<?php echo $version;?>">

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
							<li class="dropdown megamenu"><a href="/">Home</a>
							</li>
									<li><a href="/about">About</a></li>
							<li class="dropdown megamenu"><a href="/courses">Courses</a>
							</li>
							<li class="dropdown megamenu"><a href="/contact">Contact</a></li>
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
							  <li><a href="/">Home</a></li>
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

	<script type="text/javascript" src="/js/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/js/dist/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/dist/wow.min.js"></script>
	<script type="text/javascript" src="/js/dist/clear.min.js?ver=<?php echo $version;?>"></script>

</body>
</html>
