<?php

$input = file_get_contents('test.txt');
$commandsWithReturn = explode('$',$input);

$fileSystem = array();
$cwd = '';

foreach($commandsWithReturn as $x){
	$return = explode("\r\n",$x);
	$command = explode(' ',trim(array_shift($return)));
	
	switch($command[0]){
		case 'cd':
			if($command[1] == '..'){
				//UP ONE
				$cwd = '';
			}else{
				$cwd = $cwd . '/' . $command[1];
				if(!array_key_exists($cwd,$fileSystem)){
					$fileSystem[$cwd] = array();
				}
			}
			
			
		break;
		case 'ls':

		break;
	}
	
	echo "$command[0]\r\n";
}

