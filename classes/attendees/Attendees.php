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
	private $attendee_address1;
	private $attendee_address2;
	private $attendee_city;
	private $attendee_state_name;
	private $attendee_zip;

	private $dbConnection;
	private $memcached;
	private $key;

	public function __construct($attendee_id) {
		global $dbhost, $dbname, $dbuser, $dbpass;
		$this->memcached = new \Memcached();
		$this->memcached->addServer("127.0.0.1", 11211);
		$hash = md5('attendee_info.php');
		$this->key = $attendee_id.$hash;
		$attendee_info = attendee_info($attendee_id);
		$this->dbConnection = new \PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);

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
		$this->attendee_address1 = $attendee_info['attendee_address1'];
		$this->attendee_address2 = $attendee_info['attendee_address2'];
		$this->attendee_city = $attendee_info['attendee_city'];
		$this->attendee_state_name = $attendee_info['attendee_state_name'];
		$this->attendee_zip = $attendee_info['attendee_zip'];
	}
	public function getCourseId() {
		return $this->course_id;
	}
	public function getIndex() {
		return $this->course_index;
	}
	public function getCourseLongTitle() {
	}
	public function getCourseMeetingDate() {
	}
	public function getCourseMeetingTime() {
	}
	public function getCourseAddress() {
	}

	public function getBuyerFirstName() {
		return $this->buyer_first_name;
	}
	public function getBuyerLastName() {
		return $this->buyer_last_name;
	} 
	public function getBuyerName() {
		return $this->buyer_first_name." ".$this->buyer_last_name;
	}
	public function getBuyerEmail() {
		return $this->buyer_email;
	} 
	public function getBuyerPhone() {
		return $this->buyer_phone;
	} 
	public function getBuyerCompany() {
		return $this->buyer_company;
	} 
	public function getBuyerAddress() {
		$address2 = "";
		if (!empty($this->buyer_address2))
			$address2 = ", ".$this->buyer_address2;
		return $this->buyer_address1.$address2.", ".$this->buyer_city.", ".$this->buyer_state_name." ".$this->buyer_zip;
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
	public function getAttendeeName() {
		return $this->attendee_first_name." ".$this->attendee_last_name;
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
	public function getAttendeeAddress() {
		$address2 = "";
		if (!empty($this->attendee_address2))
			$address2 = ", ".$this->attendee_address2;
		if (empty($this->attendee_address1))
			return "";
		return $this->attendee_address1.$address2.", ".$this->attendee_city.", ".$this->attendee_state_name." ".$this->attendee_zip;
	}
	public function getAttendeeAddress1() {
		return $this->attendee_address1;
	} 
	public function getAttendeeAddress2() {
		return $this->attendee_address2;
	} 
	public function getAttendeeCity() {
		return $this->attendee_city;
	} 
	public function getAttendeeStateName() {
		return $this->attendee_state_name;
	} 
	public function getAttendeeZip() {
		return $this->attendee_zip;
	} 
	public function getPurchasedCourse() {
		$course = new SingleCourses\SingleCourse($this->course_id);
		$course->setIndex($this->course_index);
		return $course;
	}
	public function updateAddress($info) {
		$addressQuery = "UPDATE `CertRebel`.`attendees`
										 SET 
												`attendee_address1` = ?,
												`attendee_address2` = ?,
												`attendee_city` = ?,
												`attendee_state_name` = ?,
												`attendee_zip` = ?
										 WHERE
												`id` = ?";
		try {
			$addressStatement = $this->dbConnection->prepare($addressQuery);
			$values = array($info['attendee_address1'],                                                                                                                                        
											$info['attendee_address2'],
											$info['attendee_city'],
											$info['attendee_state_name'],
											$info['attendee_zip'],
											$this->attendee_id
										); 	
			$addressStatement->execute($values);
			$this->memcached->delete($this->key, 0);
			return true;
		} catch (PDOException $e) {
			return false;
			die("Error: Cannot satisfy your request at this time. Please try again later");
		}
	}
	public function updateCompany($info) {
		$addressQuery = "UPDATE `CertRebel`.`orders`
										 SET 
												`buyer_company` = ?
										 WHERE
												`order_number` = ?";
		try {
			$addressStatement = $this->dbConnection->prepare($addressQuery);
			$values = array($info['buyer_company'],                                                                                                                                        
											$info['order_number']
										); 	
			$addressStatement->execute($values);
			$this->memcached->delete($this->key, 0);
			return true;
		} catch (PDOException $e) {
			return false;
			die("Error: Cannot satisfy your request at this time. Please try again later");
		}
	}
	public function updateDOB($info) {
		$addressQuery = "UPDATE `CertRebel`.`attendees`
										 SET 
												`attendee_DOB` = ?
										 WHERE
												`id` = ?";
		try {
			$addressStatement = $this->dbConnection->prepare($addressQuery);
			$values = array($info['attendee_DOB'],                                                                                                                                        
											$this->attendee_id
										); 	
			$addressStatement->execute($values);
			$this->memcached->delete($this->key, 0);
			return true;
		} catch (PDOException $e) {
			return false;
			die("Error: Cannot satisfy your request at this time. Please try again later");
		}
	}
	public function updatePhone($info) {
		$addressQuery = "UPDATE `CertRebel`.`attendees`
										 SET 
												`attendee_phone` = ?
										 WHERE
												`id` = ?";
		try {
			$addressStatement = $this->dbConnection->prepare($addressQuery);
			$values = array($info['attendee_phone'],                                                                                                                                        
											$this->attendee_id
										); 	
			$addressStatement->execute($values);
			$this->memcached->delete($this->key, 0);
			return true;
		} catch (PDOException $e) {
			return false;
			die("Error: Cannot satisfy your request at this time. Please try again later");
		}
	}
}
}
?>
