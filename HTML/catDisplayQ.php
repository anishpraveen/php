<!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    
    
</head>

<body>
<?php 
include("header.php");
?>
<div id="divContent" >
 <li style="float:left; text-align:left; "><a href="qaHome.php">Return Home</a></li><br><br>
  
    <?php


            /*
            * Listing Question from DB from macthing category
            */
                function listQue(){
                require("connectionString.php");
                
               

                $sql = "select a.cQuestion as Que, a.cAnswer as Ans, b.cCat from qatable as a, categoryList as b, queCategory as c
                        where a.iSL=c.iQID
                        and c.iCatID=4
                        and c.iCatID=b.iSL";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $i=1;
                    echo "<table><tr><th>SL</th><th>Question</th><th>Answer</th></tr>";

                    while($row = mysqli_fetch_assoc($result)) { 
                        echo "<tr><td>" . $i. "</td><td> " . $row["Que"]. "</td><td> " . $row["Ans"]. "</td></tr>";
                        $i++;
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
                }

        listQue()
    ?>


 </div>
 <?php 
include("footer.php");
?></body>

</html>