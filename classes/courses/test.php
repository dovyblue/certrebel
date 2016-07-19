<?php
require_once('Courses.php');
require_once('SingleCourses.php');
$course = new Courses\Course('rrpif');
//$course = new Courses\Course();
//$other = new SingleCourses\SingleCourse('rrpi');

//echo json_encode($course->getAllCoursesLocation());
//echo json_encode($course->getAllCourseIds());
//echo $other->length();
//echo $other->getIndex()."<br>";
//echo $other->getAddress()."<br>";
//echo $other->setIndex(1)."<br>";
//echo $other->getAddress()."<br>";
//echo $other->isValidIndex(1)."<br>";
//echo $other->getPrice("decimal")."<br>";
//echo $other->getFee("decimal")."<br>";
//echo $other->getTotal("decimal")."<br>";
//echo $other->charge("5","229.50","Test");
//echo "success is: ".$other->success;
//echo $course->length()."<br>";
echo "length is: ".$course->getAllSingleCourses()->getPrice();
//echo $other->getLocation();

?>

