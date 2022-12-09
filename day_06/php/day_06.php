<?php

function filter($i){
	return $i === 1;
}

const START_OF_PACKET_MARKER_LENGTH = 4;
const START_OF_MESSAGE_MARKER_LENGTH = 14;

$input = str_split(file_get_contents('input.txt'));
$buffer = array();
$i = 0;
//$l = START_OF_PACKET_MARKER_LENGTH;
$l = START_OF_MESSAGE_MARKER_LENGTH;

while($letter = array_shift($input)){
	$i++;
	$buffer[] = $letter;
	
	if(count($buffer) == $l + 1){
		array_shift($buffer);
			
		if(count(array_filter(array_count_values($buffer),'filter')) == $l){
			break;
		}
	}
}

echo 'Marker is: ' . implode($buffer) . "\r\n";
echo "Marker is at position $i";