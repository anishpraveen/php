<!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
   </head>

<body>
<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
   
    session_destroy();
     echo "<script >";
     echo "alert('logged out');";
    echo "</script>";  
    }

?>
<?php 
include("header.php");
?>
        <div id="divContent" >
             
            
            <form id="formLogout" action="" method="POST" name="formLogout">
               <input type="submit" name="submit" value="Logout"><br>
            </form>
            <p id="pMessage"></p>
        </div>
<?php 
include("footer.php");
?>
</body>
</html>