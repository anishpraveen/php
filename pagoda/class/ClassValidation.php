<?php



interface IValidation{
    public function getMessage();
     public function setMessage($message);
}

class UsernameValidator implements IValidation{
    private $message;
    public function setMessage($message){
        $this->message=$message;
    }
    public function getMessage(){
        return $this->message;
    }
    public function isValid($username){   
        include("messages.php");
        if(strcmp($username,"")==0){
            $this->setMessage($requiredMsg);     
            return false;
        }    
        
        if (!preg_match("/^[a-zA-Z0-9]{6,12}$/", $username)) {       
            $this->setMessage($usernameInvalid);     
            return false;
        }
        return true;
    }
}

class EmailValidator implements IValidation{
    private $message;
    public function setMessage($message){
        $this->message=$message;
    }
    public function getMessage(){
        return $this->message;
    }
    public function isValid($email){  
        include("messages.php"); 
        if(strcmp($email,"")==0){
            $this->setMessage($requiredMsg);     
            return false;
        }    
        
        if (!preg_match("/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/", $email)) {       
            $this->setMessage($emailInvalid);     
            return false;
        }
        return true;
    }
}

class PasswordValidator implements IValidation{
    private $message;
    public function setMessage($message){
        $this->message=$message;
    }
    public function getMessage(){
        return $this->message;
    }
    public function isValid($password){   
        include("messages.php");
        if(strcmp($password,"")==0){
            $this->setMessage($requiredMsg);     
            return false;
        }    
        
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%])(?!.*\s).{4,12}$/", $password)) {       
            $this->setMessage($passwordWeak);   
            if(strlen($password)>12){
                $this->setMessage($passwordLong);   
            }  
            return false;
        }
        return true;
    }
}

class IdenticalValidator implements IValidation{
    private $message;
    public function setMessage($message){
        $this->message=$message;
    }
    public function getMessage(){
        return $this->message;
    }
    public function isValid($password,$confirmPassword){
        include("messages.php");   
        if(strcmp($password,$confirmPassword)!=0){
            $this->setMessage($passwordMismatch);     
            return false;
        }    
        
        
        return true;
    }
}

class NotEmptyValidator implements IValidation{
    private $message;
    public function setMessage($message){
        $this->message=$message;
    }
    public function getMessage(){
        return $this->message;
    }
    public function isValid($country){   
        include("messages.php");
        if(strcasecmp($country, "Country")==0){
            $this->setMessage($requiredMsg);     
            return false;
        }    
        
        
        return true;
    }
}
?>