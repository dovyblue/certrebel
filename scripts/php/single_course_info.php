<?php
ob_start();
session_start();
require_once('/var/www/certrebel/functions.php');
date_default_timezone_set('America/New_york');

try
{
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
	$checkUserQuery ="SELECT 
												*
										FROM
												CertRebel.single_course_info
										WHERE
												DATE_FORMAT(STR_TO_DATE(course_meeting_date, '%W, %M %D'),
																'%m-%d') > DATE_FORMAT(DATE(NOW()), '%m-%d')
																OR course_meeting_time = 'On Demand'";
	$checkUserStmt = $dbConnection->prepare($checkUserQuery);
	$checkUserStmt->execute();
	while ($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC)) {
				$result[$queryResult['course_id']][] = array("course_id"	 					=> $queryResult['course_id'],
																										 "index" 								=> $queryResult['index'],		
																										 "course_meeting_date" 	=> $queryResult['course_meeting_date'],		
																										 "course_meeting_time" 	=> $queryResult['course_meeting_time'],		
																										 "course_address" 			=> $queryResult['course_address'],		
																										 "course_price"					=> $queryResult['course_price'],
																										 "course_location"			=> $queryResult['course_location']
																										 );
	}
}
catch (PDOException $e)
{
	die("Error: Cannot satisfy your request at this time. Please try again later");
}
ob_flush();

function sort_by_meeting_date($a, $b) {
		$v = date('ymd', strtotime($a['course_meeting_date']));
		$d = date('ymd', strtotime($b['course_meeting_date']));
		return $v - $d;
}

foreach ($result as $key=> $info) {
	usort($result[$key], "sort_by_meeting_date");
}
echo json_encode($result);
?>
