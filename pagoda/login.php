<!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
   </head>

<body>
<?php 
include("header.php");
?>
        <div id="divContent" >
             
            <h3>Login</h3> 
            <form id="formLogin" action="loginValidation.php" method="POST" name="formLogin">
                <input type="text" required name="inputUser" placeholder="Username" id="inputUser" ><br>
                <input type="text" required name="inputPass" placeholder="Password" id="inputPass" ><br>
                <input type="submit" name="submit" value="Login"><br>
            </form>
            <p id="pMessage"></p>
        </div>
<?php 
include("footer.php");
?>
</body>
</html>