<?php

interface fly{
    const cc="fly const";
    function isfly();
}

interface sound extends fly{
    function voice();
}

class bird implements sound{
    public $name="swan";

    public function getname(){
        return $this->name;
    }

    public function isfly(){
        echo "Fly\n";
        echo $this::cc."\n\n";
    }

    public function voice(){
        echo "sss\n";
    }
}

class mammals{
    private $type;
    private $name;

    public function copyobj(bird $b){
        $this->name=$b->getname();
        $this->type="Bird";
        echo "\nObj copied\n".$b->getname()."\n";
    }

    public function getname(){
        return $this->name;
    }
}

$swan= new bird();
$swan->isfly();
$swan->voice();
if($swan::cc=="nn")
echo $swan::cc."\n\n";

$animal=new mammals();
$animal->copyobj($swan);

echo "\n\n val=". strcmp("ST5","ST2");
?>