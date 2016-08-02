<?php
session_start();
require_once('/var/www/certrebel/functions.php');
date_default_timezone_set('America/New_york');

$course_index = $_GET['course_index'];
$course_id = $_GET['course_id'];
$hash = md5('get_course_info.php');
$key = $course_id.$course_index.$hash;

$mem = new Memcached();
$mem->addServer("127.0.0.1", 11211);
$data = $mem->get($key);

if ($data) {
	    echo json_encode($data);
} else {
	try {
		$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
		$checkUserQuery ="SELECT 
													*
											FROM
													CertRebel.single_course_info
											WHERE
													course_id = '$course_id' AND `index` = '$course_index'";

		$checkUserStmt = $dbConnection->prepare($checkUserQuery);
		$checkUserStmt->execute();
		while ($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC)) {
			$result = array("course_index" 							=> $queryResult['index'],
											"course_id" 					=> $queryResult['course_id'],		
											"course_meeting_date" => $queryResult['course_meeting_date'],		
											"course_meeting_time" => $queryResult['course_meeting_time'],		
											"course_price" 				=> $queryResult['course_price'],		
											"course_address" 			=> $queryResult['course_address'],		
											"course_location" 		=> $queryResult['course_location']
											);
			$mem->set($key, $result) or die("Couldn't save anything to memcached...");
			echo json_encode($result);
		}
	}
	catch (PDOException $e) {
		die("Error: Cannot satisfy your request at this time. Please try again later");
	}
}
?>
