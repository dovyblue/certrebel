<?php
require_once('/var/www/certrebel/classes/attendees/Attendees.php');
require_once('/var/www/certrebel/functions.php');
include_once('/var/www/certrebel/version_number.inc');

if (empty($_POST['attendee_id'])) {
	$return['status']  = 'error';	
}
if (empty($_POST['attendee_address1'])) {
	$return['status']['address']  = 'error';	
}
if (empty($_POST['attendee_city'])) {
	$return['status']['city']  = 'error';	
}
if (empty($_POST['attendee_state_name'])) {
	$return['status']['state']  = 'error';	
}
if (empty($_POST['attendee_zip'])) { 
	$return['status']['zip']  = 'error';	
} else {
	$info['attendee_id']					= htmlentities($_POST['attendee_id']);
	$info['attendee_address1']		= htmlentities(ucwords($_POST['attendee_address1']));
	$info['attendee_address2']		= htmlentities(ucwords($_POST['attendee_address2']));
	$info['attendee_city']		 		= htmlentities(ucwords($_POST['attendee_city']));
	$info['attendee_state_name']	= htmlentities(ucwords($_POST['attendee_state_name']));
	$info['attendee_zip']					= htmlentities($_POST['attendee_zip']);

	$attendee  = new Attendees\Attendee($info['attendee_id']);
	$attendee->updateAddress($info);
	$return['status']  = 'success';	
}
echo json_encode($return);
?>
