<?php
	session_start();
	require_once('/var/www/certrebel/classes/attendees/Attendees.php');
	require_once('/var/www/certrebel/functions.php');
	require_once('credentials.php');
	include_once('/var/www/certrebel/version_number.inc');
	if (!isset($_COOKIE['xv']) || $_COOKIE['xv'] != get_rand(PASSWORD)) {
		header("Location: /");
	}
	$date = date('m-d-Y');
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
	<meta name="description" content="Purchase">
	<meta name="author" content="Rene Midouin">
	<meta name="keywords" content="">

	<title>Dashboard | CertRebel</title>

	<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">

	<link rel="stylesheet" type="text/css" href="/css/dist/bootstyle.min.css?ver=<?php echo $version;?>">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="/libraries/bootstrap-select/dist/css/bootstrap-select.min.css?ver=<?php echo $version;?>">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

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

		<header id="keep-position-fixed" style="background:linear-gradient(to bottom, #fdfdfd 0%,#ffffff 100%); border-bottom: 1px solid #ececec;" class="header clearfix">
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
							<li class="active dropdown megamenu"><a href="/">Home</a></li>
       				<li class="hidden"><a href="/about">About</a></li>
							<li class="dropdown megamenu"><a href="/courses">Courses</a>
							<li class="hidden dropdown megamenu"><a href="/contact">Contact</a></li>
            	<li class="dropdown" id="signout"><a><i style="font-size: 19px; cursor: pointer;" class="fa fa-power-off"></i></a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</nav><!-- end nav -->
			</div><!-- end container -->
		</header><!-- end header -->

		<section style="background-color: #f7f7f7; padding-top: 140px; min-height:800px;" class="section-white">
				<div class="container">
				<div class="row" style="margin-bottom: 5%;">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="col-md-3 col-md-offset-2 col-sm-12 col-xs-12" style="margin-bottom: 40px;">
							<div style="width: 20%; float: left; height: 45px; line-height: 45px; font-size: 17px; font-weight: bold;">
								<span>From</span>
							</div>
							<div class="input-group date">
									<input style="height: 45px; font-size: 15px; background-color: white; text-align: center;" 
												 type="text" class="from-date form-control" value="<?php echo $date; ?>">
									<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
									</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12 col-xs-12" style="margin-bottom: 40px;">
							<div style="width: 20%; float: left; height: 45px; line-height: 45px; font-size: 17px; font-weight: bold;">
								<span>To</span>
							</div>
							<div class="input-group date">
									<input style="height: 45px; font-size: 15px; background-color: white; text-align: center;" 
												 type="text" class="to-date form-control" value="<?php echo $date; ?>">
									<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
									</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-12 col-xs-12" style="padding-top: 8px; padding-bottom: 8px; margin-bottom: 40px;">
							<button id="date-submit" class="btn btn-block btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div id="data-loader">
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
				<div id="load-data" class="row">
				</div><!-- end row -->
			</div><!-- end container -->
		</section><!-- end section-white -->

		<!-- Footer -->
		<?php require_once("/var/www/certrebel/forms/footer/footer.php"); ?>
		<?php require_once("forms/login/log-out.php"); ?>
		<!-- End Footer -->

	</div><!-- end wrapper -->

