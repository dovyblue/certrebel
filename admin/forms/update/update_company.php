<?php
require_once('/var/www/certrebel/classes/attendees/Attendees.php');
require_once('/var/www/certrebel/functions.php');
include_once('/var/www/certrebel/version_number.inc');

if (empty($_POST['attendee_id'])
		|| empty($_POST['buyer_company'])
		|| empty($_POST['order_number'])) { 
	  $return['status']  = 'error';	
		die(json_encode($return));
} else {
	$info['attendee_id']		= htmlentities($_POST['attendee_id']);
	$info['buyer_company']	= htmlentities(ucwords($_POST['buyer_company']));
	$info['order_number']		= htmlentities($_POST['order_number']);

	$attendee  = new Attendees\Attendee($info['attendee_id']);
	$attendee->updateCompany($info);
 	$return['status']  = 'success';	
	echo json_encode($return);
}
?>
