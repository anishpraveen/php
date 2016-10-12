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
			<li><a href="Home.html">HOME</a></li>

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
                    addUser();
                function addUser(){  
                            session_start();
                            if(!(isset($_SESSION["name"],$_SESSION["password"]))  ){
                                echo "Not set";
                                 $url='Register.php';
      
                                {
                                    if (!headers_sent())
                                    {    
                                        header('Location: '.$url);
                                        exit;
                                    }
                                    else
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
                            else{
                                echo $_SESSION["name"];echo "<br><br>";
                                echo  $_SESSION["email"];echo "<br><br>";
                                echo   $_SESSION["password"];echo "<br><br>";
                                echo   $_SESSION["country"];echo "<br><br>";
                                
                                echo "<script >";
                                echo "document.getElementById('imgProfile').src='".$_SESSION["img"]."';";
                                echo "</script>";    

                                $cUsername=$_SESSION["name"];
                                $cPassword=$_SESSION["password"];
                                $state=$_SESSION["state"];
                                require("connectionString.php");
                                                              
                                // prepare sql and bind parameters
                                $sql = $conn->prepare("INSERT INTO login (cUsername, cPassword) 
                                    VALUES ( ?, ?)");
                                $sql->bind_param('ss', $cUsername,$cPassword);
                            
                                $id=-1;
                                // insert a row                
                                if ($sql->execute() === TRUE) {
                                     $id=$sql->insert_id;

                                    $pMessage= "User Added successfully";
                                     echo "<script >";
                                echo "alert(".$pMessage.");";
                                echo "</script>";
                                    
                                } else {
                                    $pMessage= "Error Adding record: " . $conn->error;
                                    
                                }
                                 $conn->close();
                                  

                                $cEmail= $_SESSION["email"];
                                $cCountry=$_SESSION["country"];
                                if(isset($_SESSION["state"]))
                                  $cState=$_SESSION["state"];
                                else
                                   $cState="";

                                if(isset($_SESSION["state"]))
                                   $cImageURL=$_SESSION["img"];
                                else
                                   $cImageURL="img/profile.png";
                               
                                //echo $cState." state id=".$id;
                                require("connectionString.php");
                                $sql = $conn->prepare("INSERT INTO userDetail (iUID, cEmail, cCountry, cState, cImageURL) 
                                    VALUES ( ?, ?, ?, ?, ?)");
                                $sql->bind_param('issss', $id,$cEmail,$cCountry,$cState,$cImageURL);
                            
                                
                                // insert a row                
                                if ($sql->execute() === TRUE) {
                                     $id=$sql->insert_id;

                                   // echo "User details Added successfully";
                                     echo "<script >";
                                echo "alert(".$pMessage.");";
                                echo "</script>";
                                    
                                } else {
                                   // echo "Error Adding record: " . $conn->error;
                                    echo "<script >";
                                echo "alert(".$pMessage.");";
                                echo "</script>";
                                    
                                }
                                 echo "<script >";
                                echo "document.getElementById('pMessage').innerText='".$pMessage."';";
                                echo "</script>";
                                $conn->close();
                                session_destroy();
                            }
                            
                    }
                ?>
                </div>
               
            </div>
             <p id="pMessage"></p>
        </div>


       <div id="divFooter">
    <divid="divLine">
                    <hr align="center" width="95%" color=white size=1>
                    <p id="pFooter">CRAFTED WITH LOVE BY STUDIO 164A</p>

                </div>
    </div>
</body>

</html>