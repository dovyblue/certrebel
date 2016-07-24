<?php
ob_start();
session_start();
require_once('/var/www/certrebel/functions.php');
date_default_timezone_set('America/New_york');

$from = isset($_GET['from']) ? $_GET['from'] : '';
$to = isset($_GET['to']) ? $_GET['to'] : '';

if ($from == "" || $to == "") {
	$date = "";
} else {
	$date = "DATE_FORMAT(STR_TO_DATE(course_meeting_date, '%W, %M %D, %Y'),
								'%m-%d-%Y') >= '$from'
						AND DATE_FORMAT(STR_TO_DATE(course_meeting_date, '%W, %M %D, %Y'),
								'%m-%d-%Y') <= '$to'
						AND";
}

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
												$date error_details = 'no errors'";

	$checkUserStmt = $dbConnection->prepare($checkUserQuery);
	$checkUserStmt->execute();
	$result = array();
	while ($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC)) {
				array_push($result, $queryResult['attendee_id']);
	}
}
catch (PDOException $e) {
	die("Error: Cannot satisfy your request at this time. Please try again later");
}
ob_flush();
echo json_encode($result);
?>
