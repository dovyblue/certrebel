<?php
session_start();
ob_start();
if(isset($_COOKIE['xv'])) {
	setcookie("xv",null, time() - 60*60*24, '/');
}
ob_end_flush();
header("Location: /");
?>
