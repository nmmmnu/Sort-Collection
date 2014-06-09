<?
error_reporting(E_ALL);

$swaps = 0;

function merge_sort($a, $deep = 0){
	global $swaps;

	if (count($a) <= 1)
		return $a;

	// Split by 2
	$mid = (int) (count($a) / 2);

	// sort halves
	$a1 = merge_sort(array_slice($a, 0, $mid	), $deep + 1);
	$a2 = merge_sort(array_slice($a, $mid		), $deep + 1);

	// merge the partitions
	$aa = array();

	$v1 = array_shift($a1);
	$v2 = array_shift($a2);

	while($v1 || $v2){
		if ($v1)
			if ($v1 <= $v2 || $v2 === null){
				$aa[] = $v1;
				$v1 = array_shift($a1);
				$swaps++;
			}

		if ($v2)
			if ($v2 < $v1 || $v1 === null){
				$aa[] = $v2;
				$v2 = array_shift($a2);
				$swaps++;
			}
	}

	return $aa;
}



$a = array(324,23,2,35,6,333,224,6555,23,2,4,78);

for ($i = 0; $i < 10000; $i++)
	$a[] = rand(0,1000000);

//print_r($a);

//print_r(
merge_sort($a);
// );

printf("%d rearrangements\n", $swaps);

