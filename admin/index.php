<!DOCTYPE html>
<?php
	session_start();
	require_once('credentials.php');
	require_once('/var/www/certrebel/functions.php');
	if (isset($_COOKIE['xv']) && $_COOKIE['xv'] == get_rand(PASSWORD)) 
		header('location: /dashboard');

	require_once('/var/www/certrebel/version_number.inc');
?>
<html >
  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Privacy Policy">
		<meta name="author" content="Rene Midouin">
		<meta name="keywords" content="">

    <title>ADMIN | CertRebel, LLC</title>

		<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
		<link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">

    <link rel="stylesheet" href="css/dist/login_style.min.css">
  </head>
	<style>
	.container .info span {
		font-size: 36px;
	}
	</style>
  <body>
		<div class="container">
			<div class="info">
				<span style="color:#f68e24;">Cert</span><span style="color:#ee3133;">Rebel</span>
			</div>
		</div>
		<div class="form">
			<div class="thumbnail" style="margin-bottom: 50px;"><img style="margin-top:-27px;" src="/images/small_logo.png"/></div>
			<form class="login-form" method="post" action="forms/login/signin">
				<?php
				if (isset($_SESSION['error'])) {
				?>
					<p class="bg-danger">Invalid Account</p>
				<?php
				}
				if (isset($_SESSION['err'])) {
				?>
					<p class="bg-danger">Please make sure all fields are filled.</p>
				<?php
				}
				if (isset($_SESSION['expired'])) {
				?>
					<p class="bg-danger">Your session has expired.</p>
				<?php
				}
				session_destroy();
				?>
				<input style="margin-bottom:30px;" type="text" name="username" placeholder="username" required autofocus/>
				<input style="margin-bottom:30px;" type="password" name="password" placeholder="password" required/>
				<button type="submit">Login</button>
			</form>
		</div>
  </body>
</html>
