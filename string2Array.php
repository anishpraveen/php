<?php

$text=" [ 10, 2, 30, 4 ]";//readline("Enter string: ");

$text=str_ireplace("[","",$text);
$text=str_ireplace("]","",$text);

$parts=explode(",",$text);

$parts=str_replace(" ","",$parts);
sort($parts);
$sum=0;
foreach($parts as $key => $value)
    {echo "parts[$key]:".$parts[$key] . "\n";
   // $sum+=$parts[$key];
    }
    //echo "Sum=".$sum;
    echo "\n";
    include "binarySearch.php";
    $n=count($parts);
    echo "Limit=$n\n";

    $loc=binarySearch(10,$parts,0,$n);
    echo "Loc=$loc \n";

    // For words
    echo "\nWords\n";
    $text=" [ aa, ad, ac, ad ]";
    $text=str_ireplace("[","",$text);
    $text=str_ireplace("]","",$text);

    $parts=explode(",",$text);

    $parts=str_replace(" ","",$parts);
    foreach($parts as $key => $value)
        echo "parts[$key]:".$parts[$key] . "\n";

    $n=count($parts);
    echo "Limit=$n\n";
    $loc=binSearchWord("aa",$parts,0,$n);
    echo "Loc=$loc \n";
   $a="2";
   $b=4;
   $a.=$b;
   echo "a=$a\n";

   include "bubbleSort.php";
   $parts=bsWord($parts,$n);
   var_dump($parts);
?>