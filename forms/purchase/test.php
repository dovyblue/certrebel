<?php
$stripe  = $_SERVER['DOCUMENT_ROOT'];
$stripe .= "/libraries/stripe/init.php";
require_once($stripe);

echo "dir is:".$stripe;


?>
