<?php // functions.php
$dbhost 	 = ''; 
$dbname 	 = '';
$dbuser 	 = ''; 
$dbpass 	 = '';

function setSession($user) {
	$_SESSION['username'] = $user;
	$salt1 = "aju^@"; 
	$salt2 = "b*k#$";
	$user = $salt1.$user.$salt2;
	$user = sha1($user);
	setcookie('xv',$user, time()+60*60*24, '/');
}
?>  
