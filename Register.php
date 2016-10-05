<!DOCTYPE html>
<html>

<head>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    <script type="text/javascript">
        var checkName = /^[a-zA-Z0-9]{6,12}$/;
        var checkEmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
        var checkPassword = /^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,}$/;
        

        function Validate(form){
            var username=form.username.value;
            var password=form.password.value;
            var confirmPassword=form.confirmPassword.value;
            var email=form.email.value;
            var country=form.Country.value;
            //var nameErr = '';var emailErr = '';var passwordErr = '';var confirmPasswordErr = '';var CountryErr='';
            document.getElementById("spanNameErr").innerHTML ="";
            document.getElementById("spanEmailErr").innerHTML ="";
            document.getElementById("spanPassErr").innerHTML ="";
            document.getElementById("spanConfirmPassErr").innerHTML ="";

            if(form.username.value===''||form.username.value === null){
                //alert("Input name");
                document.getElementById("spanNameErr").innerHTML = "<br>*Input name";                
                return false;
             }
            
            else if(!checkName.test(username)){
                //alert("Input proper name (Only alphanumeric between 6 and 12)");
                document.getElementById("spanNameErr").innerHTML = "<br>*Input name";
                return false;
            }

            if(form.email.value === '' || form.email.value === null){
               // alert("Input email");
                document.getElementById("spanEmailErr").innerHTML = "<br>*Input email";
                return false;
             }
              else if(!checkEmail.test(email)){
                //alert("Input proper email format (abc@xyz.ac)");
                document.getElementById("spanEmailErr").innerHTML = "<br>*Input proper email format (abc@xyz.ac)";
                return false;
            }

            if(form.password.value ===''||form.password.value===null){
               // alert("Input password");
                document.getElementById("spanPassErr").innerHTML = "<br>*Input password";
                return false;
            }
             else if(!checkPassword.test(password)){
               // alert("Input proper password \n Atleast one \n1.Uppercase \n2.Lowercase \n3.Digit \n4.Special character");
                document.getElementById("spanPassErr").innerHTML = "<br>*Input  proper password \n Atleast one \n1.Uppercase \n2.Lowercase \n3.Digit \n4.Special character";
                return false;
            }

             
            if(form.confirmPassword.value===''||form.confirmPassword.value===null){
                //alert("Confirm password");
                document.getElementById("spanConfirmPassErr").innerHTML = "<br>*Input password";
                return false;
            }
            if(password !== confirmPassword){
                //alert("Password mismatch");
                document.getElementById("spanPassErr").innerHTML = "<br>*Password mismatch";
                document.getElementById("spanConfirmPassErr").innerHTML = "<br>*Password mismatch";
                return false;
            }

            if(country === 'Country'){
                //alert("Select Countrty");
                document.getElementById("spanCountryErr").innerHTML = "<br><br>*Select Countrty";                
                return false;
            }
            
            <?php
                    session_start();
                    $_SESSION["name"]=username;
                    $_SESSION["email"]=email;
                    $_SESSION["password"]=password;
                    $_SESSION["country"]=country;
                    ?>

            //alert("working");
            return true;
        }
        function DisplayState(value){
            document.getElementById("spanCountryErr").innerHTML = "";
            if(value==='US'){                 
                 document.getElementById('selState').style.visibility='visible';
                 document.getElementById('selCountry').style.margin='initial 0 0 0';
                 document.getElementById('selState').style.margin='1% 0 1% 0';
                }
            if(value!=='US'){                 
                 document.getElementById('selState').style.visibility='hidden';
                 document.getElementById('selCountry').style.margin='initial 0 -35% 0';
                 document.getElementById('selState').style.margin='1% 0 -35% 0';
                }
        }      
        </script>
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
 echo"kjsghdkjfhskdf $flag";
    if ($flag==0) {
    //echo"flag= $flag";
        session_start();
        $_SESSION["name"]=$username;
        $_SESSION["email"]=$email;
        $_SESSION["password"]=$password;
        $_SESSION["country"]=$country;
       // header("Location: displayUser.php");
       $url='displayUser.php';
       echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
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
                <form id="formSubmit" name="Submitform" onsubmit="return Validate(this);" action="" method="POST" >
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
                   
                    <select style="visibility:hidden; margin-bottom:-30%; margin-top:0;" id="selState" class="dropdown"  >
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
                    
                    <input type='checkbox' name='thing'  checked=true value='valuable' id="thing" />
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