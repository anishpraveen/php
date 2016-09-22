<?php
  $j=0;
  $k=0;
  $temp=NULL;

  $item="[21, 22, 34, 45, 77, 99, 100]";
  $length=strlen($item);
  $item2=array();
  for($i=0;$i<$length;$i++){
  	if(ctype_alnum($item[$i])==FALSE)
  		{
  		$item[$i]=" ";
  	}
  } 
  //explode function
  $flag=0;
  for($i=0;$i<$length;$i++){
         if($item[$i]==" "){
         	$j=$i+1;
         	while($item[$j]!=" "){
               $temp.=$item[$j];               
                $j++; 
                $flag=1;
         	}
           if(flag!=0){
             $i=$j;
         	  $item2[$k]=$temp;
         	  $temp=NULL;
         	  $k++;
             $flag=0;
           }
         	
         }

  }
  echo $item;
  echo($item2[2]);

?>