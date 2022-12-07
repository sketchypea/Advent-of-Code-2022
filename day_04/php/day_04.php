<?php

$input = file('input.txt');

$contains = 0;
$overlaps = 0;

foreach($input as $ranges){
	$ranges = explode(',',str_replace(array("\r\n",'-'), array('',','), $ranges));
	
	if(($ranges[0] <= $ranges[2] && $ranges[1] >= $ranges[3]) || ($ranges[0] >= $ranges[2] && $ranges[1] <= $ranges[3])){
		$contains++;
	}

	if($ranges[0] <= $ranges[3] && $ranges[1] >= $ranges[2]){
		
		$overlaps++;
	}
}

echo 'contains : ' . $contains . "\r\n";
echo 'overlaps : ' . $overlaps;