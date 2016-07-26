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
	<meta name="description" content="Purchase">
	<meta name="author" content="Rene Midouin">
	<meta name="keywords" content="">

	<title><?php echo $single_course->getLongTitle();?>CertRebel</title>

	<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">

	<link rel="stylesheet" type="text/css" href="/css/dist/bootstyle.min.css?ver=<?php echo $version;?>">

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
		div .form-control {
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

		<header id="keep-position-fixed" style="background:linear-gradient(to bottom, #fdfdfd 0%,#ffffff 100%); border-bottom: 1px solid #ececec;" class="header clearfix">
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

<!-- Zip Code Popup -->
<span id="inline-popups" style="cursor: pointer;" class="hidden links"> 
	<a href="#test-popup" data-effect="mfp-zoom-in">Attention!</a>
</span>
<div id="test-popup" class="white-popup mfp-with-anim mfp-hide">
  <header style="text-align:center; color: #df4a43">
		<span class="start">Attention!</span>
	</header>
  <div class="popup-scroll">
		<p style="text-align: center; font-size: 15px; padding-bottom:0;">
			<br><strong>You must reside and/or work in Orange County to be eligible for the free class.</strong><br>
			<br><strong>Here are the list of zip codes that are acceptable.</strong><br><br>
		</p>
			<table class="table table-striped table-bordered"style="table-layout:fixed;">
				<thead>
					<tr>
						<th>ZIP Code - 1 </th>
						<th>ZIP Code - 2</th>
						<th>ZIP Code - 3</th>
						<th>ZIP Code - 4</th>
						<th>ZIP Code - 5</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$zips = get_orange_county_zip_codes();
						$length = count($zips);
						$size = ceil($length/5);
						for ($i = 0; $i < $size; ++$i) {
					?>
					<tr>
						<td><?php echo $zips[$i]['zip_code'] ?></td>
						<td><?php echo $zips[$i+$size*1]['zip_code']; ?></td>
						<td><?php echo $zips[$i+$size*2]['zip_code']; ?></td>
						<td><?php echo $zips[$i+$size*3]['zip_code']; ?></td>
						<td><?php echo isset($zips[$i+$size*4]['zip_code']) ? $zips[$i+$size*4]['zip_code'] : ""; ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>	
  </div>
</div>
<!-- End Terms of Service Popup -->


	<script type="text/javascript" src="/js/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/js/dist/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/dist/wow.min.js"></script>
	<script type="text/javascript" src="https://checkout.stripe.com/checkout.js"></script>
	<script type="text/javascript" src="/js/dist/maskedinput.min.js?ver=<?php echo $version;?>" type="text/javascript"></script>
	<script type="text/javascript" src="/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="/libraries/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="/js/dist/terms_of_service.min.js?ver=<?php echo $version;?>" type="text/javascript"></script>

	<script type="text/javascript">
		function loadStyleSheet(src) {
				if (document.createStyleSheet){
						document.createStyleSheet(src);
				}
				else {
						$("head").append($("<link rel='stylesheet' href='"+src+"' type='text/css' media='screen' />"));
				}
		};
	  $(document).ready(function(){
			$course = "<?php echo $course; ?>";
			$index = "<?php echo $index; ?>";
			var att_var = "<?php echo $attendee_var; ?>";
			$("#middle-box").load("/forms/purchase/general_info?course="+$course+"&index="+$index+"&attendee_var="+att_var, function(){
				$('#quantity_result').selectpicker('refresh');
				$("html, body").animate({ scrollTop: 0 }, 500);
			});

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
			
			if ($course == 'rrpif') {
				setTimeout(function(){ 
					$('a[href="#test-popup"]').click();
					$('header .container:nth-child(2)').css('display','none');
					$('button#payButton, button#registerButton').prop('disabled',false);
					$('input[type="checkbox"]').prop('checked',true);
				}, 2000);
			}
	  });
	</script>
	<script>
		$(document).ready(function() {
			loadStyleSheet('/css/dist/squares.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/animate.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/magnific-popup.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/terms_of_service.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css');
		});
	</script>

</body>
</html>
