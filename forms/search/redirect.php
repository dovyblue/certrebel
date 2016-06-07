<?php
$search = htmlentities($_POST['search']);
$search = str_replace(" ", "+", $search);
$server = $_SERVER['SERVER_NAME'];
if ($search != "")
	header("location: http://$server/courses/search/$search");
else
	header("location: http://$server/courses");

?>
