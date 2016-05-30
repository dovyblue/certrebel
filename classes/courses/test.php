<?php
require_once('Courses.php');
require_once('SingleCourses.php');
$course = new Courses\Course('rrpi');
$other = new SingleCourses\SingleCourse('osha30');

//echo json_encode($course->getAllCourseIds());
echo $other->length();
echo $other->single_course_success;
//echo "success is: ".$other->success;
//echo $course->length()."<br>";
//echo "length is: ".$course->getAllSingleCourses()->length();
//echo $other->getLocation();

?>

