<!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
   </head>

<body>
<?php 
include("header2.php");
?>
        <div id="divContent" >
             
            <h3>LOGIN</h3> 
            <form id="formLogin" action="loginValidation.php" method="POST" name="formLogin">
                <input type="text" required name="inputUser" placeholder="Username" id="inputUser" ><br>
                <input type="password" required name="inputPass" placeholder="Password" id="inputPass" ><br>
                <input type="submit" name="submit" value="Login"><br>
            </form>
            <p class="fontClass">Not joined with us?<a id="aLogin" href="Register.php"> REGISTER</a></p>
            <p id="pMessage"></p>
        </div>
<?php 
include("footer.php");
?>
</body>
</html>