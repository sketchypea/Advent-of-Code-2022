<?php
//GET INPUT
$input = file_get_contents('input_01.txt');

//EXPLODE ON DOUBLE NEW LINE
$elves = explode("\r\n\r\n",$input);

//INITIALIZE TOTALS
$totals = array();

//TRAVERSE ELVES
foreach($elves as $k=>$v){
	//EXPLODE ON NEW LINE AND STORE
	$elves[$k] = explode("\r\n",$v);
	//STORE SUM IN TOTALS
	$totals[$k] = array_sum($elves[$k]);
}

//GET MAX VALUE
$maxValue = max($totals);

//PART 1 ANSWER
echo $maxValue . ' is the highest carried by a single elf';
echo "\n";

//SORT TOTALS
arsort($totals);

//PART 2 ANSWER
echo array_sum(array_slice($totals,0,3,true)) . ' is the combined total of the top 3 elves';