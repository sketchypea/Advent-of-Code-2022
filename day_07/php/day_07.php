<?php

$input = file('input.txt');
//$input = file('test.txt');

$stack = array();
$totals = array();

foreach($input as $line){
	$line = explode(' ', str_replace(array('$ ',"\r\n"), '', $line));

	if($line[0] == 'cd'){
		switch($line[1]){
			case '..':
				
				$totals[array_key_last($stack)]	= array_pop($stack);
				$stack[array_key_last($stack)] += end($totals);					
				
			break;
			default:
				//MUST USE SOME SORT OF UNIQUE ID HERE - PREVIOUSLY USED FOLDER NAMES AND DUPLICATES BROKE PROCESS
				$stack[uniqid()] = 0;
			break;
		}
	}

	if(is_numeric($line[0])){ 
		$stack[array_key_last($stack)] += $line[0];
	}
}

while(count($stack)> 1){
	$totals[array_key_last($stack)]	= array_pop($stack);
	$stack[array_key_last($stack)] += end($totals);	
}



$totals[array_key_last($stack)]	= array_pop($stack);

$filtered = array_filter($totals,function($a){return $a <= 100000;});

echo "part 1 " . array_sum($filtered) . "\r\n";

$fsTotal = 70000000;
$updateRequires = 30000000;

$inUse = end($totals);

$spaceFree = $fsTotal - $inUse;
$toDelete = $updateRequires -  $spaceFree;

$potentials = $totals;

foreach($potentials as $key=>$value){
	if($value < $toDelete){
		unset($potentials[$key]);
	}
}

echo 'part 2 ' . min($potentials);