<?php
  class LoginController {
    public function login() {      
      require_once('views/login/login.php');
    }

    public function check() {
      /*if (!isset($_POST['inputUser']))
        return call('pages', 'error');*/
      session_start();
      
      $_SESSION['username']=$_POST['inputUser'];
      $username = $_SESSION['username'];
      $last_name  = 'Snow';
     
     $validUser = User::find($username );
     if(!$validUser)
         return call('login', 'invalid');
        //$this->login();
     
        require_once('views/login/welcome.php');
     
        
      
    }
    public function invalid(){
        require_once('views/login/invalid.php');
    }
  }
?>