<!-- 
     Show the details of a
     single course. User can decide to
		 join a course from this page.
-->

<?php
	session_start();
	require_once('/var/www/certrebel/classes/courses/SingleCourses.php');
	require_once('functions.php');
	include_once('version_number.inc');
	$course_id = htmlentities($_GET['course']);
	$single_course = new SingleCourses\SingleCourse($course_id);
	$box = ($single_course->getPrice() === "0") ? "box sample" : "";

	if (!isset($_GET['course']) || $_GET['course'] == "" || !$single_course->course_success)
		header("Location: /courses");
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
	<meta name="description" content="<?php echo $single_course->getLongTitle();?>">
	<meta name="author" content="Rene Midouin">
	<meta name="keywords" content="<?php echo $single_course->getKeywords();?>">

	<title><?php echo $single_course->getLongTitle();?> | CertRebel</title>

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
							<li class="dropdown megamenu"><a href="/">Home</a>
							</li>
       							<li><a href="/about">About</a></li>
							
							<li class="dropdown active megamenu"><a href="/courses">Courses</a>
								<li class="dropdown megamenu"><a href="/contact">Contact</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</nav><!-- end nav -->
	    </div><!-- end container -->
    </header><!-- end header -->

    <section class="section-white" style="padding-top:0px;">
			<div class="container" id="course-container">
				<div class="row">
					<div id="content" class="col-md-12 col-sm-12" style="margin-bottom: 2%;">
						<div class="course-long-desc section-container row">
							<div class="col-md-4" style="margin-top: 9%;">
								<div class="<?php echo $box; ?> owl-image">
								  <a href="/course?course=<?php echo $single_course->getId();?>" title=""><img src="/images/<?php echo $single_course->getPicture(); ?>" alt="" class="img-responsive"></a>
									<?php if($box) echo '<div class="ribbon"><span>FREE</span></div>'; ?>
							  </div><!-- end image -->
							</div>
							<div class="col-md-8">
								<div class="widget-title">
									<h4><?php echo $single_course->getLongTitle(); ?></h4>
									<hr>
								</div><!-- end widget-title -->
								<!-- Course Overview -->
								<?php echo $single_course->getOverview();?>
								<!-- End Course Overview -->
							</div><!-- end col-md-8 -->
							<?php
							if ($single_course->details_success && $course_id != 'rrpr') {
							?>
							<div class="row" style="margin-bottom:40px;">
								<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="widget about-widget">
											<div class="accordion-toggle-2">
													<div class="panel-group" id="accordion_1" style="margin-bottom:0px; height:50px;">
															<div class="panel panel-default">
																	<div class="panel-heading">
																			<div class="panel-title">
																					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour">
																						<h3><i class="indicator fa fa-plus"></i>Course Details</h3>
																					</a>
																			</div>
																	</div>
															</div>
															<br>
													</div>
											</div><!-- accordion -->
									</div><!-- end widget -->
								</div><!-- end col -->
								<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="widget about-widget">
											<div class="accordion-toggle-2">
													<div class="panel-group" id="accordion_2" style="margin-bottom:0px; height:50px;">
															<div class="panel panel-default">
																	<div class="panel-heading">
																			<div class="panel-title">
																					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseFive">
																							<h3><i class="indicator fa fa-plus"></i>Course Topics</h3>
																					</a>
																			</div>
																	</div>
															</div>
															<br>
													</div>
											</div><!-- accordion -->
									</div><!-- end widget -->
								</div><!-- end col -->
								<div class="col-md-4 col-sm-12 col-xs-12">
									<div class="widget about-widget">
										<div class="accordion-toggle-2">
											<div class="panel-group" id="accordion_3" style="margin-bottom:0px; height:50px;">
												<div class="panel panel-default">
													<div class="panel-heading">
														<div class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseSix">
																<h3><i class="indicator fa fa-plus"></i>Student Reviews</h3>
															</a>
														</div>
													</div>
												</div>
												<br>
											</div>
										</div><!-- accordion -->
									</div><!-- end widget -->
								</div><!-- end col -->

								<div id="collapseFour" class="panel-collapse collapse col-md-12 col-sm-12 col-xs-12">
									<div class="panel-body" style="border:1px solid rgba(0, 0, 0, 0.17);">
										<?php echo $single_course->getDetails(); ?>
									</div>
								</div>
								<div id="collapseFive" class="panel-collapse collapse col-md-12 col-sm-12 col-xs-12">
										<div class="panel-body" style="border:1px solid rgba(0, 0, 0, 0.17);">
										<?php echo $single_course->getTopics(); ?>
										</div>
								</div>
								<div id="collapseSix" class="panel-collapse collapse col-md-12 col-sm-12 col-xs-12">
									<div class="panel-body" style="border:1px solid rgba(0, 0, 0, 0.17);">
										<?php echo $single_course->getStudentReviews() ?>
									</div>
								</div>
							</div>
							<?php
								}
							?>
							<?php
								if ($single_course->single_course_success && $course_id != 'rrpr') {
							?>
								<div class="col-xs-12">
									<p id="scroll_info" style="text-transform: uppercase; display:none;"><span>Scroll the table from right to left </span><span>to see its full content</span></p>
								</div>
							<?php
							  }
							?>
						</div><!-- end desc -->

					</div><!-- end content -->

					<div id="content" class="col-md-12 col-sm-12 table-responsive">
							<?php
							if ($single_course->single_course_success && $course_id != 'rrpr') {
							?>
								<table class="table table-striped table-bordered"style="table-layout:fixed;">
									<thead>
										<tr>
											<th>Location</th>
											<th>Date</th>
											<th>Time</th>
											<th>Price</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
											for ($i = 0; $i < $single_course->length(); ++$i) {
												$course = new SingleCourses\SingleCourse($course_id, $i);
										?>
										<tr>
											<td><?php echo $course->getLocation() ?></td>
											<td><?php echo $course->getMeetingDate() ?></td>
											<td><?php echo $course->getMeetingTime() ?></td>
											<td>$<?php echo $course->getPrice() ?></td>
											<td>
												<a style="color: white;" href="/purchase/<?php echo $course_id; ?>/<?php echo $course->getIndex() ?>">
													<button id="joinCourse" class="btn btn-block btn-primary">Join Course</button>
												</a>
											</td>
										</tr>
										<?php
											}
										?>
									</tbody>
								</table>	
						<?php
							} else {
						?>
							<p style="font-size:28px; text-align: center;">Live course dates coming soon!</p>	
						<?php
						 }
						?>
					</div><!-- end col-md-12 -->
				</div><!-- end row -->
			</div><!-- end container -->
	  </section><!-- end section-white -->

    <!-- Footer -->
		<?php require_once("footer.php"); ?>
		<!-- End Footer -->

	</div><!-- end wrapper -->

	<script type="text/javascript" src="/js/dist/jquery.min.js"></script>
	<script type="text/javascript" async src="/js/dist/bootstrap.min.js"></script>
	<script type="text/javascript" async src="/js/dist/wow.min.js"></script>
	<script type="text/javascript" src="/js/dist/clear.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			loadStyleSheet('/css/dist/animate.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/ribbon.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css');
		});
	</script>

</body>
</html>
