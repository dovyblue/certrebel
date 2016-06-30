<?php
	session_start();
	require_once('sendmail.php');
	require_once('/var/www/certrebel/classes/courses/SingleCourses.php');
	include_once('version_number.inc');

	$course = htmlentities($_GET['course']);
	$index	= htmlentities($_GET['index']);
	$attendee_var = isset($_GET['attendee_var'])? $_GET['attendee_var'] : 1;

	$single_course = new SingleCourses\SingleCourse($course);

  if (!isset($_GET['course']) 
		|| !isset($_GET['index']) 
		|| !$single_course->single_course_success 
		|| !$single_course->isValidIndex($index)) {
    header("Location: /courses");
  } 
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

	<link rel="stylesheet" type="text/css" href="/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/dist/bootstrap.min.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/dist/animate.min.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/dist/style.min.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/dist/terms_of_service.min.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/dist/magnific-popup.min.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/dist/squares.min.css?ver=<?php echo $version;?>">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="/libraries/bootstrap-select/dist/css/bootstrap-select.min.css?ver=<?php echo $version;?>">

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

	<script type="text/javascript" src="/js/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/js/dist/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/dist/wow.min.js"></script>
	<script type="text/javascript" src="https://checkout.stripe.com/checkout.js"></script>
	<script type="text/javascript" src="/js/dist/maskedinput.min.js?ver=<?php echo $version;?>" type="text/javascript"></script>
	<script type="text/javascript" src="/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="/libraries/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="/js/dist/terms_of_service.min.js?ver=<?php echo $version;?>" type="text/javascript"></script>

	<script type="text/javascript">
	  $(document).ready(function(){
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
