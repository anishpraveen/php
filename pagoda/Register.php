<!DOCTYPE html>
<html>

<head>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <script type="text/javascript" src="js/register.js" ></script>
    <script type="text/javascript" src="js/image.js" ></script>
    
</head>

<body>
<?php 
    // define variables and set to empty values
      $nameErr = $emailErr = $passwordErr = $confirmPasswordErr = $CountryErr="";
      $username = $email = $password = $confirmPassword = $country = "";
    $flag=0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["username"])) {
        $nameErr = "Name is required";
        $flag++;
     } else {
        $username = ($_POST["username"]);
    // check if name only contains letters and whitespace

    if (strlen($username)<6 || strlen($username)>12) {
        $nameErr = "Out of bound(6,12)";
        $flag++;
     }
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $nameErr = "Only alphanumeric allowed";
            $flag++;
        }
    }
  
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $flag++;
     } else {
        $email = test_input($_POST["email"]);
    }
    
    if (empty($_POST["password"])) {
        $passwordErr = "Required";
        $flag++;
     }
    if (empty($_POST["confirmPassword"])) {
        $confirmPasswordErr = "Required";
        $flag++;
     } else {
        $password = test_input($_POST["password"]);
        $confirmPassword=test_input($_POST["confirmPassword"]);
        if (strcmp($password, $confirmPassword)!=0) {
            $passwordErr = "Password Mismatch";
            $flag++;
        }
    
        if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{4,12}$/', $password)) {
            $passwordErr ="the password does not meet the requirements!";
            $flag++;
        }
    }
    //echo "dd=".empty($_POST["Country"]);
   if (strcasecmp($_POST["Country"], "Country")==0) {
      $CountryErr = "Country is required";
    
      $flag++;
    } else {
      $country = test_input($_POST["Country"]);
   }
    // include_once("upload.php");
    function imageValidate()
        {
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    //echo "Sorry, file already exists.";
                    //$uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
                        return $target_file;
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                    }
          }
    $img=imageValidate();
    echo $img;
    
    if ($flag==0) {
     //echo"flag= $flag";
        
        session_start();
        $_SESSION["name"]=$username;
        $_SESSION["email"]=$email;
        $_SESSION["password"]=$password;
        $_SESSION["country"]=$country;
        $_SESSION["img"]=$img;
       // header("Location: displayUser.php");
       $url='displayUser.php';
      
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
    }

    function test_input($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
    }
    
?>

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
<div id="divContent">
    
    <form id="formSubmit" name="Submitform" onsubmit="return Validate(this);" enctype="multipart/form-data" action="" method="POST">
         <img src="img/profile.png" height="100" style="border-radius: 5px;" alt="Image preview..."><br>

        <input type="file" name="fileToUpload" id="fileToUpload" onchange="previewFile(this);"><br>

        <input type="text" placeholder="Username" name="username" value="<?php echo $username;?>">
        <span id="spanNameErr" class="error"><?php echo $nameErr;?></span><br>
        <input type="text" placeholder="Email ID" name="email" value="<?php echo $email;?>">
        <span id="spanEmailErr" class="error"> <?php echo $emailErr;?></span><br>
        <input type="password" placeholder="Password" name="password">
        <span id="spanPassErr" class="error"><?php echo $passwordErr;?></span><br>
        <input type="password" placeholder="Confirm Password" name="confirmPassword">
        <span id="spanConfirmPassErr" class="error"><?php echo $confirmPasswordErr;?></span><br>



        <select id="selCountry" style="margin-bottom:-30%;" onchange="DisplayState(value)" name="Country" class="dropdown">
                    <option  value="Country" hidden value="0"  selected>Select Country</option>
                        <option  value="US">United States of America</option>
                        <option value="Canada">Canada</option>                            
                                </select>
        <span id="spanCountryErr" class="error"><?php echo $CountryErr;?></span><br>

        <select style="visibility:hidden; margin-bottom:-30%; margin-top:0;" id="selState" class="dropdown">
                        <option value="Alabama">Alabama</option>
                        <option value="Alaska">Alaska</option>
                        <option value="Arizona">Arizona</option>
                        <option value="Arkansas">Arkansas</option>
                        <option value="California">California</option>
                        <option value="Colorado">Colorado</option>
                        <option value="Connecticut">Connecticut</option>
                        <option value="Delaware">Delaware</option>
                        <option value="Florida">Florida</option>
                    </select>
        <br>

        <input type='checkbox' name='thing' checked=true value='valuable' id="thing" />
        <label for="thing">
                 <a id="aTerms" >Agreed Terms & Conditions</a></label>
        <br>
        <div style="margin-bottom: 10px;"></div>
        <input type="submit" name="submit" value="SIGN UP">

    </form>

    <p class="fontClass">Already joined with us?<a id="aLogin" href="#Login"> LOGIN</a></p>
</div>

<div id="divFooter">
    <divid="divLine">
                    <hr align="center" width="95%" color=white size=1>
                    <p id="pFooter">CRAFTED WITH LOVE BY STUDIO 164A</p>

                </div>
            </div>
        </div>

</body>

</html>