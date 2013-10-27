<?php

	include('config.php');
	include('open_schema.php');
	
	$object_id = ThingData::add('object');
	DataData::add($object_id, 'fname',      $_POST['fname']);
	DataData::add($object_id, 'position_x', $_POST['position_x']);
	DataData::add($object_id, 'position_y', $_POST['position_y']);
	DataData::add($object_id, 'position_z', $_POST['position_z']);
	DataData::add($object_id, 'rotation_x', $_POST['rotation_x']);
	DataData::add($object_id, 'rotation_y', $_POST['rotation_y']);
	DataData::add($object_id, 'scaling_x',  $_POST['scaling_x']);
	DataData::add($object_id, 'scaling_y',  $_POST['scaling_y']);
	
?>
