<?php
interface IStation {

    const DISTANCE_FROM_START_ST0 = 0;
    const DISTANCE_FROM_START_ST1 = 1;
    const DISTANCE_FROM_START_ST2 = 2;
    const DISTANCE_FROM_START_ST3 = 3;
    const DISTANCE_FROM_START_ST4 = 4;
    const DISTANCE_FROM_START_ST5 = 5;  

    const CODE_ST0 = 'ST0';
    const CODE_ST1 = 'ST1';
    const CODE_ST2 = 'ST2';
    const CODE_ST3 = 'ST3';
    const CODE_ST4 = 'ST4';
    const CODE_ST5 = 'ST5';

    const NAME_ST0 = 'START STATION';
    const NAME_ST1 = 'STATION 1';
    const NAME_ST2 = 'STATION 2';
    const NAME_ST3 = 'STATION 3';
    const NAME_ST4 = 'STATION 4';
    const NAME_ST5 = 'STATION 5';

    public function getDistanceFromStart();

 }



class station implements Istation{
    private $code,$name;
    public static $stationList=array(self::CODE_ST0=>array(self::NAME_ST0,self::DISTANCE_FROM_START_ST0),
                    self::CODE_ST1=>array(self::NAME_ST1,self::DISTANCE_FROM_START_ST1),
                    self::CODE_ST2=>array(self::NAME_ST2,self::DISTANCE_FROM_START_ST2),
                    self::CODE_ST3=>array(self::NAME_ST3,self::DISTANCE_FROM_START_ST3),
                    self::CODE_ST4=>array(self::NAME_ST4,self::DISTANCE_FROM_START_ST4),
                    self::CODE_ST5=>array(self::NAME_ST5,self::DISTANCE_FROM_START_ST5)
                    );
    public function getStationList(){
        return (self::$stationList);
        
    }
    public function setCode($code){
        $this->code=$code;
     }
     public function getCode(){
       return $this->code;
     }
    public function setName($name){
        $this->name=$name;
     }
    
    public function getName(){
       return $this->name;
     }
    public function getDistanceFromStart(){

        return self::$stationList[$this->code][1];
        //exit();
        /*if(strcasecmp($this->code,self::CODE_ST0)==0)
            return self::DISTANCE_FROM_START_ST0;
        if(strcasecmp($this->code,self::CODE_ST1)==0)
            return self::DISTANCE_FROM_START_ST1;
        if(strcasecmp($this->code,self::CODE_ST2)==0)
            return self::DISTANCE_FROM_START_ST2;
        if(strcasecmp($this->code,self::CODE_ST3)==0)
            return self::DISTANCE_FROM_START_ST3;
        if(strcasecmp($this->code,self::CODE_ST4)==0)
            return self::DISTANCE_FROM_START_ST4;
        if(strcasecmp($this->code,self::CODE_ST5)==0)
            return self::DISTANCE_FROM_START_ST5;
       */
        return (-1);
    }
 }

function stationValidation($station){
    $st=new station();
    $a=$st->getStationList();
    foreach ($a as $key => $value) {      
      if( strcasecmp($key,$station)==0)
        return TRUE;
      }
    return FALSE;
 }

function printStation(){
    $st=new station();
    $a=$st->getStationList();
    //var_dump($a);
    echo "Code=  Name        Distance";
    foreach ($a as $key => $value) {
       echo"\n$key =";
      foreach ($a[$key] as $key2 => $value2) {
          echo "  $value2";
      }
    
    }
    echo"\n";
 }



?>