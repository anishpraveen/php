<?php
$url="https://www.google.co.in/";

$string=file_get_contents($url);

$regex="/(\w+.(jpg|png|jpeg|gif))/";

if(preg_match_all($regex,$string,$matches)){
    print_r($matches[0]);
}

print_r($matches);

?>