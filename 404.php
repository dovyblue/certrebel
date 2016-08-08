<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<?php
/* Copyright (C) Rene Midouin - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * Written by Rene Midouin <renemidouin@gmail.com>, 2016
 */
	include_once('version_number.inc');
?>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">

	<title>404 | CertRebel, LLC</title>

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

</head>
<body class="notfound">

    <div id="loader">
        <div class="loader-container">
			<div class="wow zoomIn" data-wow-duration="1s" data-wow-offset="100">
				<div class="wow rubberBand" data-wow-delay="2000ms" data-wow-duration="1s">
					<div class="wow pulse" data-wow-delay="100ms" data-wow-iteration="infinite" data-wow-duration="1s">
						<img src="images/small_logo.png" alt="" class="loader-site">
					</div>
				</div>
			</div>
        </div>
    </div>
    
	<div id="wrapper">

		<section class="section-white">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-6 col-md-offset-3">	
						<div id="notfoundpage">
						<h1>404</h1>
						<h4>We Are Sorry, Page Not Found</h4>
						<hr>
						<a href="/" class="btn btn-primary">Back to Home</a>
						</div>
					</div>
				</div><!-- end row -->
			</div><!-- end container -->
		</section><!-- end section-white -->

	</div><!-- end wrapper -->

	<script type="text/javascript" src="/js/dist/jquery.min.js"></script>
	<script type="text/javascript" src="/js/dist/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/dist/wow.min.js"></script>
	<script type="text/javascript" src="/js/dist/clear.min.js?ver=<?php echo $version;?>"></script>

</body>
</html>
