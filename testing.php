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
	



?>  

</body>
</html>