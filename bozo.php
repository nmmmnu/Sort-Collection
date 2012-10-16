<?
/*
Bozo Sort written in PHP
Nikolay Mihaylov Copyleft 2012-03-28, Sofia
*/

function is_sorted($a){
        for($i=0; $i < count($a) - 1; $i++)
                if ($a[$i] > $a[$i + 1])
                        return false;

        return true;
}

function bozo_sort($a){
        $passes  = 0;

        while ( is_sorted($a) == false ){
                $passes++;

                while(1){
                        $x = rand(0, count($a) - 1);
                        $y = rand(0, count($a) - 1);

                        if ($x == $y)
                                continue;

                        if ($x > $y){
                                // continue;
                                $m = $x;
                                $x = $y;
                                $y = $m;
                        }

                        if ($a[$x] > $a[$y]){
                                $m     = $a[$x];
                                $a[$x] = $a[$y];
                                $a[$y] = $m;

                                break;
                        }
                }
        }

        echo "Done in $passes passes/swaps.\n";

        return $a;
}



$a = array(324,23,2,35,6,333,224,6555,23,2,4,78);

print_r(bozo_sort($a));