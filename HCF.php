<?php
//finding HCF recursively
function hcfr($x,$y,$i,$hcf=1){   
	if ($x%$i==0 && $y%$i==0) {
		$hcf=$i;
        return $hcf;
	    }
    $i--;
    if($i>0)
       return hcfr($x,$y,$i,$hcf);    
//return $hcf;
}

function getip(){
    $x=readline("\nEnter the first number: ");
    if(ctype_digit($x)!=TRUE){
        echo "Invalid input\n";
        //exit();
        return;
    }
           
    $y=readline("Enter the second number: ");
    if(ctype_digit($y)!=TRUE){
        echo "Invalid input\n";
        return;
    }

    if($x==0 || $y==0){        
        $max=($x>$y) ? $x:$y;
        echo "\nHCF($x,$y)=$max\n";     // HCF of 0,any number is the number itself
        return;        
    }

    $min=($x<$y) ? $x:$y;       //getting minimum of the two input
    $max=($x>$y) ? $x:$y;       //getting maximum of the two input
    $hcf=hcfr($min,$max,$min);
    echo "\nHCF($x,$y,$x)=$hcf\n";
}
$i=0;
do{
getip();        //Starting function
$i=readline("Continue(yes=1/no=0): ");
}while($i!=0)

?>