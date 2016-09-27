<?php

class human {
    public $gender;
    private $name;

    public function __construct($gender){
        $this->gender = $gender;

        echo self::get_gender()."\n";
        }
    public function __construct1($gender,$name){
       // $gender=readline("Enter gender: ");
        $this->gender = $gender;
        $this->name = $name;
        echo self::get_gender()."\n";
        echo self::get_name()."\n";
    }

    public function get_gender(){
      return $this->gender;
        }

    public function get_name(){
      return $this->name;
        }
   }

$Jane = new human('female');
$John = new human('male','John');
$Jane->gender="male";
echo "Jane is a ". $Jane->get_gender()."\n";
?>