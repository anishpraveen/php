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
                function listDB(){
                require("connectionString.php"); 
                $sql = "SELECT iSL, cQuestion, cAnswer FROM qatable";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $i=1;
                    echo "<table><tr><th>SL</th><th>Question</th><th>Answer</th></tr>";
                    while($row = mysqli_fetch_assoc($result)) { 
                        echo "<tr><td>" . $i. "</td><td> " . $row["cQuestion"]. "</td><td>" . $row["cAnswer"]. "</td></tr>";
                        $i++;
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
                }

        listDB()
    ?>


 </div>
 <?php 
include("footer.php");
?></body>

</html>