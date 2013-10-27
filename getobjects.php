<?php

	error_reporting(E_ALL);

	include('config.php');
	include('open_schema.php');
	
	$objects = array();
	$attributes = array();
	
	foreach (ThingData::all('object') as $object) {
				
		/* Make 'id' and the object ID an associate array and add that to our attributes */
		$attribute_associative = array("id" => $object['id']);
		array_push_associative($attributes, $attribute_associative);
		
		/* Make each key/ value pair an associative array and push it onto attributes array */
		foreach (DataData::all($object['id']) as $attribute) {
			$attribute_associative = array($attribute["key"] => $attribute["value"]);		
			array_push_associative($attributes, $attribute_associative);
		}

		array_push($objects, $attributes);
	}

	echo json_encode($objects);	
	
	function array_push_associative(&$arr) {
	   $args = func_get_args();
	   $ret = 0;
	   foreach ($args as $arg) {
	       if (is_array($arg)) {
	           foreach ($arg as $key => $value) {
	               $arr[$key] = $value;
	               $ret++;
	           }
	       }else{
	           $arr[$arg] = "";
	       }
	   }
	   return $ret;
	}
	
?>
