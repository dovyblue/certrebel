<?php 
/* Copyright (C) Rene Midouin - All Rights Reserved         
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential                             
 * Written by Rene Midouin <renemidouin@gmail.com>, 2016                                                                                                                          
 */   
/**
 * @author: Rene Midouin
 * function attendee_info(attendee_id)
 * function course_categories()
 * function course_details()
 * function course_extra_details()
 * function course_info()
 * function course_locations()
 * function get_attendees(from, to)
 * function get_orange_county_zip_codes()
 * function get_rand()
 * function get_states()
 * function get_terms()
 * function limit_text(text, limit)
 * function order_receipt()
 * function set_session()
 * function single_course_info()
 * function validate_orange_county_zip_code();
 * function write_log_to_file(data, filename)
 */
require_once("credentials.php");

$dbhost 	 = DB_HOST; 
$dbname 	 = DB_NAME;
$dbuser 	 = DB_USER; 
$dbpass 	 = DB_PASS; 

function attendee_info($attendee_id) {
	$url = 'http://localhost/scripts/php/attendee_info.php?attendee_id='.$attendee_id;
	$file = file_get_contents($url);
	$json_a = json_decode($file, true);
	return $json_a;
}
function course_categories() {
	$url = __DIR__.'/json_files/course_categories.json';

	if (!file_exists($url) || !filesize($url)) 
		$url = 'http://' . $_SERVER['HTTP_HOST'].'/scripts/php/course_categories.php';
	
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
function course_extra_details() {
	$url = __DIR__.'/json_files/course_extra_details.json';
	if (!file_exists($url) || !filesize($url))
		return false;

	$file = file_get_contents($url);
	$json_a = json_decode($file, true);
	return $json_a;
}
function course_info() {
	$url = __DIR__.'/json_files/course_info.json';

	if (!file_exists($url) || !filesize($url)) 
		$url = 'http://' . $_SERVER['HTTP_HOST'].'/scripts/php/course_info.php';
	
	$file = file_get_contents($url);
	$json_a = json_decode($file, true);

	return $json_a;
}
function course_locations() {
	$url = __DIR__.'/json_files/course_locations.json';

	if (!file_exists($url) || !filesize($url)) 
		$url = 'http://' . $_SERVER['HTTP_HOST'].'/scripts/php/course_locations.php';
	
	$file = file_get_contents($url);
	$json_a = json_decode($file, true);

	return $json_a;
}
function get_attendees($from = "", $to = "") {
	$url = 'http://localhost/scripts/php/get_attendees.php?from='.$from.'&to='.$to;
	
	$file = file_get_contents($url);
	$json_a = json_decode($file, true);

	return $json_a;
}
function get_orange_county_zip_codes() {
	$url = __DIR__.'/json_files/orange_county_zip.json';

	if (!file_exists($url) || !filesize($url))
		$url = 'http://' . $_SERVER['HTTP_HOST'].'/scripts/php/get_orange_county_zip.php?type=array';
	
	$file = file_get_contents($url);
	$json_a = json_decode($file, true);

	return $json_a;
}
function get_course_info($course_id, $course_index) {
	$url = 'http://localhost/scripts/php/get_course_info.php?course_id='.$course_id.'&course_index='.$course_index;
	
	$file = file_get_contents($url);
	$json_a = json_decode($file, true);

	return $json_a;
}
function get_rand($pass) {
	return sha1("aju^@".$pass."b*k#$");
}
function get_states() {
	$url = __DIR__.'/json_files/get_states.json';

	if (!file_exists($url) || !filesize($url))
		$url = 'http://' . $_SERVER['HTTP_HOST'].'/scripts/php/get_states.php';
	
	$file = file_get_contents($url);
	$json_a = json_decode($file, true);

	return $json_a;
}
function get_terms() {
	$url = __DIR__.'/json_files/terms.json';
	if (!file_exists($url) || !filesize($url))
		return false;

	$file = file_get_contents($url);
	$json_a = json_decode($file, true);
	return $json_a;
}
function limit_text($text, $limit) {
	// Credit goes to stack overflow users VisioN and karim79
	if (str_word_count($text, 0) > $limit) {
			$words = str_word_count($text, 2);
			$pos = array_keys($words);
			$text = substr($text, 0, $pos[$limit]) . '...';
	}
  return $text;
}
function order_receipt($data){
	require_once(__DIR__.'/scripts/php/order_receipt.php');
	$receipt = get_receipt($data);
  return $receipt;
}
function set_session($pass) {
	$salt1 = "aju^@"; 
	$salt2 = "b*k#$";
	$pass = $salt1.$pass.$salt2;
	$pass = sha1($pass);
	setcookie("xv",$pass, time()+60*60*24, '/');
}
function single_course_info($location = "fromCache", $index = "") {
	$url = __DIR__.'/json_files/single_course_info.json';

	if (!file_exists($url) || !filesize($url)) 
		$url = 'http://localhost/scripts/php/single_course_info.php';
	
	if ($location == "fromDB")
		$url = 'http://localhost/scripts/php/single_course_info.php?location=fromDB';

	if ($index != "")
		$url = 'http://localhost/scripts/php/single_course_info.php?index='.$index;
	
	$file = file_get_contents($url);
	$json_a = json_decode($file, true);

	return $json_a;
}
function validate_orange_county_zip_code($zip) {
	$url = __DIR__.'/json_files/validate_orange_county_zip.json';

	if (!file_exists($url) || !filesize($url))
		$url = 'http://' . $_SERVER['HTTP_HOST'].'/scripts/php/get_orange_county_zip.php?type=associative';
	
	$file = file_get_contents($url);
	$json_a = json_decode($file, true);
	if (isset($json_a[$zip]))
		return true;
	
	return false;
}
function write_log_to_file($data, $user="ADMIN") {
	$time_stamp = date("Y-m-d h:i A");
	$ip	=	$_SERVER['REMOTE_ADDR'];
	$dirname = '/var/www/logs/'.date("Y_m");
	$file_name = $dirname.'/'.date("Y_m_d").'.inc';
	$data = $user." ".$data;
	
	if (!is_dir($dirname))
		mkdir($dirname, 0777, true);

	$fh=fopen($file_name,'a');
	$str_timestamp = "($time_stamp) ";
	fwrite($fh,$str_timestamp);
	fwrite($fh,$data);
	fwrite($fh," with ip: \"$ip\"");
	fwrite($fh,"\n");
	fclose($fh);
}
?>  
