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

     $url='login.php';
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="'.$url.'";';
                    echo '</script>';
                    echo '<noscript>';
                    echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                    echo '</noscript>'; exit;  
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