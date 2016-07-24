<?php
session_start();
ob_start();
require_once('/var/www/certrebel/functions.php');
require_once('credentials.php');
if(!isset($_POST['username']) || 
		!isset($_POST['password']) ||
		empty($_POST['username']) ||
		empty($_POST['password'])) {
		$_SESSION['err'] = sha1(PASSWORD);
		header("Location: /");
} else {
	$user			=	htmlspecialchars($_POST['username']);
	$password	=	htmlspecialchars($_POST['password']);

	if ($user == USER_NAME && $password == PASSWORD) {
			set_session($password);
			header("Location: /dashboard");
	} else {
			$_SESSION['error'] = sha1(PASSWORD);
			header("Location: /");
			break;                                                                                                                           
	}            
}
ob_end_flush();
?>
