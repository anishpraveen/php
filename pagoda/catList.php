<!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    
    
</head>

<body>
<?php 
include("pagepermission.php");
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
                
               

                $sql = "SELECT iSL, cCat FROM categoryList";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $i=1;
                    echo "<table cellpadding='10'><tr><th>SL</th><th>Category</th></tr>";
                    while($row = mysqli_fetch_assoc($result)) { 
                        echo "<tr><td>" . $i. "</td><td> " . $row["cCat"]. "</td></tr>";
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