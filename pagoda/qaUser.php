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
                $sql = "SELECT iUID, cUsername, iType FROM login";
                $result = mysqli_query($conn, $sql);
                $userType="";

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $i=1;
                    echo "<table cellpadding='10'><tr><th>SL</th><th>User</th><th>Type</th><th></th><th></th></tr>";
                    while($row = mysqli_fetch_assoc($result)) { 
                        if($row["iUID"]==1){
                            continue;
                        }
                        if($row["iType"]==0)
                            $userType="Student";
                        else
                            $userType="Maintainers";
                        echo "<tr><td>" . $i. "</td><td> " . $row["cUsername"]. "</td><td>" . $userType . "</td>";
                        echo "<td><a href='qaUpdateUser.php?id=" . $row["iUID"]. "'><button >Update</button></a></td>";
                        echo "<td><a href='qaDeleteUser.php?id=" . $row["iUID"]. "'><button >Delete</button></a></td></tr>";
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