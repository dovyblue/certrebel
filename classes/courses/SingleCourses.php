<?php
namespace SingleCourses {
require_once('Courses.php');
use Courses;
require_once('/var/www/certrebel/functions.php');

class SingleCourse extends Courses\Course {
	private $course_id;
	private $course_location;
	private $course_index;
	private $position;
	private $length;
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
	public function getPrice() {
		return $this->course_price;
	}
	public function getIndex() {
		return $this->course_index;
	}
}
}
?>