<!-- UPDATE FORMS -->
<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
	<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
		<ul class="cd-switcher" style="padding-left: 0;">
			<li style="width: 100%; /*background: #c2c3c7;*/"><img src="/images/small_logo.png"/></li>
		</ul>

		<div id="cd-DOB"> <!-- cd-DOB form -->
			<form class="cd-form">
				<div class="fieldset">
					<label class="image-replace cd-email" for="reset-email">Company</label>
					<input style="font-size: 15px;" class="full-width has-padding has-border" id="attendee-DOB" type="text" placeholder="mm/dd/yyyy" autofocus required>
				</div>
				<p>
					<input style="color: white; font-size: 25px;" class="full-width has-padding" type="submit" value="Update">
				</p>
			</form>
		</div> <!-- cd-DOB -->

		<div id="cd-address"> <!-- address form -->
			<form class="cd-form">
				<div class="col-xs-12 col-md-6 col-sm-6 fieldset" style="padding-left: 0; margin-bottom: 0;">
					<label class="image-replace cd-username" for="signup-username">ADDRESS 1</label>
					<input style="font-size: 15px;" class="full-width has-padding has-border" id="attendee-address1" type="text" placeholder="ADDRESS 1*" required autofocus>
				</div>
				<div class="col-xs-12 col-md-6 col-sm-6 fieldset" style="margin-top: 0; padding-left: 0; margin-bottom: 0;">
					<label class="image-replace cd-username" for="signup-username">ADDRESS 2</label>
					<input style="font-size: 15px;" class="full-width has-padding has-border" id="attendee-address2" type="text" placeholder="ADDRESS 2">
				</div>
				<div class="col-xs-12 col-md-4 col-sm-4 fieldset" style="padding-left: 0;">
					<label class="image-replace cd-email" for="signup-email">CITY</label>
					<input style="font-size: 15px;" class="full-width has-padding has-border" id="attendee-city" type="text" placeholder="CITY*" required>
				</div>
				<div class="col-xs-12 col-md-4 col-sm-4 fieldset" style="padding-left: 0;">
					<label class="image-replace cd-email" for="signup-email">STATE</label>
					<input style="font-size: 15px;" class="full-width has-padding has-border" id="attendee-state_name" type="text" placeholder="STATE*" required>
				</div>
				<div class="col-xs-12 col-md-4 col-sm-4 fieldset" style="padding-left: 0;">
					<label class="image-replace cd-password" for="signup-password">ZIP</label>
					<input style="font-size: 15px;" class="full-width has-padding has-border" id="attendee-zip" type="text" placeholder="ZIP*" required>
				</div>
				<p>
					<input style="color: white; font-size: 25px;" class="full-width has-padding" type="submit" value="Update">
				</p>
			</form>
		</div> <!-- cd-address -->

		<div id="cd-company"> <!-- cd-company form -->
			<form class="cd-form">
				<div class="fieldset">
					<label class="image-replace cd-email" for="reset-email">Company</label>
					<input style="font-size: 15px;" class="full-width has-padding has-border" id="buyer-company" type="text" placeholder="Company" required autofocus>
				</div>
				<p>
					<input style="color: white; font-size: 25px;" class="full-width has-padding" type="submit" value="Update">
				</p>
			</form>
		</div> <!-- cd-company -->
		<div id="cd-phone"> <!-- cd-phone form -->
			<form class="cd-form">
				<div class="fieldset">
					<label class="image-replace cd-email" for="reset-email">Phone</label>
					<input style="font-size: 15px;" class="full-width has-padding has-border" id="attendee-phone" type="text" placeholder="(555) 555-5555" required autofocus>
				</div>
				<p>
					<input style="color: white; font-size: 25px;" class="full-width has-padding" type="submit" value="Update">
				</p>
			</form>
		</div> <!-- cd-phone -->
	</div> <!-- cd-user-modal-container -->
</div> <!-- cd-user-modal -->
<!-- END ACTUAL LOGIN FORM -->

	<script type="text/javascript" src="/js/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/js/dist/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/dist/wow.min.js"></script>
	<script type="text/javascript" src="/js/dist/maskedinput.min.js?ver=<?php echo $version;?>" type="text/javascript"></script>
	<script type="text/javascript" src="/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="/js/dist/clear.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/js/dist/date-processing.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/js/dist/main.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/js/dist/modernizr.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/js/dist/logout.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/libraries/swal/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		<?php
		if (isset($_SESSION['success'])) {
		?>	
			swal({
				title: "Awesome!", 
				text:  "<span style=\"font-size:19px;\">Student has been registered!.</span>", 
				type:  "success",
				html: 	true,
				confirmButtonColor: "#A5DC86"
			});
		<?php
			session_destroy();
		}
		?>
	});
	</script>
	<script>
		$(document).ready(function(){
			$('#data-loader').hide();
			$('#date-submit').click();
		});
	</script>
	<script>
		$(document).ready(function() {
			loadStyleSheet('/libraries/swal/dist/sweetalert.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/login.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/reset.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/animate.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css');
			loadStyleSheet('/libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css');
			loadStyleSheet('/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css');
		});
	</script>

</body>
</html>
