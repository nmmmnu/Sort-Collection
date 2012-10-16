<?

function digit_at($a, $i, $max_digits=4){
//	if (strlen($a) > $max_digits)
//		assert("More than $max_digits digits in $a\n");

	while(strlen($a) < $max_digits)
		$a = "0" . $a;

	$a = $a . "";

	printf("\t%4d [%d] = %d\n", $a, $i, $a[$i]);

	return $a[$i];
}

function radix_sort($a, $max_digits=4){
	for($ix1 = 0; $ix1 < $max_digits; $ix1++){
		$ix = $max_digits - $ix1 - 1;

		printf("Pass #%d\n", $ix);

		$store = array();
		
		for($i = 0; $i < count($a); $i++){
			$digit = digit_at($a[$i], $ix, $max_digits);
			$store[$digit][] = $a[$i];
		}
		
	//	print_r($store);
		
		$a = array();
		
		for($i = 0; $i <= 9; $i++)
			if (@$store[$i])
				foreach($store[$i] as $x)
					$a[] = $x;
				
		print_r($a);
	}

	return $a;
}



$a = array(324,23,2,35,6,333,224,6555,23,2,4,78);

print_r(radix_sort($a));

