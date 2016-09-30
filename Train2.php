<?php

interface ITrainList {

	public function addTrain(Train $train);
	public function getTrain($trainNumber);

 }

interface ITrain {

	const TYPE_PASSENGER = 1;
	const TYPE_EXPRESS = 2;
   	const TYPE_SUPERFAST = 3;    

    public function getType();   
    public function setType($type);

 }

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

interface ITicket {
	public function calculateFare();
	public function getTicket();
 }	

class train implements ITrain{
    private $tid,$type,$tname;    

    public function setTid($tid){
        $this->tid=$tid;
     } 
    public function getTid(){
       return $this->tid;
     }

    public function setTname($tname){
        
        $this->tname=$tname;
        //echo "Ttt=$this->tname\n\n";
     } 
    public function getTname(){
       return $this->tname;
     }
    
    public function getType(){
         return $this->type;
     }   
    public function setType($type){
        $this->type=$type;
     }
    
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
class trainlist implements ITrainList{

    private $tlist,$n=-1;
    public function addTrain(Train $train){
        $this->n++;
        $this->tlist[$this->n]=new train();
        $this->tlist[$this->n]->setTname($train->getTname());
        $this->tlist[$this->n]->setTid($train->getTid());
        $this->tlist[$this->n]->setType($train->getType());
    }
	public function getTrain($trainNumber){
        //$a=array();
        $a[0]="";
        $a[1]="";
        //var_dump($this->tlist);
        for ($i=0; $i < 4; $i++) { 
            if($trainNumber==$this->tlist[$i]->getTid()){
                $a[0]= $this->tlist[$i]->getTname();
                $a[1]= $this->tlist[$i]->getType();
                var_dump($a);
                return $a;
            }
        }
        return (-1);
    
    }
    public function getTrainList(){
        return ($this->tlist);        
    }
 }

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

class passenger{
    private $passengerList;
    private $n;

    public function getNoOfPass(){
        return $this->n;
     }
    public function setpList($n){        
        $name;$gender;$age;
        echo "\nEnter passenger detail\n";
        $this->n=$n;
        for ($i=0; $i < $n; $i++) { 
            $name=readline("Name: ");
            do{
                $gender=readline("Gender(male/female): ");
            }while(strcasecmp($gender,"male")!=0 && strcasecmp($gender,"female")!=0 &&
                    strcasecmp($gender,"m")!=0 && strcasecmp($gender,"f")!=0
                    );
           
            
            do{
                $age=readline("age: ");
            }while(ctype_digit($age)!=TRUE);
            $this->passengerList[$i]=new human($name,$gender,$age);
        }
     }

    public function getpList(){        
       // var_dump($this->passengerList);
        echo "\nPassenger detail\n";
        for ($i=0; $i < $this->n; $i++) { 
           echo "Name: " .$this->passengerList[$i]->getName()."\n";
           echo "Gender: ".$this->passengerList[$i]->getGender()."\n";
           echo "Age: ".$this->passengerList[$i]->getAge()."\n";
        }
     }
     
    public function getMale(){
         $male=0;
         for ($i=0; $i < $this->n; $i++) { 
           if((strcasecmp($this->passengerList[$i]->getGender(),"male")==0 || 
                strcasecmp($this->passengerList[$i]->getGender(),"m")==0) && 
                $this->passengerList[$i]->getAge()>8)
            $male++; 
            //echo "n=$this->n \n male=$male gen=".$this->passengerList[$i]->getGender()."\n";
        }
        return $male;
     }

    public function getFeMale(){
         $female=0;
         for ($i=0; $i < $this->n; $i++) { 
           if((strcasecmp($this->passengerList[$i]->getGender(),"female")==0 || 
                strcasecmp($this->passengerList[$i]->getGender(),"f")==0) && 
                $this->passengerList[$i]->getAge()>8)
            $female++;
        }
        return $female;
     }
 }

class fare{
    //private $ticket;
    private $amt;

    public function calc(){
        $this->amt=500;
        return ($this->amt);
    }

    public function getAmt(){
        return $this->amt;
    }
 }


class ticket implements ITicket{
    private $train;
    private $pList;
    private $fee;
    private $start,$dest;

    public function setTicket($n,$tid,$tname,$type,$start,$dest){
        $this->train=new train();
        $this->pList=new passenger();
        //$this->fee=new fare();
        $this->start=new station();
        $this->dest=new station();
        $this->pList->setpList($n);
        $this->train->setTid($tid);
        $this->train->setTname($tname);
        $this->train->setType($type);
        $this->start->setCode($start);
        $this->dest->setCode($dest);
     }

    public function calculateFare(){
        $amt=0; $typefare=0; $start;$dest; $dist; $male; $female;
        $n=$this->pList->getNoOfPass();
        switch ($this->train->getType()) {
            case '1':
                $typefare=0;
                break;
            case '2':
                $typefare=20;
                break;

            case '3':
                $typefare=40;
                break;
            default:
                # code...
                break;
        }

        $start=$this->start->getDistanceFromStart();
        $dest=$this->dest->getDistanceFromStart();
        $dist=abs($dest-$start);
        $amt=($typefare)*$n;
        
        $male=$this->pList->getMale();
        $female=$this->pList->getFeMale();
        $kid=$n-($male+$female);
        //echo "amt=$amt\n male=$male n=$n kid=$kid dis=$dist\n";
        $amt+= (10*$dist*$male)+(8*$dist*$female)+(5*$dist*$kid);
        $this->fee=$amt;
        return $amt;
     }

