     <!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
     <?php
       
        $pMessage="";
        include("pagepermission.php");
       
        /*
        * Deleting Record
        */
        function deleteRow($id){         
                require("connectionString.php"); 


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