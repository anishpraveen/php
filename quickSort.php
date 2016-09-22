<?php



function partition(&$a,$left,$right){
   
    $i=$left;
    $j=$right;
    $pivot=$a[($left+$right)/2];
    echo "\npivot=$pivot\n";
    while($i<=$j){
        while($a[$i]<$pivot)
            $i++;
        while($a[$j]>$pivot)
            $j--;
        if($i<=$j){
            $temp=$a[$i];
            $a[$i]=$a[$j];
            $a[$j]=$temp;
            $i++;
            $j--;
        }
    }

    return $i;

}

function qsort(&$a,$left,$right){
    //if($right-$left<0)
    //    return;
   
    $partition=partition($a,$left,$right);
    if($left<$partition-1)
        qsort($a,$left,$partition-1);
    if($partition<$right)
        qsort($a,$partition,$right);
 
return $a;
}

function qsortmain(&$a,$left,$right){
   $a=qsort($a,$left,$right);
   var_dump($a);
    //$sum=0;
    //foreach($a as $key => $value)
     //   $sum+=$a[$key];
    //echo "Sum=$sum\n";
    return $a;
}

?>