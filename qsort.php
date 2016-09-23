<?php

qmain();
function qmain(){
    $n=readline("Enter limit: ");
    if(ctype_digit($n)!=TRUE){
        echo"Invalid input";
        exit();
    }
    $a=array();
    for ($i=0; $i < $n; $i++) { 
        $a[$i]=readline("a[$i]: ");
    }
    $flag=1;
    $b=$a;
    $c=$a;
    $b=qsort($b,0,$n-1);
    echo "hoare Partition \n";
    print_r($b);

    $flag=0;
    $c=lqsort($c,0,$n-1);
    echo "lomoto Partition \n";
    print_r($c);
}

function qsort(&$a,$left,$right){

    
        $partition=hoarePartition($a,$left,$right);

    //echo "Sorting $partition\n";
    if($left<$partition-1)
        qsort($a,$left,$partition-1);
    if($partition<$right)
        qsort($a,$partition,$right);

    return $a;
}

function lqsort(&$a,$left,$right){

    if($left<$right)
       { $partition=lomotoPartition($a,$left,$right);
   

    //echo "Sorting $partition\n";
    //if($left<$partition-1)
        lqsort($a,$left,$partition-1);
   // if($partition<$right)
        lqsort($a,$partition+1,$right);

    return $a;
       }
}

function swap(&$a,&$b){
    $temp=NULL;
    $temp=$a;
    $a=$b;
    $b=$temp;
}


function lomotoPartition(&$a,$left,$right){
   
     $i=$left;
    $j=$right;
    $pivot=$a[$right];        
    while($i<=$j){
        while($a[$i]<$pivot)
            $i++;
        while($a[$j]>$pivot)
            $j--;
        if($i<=$j){
            swap($a[$i],$a[$j]);            
            $i++;
            $j--;
        }
    }

    return $i;
}


function hoarePartition(&$a,$left,$right){

     $i=$left;
    $j=$right;
    $pivot=$a[$left];        
    while($i<=$j){
        while($a[$i]<$pivot)
            $i++;
        while($a[$j]>$pivot)
            $j--;
        if($i<=$j){
            swap($a[$i],$a[$j]);            
            $i++;
            $j--;
        }
    }

    return $i;
}

?>