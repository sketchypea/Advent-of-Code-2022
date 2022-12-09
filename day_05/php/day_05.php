<?php

//GET INPUT
$input = file_get_contents('input.txt');


//SPLIT STARTING POSITIONS AND MOVES
$split = explode("\r\n\r\n",$input);

//EXTRACT PARTS
$start = $split[0];
$moves = explode("\r\n", $split[1]);

//INITIALIZE
$rows = array();
$stacks = array();

//
function applyMove(string $move, array $stacks, int $mode){
	$componets = explode(' ', $move); 
	$buffer = array();
	
	for($i=0;$i<$componets[1];$i++){
		$buffer[] = array_pop($stacks[$componets[3]-1]);
	}

	while($buffer){
		switch($mode){
			case 1:
				array_push($stacks[$componets[5]-1], array_shift($buffer));
			break;
			case 2:
				array_push($stacks[$componets[5]-1], array_pop($buffer));
			break;
		}
		
	}

	return $stacks;
}


//CREATE ROWS
foreach(explode("\r\n", $start)as $row){
	$rows[] = str_split($row,4);
}

//REMOVE INDEXS FROM ROWS
$idxs = array_pop($rows);

//CREATE STACKS
for($i = 0; $i < count($idxs); $i++){
	$stacks[$i] = array_filter(array_map('trim',array_reverse(array_column($rows,$i))));

}

//$mode = 1; //for part 1
$mode = 2; // for part 2

foreach($moves as $move){
	$stacks = applyMove($move,$stacks,$mode);
}

$tops = array_map('end',$stacks);

echo str_replace(array('[',']'),'',implode('',$tops));