<?php

function questionFetch()
{
    include_once("connectionString.php");

    //CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
    if (isset($_REQUEST['que'])) {
        $que = $_REQUEST['que'];
       
        $sql =  ("SELECT cQuestion,cAnswer FROM qatable WHERE cQuestion LIKE '%{$que}%' OR cAnswer LIKE '%{$que}%'");
        $result=mysqli_query($conn, $sql);
        //var_dump($result);
        $array = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $array[] = array($row['cQuestion'],$row['cAnswer']);
            }
        }
      
    //RETURN JSON ARRAY
    echo json_encode($array);
    }
}

function categoryFetch()
{
    include_once("connectionString.php");

    //CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
    if (isset($_REQUEST['query'])) {
        $query = $_REQUEST['query'];
        $sql =  ("SELECT cCat,iSL FROM categoryList WHERE cCat LIKE '%{$query}%'");
        $result=mysqli_query($conn, $sql);
        $array = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $array[] =  array( $row['cCat'], $row['iSL']);
            }
        }
      
    //RETURN JSON ARRAY
    echo json_encode($array);
    }
}

function questionFetchCategory()
{
    include_once("connectionString.php");

    //CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
    if (isset($_REQUEST['query'])) {
        $query = $_REQUEST['query'];
        $sql =  "Select a.cQuestion as Que, a.cAnswer as Ans, b.cCat as Category from qatable as a, categoryList as b, queCategory as c
                        where a.iSL=c.iQID
                        and b.cCat = '$query'
                        and c.iCatID=b.iSL";
        $result=mysqli_query($conn, $sql);
        //var_dump($result);
        $array = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $array[] = array($row['Que'],$row['Ans']);
            }
        }
      
    //RETURN JSON ARRAY
    echo json_encode($array);
    }
}

 if (isset($_REQUEST['que']) && isset($_REQUEST['query'])){
    questionFetchCategory();
 }
 else if(isset($_REQUEST['query'])){
     categoryFetch();
 }
 else{
     questionFetch();
 }
?>