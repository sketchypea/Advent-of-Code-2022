<?php
//$input = file('test.txt');
$input = file('input.txt');
$prepped = array();
foreach($input as $row){
	$prepped[] = str_split(str_replace("\r\n",'',$row));
}

$scores = array();

foreach($prepped as $rowIndex=>$row){
	foreach($row as $index=>$tree){
		//LEFT
		$left = 0;
		for($i=$index;$i>0;$i--){
			$left++;
			
			if($row[$i -1] >= $tree ){
				break;
			}
		}
		
		//RIGHT
		$right = 0;
		for($i=$index;$i<count($row)-1;$i++){
			$right++;
			if($row[$i +1] >= $tree){
				break;
			}
		}

		//UP
		$up = 0;
		for($i=$rowIndex;$i>0;$i--){
			$up++;
			if($prepped[$i-1][$index] >= $tree ){
				break;
			}
		}

		//DONW
		$down = 0;
		for($i=$rowIndex;$i<count($prepped)-1;$i++){
			$down++;
			if($prepped[$i+1][$index] >= $tree ){
				break;
			}
		}
				
		$scores[] = array_product(array($left,$right,$up,$down));
	}		
}

echo max($scores);