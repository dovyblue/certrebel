<?php
ob_start();
session_start();
require_once('/var/www/certrebel/functions.php');
require_once('/var/www/certrebel/sendmail.php');
date_default_timezone_set('America/New_york');
$current_url = $_SERVER['HTTP_REFERER'];

if (empty($_POST['name'])  ||
		empty($_POST['last_name']) ||
		empty($_POST['email']) ||
		empty($_POST['phone']) ||
		empty($_POST['text'])
	) { 
		$_SESSION['error'] = 'error';
		header("location: $current_url");
} else {
	$date											= date("Y-m-d H:i:s");
	$info['type']							= "quote_form";
	$info['name']							= htmlentities(ucwords($_POST['name']));
	$info['last_name']				= htmlentities(ucwords($_POST['last_name']));
	$info['company']					= htmlentities(ucwords($_POST['company']));
	$info['email']						= htmlentities(strtolower($_POST['email']));
	$info['message_receiver'] = "hello@certrebel.com";
	$info['phone']						= htmlentities($_POST['phone']);
	$info['text']							= htmlentities($_POST['text']);
	$_SESSION['email']				= $info['email'];
	$subject									= 'You\'ve Requested to Speak to a Consultant';
	$info['subject']					= $info['name']." ".$info['last_name']." wants to speak to a consultant";
	$info['body']							=
	'
	<html>
		<head>
		</head>
		<body>
	<pre>
	<strong>First Name:</strong> '.$info['name'].'
	<br>
	<strong>Last Name: </strong> '.$info['last_name'].'
	<br>
	<strong>Company:   </strong> '.$info['company'].'
	<br>
	<strong>Email:     </strong> '.$info['email'].'
	<br>
	<strong>Phone:     </strong> '.$info['phone'].'
	<br>
	<strong>Message:   </strong> '.$info['text'].'
	<br>
	</pre>
		</body>
	</html>
	';

		try {
			$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
			$checkUserQuery = "INSERT INTO `CertRebel`.`contactForm`
												 (time_stamp, name, last_name, company, email, phone, text) 
												 VALUES (?,?,?,?,?,?,?)";

			$checkUserStmt = $dbConnection->prepare($checkUserQuery);
			$values = array($date,
											$info['name'],	
											$info['last_name'],	
											$info['company'],	
											$info['email'],	
											$info['phone'],	
											$info['text']
										);
			$checkUserStmt->execute($values);
			sendmail($info);
			$_SESSION['success'] = 'success';
			header("location: $current_url");
		} catch (PDOException $e) {
			die("Error: Cannot satisfy your request at this time. Please try again later");
		}
}
ob_flush();
?>
