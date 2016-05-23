<?php
ob_start();
session_start();
require_once('/var/www/certrebel/functions.php');
require_once('/var/www/certrebel/sendmail.php');
date_default_timezone_set('America/New_york');
$current_url = $_SERVER['HTTP_REFERER'];

if (empty($_POST['name'])  ||
		empty($_POST['email']) ||
		empty($_POST['message'])) { 
		$return['status']  = 'error';	
		die(json_encode($return));
} else {
	$date 								= date("Y-m-d H:i:s");
	$info['name'] 				= htmlentities(ucwords($_POST['name']));
	$info['email'] 				= htmlentities(strtolower($_POST['email']));
	$info['phone'] 				= "";
	$info['message'] 			= htmlentities($_POST['message']);
	$_SESSION['email'] 		= $info['email'];
	$default_subject			= "Quick Contact Form | Used by ".$info['name'];
	$default_message 			=
	'
	<html>
		<head>
		</head>
		<body>
	<pre>
	<strong>Name:</strong> '.$info['name'].'
	<br>
	<strong>Email:     </strong> '.$info['email'].'
	<br>
	<strong>Message:   </strong> '.$info['message'].'
	<br>
	</pre>
		</body>
	</html>
	';

		try {
			$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
			$checkUserQuery = "INSERT INTO `certRebel`.`contactForm`
												 (time_stamp, name, email, phone, text) 
												 VALUES (?,?,?,?,?)";

			$checkUserStmt = $dbConnection->prepare($checkUserQuery);
			$values = array($date,
											$info['name'],	
											$info['email'],	
											$info['phone'],	
											$info['message']
										);
			$checkUserStmt->execute($values);
			//sendmail("support@certrebel.com", $default_subject, $default_message);
			sendmail("renemidouin@gmail.com", $default_subject, $default_message);
	  	$return['status'] = 'success';	
		} catch (PDOException $e) {
			die("Error: Cannot satisfy your request at this time. Please try again later");
		}
}
ob_flush();
echo json_encode($return);
?>
