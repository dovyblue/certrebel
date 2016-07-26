<?php
	ob_start();
	session_start();
	require_once('/var/www/certrebel/functions.php');
	date_default_timezone_set('America/New_york');

	$argument = isset($argv[1]) ? $argv[1] : "";
	$type = isset($_GET['type']) ? htmlentities($_GET['type']) : "";

	try {
		$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
		$checkUserQuery ="SELECT 
													*
											FROM
													CertRebel.orange_county_zip_codes";
		$checkUserStmt = $dbConnection->prepare($checkUserQuery);
		$checkUserStmt->execute();
		if ($type == "associative" || $argument == "associative") {
			while ($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC)) {
				$result[$queryResult['zip_code']] = array("zip_code" 	=> $queryResult['zip_code'],
																									"city" 			=> $queryResult['city']
																								 );
			}
		} else if ($type == "array" || $argument == "array") {
			while ($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC)) {
				$result[] = array("zip_code" 	=> $queryResult['zip_code'],
													"city" 			=> $queryResult['city']
												 );
			}
		} else {
			while ($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC)) {
				$result[] = array("zip_code" 	=> $queryResult['zip_code'],
													"city" 			=> $queryResult['city']
												 );
			}
		}
	} catch (PDOException $e) {
		die("Error: Cannot satisfy your request at this time. Please try again later");
	}
ob_flush();
echo json_encode($result);
?>
