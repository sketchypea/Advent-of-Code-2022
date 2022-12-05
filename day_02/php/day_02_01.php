<?php

$options = array();
$options['A'] = array('name'=>'rock', 'beats'=>'C', 'points'=>1);
$options['B'] = array('name'=>'paper', 'beats'=>'A', 'points'=>2);
$options['C'] = array('name'=>'scissors', 'beats'=>'B', 'points'=>3);

$outcomes = array();
$outcomes['win'] = 6;
$outcomes['draw'] = 3;
$outcomes['loose'] = 0;

$input = str_replace(array('X','Y','Z'),array('A','B','C'),file_get_contents('input_02.txt'));

$games = explode("\r\n",$input);

$totalPoints = 0;

foreach($games as $i=>$game){
	$outcome = null;
	$points = 0;
	$plays = explode(' ', $game);

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
