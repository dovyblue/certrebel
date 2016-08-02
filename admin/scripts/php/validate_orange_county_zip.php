<?php
	ob_start();
	session_start();
	require_once('/var/www/certrebel/functions.php');
	date_default_timezone_set('America/New_york');

	$data['success'] = false;
	$zip_code = isset($_GET['zip_code']) ? $_GET['zip_code'] : die(json_encode($data));
	$check = validate_orange_county_zip_code($zip_code);
	if ($check) {
		$data['success'] = true;
		echo json_encode($data);
	} else {
		echo json_encode($data);
	}
?>
