<?php

interface ITicket {
	public function calculateFare();
	public function getTicket();
 }	

/*
**Class contain
**  train  (train object)
**  pList  (pasenger object)
**  fee    (fare calculated)
**  start  (station object)
**  dest   (station object)
-------------------------------
** FUNCTIONS
**  setTicket()
**      @param = n (int)(number of passenger),
                 tid,tname,type (string)(Train id name and type)
                 start ,dest (string) (station codes of start and destination)
        initializes ticket
    calculateFare()
        calculate fare and assign to fee
    getTicket()
        prints ticket details
*/
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





?>