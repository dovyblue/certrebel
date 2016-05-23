<?php // functions.php
$dbhost 	 = 'localhost'; 
$dbname 	 = 'CertRebel';
$dbuser 	 = 'root'; 
$dbpass 	 = '$lice0fBread@123'; 

function single_course_info() {
	$url = __DIR__.'/json_files/single_course_info.json';

	if (!file_exists($url) || !filesize($url)) 
		$url = 'http://' . $_SERVER['HTTP_HOST'].'/php_scripts/single_course_info.php';
	
	$file = file_get_contents($url);
	$json_a = json_decode($file, true);

	return $json_a;
}

function course_info() {
	$url = __DIR__.'/json_files/course_info.json';

	if (!file_exists($url) || !filesize($url)) 
		$url = 'http://' . $_SERVER['HTTP_HOST'].'/php_scripts/course_info.php';
	
	$file = file_get_contents($url);
	$json_a = json_decode($file, true);

	return $json_a;
}

function course_details() {
	$url = __DIR__.'/json_files/course_details.json';

	if (!file_exists($url) || !filesize($url))
		return false;

	$file = file_get_contents($url);
	$json_a = json_decode($file, true);

	return $json_a;
}

function get_states() {
	$url = __DIR__.'/json_files/get_states.json';

	if (!file_exists($url) || !filesize($url))
		$url = 'http://' . $_SERVER['HTTP_HOST'].'/php_scripts/get_states.php';
	
	$file = file_get_contents($url);
	$json_a = json_decode($file, true);

	return $json_a;
}
?>  
