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
//print_r($a);
$x=readline("Enter value to search: ");
include 'linearSearch.php';
//linear($a,$n);
include 'binarySearch.php';
echo "Call to fn\n";
$loc=binarySearch($x,$a,0,$n);
echo "found at loc: ". $loc ."\n";
echo "\nArray\n";
foreach ($a as $value) {
    echo "$value \n";
}
?>