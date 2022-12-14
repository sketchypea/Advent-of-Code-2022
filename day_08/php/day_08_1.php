<?php

//$input = file('test.txt');
$input = file('input.txt');
$prepped = array();
foreach($input as $row){
	$prepped[] = str_split(str_replace("\r\n",'',$row));
}

$totalVisible = 0;
foreach($prepped as $rowIndex=>$row){
	foreach($row as $index=>$tree){
		//OUTSIDE
		if($index === 0 || $index === count($row) -1 || $rowIndex === 0 || $rowIndex === count($row) -1){
			$totalVisible++;
			$tallest = $tree;
			continue;
		}
		
		//L-R
		if($tree > $tallest){
			$totalVisible++;
			$tallest = $tree;
			continue;
		}
		
		//R-L	
		$rlVis = false;	
		foreach(array_reverse($row,true) as $rIndex=>$rTree){
			if($rIndex === $index){
				$totalVisible++;
				$rlVis = true;
				break;
			}

			if($rTree >= $tree){
				break;
			}
		}
		
		if($rlVis){
			continue;
		}
		
		//T-B
		$tbVis = false;
		for($i=0; $i<=$rowIndex;$i++){
			if($i === $rowIndex){
				$totalVisible++;
				$tbVis = true;
				break;
			}

			if($prepped[$i][$index] >= $tree){
				break;
			}
			
		}

		if($tbVis){
			continue;
		}

		//B-T
		for($i=count($prepped)-1; $i>=$rowIndex;$i--){
			if($i === $rowIndex){
				$totalVisible++;
				echo $tree . "visible from bottom\r\n";
				break;
			}
			if($prepped[$i][$index] >= $tree){
				break;
			}
			
		}
	}
	echo "\r\n\r\n";
}

echo $totalVisible;