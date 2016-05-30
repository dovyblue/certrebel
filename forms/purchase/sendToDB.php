<?php
ob_start();
session_start();
$stripe  = $_SERVER['DOCUMENT_ROOT'];
$stripe .= "/libraries/stripe/init.php";
require_once($stripe);
require_once('/var/www/certrebel/functions.php');
require_once('/var/www/certrebel/sendmail.php');
require_once('/var/www/certrebel/classes/courses/SingleCourses.php');
date_default_timezone_set('America/New_york');
$return = array();

if (empty($_POST['buyer_first_name'])||
		empty($_POST['buyer_last_name']) ||
		empty($_POST['buyer_email']) 		 ||
		empty($_POST['buyer_phone']) 		 ||
		empty($_POST['stripe_token']) 	 ||
		empty($_POST['quantity'])) { 
		$_SESSION['error'] = 'error';
	  $return['status']  = 'error';	
		$return['error']   = 'error';
		die(json_encode($return));
} else {

	$stamp 			  = date("ymdhis");
	$ip 				  = $_SERVER['REMOTE_ADDR'];
	$order_number = "$stamp-$ip";

	$info['type']						  = "order_receipt";
	$info['order_number']     = str_replace(".", "", "$order_number");
	$info['time_stamp'] 			= date("Y-m-d H:i:s");
	$info['stripe_token']			= json_encode($_POST['stripe_token']);
	$info['charge_response']  = "";
	$info['error_details']  	= "no errors";
	$info['attendee_info']		= $_POST['attendee_info'];
	$info['quantity']					= htmlentities($_POST['quantity']);
	$info['buyer_first_name'] = htmlentities(ucwords($_POST['buyer_first_name']));
	$info['buyer_last_name'] 	= htmlentities(ucwords($_POST['buyer_last_name']));
	$info['buyer_email'] 			= htmlentities(strtolower($_POST['buyer_email']));
	$info['message_receiver'] = htmlentities(strtolower($_POST['buyer_email']));
	$info['buyer_phone'] 			= htmlentities($_POST['buyer_phone']);
	$info['buyer_company'] 		= htmlentities(ucwords($_POST['buyer_company']));
	$info['buyer_address1']		= htmlentities(ucwords($_POST['buyer_address1']));
	$info['buyer_address2']		= htmlentities(ucwords($_POST['buyer_address2']));
	$info['buyer_city']		 		= htmlentities(ucwords($_POST['buyer_city']));
	$info['buyer_state_name']	= htmlentities(ucwords($_POST['buyer_state_name']));
	$info['buyer_country']		= htmlentities(ucwords($_POST['buyer_country']));
	$info['buyer_zip']				= htmlentities(ucwords($_POST['buyer_zip']));
	$info['course'] 					= htmlentities($_POST['course']); 
	$info['index'] 						= htmlentities($_POST['index']); 
	$info['cost_in_cents'] 		= (float) htmlentities($_POST['cost']); 
	$info['subject']				  = 'Thank You for Your Order!';

	$single_course  = new SingleCourses\SingleCourse($info['course']);
	$single_course->setIndex($info['index']);
	$info['title'] = $single_course->getLongTitle();
	$info['date'] = $single_course->getMeetingDate();
	$info['time'] = $single_course->getMeetingTime();
	$info['address'] = $single_course->getAddress();
	$info['unit_cost'] = $single_course->getPrice('decimal');
	$info['subtotal'] = $single_course->getPrice('decimal', $info['quantity']);
	$info['fee']= $single_course->getFee('decimal', $info['quantity']);
	$info['total']= $single_course->getTotal('decimal', $info['quantity']);
	$token_id = $_POST['stripe_token']['id'];
	$result = $single_course->charge($token_id, $info['total'], "Test");
	switch($result['status']) {
		case "success":
			$info['charge_response'] = $result['charge_response'];
			$return['status'] = 'success';	
			break;
		case "error":
			$info['error_details'] = $result['error_details'];
			$return['status'] = 'error';
			break;
		default:
			$info['error_details'] = $result['error_details'];
			$return['status'] = 'error';
			break;
	}

	for ($i = 0; $i < $info['quantity']; $i++) {
		$sql_fill_table[] = '("'.htmlentities($info['order_number']).'","'
														.htmlentities($info['attendee_info']['first_name'][$i]).'","'
														.htmlentities($info['attendee_info']['last_name'][$i]).'","'
														.htmlentities($info['attendee_info']['email'][$i]).'","'
														.htmlentities($info['attendee_info']['phone'][$i]).'")';
	}

	try {
		$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
		$checkUserQuery = "INSERT INTO `CertRebel`.`orders`
											 (order_number, course_id, `index`, stripe_token, quantity, time_stamp, buyer_first_name, buyer_last_name, 
												buyer_email, buyer_phone, buyer_company, buyer_address1, buyer_address2,
												buyer_city, buyer_state_name, buyer_country, buyer_zip, charge_response, error_details) 
											 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$checkUserStmt = $dbConnection->prepare($checkUserQuery);
		$values = array($info['order_number'],
										$info['course'],
										$info['index'],
										$info['stripe_token'],
										$info['quantity'],
										$info['time_stamp'],
										$info['buyer_first_name'],	
										$info['buyer_last_name'],	
										$info['buyer_email'],	
										$info['buyer_phone'],	
										$info['buyer_company'],	
										$info['buyer_address1'],	
										$info['buyer_address2'],	
										$info['buyer_city'],	
										$info['buyer_state_name'],	
										$info['buyer_country'],	
										$info['buyer_zip'],
										$info['charge_response'],
										$info['error_details']
									);
		$checkUserStmt->execute($values);
	} catch (PDOException $e) {
		die("Error: Cannot satisfy your request at this time. Please try again later");
	}

	try {
		$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
		$checkUserQuery = "INSERT INTO `CertRebel`.`attendees` 
													(order_number, attendee_first_name, attendee_last_name, attendee_email, attendee_phone) 
											 VALUES".implode(', ',$sql_fill_table);
		$checkUserStmt = $dbConnection->prepare($checkUserQuery);
		$checkUserStmt->execute();
		if ($return['status'] == 'success') {
			sendmail($info);
			$info['message_receiver'] = "renemidouin@yahoo.com";
			sendmail($info);
		}
		$_SESSION['__sdjh'] = sha1($info['buyer_email']);
	} catch (PDOException $e) {
		die("Error: Cannot satisfy your request at this time. Please try again later");
	}
}
ob_flush();
echo json_encode($return);
?>
