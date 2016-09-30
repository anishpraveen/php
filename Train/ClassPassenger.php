<?php
/*
**Class contain
**  passengerList (array of train objects), 
**  n (number of passengers created)
** Functions
**  getNoOfPass()
**      return number of passengers created
**  
*/
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

?>