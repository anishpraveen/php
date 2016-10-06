<!DOCTYPE html>


<html>

<head>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>

<body>

    <div id="divMain">
        <div id="divHeader">
            <div>
                <h1 id="h1Reach">REACH</h1>
            </div>
            <ul>
                <li style="float:left;"><a>FUNDRAISING POWERED BY CHARITABLE</a></li>
                <li><a href="#about">CREATE A CAMPAIGN</a></li>
                <li><a href="#documentation" id="aDropdown">DOCUMENTAION</a></li>
                <li><a href="Register.php">REGISTER</a></li>
                <li><a href="#blog">BLOG</a></li>
                <li><a href="#home">HOME</a></li>

            </ul>
        </div>
        
        <div id="divContent" style=" height:200px; ">
            <img id="imgProfile" src="img/profile.png" height="100" style="border-radius: 5px; margin-left:12%; float:left;" alt="Image preview..."><br>

            <div style="margin-left:33%; height:150px; width:350px;  border-width:2px; border-style:solid;">
                <div id="divLeft" class="left">
                    User Name
                    <br><br> Email
                    <br><br> password
                    <br><br> country
                </div>

                <div id="divCenter" class="center">
                    :<br> <br> :
                    <br> <br>:
                    <br> <br>:
                </div>

                <div id="divRight" class="left">
                    <?php
                    session_start();
                    echo $_SESSION["name"];echo "<br><br>";
                    echo  $_SESSION["email"];echo "<br><br>";
                    echo   $_SESSION["password"];echo "<br><br>";
                    echo   $_SESSION["country"];echo "<br><br>";
                   
                    echo "<script >";
                    echo "document.getElementById('imgProfile').src='".$_SESSION["img"]."';";
                    echo "</script>";
                ?>
                </div>
            </div>

        </div>


        <div id="divFooter">
            <div id="divLine">
                <hr align="center" width="95%" color=white size=1>
                <p id="pFooter">CRAFTED WITH LOVE BY STUDIO 164A</p>

            </div>
        </div>
    </div>
</body>

</html>