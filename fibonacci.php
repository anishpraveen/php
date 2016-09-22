<?php
function fib(){
	$n=readline("Enter limit=");
	$name=$_GET["Name"];
	echo $name."</br>";
	if(is_numeric($n)!=TRUE){
		echo "not a valid number \n";
		exit();
	}
	
	$a=0;
	$b=1;
	echo "$a,$b,";
	for($i=0;$i<$n;$i++){
		$c=$a+$b;
		echo "$c";
		if($i!=$n-1){
			echo ",";
		}
		$a=$b;
		$b=$c;
	}
	echo "\n";
}
fib();
?>