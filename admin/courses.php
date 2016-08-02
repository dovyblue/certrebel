<!-- List all the courses offered -->

<?php
	session_start();
	require_once('/var/www/certrebel/functions.php');
	require_once('/var/www/certrebel/classes/courses/Courses.php');
	include_once('/var/www/certrebel/version_number.inc');
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
	<meta name="description" content="Lead Renovator (RRP) Initial Certification">
	<meta name="author" content="Rene Midouin">
	<meta name="keywords" content="rrp, lead, renovator, lead renovator, lead certification, painting, pre-1978">

	<title>Lead Renovator (RRP) Initial Certification | CertRebel</title>

	<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">

	<link rel="stylesheet" type="text/css" href="/css/dist/bootstyle.admin.min.css?ver=<?php echo $version;?>">

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
       				<li class="hidden"><a href="/about">About</a></li>
							<li class="active dropdown megamenu"><a href="/courses">Courses</a>
							<li class="hidden dropdown megamenu"><a href="/contact">Contact</a></li>
            	<li class="dropdown" id="signout"><a><i style="font-size: 19px; cursor: pointer;" class="fa fa-power-off"></i></a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</nav><!-- end nav -->
			</div><!-- end container -->
		</header><!-- end header -->

	  <section id="course_parallax" style="margin-top:10%;" class=" hidden section-white page-title-wrapper" data-stellar-background-ratio="1" data-stellar-offset-parent="true">
			<div class="container">
				<div class="relative">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title text-center">
							<h4>Our Courses</h4>
							<hr>
							<p>Check Out Our Latest Courses</p>
							<ol class="breadcrumb">
							  <li><a href="#">Home</a></li>
							  <li class="active">Courses</li>
							</ol>

							</div><!-- end title -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end relative -->
			</div><!-- end container -->
		</section><!-- end section-white -->

	  <section class="background littlebottom hidden">
			<div class="container">
				<div class="relative">
					<div class="section-container">
						<form action="/forms/search/redirect" method="post" class="row search_form">
							<div class="col-md-3 col-sm-6">
							    <input type="text" name="search" class="form-control" placeholder="Search Words">
							</div>
							<div class="col-md-3 col-sm-6">
								<select id="search_category"name="search_category" class="selectpicker bs-style form-control" data-style="btn-inverse">
						  		<option value="" disabled selected>Category</option>
									<option value="all">All</option>
										<?php
										$categories = course_categories();
										foreach ($categories as $category) {
											$value = str_replace(' ','+', $category);
										?>
										<option value="<?php echo strtolower($value); ?>"><?php echo $category; ?></option>
										<?php
										}
										?>
								</select>
							</div>
							<div class="col-md-3 col-sm-6">
								<select id="search_location" name="search_location" class="selectpicker bs-style form-control" data-style="btn-inverse">
						  		<option value="" disabled selected>Location</option>
									<option value="all">All</option>
										<?php
										$locations = course_locations();
										foreach ($locations as $location) {
											$value = str_replace(', ','-', $location);
											$value = str_replace(' ','+', $value);
										?>
										<option value="<?php echo strtolower($value); ?>"><?php echo $location; ?></option>
										<?php
										}
										?>
								</select>
							</div>
							<div class="col-md-3 col-sm-6">
								<button type="submit" class="btn btn-default btn-block">Start Search</button>
							</div>
						</form>
					</div><!-- end row -->
				</div><!-- end relative -->
			</div><!-- end container -->
		</section><!-- end section-white -->

		<section class="section-white" style="padding-top: 160px;">
			<div class="container">
				<div class="row courses-list">
					<?php
						$courses = new Courses\Course();
						$remove_ids = array('rrpifa');
						$course_ids = $courses->getAllCoursesId();
						$course_ids = array_diff($course_ids,$remove_ids);
						if ($course_ids) {
							$delay = 0;
							foreach ($course_ids as $id) {
								$course = new Courses\Course($id);
								$box = ($course->getAllSingleCourses()->getPrice() === "0") ? "box sample" : "";
								$delay = ($delay == 6) ? 2 : $delay + 2;
						?>
								<div class="hidden col-md-4 col-sm-6 col-xs-12">
									<div class="course-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.<?php echo $delay;?>s">
										<div class="<?php echo $box; ?> owl-image">
											<a href="/course/<?php echo $course->getId(); ?>" title="">
												<img src="/images/<?php echo $course->getPicture(); ?>" alt="" style="height: 260px;" class="img-responsive">
												<?php if($box) echo '<div class="ribbon"><span>FREE</span></div>'; ?>
											</a>
										</div><!-- end image -->
										<div class="course-desc" style="height:250px;">
											<span class="meta"><?php echo $course->getHourLength(); ?>-Hour Course</span>
											<h5 style="min-height: 64px;"><a href="/course/<?php echo $course->getId(); ?>" title=""><?php echo $course->getLongTitle();?></a></h5>
											<p><?php echo $course->getShortDetailLimited()?></p>
											<div class="course-big-meta clearfix">
												<div class="pull-left">
													<a href="/course/<?php echo $course->getId(); ?>" class="owl-button">Details</a>
												</div><!-- end left -->
												<div class="pull-right">
													<p><?php //echo $course->getPrice(); ?></p>
												</div><!-- end right -->
											</div><!-- end course-big-meta -->
										</div><!-- end desc -->
									</div><!-- end item -->
								</div>

								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="course-item row wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
										<div class="col-md-4">
										<div class="<?php echo $box; ?> owl-image">
											<a href="/course/<?php echo $course->getId(); ?>" title=""><img src="/images/<?php echo $course->getPicture(); ?>" alt="" class="img-responsive"></a>
												<?php if($box) echo '<div class="ribbon"><span>FREE</span></div>'; ?>
										</div><!-- end image -->
										</div>
										<div class="col-md-8">
										<div class="course-desc noborder">
											<span class="meta"><?php echo $course->getHourLength(); ?>-Hour Course</span>
											<h5><a href="/course/<?php echo $course->getId(); ?>" title=""><?php echo $course->getLongTitle();?></a></h5>
											<p><?php echo $course->getShortDetail();?></p>
											<div class="course-big-meta clearfix">
												<div class="pull-left">
													<a href="/course/<?php echo $course->getId(); ?>" class="owl-button">Details</a>
												</div><!-- end left -->
												<div class="pull-right">
													<p><?php //echo $course->getPrice(); ?></p>
												</div><!-- end right -->
											</div><!-- end course-big-meta -->
										</div><!-- end desc -->
										</div>
									</div><!-- end item -->
								</div>
						<?php 
							}
						}
						?>
				</div><!-- end row -->

				<nav class="text-center hidden ">
				  <ul class="pagination">
				    <li><a href="#">1</a></li>
				    <li><a href="#">2</a></li>
				    <li>
				      <a href="#" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>

			</div><!-- end container -->
		</section><!-- end section-white -->
		<!-- Footer -->
		<?php require_once("/var/www/certrebel/forms/footer/footer.php"); ?>
		<?php require_once("forms/login/log-out.php"); ?>
		<!-- End Footer -->

	</div><!-- end wrapper -->

	<script type="text/javascript" src="/js/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/js/dist/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/dist/wow.min.js"></script>
	<script type="text/javascript" src="/js/dist/clear.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/js/dist/logout.min.js?ver=<?php echo $version;?>"></script>
	<script type="text/javascript" src="/js/dist/bootstrap-select.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			loadStyleSheet('/css/dist/animate.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/ribbon.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/css/dist/bootstrap-select.min.css?ver=<?php echo $version;?>');
			loadStyleSheet('/libraries/fonts/font-awesome-4.3.0/css/font-awesome.min.css');
		});
	</script>
</body>
</html>
