<?php
$server = $_SERVER['SERVER_NAME'];
$search = htmlentities($_POST['search']);
$search_category = htmlentities($_POST['search_category']);
$search_location = htmlentities($_POST['search_location']);
$search_category = empty($search_category) ? "all" : strtolower($search_category);
$search_location = empty($search_location) ? "all" : strtolower($search_location);
$search = str_replace(" ", "+", $search);

if ($search != "")
	header("location: http://$server/courses/category=$search_category/location=$search_location/search=$search");
else 
	header("location: http://$server/courses/category=$search_category/location=$search_location");
?>
