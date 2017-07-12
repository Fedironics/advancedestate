<?php
require_once("../includes/initialize.php");
pre_format($_POST);
//first create address
//then create a property
$Property=Property::make($_POST['title'],1,$_POST['price'],$_POST['intended'],$_POST['category']);
//set non boolean properties
$Property->set_details(DatabaseTable::get_table('property_non_boolean',20));
//set boolean properties
$Property->set_details(DatabaseTable::get_table('property_boolean',20));
$Property->set_detail($_POST['description']);
$res=$Property->set_pictures('files');
pre_format($res);

