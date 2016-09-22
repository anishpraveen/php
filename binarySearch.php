<?php
function binarySearch($x, $list, $left, $right){
     if ($left > $right) {
        return -1;
    }	
    
             $mid = ($left + $right)/2;
            $mid=ceil($mid);
            
           // if($mid>=$right)
             //   return -1;
            if ($list[$mid] == $x) 
                return $mid;
            elseif ($list[$mid] > $x) 
               return binarySearch($x, $list, $left, $mid - 1);
            elseif ($list[$mid] < $x) 
                return binarySearch($x, $list, $mid + 1, $right);
                
    
   
    }

    function binSearchWord($x,$list,$left,$right){
        if($left>$right){
            return -1;
        }
        $mid=($left+$right)/2;
        $mid=floor($mid);
       // echo "mid=$mid";
         if($mid>=$right)
                return -1;
        if(strcmp($list[$mid],$x)==0)
            return $mid;
        elseif(strcmp($list[$mid],$x)<0)
            return binSearchWord($x,$list,$mid+1,$right);
        elseif(strcmp($list[$mid],$x)>0)
            return binSearchWord($x,$list,$left,$mid-1);
    }
    

?>