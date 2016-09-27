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
    public function set_desc($desc){
        $this->desc=$desc;
    }
    public function display(){
       // echo "Name:" .this->name ."\n";
        return $this->name;
    }
}

class obj extends game{
    private $hit;
    public function __construct($name,$url,$hit){
        $this->name=$name;
        $this->url=$url;
        $this->hit=$hit;
    }
    public function get_hit(){
        return $this->hit;
    }
    public function display(){
       // echo "Name:" .this->name ."\n";
        echo"name:" .$this->name."\n";
    }
}

$mm=new game('mm','//');
echo $mm->get_name()."\n";
if(property_exists('game','name'))
    echo"true\n";
else
 echo"false";
print_r($mario);
$mario=new char('mario','https','hero');
$mario->set_desc('vvv');
print_r($mario);
echo"\n\n";
for ($i=0; $i < 2; $i++) { 
    $name=readline("Enter name:");
    $url=readline("Enter url:");
    $hit=readline("Enter hit:");
    $a[$i]=new obj($name,$url,$hit);
}

//print_r($a);
echo"\n\n";

echo $mario->get_name();
if (strcasecmp($mario->get_name(),"Mario")==0) //($mario->get_name()=="mavvrio")
    echo "\n\nMario\n";
else
    echo "Else\n"

?>