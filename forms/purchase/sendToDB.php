<?php
ob_start();
session_start();
$stripe  = $_SERVER['DOCUMENT_ROOT'];
$stripe .= "/libraries/stripe/init.php";
require_once($stripe);
require_once('/var/www/certrebel/functions.php');
require_once('/var/www/certrebel/sendmail.php');
date_default_timezone_set('America/New_york');
$return	     = array();

if ( empty($_POST['buyer_first_name'])||
		 empty($_POST['buyer_last_name'])	||
		 empty($_POST['buyer_email']) 		||
		 empty($_POST['buyer_phone']) 		||
		 empty($_POST['stripe_token']) 		||
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

	$quantity 			= $info['quantity'];
	$course_info 		= course_info();
	$course 		 		= $info['course'];
	$single_details = single_course_info()[$course];
	$count 					= count($single_details);
	$info['title']	= isset($course_info[$course][0]['course_long_title']) ? $course_info[$course][0]['course_long_title']: 'N/A';
	for ($i = 0; $i < $count; ++$i) {
		if ($single_details[$i]['index'] == $info['index']) {
			$info['date']			= isset($single_details[$i]['course_meeting_date']) ? $single_details[$i]['course_meeting_date'] : 'N/A';
			$info['time']		  = isset($single_details[$i]['course_meeting_time']) ? $single_details[$i]['course_meeting_time'] : 'N/A';
			$info['address'] 	= isset($single_details[$i]['course_address']) ? $single_details[$i]['course_address'] : 'N/A';
			$cost							= isset($single_details[$i]['course_price']) ? $single_details[$i]['course_price'] : '0';
			$cost							= number_format((float) $cost, 2);
			$subtotal					= $quantity*$cost;                                                                             
			$subtotal					= number_format((float) $subtotal, 2);
			$fee							= 0.02*$cost*$quantity;
			$fee							= number_format((float) $fee, 2);
			$total						= $cost*$quantity + $fee;
			$total						= number_format((float) $total, 2);
			break;
		}
	}

	$info['unit_cost']  = $cost;
	$info['subtotal']   = $subtotal;
	$info['fee']			  = $fee;
	$info['total']		  = $total;

	/**
   * Set your secret key: remember to change this to your live secret key in production
	 * See your keys here https://dashboard.stripe.com/account/apikeys
	 */
	//\Stripe\Stripe::setApiKey("sk_test_V2Voa4gzopov2DNk2IS93ntv");
	\Stripe\Stripe::setApiKey("sk_live_lEDDhnLG7h2vNeR08dW14oat");

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
			"description" => $info['buyer_first_name']." ".$info['buyer_last_name']." - Charged for ".$info['title']
			));
		$info['charge_response'] = json_encode($charge);
	  $return['status'] = 'success';	
	} catch (\Stripe\Error\Card $e) { // The card has been declined
		$_SESSION['payment_error'] = 'error processing payment';
		$return['message'] = "Error processing payment";
		$return['error'] = json_encode($e->getJsonBody());
		$info['error_details']  	= json_encode($e->getJsonBody());
	  $return['status'] = 'error';	
		die(json_encode($return));
	} catch (\Stripe\Error\Base $e) {
		$return['message'] = "Error processing payment";
		$return['error'] = json_encode($e->getJsonBody());
		$_SESSION['payment_error'] = 'error processing payment';
		$info['error_details']  	= json_encode($e->getJsonBody());
	  $return['status'] = 'error';	
		die(json_encode($return));
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
		sendmail($info);
		$_SESSION['__sdjh'] = sha1($info['buyer_email']);
	} catch (PDOException $e) {
		die("Error: Cannot satisfy your request at this time. Please try again later");
	}
}
ob_flush();
echo json_encode($return);
?>
