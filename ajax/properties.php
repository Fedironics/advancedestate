<?php
require_once("includes/initialize.php");
require_once('includes/parameters.php');
$properties=Property::fetch($num,'',$where,$joins);
foreach($properties as $property){
	$property->get_details();
	$property->get_picture();
	$property->price();
	$property->transaction();
	$property->code_name();
	$property->link();
}
echo json_encode($properties);
die();