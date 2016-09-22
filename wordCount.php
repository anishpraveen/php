<?php

 $file = "text.txt";
  $lines = count(file($file));
  echo "There are $lines lines in $file\n\n\n";
  //$count = count(explode(" ", $file));
  //echo "$file contains $count words";

  $file_handle = fopen("text.txt", "rb");

//while (!feof($file_handle) ) {
    
    $line_of_text = fread($file_handle,filesize("text.txt"));
    $parts = explode(' ', $line_of_text);
    foreach ($parts as $key => $value) {
        //echo "parts[$key]=$parts[$key] \n";
       }
       $key++;
     echo "No of words:$key\n";
     echo count($parts)."\n";
  //  }

fclose($file_handle);
?>