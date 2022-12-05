<?php

$options = array();
$options['A'] = array('name'=>'rock', 'beats'=>'C', 'points'=>1);
$options['B'] = array('name'=>'paper', 'beats'=>'A', 'points'=>2);
$options['C'] = array('name'=>'scissors', 'beats'=>'B', 'points'=>3);

$outcomes = array();
$outcomes['win'] = 6;
$outcomes['draw'] = 3;
$outcomes['loose'] = 0;

$input = file_get_contents('input_02.txt');

$games = explode("\r\n",$input);

$totalPoints = 0;

foreach($games as $i=>$game){
	$outcome = null;
	$points = 0;
	$plays = explode(' ', $game);
	$desired = array_pop($plays);

	switch($desired){
		case 'X':
			//LOOSE
			$plays[1] = $options[$plays[0]]['beats'];
		break;
		case 'Y':
			//DRAW
			$plays[1] = $plays[0];
		break;
		case 'Z':
			//WIN
			foreach($options as $k=>$option){
				if($option['beats'] == $plays[0]){
					$plays[1] = $k;
				}
			}
		break;
	}

	if($plays[0] == $plays[1]){
		$outcome = 'draw';
	}
	
	if($options[$plays[0]]['beats'] == $plays[1]){
		$outcome = 'loose';
	}
	
	if($options[$plays[1]]['beats'] == $plays[0]){
		$outcome = 'win';
	}

	if(!$outcome){ 
		throw new \Exception('Could not determine outcome');
	}

	$points = $options[$plays[1]]['points'] + $outcomes[$outcome];

	$totalPoints += $points;
}


//
echo 'total points is: ' . $totalPoints;
