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
                $sql = $conn->prepare("DELETE FROM login WHERE iUID=?");
                $sql->bind_param('i',$id);
                $id=$id;
                if ($sql->execute() === TRUE) {
                    $pMessage= "Record deleted successfully";
                    $url='qaUser.php';
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="'.$url.'";';
                    echo '</script>';
                    echo '<noscript>';
                    echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                    echo '</noscript>'; exit;  
                } else {
                    $pMessage= "Error deleting record: " . $conn->error;
                }

                $conn->close();
        }

         if ($_SERVER["REQUEST_METHOD"] == "GET" ){
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                $name=getRow($_GET["id"]);
               
                $_SESSION["updateUserID"]=$id;
            }
            
        
        }



        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (isset($_GET["id"])){
                deleteRow($_GET["id"]);
                $pMessage="Record deleted successfully";
            }
        
        }
       

       function getRow($id){
             require("connectionString.php");
                
            $sql = "SELECT  cUsername FROM login where iUID='$id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                 while ($row = mysqli_fetch_assoc($result)) {
                            $_SESSION["updateUser"]= $row["cUsername"];                            
                             
                 }
                return $result;
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
            }
     ?>

     </head>

<body>
<?php 
include("header.php");
?>
        <div id="divContent" >
        <li style="float:left; text-align:left; "><a href="qaUser.php">Return User List</a></li><br><br>
        <h3>Delete <?php echo $_SESSION["updateUser"]; ?> </h3>
        <form id="formDelete" action="" method="POST" name="formDelete">
       
            <input type="submit" name="submit" value="Delete">
        </form>
        <p id="pMessage"><?php  echo $pMessage;?></p>
        </div>
<?php 
include("footer.php");
?>
</body>
</html>