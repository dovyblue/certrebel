<?php
	ob_start();
	session_start();
	require_once('../functions.php');
	date_default_timezone_set('America/New_york');

	try
	{
		$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
		$checkUserQuery ="SELECT 
													*
											FROM
													certRebel.states";
		$checkUserStmt = $dbConnection->prepare($checkUserQuery);
		$checkUserStmt->execute();
		while ($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC)) {
					$result[$queryResult['state_id']][] = array("state_id" 							=> $queryResult['state_id'],
													  													"state_name" 					=> $queryResult['state_name']
																										 );
		}
	}
	catch (PDOException $e)
	{
		die("Error: Cannot satisfy your request at this time. Please try again later");
	}
ob_flush();
echo json_encode($result);
?>
