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