<?php
require_once('Attendees.php');
$course = new Attendees\Attendee('79');
//$course = new Courses\Course();
//$other = new SingleCourses\SingleCourse('rrpi');
//echo json_encode(getAttendees());
//echo $other->getIndex()."<br>";
$info['attendee_address1']		= '6';
$info['attendee_address2']		= '';
$info['attendee_city']		 		= '4';
$info['attendee_state_name']	= '3';
$info['attendee_zip']				= '2';
$info['attendee_DOB'] = '01/01/2016';
$info['buyer_company'] = 'hey';
$info['order_number'] = '160423040433-471621334';
$info['attendee_phone'] = '(555) 555-5555';
//echo $course->updateDOB($info)."<br>";
//echo $course->updateCompany($info)."<br>";
//echo $course->updatePhone($info)."<br>";
//echo $course->updateAddress($info)."<br>";
echo $course->getCourseId()."<br>";
echo $course->getIndex()."<br>";
echo $course->getPurchasedCourse()->getMeetingDate()."<br>";
echo $course->getBuyerCompany()."<br>";
echo $course->getBuyerAddress()."<br>";
echo $course->getAttendeeAddress()."<br>";
echo $course->getPurchasedCourse()->getLongTitle()."<br>";
//echo $other->setIndex(1)."<br>";
//echo $other->getAddress()."<br>";
//echo $other->isValidIndex(1)."<br>";
//echo $other->getPrice("decimal")."<br>";
//echo $other->getFee("decimal")."<br>";
//echo $other->getTotal("decimal")."<br>";
//echo $other->charge("5","229.50","Test");
//echo $course->length()."<br>";
//echo "length is: ".$course->getAllSingleCourses()->getPrice();
//echo $other->getLocation();

?>
