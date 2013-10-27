<?php
	$result = 0;
	$ratio = 0;
	
	$destination_path = getcwd().DIRECTORY_SEPARATOR."player-images".DIRECTORY_SEPARATOR;
	$date = new DateTime();
	$ext = pathinfo($_FILES['player-image']['name'], PATHINFO_EXTENSION);
	$fname = $date->getTimestamp() . '.' . $ext;
	$target_path = $destination_path . $fname;
	
	// TODO: Check extension whitelist here.
	
	if(@move_uploaded_file($_FILES['player-image']['tmp_name'], $target_path)) {
		$result = 1;
		
		$max = 1.2;
		list($width, $height) = getimagesize($target_path); 
		$ratiow = $max/$width; 
		$ratioh = $max/$height; 
		$ratio = min($ratiow, $ratioh); 
		
		// New dimensions 
		$width = round($ratio * $width, 3); 
		$height = round($ratio * $height, 3); 
	}

	echo $result;
	
	sleep(0.5);
?>
<script language="javascript" type="text/javascript">
	window.top.window.stopUpload(<?php echo $result; ?>,'<?php echo $fname; ?>', <?php echo $width . "," . $height; ?>); 
	window.top.isNewObject = true;
</script>