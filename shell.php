<?

function shell_sort($a){
        $step   = count($a) - 1;

        while ( true ){
                $sorted = false;


                echo sprintf("Step %3d\n", $step);


                while ( ! $sorted ){
                        $sorted = true;


                        for ($i = 0; $i < count($a); $i++)
                                echo sprintf("[ %4d ] ", $a[$i]);
                        echo "\n";


                        for ($i = 0; $i < count($a) - $step; $i++){
                                $j = $i + $step;

                                if ($a[$i] > $a[$j]){
                                        $tmp   = $a[$i];
                                        $a[$i] = $a[$j];
                                        $a[$j] = $tmp;

                                        $sorted = false;
                                }
                        }
                }



                if ($sorted && $step == 1)
                        break;

                $step = (int) ($step / 2 + 0.5);
        //      $step = (int) ($step / 2);
                if ($step < 1)
                        $step = 1;
        }

        return $a;
}



$a = array(324,23,2,35,6,333,224,6555,23,2,4,78);

print_r(shell_sort($a));