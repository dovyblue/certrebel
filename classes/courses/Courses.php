<?php
namespace Courses {
	require_once('/var/www/certrebel/functions.php');
	require_once('SingleCourses.php');
	use SingleCourses;

	class Course {
		private $course_address;
		private $course_highlight;
		private $course_hour_length;
		private $course_id;
		private $course_long_title;
		private $course_meeting_date;
		private $course_meeting_time;
		private $course_picture;
		private $course_price;
		private $course_short_detail;
		private $course_short_title;
		private $course_tagline;
		private $course_overview;
		private $extra_details;
		private $all_courses;
		private $length;
		public $course_success = true;
		public $details_success = true;

		function __construct($course_id="") {
			if ($course_id == "") {
				$this->all_courses = course_info();
				$this->length = count(course_info());
			} else {
				$info = course_info()[$course_id][0];
				$overview = course_details()[$course_id]['course_details'];

				if (!isset($info) || is_null($info))
					$this->course_success = false;

				if (!isset(course_extra_details()[$course_id]) || is_null(course_extra_details()[$course_id])) {
					$this->details_success = false;
				} else {
					$extra_details = course_extra_details()[$course_id];
					$this->extra_details = $extra_details;
				}

				$this->course_address = $info['course_address'];
				$this->course_highlight = $info['course_highlight'];
				$this->course_hour_length = $info['course_hour_length'];
				$this->course_id = $course_id;
				$this->course_long_title = $info['course_long_title'];
				$this->course_meeting_date = $info['course_meeting_date'];
				$this->course_meeting_time = $info['course_meeting_date'];
				$this->course_picture = $info['course_picture'];
				$this->course_price = $info['course_price'];
				$this->course_short_detail = $info['course_short_detail'];
				$this->course_short_title = $info['course_short_title'];
				$this->course_tagline = $info['course_tagline'];
				$this->course_overview = $overview;
			}
		}
		public function getId() {
			return $this->course_id;
		}
		public function getAddress() {
			return $this->course_address;
		}
		public function getHighlight() {
			return $this->course_highlight;
		}
		public function getHourLength() {
			return $this->course_hour_length;
		}
		public function getLongTitle() {
			return $this->course_long_title;
		}
		public function getMeetingDate() {
			return $this->course_meeting_date;
		}
		public function getMeetingTime() {
			return $this->course_meeting_time;
		}
		public function getPicture() {
			return $this->course_picture;
		}
		public function getPrice() {
			return $this->course_price;
		}
		public function getShortDetail() {
			return $this->course_short_detail;
		}
		public function getShortTitle() {
			return $this->course_short_title;
		}
		public function getTagline() {
			return $this->course_tagline;
		}
		public function getOverview() {
			return $this->course_overview;
		}
		public function getDetails() {
			$course_details = $this->extra_details;
			$course_details = implode(" ", $course_details['course_details']);
			return $course_details;
		}
		public function getTopics() {
			$course_topics = $this->extra_details;
			$course_topics = implode(" ", $course_topics['course_topics']);
			return $course_topics;
		}
		public function getStudentReviews() {
			$student_reviews = $this->extra_details;
			$student_reviews = implode(" ", $student_reviews['student_reviews']);
			return $student_reviews;
		}
		public function length() {
			return $this->length;
		}
		public function getAllCourses() {
			return $this->all_courses;		
		}
		public function getAllCourseIds() {
			$ids = array();
		  foreach($this->all_courses as $key=>$info) {
				array_push($ids, $key);
			}
			return $ids;
		}
		public function getAllSingleCourses() {
			return new SingleCourses\SingleCourse($this->course_id);
		}
		public function getSingleCourses($index) {
			return new SingleCourses\SingleCourse($this->course_id, $index);
		}
	}
}
?>
