<?php

    session_start();
   
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

         
         if((isset($_POST["inputUser"],$_POST["inputPass"]))  ){

              $cUsername=$_POST["inputUser"];
              $cPassword=$_POST["inputPass"];
             require("connectionString.php"); 
             // prepare sql and bind parameters
            $sql = "SELECT iUID, iType FROM login WHERE cUsername =  '$cUsername' AND cPassword =  '$cPassword'";

              $result = mysqli_query($conn, $sql);
             
               if (mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)) {
                            $_SESSION["userID"]= $row["iUID"];
                            $_SESSION["userType"]= $row["iType"];  
                             echo $_SESSION["userID"];
                             echo " type=".$_SESSION["userType"];     

                             $url='qaHome.php';
                             echo '<script type="text/javascript">';
                            echo 'window.location.href="'.$url.'";';
                            echo '</script>';
                            echo '<noscript>';
                            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                            echo '</noscript>'; exit;                    
                        }
               }
               else{
                   echo "Invalid user or password";
               }
            $conn->close();
            }  
            else{
                echo "No input";
            }                     
        
    }
    else{
         //echo $_SESSION["userID"];
         //echo " type=".$_SESSION["userType"];
         // $cUsername=$_SESSION["name"];
           //   $cPassword=$_SESSION["password"];
              $url='login.php';
          {
            /*if (!headers_sent())
            {    
                header('Location: '.$url);
                exit;
            }
            else*/
            {  
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.$url.'";';
                echo '</script>';
                echo '<noscript>';
                echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                echo '</noscript>'; exit;
                }
            }
    }


 

?>