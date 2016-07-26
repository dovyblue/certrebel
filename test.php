<?php
ob_start();
session_start();
require_once('/var/www/certrebel/functions.php');
require_once('/var/www/certrebel/sendmail.php');
require_once('/var/www/certrebel/classes/courses/Courses.php');
date_default_timezone_set('America/New_york');
//$info['message_receiver'] = "renemidouin@gmail.com";
//$info['subject'] = "Hey!";
//$info['body'] = "Test!";
//$info['type'] = "Test";
//sendmail($info);
$courses = new Courses\Course();
$course_ids = $courses->getAllCoursesId();
$remove_ids = array('rrpif', 'rrpi');
$course_ids = array_diff($course_ids, $remove_ids);
foreach($course_ids as $course_id) {
	echo $course_id."<br>";
}
//echo json_encode($course_ids);
//phpinfo();
//require_once('functions.php');
////$test = attendee_info('99');
////$test = get_attendees('07-02-2016','07-23-2016');
//$test = validate_orange_county_zip_code('10911');
//echo json_encode($test);
?>

