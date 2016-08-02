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
												CertRebel.single_course_info
										GROUP BY course_location";
	$checkUserStmt = $dbConnection->prepare($checkUserQuery);
	$checkUserStmt->execute();
	$locations = array();
	while ($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC)) {
		array_push($locations, $queryResult['course_location']);
	}
} catch (PDOException $e) {
	die("Error: Cannot satisfy your request at this time. Please try again later");
}
ob_flush();
sort($locations);
echo json_encode($locations);
?>
