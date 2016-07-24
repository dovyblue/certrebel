<?php
namespace Attendees {
require_once('/var/www/certrebel/classes/courses/SingleCourses.php');
use SingleCourses;
require_once('/var/www/certrebel/functions.php');

class Attendee {
	private $buyer_first_name;
	private $buyer_last_name;
	private $buyer_email;
	private $buyer_phone;
	private $buyer_company;
	private $buyer_address1;
	private $buyer_address2;
	private $buyer_city;
	private $buyer_state_name;
	private $buyer_country;
	private $buyer_zip;
	private $course_id;
	private $course_index;
	private $order_number;
	private $quantity;

	private $attendee_id;
	private $attendee_first_name;	
	private $attendee_last_name;	
	private $attendee_email;
	private $attendee_phone;
	private $attendee_DOB;

	function __construct($attendee_id) {
		$attendee_info = attendee_info($attendee_id);

		$this->buyer_first_name = $attendee_info['buyer_first_name'];
		$this->buyer_last_name = $attendee_info['buyer_last_name'];
		$this->buyer_email = $attendee_info['buyer_email'];
		$this->buyer_phone = $attendee_info['buyer_phone'];
		$this->buyer_company = $attendee_info['buyer_company'];
		$this->buyer_address1 = $attendee_info['buyer_address1'];
		$this->buyer_address2 = $attendee_info['buyer_address2'];
		$this->buyer_city = $attendee_info['buyer_city'];
		$this->buyer_state_name = $attendee_info['buyer_state_name'];
		$this->buyer_country = $attendee_info['buyer_country'];
		$this->buyer_zip = $attendee_info['buyer_zip'];
		$this->course_id = $attendee_info['course_id'];
		$this->course_index = $attendee_info['course_index'];
		$this->order_number = $attendee_info['order_number'];
		$this->quantity = $attendee_info['quantity'];

		$this->attendee_id = $attendee_info['attendee_id'];
		$this->attendee_first_name = $attendee_info['attendee_first_name'];
		$this->attendee_last_name = $attendee_info['attendee_last_name'];
		$this->attendee_email = $attendee_info['attendee_email'];
		$this->attendee_phone = $attendee_info['attendee_phone'];
		$this->attendee_DOB = $attendee_info['attendee_DOB'];
	}
	public function getBuyerFirstName() {
		return $this->buyer_first_name;
	}
	public function getBuyerLastName() {
		return $this->buyer_last_name;
	} 
	public function getBuyerEmail() {
		return $this->buyer_last_name;
	} 
	public function getBuyerPhone() {
		return $this->buyer_phone;
	} 
	public function getBuyerCompany() {
		return $this->buyer_company;
	} 
	public function getBuyerAddress1() {
		return $this->buyer_address1;
	} 
	public function getBuyerAddress2() {
		return $this->buyer_address2;
	} 
	public function getBuyerCity() {
		return $this->buyer_city;
	} 
	public function getBuyerStateName() {
		return $this->buyer_state_name;
	} 
	public function getBuyerCountry() {
		return $this->buyer_country;
	} 
	public function getBuyerZip() {
		return $this->buyer_zip;
	} 
	public function getOrderNumber() {
		return $this->order_number;
	} 
	public function getQuantity() {
		return $this->quantity;
	} 

	public function getAttendeeId() {
		return $this->attendee_id;
	} 
	public function getAttendeeFirstName() {
		return $this->attendee_first_name;
	} 
	public function getAttendeeLastName() {
		return $this->attendee_last_name;
	} 
	public function getAttendeeEmail() {
		return $this->attendee_email;
	} 
	public function getAttendeePhone() {
		return $this->attendee_phone;
	} 
	public function getAttendeeDOB() {
		return $this->attendee_DOB;
	} 
	public function getPurchasedCourse() {
		$course = new SingleCourses\SingleCourse($this->course_id);
		$course->setIndex($this->course_index);
		return $course;
	}
}
}
?>
