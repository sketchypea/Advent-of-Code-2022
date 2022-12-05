<?php

$input = file_get_contents('input.txt');

$sacks = explode("\r\n", $input);

$priorities = array_merge(range('a','z'), range('A','Z'));

$total = 0;

foreach($sacks as $sack){
	$intersects = array();

	$compartments = str_split($sack, strlen($sack)/2);
	$intersects = array_intersect(str_split($compartments[0]),str_split($compartments[1]));

	if(!empty($intersects)){
		$total += (array_search(array_shift($intersects),$priorities) + 1);
	}
}

echo 'Total priority is ' . $total;