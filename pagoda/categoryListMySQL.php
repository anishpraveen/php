<?php

function getCatCount(){
    require("connectionString.php");



    $sql = "SELECT iSL FROM categoryList";
     $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}


?>