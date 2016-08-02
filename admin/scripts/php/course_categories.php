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
												CertRebel.course_details
										GROUP BY course_category";
	$checkUserStmt = $dbConnection->prepare($checkUserQuery);
	$checkUserStmt->execute();
	$categories = array();
	while ($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC)) {
		array_push($categories, $queryResult['course_category']);
	}
} catch (PDOException $e) {
	die("Error: Cannot satisfy your request at this time. Please try again later");
}
ob_flush();
sort($categories);
echo json_encode($categories);
?>
