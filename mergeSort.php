<?php

function merge(&$a,$left,$mid,$right){

    $n1=floor($mid-$left+1);
    $n2=floor($right-$mid);
    $larr=array();
    $rarr=array();

    for($i=0;$i<$n1;$i++)
        $larr[$i]=$a[$left+$i];

    for($j=0;$j<$n2;$j++)
        $rarr[$j]=$a[$mid+$j+1];

    $i=0; $j=0; $k=$left;
//comparing and adding from both to initial array
    while($i<$n1 && $j<$n2){            
        if($larr[$i]<$rarr[$j])
           $a[$k++]=$larr[$i++];              
        else
            $a[$k++]=$rarr[$j++];     
    }
//adding left over element to initial array
    while($i<$n1){
         $a[$k++]=$larr[$i++];         
    }
    while($j<$n2){
        $a[$k++]=$rarr[$j++];        
    }

}

function mergeSort(&$a,$left,$right){
    if($left<$right){
        $mid=floor(($left+$right)/2);
        mergeSort($a,$left,$mid);
        mergeSort($a,$mid+1,$right);

        merge($a,$left,$mid,$right);
    }
}

?>