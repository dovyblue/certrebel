<!DOCTYPE html>
<?php
	session_start();
	//if (isset($_COOKIE['xv'])) 
	//	header('location: attendance/?#');

	require_once('version_number.inc');
?>
<html >
  <head>
    <meta charset="UTF-8">
    <title>ADMIN | CertRebel, LLC</title>
    <link rel="stylesheet" href="css/reset.css">
		<link rel='stylesheet' href='css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/login_style.css">
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
				if (isset($_GET['ack'])) {
				?>
					<p class="bg-danger">Your account is not activated yet.<br><br> Please try again later.</p>
				<?php
				}
				if (isset($_GET['wa'])) {
				?>
					<p class="bg-success">Your account was successfully created.<br><br> We will activate it soon.</p>
				<?php
				}
				if (isset($_GET['err'])) {
				?>
					<p class="bg-danger">Oops! Something went wrong.<br><br>Please make sure all fields are filled.</p>
				<?php
				}
				if (isset($_GET['expired'])) {
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
		<script src='js/jquery-2.1.4.min.js'></script>
		<script src="js/signin.js"></script>
  </body>
</html>
