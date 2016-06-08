<!-- List all the courses offered -->

<?php
	session_start();
	require_once('functions.php');
	require_once('/var/www/certrebel/libraries/composer/elastic_search.php');
	require_once('/var/www/certrebel/classes/courses/Courses.php');
	include_once('version_number.inc');
	$search_text = isset($_GET['search']) ? $_GET['search'] : '';
	$search_category = str_replace(' ', '+', $_GET['search_category']);
	$search_location = str_replace(' ', '+', $_GET['search_location']);
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
	<link rel="stylesheet" type="text/css" href="/css/style.css?ver=<?php echo $version;?>">
	<link rel="stylesheet" type="text/css" href="/css/quote.css?ver=<?php echo $version;?>">

	<!-- COLORS -->
	<link rel="stylesheet" type="text/css" href="/css/custom.css?ver=<?php echo $version;?>">

	<!-- RS SLIDER -->
	<link rel="stylesheet" type="text/css" href="/libraries/rs-plugin/css/settings.css" media="screen" />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="/css/bootstrap-select.css?ver=<?php echo $version;?>">

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
		.bs-style{
			margin-bottom: 15px !important;
			padding: 6px 12px !important;
			border: 1px solid #ffffff !important;
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
							</li>
								<li class="dropdown megamenu"><a href="/contact">Contact</a></li>
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

		<?php
		if (isset($_GET['search']) && !empty($_GET['search'])) {
			$search = $_GET['search'];
			$params = [
				'body' => [
					'query' => [
						'bool' => [
						  'should' => [
								['match' => ['title' => ['query' => $search, 'operator' => 'and']]],
								['match' => ['body' => ['query' => $search, 'operator' => 'and']]],
								['match' => ['keywords' => ['query' => $search, 'operator' => 'and']]]
							]
						]
					]
				]
			];
			$query = $client->search($params);
			if ($query['hits']['total'] >=1) {
				$results = $query['hits']['hits'];
			?>
				<section class="section-white" style="padding-top: 40px;">
					<div class="container">
						<div class="row courses-list">
						<?php
						$delay = 0;
						foreach ($results as $result) {
							$course = new Courses\Course($result["_id"]);
							$delay = ($delay == 6) ? 2 : $delay + 2;
						?>
							<div class="hidden col-md-4 col-sm-6 col-xs-12">
								<div class="course-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.<?php echo $delay;?>s">
									<div class="owl-image">
										<a href="/course/<?php echo $course->getId(); ?>" title="">
											<img src="/images/<?php echo $course->getPicture(); ?>" alt="" style="height: 260px;" class="img-responsive">
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
									<div class="owl-image">
										<a href="/course/<?php echo $course->getId(); ?>" 
											 title=""><img src="/images/<?php echo $course->getPicture(); ?>" alt="" class="img-responsive"></a>
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
							unset($course);
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
		<?php
		  }
		}
		?>

		<?php
		if (!isset($_GET['search']) || (isset($_GET['search']) && empty($_GET['search']))) {
		?>
		<section class="section-white" style="padding-top: 70px;">
			<div class="container">
				<div class="row courses-list">
					<?php
						$courses = new Courses\Course();
						$course_ids = $courses->getAllCoursesId();
						if ($course_ids) {
							$delay = 0;
							foreach ($course_ids as $id) {
								$course = new Courses\Course($id);
								$delay = ($delay == 6) ? 2 : $delay + 2;
						?>
								<div class="hidden col-md-4 col-sm-6 col-xs-12">
									<div class="course-item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.<?php echo $delay;?>s">
										<div class="owl-image">
											<a href="/course/<?php echo $course->getId(); ?>" title="">
												<img src="/images/<?php echo $course->getPicture(); ?>" alt="" style="height: 260px;" class="img-responsive">
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
										<div class="owl-image">
											<a href="/course/<?php echo $course->getId(); ?>" title=""><img src="/images/<?php echo $course->getPicture(); ?>" alt="" class="img-responsive"></a>
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
		<?php
		}
		?>
		<!-- Footer -->
		<?php require_once("footer.php"); ?>
		<!-- End Footer -->

	</div><!-- end wrapper -->

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
	<script src="/js/bootstrap-select.min.js"></script>

	<script>
	$(document).ready(function(){
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
			var category = "<?php echo $search_category; ?>";
			var location = "<?php echo $search_location; ?>";
			var search_text = "<?php echo $search_text; ?>";
			$('#search_category').val(category).change();
			$('#search_location').val(location).change();
			$('input[name="search"]').val(search_text);
	  });
	</script>

</body>
</html>
