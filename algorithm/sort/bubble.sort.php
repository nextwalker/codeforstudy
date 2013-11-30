<?php

function bubble_sort(&$arr) {
	$length = count($arr);
	for ($i = 0; $i < $length - 1 ; $i++) {
		for($j = 0; $j < $length - $i - 1; $j++) {
			if ($arr[$j] > $arr[$j+1]) {
				$arr[$j]   = $arr[$j] + $arr[$j+1];
				$arr[$j+1] = $arr[$j] - 2 * $arr[$j+1];
				$arr[$j]   = ($arr[$j] - $arr[$j+1]) / 2;
				$arr[$j+1] = $arr[$j+1] + $arr[$j];
			}
			echo "sort $i:$j\t" . implode(',', $arr) . "\n";
		}
	}
	return $arr;
}

$arr = array(2,1,3,5,4,9,6,0);
echo "raw : \t" . implode(',', $arr) . "\n";
$arr = bubble_sort($arr);
echo "sort : \t" . implode(',', $arr) . "\n";
