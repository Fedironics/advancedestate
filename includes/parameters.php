<?php
$num=20;
$where=$joins='';
$sent=array_merge($_GET,$_POST);
if(!empty($sent)){
	//p	re_format($_POST);
	$non_bool=DatabaseTable::get_table('property_non_boolean',30);
	$bool_keys=DatabaseTable::get_table('property_boolean',30);
	$variable_keys=array_merge($non_bool,$bool_keys);
	if(!empty($sent['transaction'])){
		$transaction=(int)$sent['transaction'];
		$where.=" AND transaction='$transaction' ";
	}
	if(!empty($sent['category'])){
		$category=(int)$sent['category'];
		$where.=" AND category='$category' ";
	}
	if(!empty($sent['price'])){
		$prices=explode('-',$sent['price']);
		$price_low=(int)$prices[0];
		$price_high=(int)$prices[1];
		$where.=" AND price BETWEEN $price_low AND $price_high";
	}
	$num=0;
if(!empty($sent['advanced'])){
	foreach($sent['advanced'] as $key=>$value){
		foreach($variable_keys as $property_key){
			if($property_key->code_name==$key){
				$num++;
				$joins.=" INNER JOIN property_attribute_values AS prop_attr$num  ON prop_attr$num.name_id='$property_key->id' AND prop_attr$num.property_id=properties.id";
				if(in_array($value,$non_bool)){
					$where.= " AND value_held > $value";
				}
			}
		}
		
	}
}
}
