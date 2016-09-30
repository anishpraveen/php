<?php

/*
**Class contain
** tlist (array of train objects), n (number of trains created)
** Functions
**  addTrain(Train $train)
**          adds a train to the list using train object
**  getTrain($trainNumber)
**          returns array a with a[0]=name and a[1]=type 
**  getTrainList()
**          returns tlist
*/
interface ITrainList {

	public function addTrain(Train $train);
	public function getTrain($trainNumber);

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


/*
**  printTrain()
**   @param = trainList
**  prints complete list of trains initialized
*/
function printTrain(&$trainList){
   
   $tt=$trainList->getTrainList();
  
    foreach ($tt as $key => $value) {
        echo"\n ".$tt[$key]->getTid()." " .$tt[$key]->getTname()  ;
        
    }
    
 }



/*
**  trainValidate()
**  @param=trainNumber (string)
**      checks if input present in TainList
*/
function trainValidate($trainNumber){
    for ($i=1; $i < 5; $i++) { 
         if($trainNumber==$i){
             $tflag=1;
             return TRUE;
         }             
        }
    return FALSE;
 }



?>