<?php
/*
**Class contain
**  name, gender, age
** Default __construct(name, gender, age)
*/
class human{
    private $name,$gender,$age;

    public function __construct($name,$gender,$age){
        $this->name=$name;
        $this->gender=$gender;
        $this->age=$age;
     }

    public function getName(){
        return $this->name;
     }
    public function setName($name){
        $this->name=$name;
     }

    public function getGender(){
        return $this->gender;
     }
    public function setGender($gender){
        $this->gender=$gender;
     }

    public function getAge(){
        return $this->age;
     }
    public function setAge($age){
        $this->age=$age;
     }
 }

?>