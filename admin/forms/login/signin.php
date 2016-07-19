<?php
session_start();
ob_start();
require_once('../../functions.php');
require_once('credentials.php');
if(!isset($_POST['username']) || !isset($_POST['password'])) {
		$_SESSION['error'] = sha1(PASSWORD);
		header("Location: /");
} else {
	$user			=	htmlspecialchars($_POST['username']);
	$password	=	htmlspecialchars($_POST['password']);

	if ($user == USER_NAME && $password == PASSWORD) {
			setSession($user);
			header("Location: /attendance/index?#");
	} else {
			$_SESSION['error'] = sha1(PASSWORD);
			header("Location: /");
			break;                                                                                                                           
	}            
}
ob_end_flush();
?>
