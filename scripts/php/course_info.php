<?php
ob_start();
session_start();
require_once('/var/www/certrebel/functions.php');
date_default_timezone_set('America/New_york');

try {
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
	$checkUserQuery ="SELECT 
												*
										FROM
												CertRebel.courses
														LEFT JOIN
												course_details ON `courses`.course_id = `course_details`.course_id
										ORDER BY `course_details`.course_position";
	$checkUserStmt = $dbConnection->prepare($checkUserQuery);
	$checkUserStmt->execute();
	while ($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC)) {
				$result[$queryResult['course_id']][] = array("course_id" 						=> $queryResult['course_id'],
																										 "course_short_title" 	=> $queryResult['course_short_title'],		
																										 "course_long_title" 		=> $queryResult['course_long_title'],		
																										 "course_tagline" 			=> $queryResult['course_tagline'],		
																										 "course_hour_length" 	=> $queryResult['course_hour_length'],		
																										 "course_highlight" 		=> $queryResult['course_highlight'],		
																										 "course_short_detail" 	=> $queryResult['course_short_detail'],		
																										 "course_picture" 			=> $queryResult['course_picture'],		
																										 "course_meeting_date" 	=> $queryResult['course_meeting_date'],		
																										 "course_meeting_time" 	=> $queryResult['course_meeting_time'],		
																										 "course_address" 			=> $queryResult['course_address'],		
																										 "course_price"					=> $queryResult['course_price'],
																										 "course_position"			=> $queryResult['course_position'],
																										 "course_keywords"			=> $queryResult['course_keywords'],
																										 "course_category"			=> $queryResult['course_category']
																										);
	}
}
catch (PDOException $e) {
	die("Error: Cannot satisfy your request at this time. Please try again later");
}
ob_flush();
echo json_encode($result);
?>
