<?php
ob_start();
session_start();
$stripe  = $_SERVER['DOCUMENT_ROOT'];
$stripe .= "/libraries/stripe/init.php";
require_once($stripe);
require_once('../../functions.php');
require_once('../../sendmail.php');
date_default_timezone_set('America/New_york');
$return	     = array();

if ( empty($_POST['buyer_first_name'])||
		 empty($_POST['buyer_last_name'])	||
		 empty($_POST['buyer_email']) 		||
		 empty($_POST['buyer_phone']) 		||
		 empty($_POST['stripe_token']) 		||
		 empty($_POST['quantity'])			  
	) { 
		$_SESSION['error'] = 'error';
	  $return['status']  = 'error';	
		$return['error']   = 'error';
		die(json_encode($return));
} else {

	$stamp 			  = date("ymdhis");
	$ip 				  = $_SERVER['REMOTE_ADDR'];
	$order_number = "$stamp-$ip";

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

	$quantity 			= $info['quantity'];
	$course_info 		= course_info();
	$course 		 		= $info['course'];
	$single_details = single_course_info()[$course];
	$count 					= count($single_details);
	$title	 				= isset($course_info[$course][0]['course_long_title']) ? $course_info[$course][0]['course_long_title']: 'N/A';
	for ($i = 0; $i < $count; ++$i) {
		if ($single_details[$i]['index'] == $info['index']) {
			$date 	 			= isset($single_details[$i]['course_meeting_date']) ? $single_details[$i]['course_meeting_date'] : 'N/A';
			$time 	 			= isset($single_details[$i]['course_meeting_time']) ? $single_details[$i]['course_meeting_time'] : 'N/A';
			$address 			= isset($single_details[$i]['course_address']) ? $single_details[$i]['course_address'] : 'N/A';
			$cost 	 			= isset($single_details[$i]['course_price']) ? $single_details[$i]['course_price'] : '0';
			$cost					= number_format((float) $cost, 2);
			$subtotal     = $quantity*$cost;                                                                             
			$subtotal     = number_format((float) $subtotal, 2);
			$fee					= 0.02*$cost*$quantity;
			$fee					= number_format((float) $fee, 2);
			$total				= $cost*$quantity + $fee;
			$total				= number_format((float) $total, 2);
			break;
		}
	}

	/**
   * Set your secret key: remember to change this to your live secret key in production
	 * See your keys here https://dashboard.stripe.com/account/apikeys
	 */
	\Stripe\Stripe::setApiKey("sk_test_V2Voa4gzopov2DNk2IS93ntv");
	//\Stripe\Stripe::setApiKey("sk_live_lEDDhnLG7h2vNeR08dW14oat");

	/**
	 * Get the credit card details submitted by the form
	 */
	$token = $_POST['stripe_token'];

	/**
	 * Create the charge on Stripe's servers - this will charge the user's card
	 */
	try {
		$charge = \Stripe\Charge::create(array(
			"amount" => $info['cost_in_cents'], // amount in cents, again
			"currency" => "usd",
			"source" => $token['id'],
			"description" => $info['buyer_first_name']." ".$info['buyer_last_name']." - Charged for ".$title
			));
		$info['charge_response'] = json_encode($charge);
	  $return['status'] = 'success';	
	} catch (\Stripe\Error\Card $e) { // The card has been declined
		$_SESSION['payment_error'] = 'error processing payment';
		$return['message'] = "Error processing payment";
		$return['error'] = json_encode($e->getJsonBody());
		$info['error_details']  	= json_encode($e->getJsonBody());
	  $return['status'] = 'error';	
	} catch (\Stripe\Error\Base $e) {
		$return['message'] = "Error processing payment";
		$return['error'] = json_encode($e->getJsonBody());
		$_SESSION['payment_error'] = 'error processing payment';
		$info['error_details']  	= json_encode($e->getJsonBody());
	  $return['status'] = 'error';	
	}	 

	$default_subject	= 'Thank You For Your Order!';
	
	$header = 'Thank you for choosing CertRebel, LLC for your training needs! Here are your order details:<br><br>'; 					
	$body   = '<strong>Order Information</strong><br>';
	$body  .= 'Order#: '.$info['order_number'].'<br>'; 	
	$body  .= 'Course: '.$title.'<br>';
	$body  .= 'Date: '.$date.'<br>';
	$body  .= 'Time: '.$time.'<br>';
	$body  .= 'Address: '.$address.'<br>';
	$body  .= 'Quantity: '.$quantity.'<br><br>';
	$body  .= 'Subtotal: $'.$subtotal.'<br>';
	$body  .= '2% Processing Fee: $'.$fee.'<br>';
	$body  .= 'Total: $'.$total.'<br><br>';
	$body  .= '<strong>Buyer Information</strong><br>';
	$body  .= 'Name: '.$info['buyer_first_name'].' '.$info['buyer_last_name'].'<br>';
	$body  .= 'Email: '.$info['buyer_email'].'<br>';
	$body  .= 'Address: '.$info['buyer_address1'].', '.$info['buyer_address2'].', '.$info['buyer_city'].', '.$info['buyer_state_name'].' '.$info['buyer_zip'].'<br>';
	$body  .= 'Phone: '.$info['buyer_phone'].'<br><br>';
	$body  .= '<strong>Attendee Information</strong><br>';

	for ($i = 0; $i < $info['quantity']; $i++) {
		$sql_fill_table[] = '("'.htmlentities($info['order_number']).'","'
														.htmlentities($info['attendee_info']['first_name'][$i]).'","'
														.htmlentities($info['attendee_info']['last_name'][$i]).'","'
														.htmlentities($info['attendee_info']['email'][$i]).'","'
														.htmlentities($info['attendee_info']['phone'][$i]).'")';
		$body  .= 'Name: '.$info['attendee_info']['first_name'][$i].' '.$info['attendee_info']['last_name'][$i].'<br>';
		$body  .= 'Email: '.$info['attendee_info']['email'][$i].'<br>';
		$body  .= 'Phone: '.$info['attendee_info']['phone'][$i].'<br><br>';
	}

	$body  .= '<strong>Terms of Service</strong><br>';
	$body  .= '<br>';
	$body	 .= '<strong>Changes and Cancellations to Your Registration for In-Person Courses:</strong><br>';
	$body  .= 'All courses are subject to a 25% administration fee if written notice is given at least 5 business days in advance to:  support@certrebel.com.<br>Refunds are not given if written notice is not received at least 5 business days in advance. Attendee substitutions are permitted and must be emailed to support@certrebel.com to be processed.<br> In the case of an event cancellation made by CertRebel, LLC, you may choose to receive a 100% refund or you can choose to apply your registration fee to another course. By submitting payment you agree to these Terms of Service.<br><br>';
	$body  .= '<strong>Changes and Cancellations to Your Registration for Live Webinars or On-Demand Courses:</strong><br>';
	$body  .= 'All sales are final and refunds are not issued for Live Webinar and On-Demand courses.<br><br>';
	$footer = 'Thanks again for choosing CertRebel for your training needs! If you have any questions, please call (646) 470-7119 or email:  info@certrebel.com'.'<br>';

	$default_message = $header.$body.$footer;

	try {
		$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
		$checkUserQuery = "INSERT INTO `certRebel`.`orders`
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
		$checkUserQuery = "INSERT INTO `certRebel`.`attendees` 
													(order_number, attendee_first_name, attendee_last_name, attendee_email, attendee_phone) 
											 VALUES".implode(', ',$sql_fill_table);
		$checkUserStmt = $dbConnection->prepare($checkUserQuery);
		$checkUserStmt->execute();
		//sendmail($info['buyer_email'], $default_subject, $default_message);
		//sendmail("support@certrebel.com", $default_subject, $default_message);
		$_SESSION['__sdjh'] = sha1($info['buyer_email']);
	} catch (PDOException $e) {
		die("Error: Cannot satisfy your request at this time. Please try again later");
	}
}
ob_flush();
echo json_encode($return);
?>
