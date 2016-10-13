     <!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <?php
       $pMessage="";
       include("pagepermission.php");
          //  session_start();
        /*
        * Updating Record
        */
        function updateUser($id,$iType){
                require("connectionString.php"); 


                // sql to update a record
                $sql = $conn->prepare("UPDATE login SET iType=? WHERE iUID=?");
                $sql->bind_param('ii',$iType,$id);
               
                if ($sql->execute() === TRUE) {
                    $pMessage= "Record updated successfully";
                } else {
                    $pMessage= "Error updating record: " . $conn->error;
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

        if ($_SERVER["REQUEST_METHOD"] == "POST" ){
            //session_start();
            //echo $_SESSION["updateUserID"];
            //echo 'type  '.$_POST["selectType"];
            updateUser($_SESSION["updateUserID"],$_POST["selectType"]);
                    $url='qaUser.php';
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="'.$url.'";';
                    echo '</script>';
                    echo '<noscript>';
                    echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                    echo '</noscript>'; exit;  
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
        <h3>Update <?php echo $_SESSION["updateUser"]; ?> Privilage</h3>
        
        

        <form id="formEditQA"  action="" method="POST" name="formEditQA">
            
            <label>Select Type to update.</label><br>
         <select id="selectType" name="selectType">
            <option value="0">Student</option>
            <option value="1">Maintainer</option>
            </select><br>
               
                <style>
                    
                   table{
                       margin-top:10px;
                       margin-left:35%;
                       text-align: left;
                   }
                    </style>
               
                <input type="submit"  id="inUpdate" value="Update" >
            </form>
            <p id="pMessage"></p>
            
        </div>
<?php 
include("footer.php");
?>
</body>
</html>