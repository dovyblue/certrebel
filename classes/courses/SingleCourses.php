<?php
namespace SingleCourses {
require_once('Courses.php');
use Courses;
require_once('/var/www/certrebel/classes/payments/Payment.php');
use Payments;
require_once('/var/www/certrebel/functions.php');

class SingleCourse extends Courses\Course {
	private $course_id;
	private $course_location;
	private $course_index;
	private $position;
	private $length;
	private $fee = 0.02;
	public $single_course_success = true;

	function __construct($course_id, $position=0) {
		parent::__construct($course_id);
		$single_details = single_course_info()[$course_id];

				if (!isset($single_details) || is_null($single_details))
					$this->single_course_success = false;

		$this->course_address = $single_details[$position]['course_address'];
		$this->course_id = $course_id;
		$this->course_location = $single_details[$position]['course_location'];
		$this->course_meeting_date = $single_details[$position]['course_meeting_date'];
		$this->course_meeting_time = $single_details[$position]['course_meeting_time'];
		$this->course_price = $single_details[$position]['course_price'];
		$this->course_index = $single_details[$position]['index'];
		$this->position = $position;
		$this->length = count($single_details);
	}
	public function length() {
		return $this->length;
	}
	public function getId() {
		return $this->course_id;
	}
	public function getAddress() {
		return $this->course_address;
	}
	public function getLocation() {
		return $this->course_location;
	}
	public function getMeetingDate() {
		return $this->course_meeting_date;
	}
	public function getMeetingTime() {
		return $this->course_meeting_time;
	}
	public function getPrice($format="", $quantity=1) {
		if ($format == "decimal")
			return number_format((float) $quantity*$this->course_price, 2);

		return $this->course_price;
	}
	public function getIndex() {
		return $this->course_index;
	}
	public function setIndex($index) {
		for ($i=0; $i < $this->length; ++$i) {
			$single_details = single_course_info()[$this->course_id];
			if ($single_details[$i]['index'] == $index) {
				$this->course_address = $single_details[$i]['course_address'];
				$this->course_location = $single_details[$i]['course_location'];
				$this->course_meeting_date = $single_details[$i]['course_meeting_date'];
				$this->course_meeting_time = $single_details[$i]['course_meeting_time'];
				$this->course_price = $single_details[$i]['course_price'];
				$this->course_index = $single_details[$i]['index'];
				$this->position = $i;
				return true;
			}
		}
		return false;
	}
	public function isValidIndex($index) {
		for ($i=0; $i < $this->length; ++$i) {
			$single_details = single_course_info()[$this->course_id];
			if ($single_details[$i]['index'] == $index) {
				return true;
			}
		}
		return false;
	}
	public function getFee($format="", $quantity=1) {
		if ($format == "value")
			return $this->fee*100;
		if ($format == "decimal")
			return number_format((float) $quantity*$this->fee*$this->course_price, 2);

		return number_format((float) $this->fee*$this->course_price, 2);
	}
	public function getTotal($format="", $quantity=1) {
		if ($format == "decimal")
			return number_format((float) $quantity*($this->getFee("decimal")+$this->getPrice("decimal")), 2);

		return number_format((float) $quantity*($this->getFee("decimal")+$this->getPrice("decimal")), 2);
	}
	public function charge($token_id, $amount, $description) {
		$course = new Payments\Payment();
		$amount = $amount * 100; // Convert dollars to cents for Stripe's API
		return $course->charge($token_id, $amount, $description);
	}
}
}
?>
