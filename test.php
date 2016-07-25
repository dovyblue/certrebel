<?php
//phpinfo();
require_once('functions.php');
//$test = attendee_info('99');
//$test = get_attendees('07-02-2016','07-23-2016');
$test = get_orange_county_zip_codes();
echo count($test);
echo json_encode($test[1]);
?>

