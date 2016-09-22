<?php
function selectionSort($a,$n){
    for ($i=0; $i < $n-1; $i++) { 
        for ($j=$i+1; $j <$n ; $j++) { 
            if ($a[$i]>$a[$j]) {
                $temp=$a[$j];
                $a[$j]=$a[$i];
                $a[$i]=$temp;
            }
        }
    }
    echo "/nSelection ";
    print_r($a);
    return $a;
}

?>