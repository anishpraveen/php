<!DOCTYPE html>
<html>
<body>

<?php  
/*$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
  echo "$colors[$value] == </t> $value <br>";
}
*/

	$flag=0;
for ($no=1; $no <100 ; $no++) { 
	for ($i=2; $i <= $no/$i; $i++) {     	
    	if ($no%$i==0) {
    		
    		$flag=1;
    		break;
    	}
    	
    }
    if ($flag==0) {
    	echo "$no,";    
    }
	$flag=0;
}
	

function sum($x, $y) {
    $z = $x + $y;
    return $z;
}
echo "</br>";

echo "5 + 10 = " . sum(5,10) . "<br>";
echo "7 + 13 = " . sum(7,13) . "<br>";
echo "2 + 4 = " . sum(2,4);
echo "<br>";
echo "HCF";
echo "<br>";
$x=12;
$y=18;
//if ($x<$y) {
//	$min=$x;
//}
$min=($x<$y) ? $x:$y;
echo "min=$min";
echo "<br>";
$hcf=1;
for ($i=2; $i < $min; $i++) { 
	if ($x%$i==0 && $y%$i==0) {
		$hcf=$i;
	}
}

echo "HCF of $x and $y=$hcf";
echo "<br>";
$lcf=($x*$y)/$hcf;
echo "LCF=$lcf";


echo "<br>";
for ($i=0; $i < 5; $i++) { 
	
	for ($j=0; $j <$i ; $j++) { 		
		echo "&nbsp;*";
	}
	echo "<br>";
	for ($k=5-$i; $k > 0; $k--) { 
		echo "&nbsp;";
	}
}


?>  

</body>
</html>