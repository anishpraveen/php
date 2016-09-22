<?php
function linear($a,$n){
    echo "\nEntering function in file LinearSearch.php\n";
    $flag=0;
    $x=readline("Enter value to search: ");
    for($i=0;$i<$n;$i++){
    if($a[$i]==$x){
        echo "$x found at loc $i\n";
        $flag=1;
        break;
    }
        
    }
    if($i==$n && $flag==0){
        echo "$x not found";
    }
        
}
?>