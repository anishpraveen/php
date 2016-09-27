<?php

class game{
    public $name;
    protected $url;
    public function __construct($name,$url=NULL){
        $this->name=$name;
        $this->url=$url;
    }

    public function get_name(){
        return $this->name;
    }
}

class char extends game{
    protected $desc;
    public function __construct($name,$url,$desc){
        $this->name=$name;
        $this->url=$url;
        $this->desc=$desc;
    }
    public function get_desc(){
        return $this->desc;
    }
    public function display(){
       // echo "Name:" .this->name ."\n";
        return $this->name;
    }
}

class obj{
    private $hit;
    public function __construct($hit){
        $this->hit=$hit;
    }
    public function get_hit(){
        return $this->hit;
    }
}

$mm=new game('mm','//');
echo $mm->get_name()."\n";
if(property_exists('game','name'))
    echo"true\n";
else
 echo"false";

$mario=new char('mario','https','hero');
echo $mario->get_name();
if (strcmp($mario->get_name(),"mario")==0) //($mario->get_name()=="mavvrio")
    echo "Mario\n";
else
    echo "Else\n"

?>