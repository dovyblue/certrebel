<?php
ob_start();
session_start();
require_once('/var/www/certrebel/functions.php');
date_default_timezone_set('America/New_york');

try {
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
	$checkUserQuery ="SELECT 
												*, `attendees`.`id` AS attendee_id
										FROM
												CertRebel.attendees
														LEFT JOIN
												orders ON attendees.order_number = orders.order_number
														LEFT JOIN
												single_course_info ON single_course_info.course_id = orders.course_id
														AND single_course_info.`index` = orders.`index`
										WHERE
												error_details = 'no errors'";

	$checkUserStmt = $dbConnection->prepare($checkUserQuery);
	$checkUserStmt->execute();
	while ($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC)) {
				$result[$queryResult['attendee_id']] = array( "attendee_id" 				=> $queryResult['attendee_id'],
																										  "order_number" 				=> $queryResult['order_number'],		
																										  "attendee_first_name"	=> $queryResult['attendee_first_name'],		
																										  "attendee_last_name" 	=> $queryResult['attendee_last_name'],		
																										  "attendee_email" 			=> $queryResult['attendee_email'],		
																										  "attendee_phone" 			=> $queryResult['attendee_phone'],		
																										  "attendee_DOB" 				=> $queryResult['attendee_DOB'],		
																										  "course_id"						=> $queryResult['course_id'],
																										  "course_index"				=> $queryResult['index'],
																										  "quantity"						=> $queryResult['quantity'],
																										  "buyer_first_name" 		=> $queryResult['buyer_first_name'],		
																										  "buyer_last_name" 		=> $queryResult['buyer_last_name'],		
																										  "buyer_email" 				=> $queryResult['buyer_email'],		
																										  "buyer_phone" 				=> $queryResult['buyer_phone'],		
																										  "buyer_company" 			=> $queryResult['buyer_company'],		
																										  "buyer_address1" 			=> $queryResult['buyer_address1'],		
																										  "buyer_address2" 			=> $queryResult['buyer_address2'],
																										  "buyer_city" 					=> $queryResult['buyer_city'],
																										  "buyer_state_name" 		=> $queryResult['buyer_state_name'],		
																										  "buyer_country" 			=> $queryResult['buyer_country'],		
																										  "buyer_zip" 					=> $queryResult['buyer_zip']
																									 );
	}
}
catch (PDOException $e) {
	die("Error: Cannot satisfy your request at this time. Please try again later");
}
ob_flush();
echo json_encode($result);
?>
