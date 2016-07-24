<?php
//phpinfo();
require_once('functions.php');
//$test = attendee_info('99');
$test = get_attendees('07-02-2016','07-23-2016');
echo json_encode($test);
?>

