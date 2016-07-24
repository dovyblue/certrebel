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
							<li class="dropdown megamenu"><a href="/">Home</a></li>
       				<li><a href="/about">About</a></li>
							<li class="dropdown megamenu"><a href="/courses">Courses</a>
							<li class="dropdown megamenu"><a href="/contact">Contact</a></li>
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
						<div class="col-md-3 col-md-offset-2 col-sm-12 col-xs-12">
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
						<div class="col-md-3 col-sm-12 col-xs-12">
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
						<div class="col-md-2 col-sm-12 col-xs-12" style="padding-top: 8px; padding-bottom: 8px;">
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
					<?php
					$attendee_ids = get_attendees($date, $date);
					$i = 0;
					foreach ($attendee_ids as $attendee_id) {
					if ($i++ == 5) break;
					$attendee = new Attendees\Attendee($attendee_id);
					?>
					<div id="middle-box" class="hidden col-md-12 col-sm-12 col-xs-12">
						<div class="row" style="margin-top:0%; padding-left:10%; padding-right:10%;">
							<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="general-info col-md-2 col-sm-2 col-xs-2" style="padding-left:0; clear:both; margin-bottom:5%;">
											Attendee
									</div>
									<div class="course-widget" style="clear:both;">
										<ul>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Name: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getAttendeeFirstName(); ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Address: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">DOB: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getAttendeeDOB(); ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Email: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getAttendeeEmail(); ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Phone: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getAttendeePhone(); ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
										</ul>
									</div>
							</div>
							<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="general-info col-md-2 col-sm-2 col-xs-2" style="padding-left:0; clear:both; margin-bottom:5%;">
											Buyer
									</div>
									<div class="course-widget" style="clear:both;">
										<ul>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Name: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getBuyerFirstName(); ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Company: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getBuyerCompany(); ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Address: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getBuyerAddress1(); ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Email: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getBuyerEmail(); ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Phone: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getBuyerPhone(); ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
										</ul>
									</div>
							</div>
							<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="general-info col-md-2 col-sm-2 col-xs-2" style="padding-left:0; clear:both; margin-bottom:5%;">
											Course
									</div>
									<div class="course-widget" style="clear:both;">
										<ul>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Course: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getPurchasedCourse()->getLongTitle() ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Date: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getPurchasedCourse()->getMeetingDate() ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Time: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getPurchasedCourse()->getMeetingTime() ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
											<li>
												<div style="width: 20%; float: left; display: inline-block; margin-right: 5px;">Address: </div>
												<div style="width: 70%; display: inline-block;"><a style="pointer-events:none" href="#"><strong><?php echo $attendee->getPurchasedCourse()->getAddress() ?></strong></a></div>
												<div class="hidden" style="float: right; display: inline-block; margin-right: 5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
											</li>
										</ul>
									</div>
							</div>
						</div><!-- end row -->
					</div><!-- end middle-box -->
					<?php
					}
					?>
				</div><!-- end row -->
			</div><!-- end container -->
		</section><!-- end section-white -->

		<!-- Footer -->
		<?php require_once("footer.php"); ?>
		<?php require_once("log-out.php"); ?>
		<!-- End Footer -->

	</div><!-- end wrapper -->

	<script type="text/javascript" src="/js/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/js/dist/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/dist/wow.min.js"></script>
	<script type="text/javascript" src="/js/dist/maskedinput.min.js?ver=<?php echo $version;?>" type="text/javascript"></script>
	<script type="text/javascript" src="/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="/libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="/js/dist/clear.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/js/src/date-processing.js"></script>
	<script>
		$(document).ready(function(){
			$("#signout").click(function(){
					$("#logout").modal({keyboard: true});
					$('#quit').on('click',function() {
						localStorage.clear();
						window.location.href="logout.php";
					});
			});
			$('#data-loader').hide();
		});
	</script>
	<script>
		$(document).ready(function() {
			loadStyleSheet('/css/dist/animate.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/terms_of_service.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css');
			loadStyleSheet('/libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css');
			loadStyleSheet('/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css');
		});
	</script>

</body>
</html>
