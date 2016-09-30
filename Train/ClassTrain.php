<?php

interface ITrain {

	const TYPE_PASSENGER = 1;
	const TYPE_EXPRESS = 2;
   	const TYPE_SUPERFAST = 3;    

    public function getType();   
    public function setType($type);

 }

/*
**Class contain
** tid,tname,type (string)(Train id name and type)
*/
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
?>