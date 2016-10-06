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