    public function getTicket(){
        echo"\nTrain: ". $this->train->getTid();
        echo"\nTrain name: ". $this->train->getTname();
        echo"\nStart: ". $this->start->getCode();
        echo"\nDest: ". $this->dest->getCode();
        echo"\nPeople: ".$this->pList->getNoOfPass(); 
        $this->pList->getpList();
        echo"\nFare: ". $this->fee;
    }
 }


/*
** Main function executing menu
*/
function menu(){

    //Variable declaration
    {
        $n;
        $tid;$tname="Rajadani";
        $start;
        $dest;
        $count=-1;
        $t[]=new ticket();
        $flag=0;
        $fareflag=0;
        $a=array();
     }
    //Train list Initialisation
    {
            $trainList=new trainlist();
            $train=new train();
            $train->setTname("Rajadani"); $train->setType($train::TYPE_SUPERFAST);$train->setTid("1");
            $trainList->addTrain($train);
            $train->setTname("Malabar"); $train->setType($train::TYPE_EXPRESS);$train->setTid("2");
            $trainList->addTrain($train);
            $train->setTname("Memu"); $train->setType($train::TYPE_PASSENGER);$train->setTid("3");
            $trainList->addTrain($train);
            $train->setTname("Shadapthi"); $train->setType($train::TYPE_SUPERFAST);$train->setTid("4");
            $trainList->addTrain($train); 

            //var_dump($trainList);
            //exit();
         }
        
    
    do{
        echo"\n\nMenu\n";
        echo"Menu 1: Input passenger, station, and train\n";
        echo"Menu 2: Calculate fare.\n";
        echo"Menu 3: Print the ticket details (including fare).\n";
        echo"Menu 4: Print all issued tickets.";
        $choice=readline("\nChoice: ");
        if(ctype_digit($choice)!=TRUE){
              echo("\nInput proper choice(numericals only).");
             $ch=readline("\nCouninue (yes=1/no=0): ");
            continue;
            }

        switch ($choice) {
            case '1':
             case1:   echo"\nEnter ticket details\n";
                printTrain($trainList);
               
                $tflag=0;
                do{
                    $tid=readline("\nEnter Train number from above list: ");
                    $tflag=trainValidate($tid);
                }while($tflag==FALSE);                 
                
                $a=$trainList->getTrain($tid);
                //echo"a0=$a\n\n\n\n";
               
                $type=$a[1];
                $tname=$a[0];
                printStation();
                
                do{
                    $start=readline("Select code from above\nStarting Station: ");
                    $start=strtoupper($start);
                    $sflag=stationValidation($start);
                }while($sflag==FALSE);                
                
                do{
                    $dest=readline("Destination : ");
                    $dest=strtoupper($dest);
                    $sflag=stationValidation($dest);
                }while($sflag==FALSE);
                
                if(strcasecmp($start,$dest)>=0){
                    echo "No train";
                    break;
                }

                do{
                    $n=readline("Enter number of passenger: ");
                    if(ctype_digit($n)!=TRUE || $n==0){
                         echo("\nInput proper choice \n(numericals greater than zero only).\n");                         
                         }
                }while(ctype_digit($n)!=TRUE|| $n==0);
                ++$count;
                $t[$count]=new ticket();
                $t[$count]->setTicket($n,$tid,$tname,$type,$start,$dest);
                $fareflag=0;
                $flag=1;
                break;

            case '2':
                if($flag==0){
                    echo"\nEnter ticket details first\n";  
                    //Getting input values
                    goto case1;                  
                    break;
                }
                echo "\nFare: ". $t[$count]->calculateFare() ."\n";
                $fareflag=1;
                break;

            case '3':
                if($flag==0 && $fareflag==0){
                    echo"\nEnter ticket details and get fare";
                    //Getting input values
                    goto case1;    
                    break;
                }
                if($fareflag==0){
                    echo "\nFare: ". $t[$count]->calculateFare() ."\n";                    
                }
                echo"\nTicket Details\n";
                $t[$count]->getTicket();
                //var_dump($t[$count]);
                break;

            case '4':
                 echo"\nAll Issued Ticket Details\n";
                for ($i=0; $i <= $count; $i++) {                     
                    $t[$i]->getTicket();
                }
                break;

            default:
                echo"\nInvalid input\n";
                break;
        }

        $ch=readline("\nContinue (yes=1/no=0): ");
    }while ($ch != 0);
  
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
function trainValidate($trainNumber){
    for ($i=1; $i < 5; $i++) { 
         if($trainNumber==$i){
             $tflag=1;
             return TRUE;
         }             
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

function printTrain(&$trainList){
   
   $tt=$trainList->getTrainList();
  
    foreach ($tt as $key => $value) {
        echo"\n ".$tt[$key]->getTid()." " .$tt[$key]->getTname()  ;
        
    }
    
 }
menu();

?>