<?php

$input = file_get_contents('input.txt');


$sacks = explode("\r\n", $input);

$priorities = array_merge(range('a','z'), range('A','Z'));

$total = 0;

$group = array();

while($sacks){
	
	$group[] = array_shift($sacks);

	if(count($group) == 3){
	
		$intersects = array();
		$intersects = array_intersect(str_split($group[0]),str_split($group[1]),str_split($group[2]));
		
		if(!empty($intersects)){
			$total += (array_search(array_shift($intersects),$priorities) + 1);
		}
		$group= array();
	}		
}


echo 'Total priority is ' . $total;