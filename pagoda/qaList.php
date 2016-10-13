<!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    
    
</head>

<body>
<?php 
session_start();

        if(isset($_SESSION["userType"])){
            /*if($_SESSION["userType"]==0){
                $url='qaList.php';
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.$url.'";';
                echo '</script>';
                echo '<noscript>';
                echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                echo '</noscript>'; exit;  
            }*/
            
         }
         else{
            $url='Register.php';
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.$url.'";';
                echo '</script>';
                echo '<noscript>';
                echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                echo '</noscript>'; exit;  
        }

include("header.php");
?>
<div id="divContent" >
 <li style="float:left; text-align:left; "><a href="qaHome.php">Return Home</a></li><br><br>
    <?php


                /*
                * Listing Record from DB
                */
                function listDB($limit){
                        require("connectionString.php"); 
                        //$limit=rowLimit();
                        $sql = "SELECT iSL, cQuestion, cAnswer FROM qatable $limit";
                        //var_dump($sql);
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            $i=1;
                            echo "<table><tr><th>SL</th><th>Question</th><th>Answer</th></tr>";
                            while($row = mysqli_fetch_assoc($result)) { 
                                echo "<tr><td>" . $i. "</td><td> " . $row["cQuestion"]. "</td><td>" . $row["cAnswer"]. "</td></tr>";
                                $i++;
                            }
                            //$paginationCtrls=paginationCtrl();
                            /*echo "<tr><td colspan='3'>". $paginationCtrls . "</td></tr>";
                            echo "</table>";*/
                        } else {
                            echo "0 results";
                        }

                        mysqli_close($conn);
                }

                
                function paginationCtrl(){
                    include("connectionString.php");
                        
                    $sql = "SELECT COUNT(*) as count FROM qatable";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    
                    $rows = $row["count"];    //total no: of records
                    
                    $page_rows = 4;     // page limit
                    
                    $last = ceil($rows/$page_rows);
                    
                    if($last < 1){
                        $last = 1;
                    }
                    
                    $pagenum = 1;   // initilizing page number
                    $linkLimit=1;   // number of links to be in left and right of current

                    // Get pagenum from URL if it is present, else it is = 1
                    if(isset($_GET['pn'])){
                        $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']); // deletes all non digit character in URL query
                    }

                    // This makes sure the page number isn't below 1, or more than our $last page
                    if ($pagenum < 1) { 
                        $pagenum = 1; 
                    } else if ($pagenum > $last) { 
                        $pagenum = $last; 
                    }

                    $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

                    $paginationCtrls = '';
                    
                    if($last != 1){                        
                        if ($pagenum > 1) {
                            $previous = $pagenum - 1;
                            // generating the "Previous"
                            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
                            // generate previous page numbers with link
                            for($i = $pagenum-$linkLimit; $i < $pagenum; $i++){
                                if($i > 0){
                                    $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
                                }
                            }
                        }

                        // generate current page without link
                        $paginationCtrls .= ''.$pagenum.' &nbsp; ';

                        // generate next page numbers with link
                        for($i = $pagenum+1; $i <= $last; $i++){
                            $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
                            if($i >= $pagenum+$linkLimit){
                                break;
                            }
                        }
                        // generating the "Next"
                        if ($pagenum != $last) {
                            $next = $pagenum + 1;
                            $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
                        }
                    }
                    listDB($limit);
                    echo "<tr><td colspan='3'>". $paginationCtrls . "</td></tr>";
                    echo "</table>";
                    //return $paginationCtrls;
                }

        paginationCtrl();
    ?>


 </div>
 <?php 
include("footer.php");
?></body>

</html>