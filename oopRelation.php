<?php

class sal{
    protected $da;
    protected $net;

    /*public function __construct($da){
        $this->da=$da;
        //$this->net=$net;
    }*/

    public function getNet(){
        return $this->net;
    }

    public function setNet($net){
        $this->net=$net;
    }

    public function getDa(){
        return $this->da;
    }
    public function setDa($da){
        $this->da=$da;
    }
}

class emp {
    protected $name;
    protected $id;
    protected $sal ;

    public function __construct($name,$id,$sal){
        $this->name=$name;
        $this->id=$id;
        //$this->net=$sal;
        $this->sal= new sal();
        $this->sal->setNet(600);
        $this->sal->setDa($sal);

    }
    public function getsal(){
        return $this->net;
       //return parent::getNet();
    }
}

//$amt=new sal();
$jane=new emp('jane','12',200);
//echo "Sal: ". $jane->getNet() ."\n";
var_dump($jane);
?>