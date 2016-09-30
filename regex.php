<?php
$url="https://www.google.co.in/";

do{
    $url=readline("Input url in full address \nalong with https://\n: ");
    $regex="/(https:\/\/|http:\/\/)[\w]+.[\w]+/";
 }while(!preg_match_all($regex,$url,$matches));
    

$string=file_get_contents($url);

$regex="/([\w|-]+[.](jpg|png|jpeg|gif|ico))/";

if(preg_match_all($regex,$string,$matches)){
    print_r($matches[0]);
}

//print_r($matches);

?>