<?php

function populateCategoryCB(){
     require("connectionString.php"); 

     // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);                
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT iSL, cCat FROM categoryList";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $i=0;
        echo "<table style='width:400px'>";
        while($row = mysqli_fetch_assoc($result)) { 
            //var_dump($row["cCat"]);
            if($i%2==0){
                echo "<tr><td>";
                echo "<input type='checkbox' id='" . $row["iSL"]. "'value='" . $row["iSL"]. "' name='check_list[]' /><label for= '". $row["iSL"]. "' /><a>" . $row["cCat"]. "</a></label>";
                echo "</td>";
            }
            else{
                echo "<td>";
                echo "<input type='checkbox' id='" . $row["iSL"]. "'value='" . $row["iSL"]. "' name='check_list[]' /><label for= '". $row["iSL"]. "' /><a>" . $row["cCat"]. "</a></label>";
                echo "</td></tr>";
            }
            $i++;
        }
        if($i%2!=0){
            echo "</tr>";
        }
         echo "</table>";
    } else {
        echo "0 results";
    }

}

?>

