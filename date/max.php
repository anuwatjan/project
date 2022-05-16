<?php
	$i = 1;
	while($i < 10) {
		$tmp_arr[] = $i;
		$i++;
	}

	$array_max = max($tmp_arr);
	$array_min = min($tmp_arr);
												 
	echo 'Array max is '.$array_max.'.<br />';
	echo 'Array min is '.$array_min.'.';
?>