<?php
require_once '../includes/initialize.php';
require_once '../includes/parameters.php';

$pre_prop=Property::find_by_id(1);
$lat=$pre_prop->lattitude;
$lon=$pre_prop->longitude;
$locations=[];
//for a particular radius the WHERE ===
//"AND (lattitude BETWEEN ($lat-$rad) AND ($lat+$rad)) AND (longitude BETWEEN ($lon-$rad) AND ($lon+$rad))"
$properties=Property::fetch($num,'SQRT(POW(lattitude,2)+POW(longitude,2))',$where);
foreach($properties as $prop){	
	$pix=$prop->get_picture('map');
	$locations[]=
	[
	'propertyId'=>$prop->id,
	'type'=>$prop->category,
	'name'=>$prop->name(),
	'address'=>$prop->street_direction,
	'price'=>$prop->price(),
	'location'=>$prop->location(),
	'cover'=>$pix,
	'url'=>$prop->link()
	];
}
$full = new stdClass();
$full->locations=$locations;
echo json_encode($full,JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT );




