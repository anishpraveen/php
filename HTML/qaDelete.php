     <!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
     <?php
       
                $pMessage="";
        function populateDropDown(){
              
                  $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "QandA_DB";  
                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT iSL, cQuestion, cAnswer FROM qatable";
                $result = mysqli_query($conn, $sql);

                // set the resulting array to associative
                $result = mysqli_query($conn, $sql); 
               if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    echo "";
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['iSL'] . "'>" . $row['cQuestion'] . "</option>";
                    }
                    echo "";
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
        }

        /*
        * Deleting Record
        */
        function deleteRow($id){         
                 $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "QandA_DB";  
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);                
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }


                // sql to delete a record
                $sql = $conn->prepare("DELETE FROM qatable WHERE iSL=?");
                $sql->bind_param('i',$id);
                $id=$id;
                if ($sql->execute() === TRUE) {
                    $pMessage= "Record deleted successfully";
                } else {
                    $pMessage= "Error deleting record: " . $conn->error;
                }

                $conn->close();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (strcasecmp($_POST["selectQuestion"], "selectQuestion")!=0){
                deleteRow($_POST["selectQuestion"]);
                $pMessage="Record deleted successfully";
            }
        
        }
       
     ?>

     </head>

<body>
<?php 
include("header.php");
?>
        <div id="divContent" >
        <li style="float:left; text-align:left; "><a href="qaHome.php">Return Home</a></li><br><br>
        <h3>Delete Question</h3>
        <form id="formDelete" action="" method="POST" name="formDelete">
        <label>Select Question to delete.</label><br>
            <select id="selectQuestion" name="selectQuestion">
            <?php populateDropDown(); ?>
            </select><br>
            <input type="submit" name="submit" value="Delete">
        </form>
        <p id="pMessage"><?php  echo $pMessage;?></p>
        </div>
<?php 
include("footer.php");
?>
</body>
</html>