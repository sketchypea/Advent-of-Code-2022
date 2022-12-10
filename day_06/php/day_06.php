<?php
const START_OF_PACKET_MARKER_LENGTH = 4;
const START_OF_MESSAGE_MARKER_LENGTH = 14;

$input = str_split(file_get_contents('input.txt'));
$buffer = array();
$i = 0;
$l = START_OF_PACKET_MARKER_LENGTH;
//$l = START_OF_MESSAGE_MARKER_LENGTH;

while($letter = array_shift($input)){
	$i++;
	$buffer[] = $letter;
	
	if(count($buffer) == $l){
		if(count(array_unique($buffer)) == $l){
			break;
		}else{
			array_shift($buffer);
		}
	}
}

echo 'Marker is: ' . implode($buffer) . "\r\n";
echo "Marker is at position $i";