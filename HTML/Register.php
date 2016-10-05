<!DOCTYPE html>
<html>

<head>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
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

    if ($flag==0) {
        session_start();
        $_SESSION["name"]=$username;
        $_SESSION["email"]=$email;
        $_SESSION["password"]=$password;
        $_SESSION["country"]=$country;
        header("Location: displayUser.php");
    }
}

function test_input($data)
{
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
                <li><a href="#home">HOME</a></li>

            </ul>
        </div>

        <div id="divContent">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username;?>">
                <span class="error"><?php echo $nameErr;?></span><br>
                <input type="email" placeholder="Email ID" name="email" value="<?php echo $email;?>">
                <span class="error"> <?php echo $emailErr;?></span><br> 
                <input type="password" placeholder="Password" name="password">
                <span class="error"><?php echo $passwordErr;?></span><br> 
                <input type="password" placeholder="Confirm Password" name="confirmPassword">
                <span class="error"><?php echo $confirmPasswordErr;?></span><br>
                <select name="Country" class="dropdown">
                    <option value="Country" hidden value="0"  selected>Select Country</option>
                        <option value="US">United States of America</option>
                        <option value="Canada">Canada</option>                            
                                </select>
                               
                <span class="error"><?php echo $CountryErr;?></span><br>
                
                <input type='checkbox' name='thing' required checked=true
                  value='valuable' id="thing"/>
                <label for="thing">
                <a id="aTerms" >Agreed Terms & Conditions</a></label> 
                <br> 
                <div style="margin-bottom: 10px;"></div>
                <input type="submit" name="submit" value="SIGN UP">  
            
            </form>
            
            <p class="fontClass">Already joined with us?<a id="aLogin" href="#Login"> LOGIN</a></p>
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