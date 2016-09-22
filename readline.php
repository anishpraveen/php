<?php
function hcf(){
        $x=readline("Enter x:");
        $y=readline("Enter y:");   
		$min=($x<$y) ? $x:$y;
		$hcf=1;
		for ($i=2; $i <$min ; $i++) { 
			if ($x%$i==0 && $y%$i==0) {
			$hcf=$i;
			}
		}
		$lcf=($x*$y)/$hcf;
		echo "$x and $y HCF=$hcf and LCF=$lcf\n";
}
//hcf();

function stringrev(){
	$s=readline("Enter string:");
	$l=strlen($s);
	//echo "$l\n $s";
	$s1="";
	$temp = '';
	for ($i = 0; $i < $l; $i++) {
  	  $temp .= $s{$l - $i - 1};
		}
	var_dump($temp);
	var_dump($l);
}
//stringrev();

function fib(){
	$a=0;
	$b=1;
	$c=$a+$b;
	echo "$a,$b,";
	for($i=0;$i<10;$i++){
		$c=$a+$b;
		echo "$c,";
		$a=$b;
		$b=$c;
	}
}
//fib();

function fibr($n){
	if($n==0)
		return 0;
	else if($n==1){		
		return 1;
	}
	return fibr($n-1)+fibr($n-2);
}

function fibcall(){
	$n=readline("Enter limit=");
	for($i=0;$i<$n+2;$i++){
		echo fibr($i);
		if($i!=$n-1){
			echo ",";
		}
	}

	echo "\n";
}
fibcall();
function armstrong(){
	$no=371;
	$n=$no;
	$sum=0;
	do{
		$i=$no%10;
		$sum+=$i*$i*$i;
		$no=$no/10;
	}while($no>0);
	if($sum==$n){
		echo "Armstrong\n";
		return 1;
	}
	else
		echo "Not";
}
//$z=armstrong();
//echo "$z\n";
?>