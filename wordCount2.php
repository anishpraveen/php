<?php
$file = "text.txt";
$file_handle = fopen("text.txt", "rb");
$text = fread($file_handle,filesize("text.txt"));
$parts = explode(' ', $text);
include "bubbleSort.php";
$a=bsWord($a,count($parts));
    foreach ($parts as $key => $value) {
        echo "parts[$key]=$parts[$key] \n";
       }
       

       $i=0;
       $countWord=0;
       $countLine=0;
       $n=strlen($text);
       echo $n;
       while ($i<$n) {
           if(
             (strcmp($text[$i]," ")==0 && ctype_alnum($text[$i-1])==TRUE)
              || (ctype_punct($text[$i])==TRUE && ctype_alnum($text[$i-1])==TRUE && ctype_alnum($text[$i+1])==FALSE)
           )
            { $countWord++;}
            if(strcmp($text[$i],".")==0 && 
            (strcmp($text[$i+1]," ")==0 || (ctype_alnum($text[$i-1])==TRUE && ctype_alnum($text[$i+1])==FALSE)))
             $countLine++;
          $i++;
}

            fclose($file_handle);
//var_dump ($text);
echo "\ncountWord=$countWord";
echo "\ncountLine=$countLine\n\n";
?>