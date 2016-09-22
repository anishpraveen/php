<?php
$n=readline("Enter limit of array: ");
if(is_numeric($n)!=TRUE){
		echo "not a valid number \n";
		exit();
	}
$a=array();
for($i=0;$i<$n;$i++){
    $a[$i]=readline("A[$i]:");
}
//var_dump ($a);
print_r($a);
include "bubbleSort.php";
//$a=bubbleSort($a,$n);
include "selectionSort.php";
$a=selectionSort($a,$n);
echo "Sorted ";
print_r($a);
?>