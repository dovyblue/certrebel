<?php
require_once('/var/www/certrebel/functions.php');
session_start();
ob_start();
if(isset($_COOKIE['xv'])) {
	setcookie("xv",null, time() - 60*60*24, '/');
	$data = "logged out";
	write_log_to_file($data);
}
ob_end_flush();
header("Location: /");
?>
