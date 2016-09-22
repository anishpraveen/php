<?php

// Sorting the list of word 
function bsWord(&$a,$n){
    echo "Sorting\n";
    //var_dump($a);
    for ($i=0; $i < $n-1; $i++) { 
        for ($j=0; $j <$n-$i-1 ; $j++) {
            if (strcasecmp($a[$j],$a[$j+1])>0) {              
                $temp=$a[$j];
                $a[$j]=$a[$j+1];
                $a[$j+1]=$temp;
            }
        }
    }
    //print_r($a);
    return $a;
}

function removeDuplicate($a,$n){
    $new=array();
    $k=0;
    $i=0;
    $new[$k]=$a[$i];
    for ($i=1; $i < $n; $i++) {
        //echo "i=$i and k=$k n=$n\n";
        if(strcasecmp($new[$k],$a[$i])!=0){
                $k++;
                $new[$k]=$a[$i];                
        } 
        else 
            continue;
    }
   // print_r($new);
    return $new;
}

//var_dump($paragraph);

function stringSplit(){

$paragraph = "Lorem ipsum dolor sit amet consectetur elit 22";

$len=strlen($paragraph);
//$ff= ctype_punct($paragraph[0][0]);  echo "ff=$ff len=$len";

for($i=0;$i<$len;$i++){                     //Removing Punctation
    if(strcmp($paragraph[$i],".")==0||strcmp($paragraph[$i],"   ")==0
        ||strcmp($paragraph[$i],"?")==0||strcmp($paragraph[$i],"!")==0||strcmp($paragraph[$i],"'")==0||strcmp($paragraph[$i],")")==0||strcmp($paragraph[$i],"(")==0
        ||((strcmp($paragraph[$i]," ")==0)&&(strcmp($paragraph[$i+1]," ")==0)))
        $paragraph[$i]="";
}
//echo "para=$paragraph[10]";
var_dump($paragraph);

$parts=array();
$k=0;
$n=0;
$j=0;
$temp=NULL;                                 //Splitting words
for ($i=0; $i <$len ; $i++) { 
    if(
        (strcmp($paragraph[$i]," ")==0 )

        ){
        for($j;$j<$i;$j++)
            $temp.=$paragraph[$j];
        $parts[$k++]=$temp;;
        $temp=NULL;
        $j++;
    }
}

for($j;$j<$i;$j++)
            $temp.=$paragraph[$j];
        $parts[$k++]=$temp;;
        $temp=NULL;
        $j++;

$noWord=count($parts);
echo "Number of words:=$noWord \n\n Words:\n";

bsWord($parts,$noWord);
$parts=removeDuplicate($parts,$noWord);

foreach($parts as $keys => $value)
   echo " $value\n";
}

stringSplit();

?>