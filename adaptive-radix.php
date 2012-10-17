<?
/*
Adaptive Radix sort.
Nikolay Mihaylov, Copyleft 10.2012

When it pass for first digit (smallest one),
a separate if() checks for largest number.
*/

function digit_at($a, $i){
	$a = $a . "";
	if (strlen($a) <= $i)
		return "0";

//	printf("%10s %2d %2d\n", $a, strlen($a), $i);

	$a = strrev($a);

	return $a[$i];
}

function radix_sort($a){
	$max_digits = 0;
	$ix = 0;

	while(true){
		printf("Pass #%d\n", $ix);

		$store = array();

		for($i = 0; $i < count($a); $i++){
			$digit = digit_at($a[$i], $ix);
			$store[$digit][] = $a[$i];

			if ($ix == 0)
				if ($max_digits < strlen($a[$i] . "") - 1)
					$max_digits = strlen($a[$i] . "") - 1;
		}

	//	print_r($store);

		$a = array();

		for($i = 0; $i <= 9; $i++)
			if (@$store[$i])
				foreach($store[$i] as $x)
					$a[] = $x;

		print_r($a);
		
		$ix++;
		
		if ($ix >= $max_digits)
			break;
	}

	return $a;
}



$a = array(324,23,2,35,6,444333,224,655545,23,2,4,78);

print_r(radix_sort($a));

