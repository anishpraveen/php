<?php

class person{
    private $name;
    private $age;
    private $gender;

    public function __construct($name,$age ,$gender){
        $this->name=$name;
        $this->age=$age;
        $this->gender=$gender;
    }
    public function set_name($name){
        $this->name=$name;
    }

    public function get_name(){
       return $this->name;
    }
}

class emp extends person{
    private $designation;
    private $experience;
    private $empID;

    public function __construct($name,$age ,$gender,$designation, $experience,$empID){
        $this->designation=$designation;
        $this->experience=$experience;
        $this->empID=$empID;
         parent::__construct($name,$age ,$gender);
        
    }
 

    public function get_ID(){
        return $this->empID;
    }
    public function get_name(){
        return parent::get_name();
    }

}

class intern extends emp{
    private $universityName;
    private $yearOfPassing;

    public function __construct($name,$age ,$gender,$designation, $experience,$empID, $universityName,$yearOfPassing){
          
        $this->universityName=$universityName;
        $this->yearOfPassing=$yearOfPassing;
        
        parent::__construct($name,$age ,$gender,$designation, $experience,$empID);
       
    }

    public function display(){
        echo "\n\nName: ".parent::get_name();
        echo "\nID: ".parent::get_ID();
    }
}

function menu(){

    $icount=0;
    $internList;
    do {
    echo "\nMenu \n1.Add Intern \n2.List Intern";
    $choice=readline("\nChoice: ");
    if(ctype_digit($choice)!=TRUE){
        echo("\nInput proper choice(numericals only).");
        $ch=readline("\nCouninue (yes=1/no=0): ");
        continue;
    }
    switch ($choice) {
        case '1':
         echo "Enter details:\n";
        $name=readline("Name: ");
        $age=readline("Age: ");
        $gender=readline("Gender: ");
        $designation=readline("Designation: ");
        $experience=readline("Experience: ");
        $empID=readline("Employee ID: ");
        $universityName=readline("University Name: ");
        $yearOfPassing=readline("Passing Year: ");
        $internList[$icount++]=new intern($name,$age, $gender,$designation, $experience,$empID, $universityName,$yearOfPassing);
            break;
        
        case '2':
            if($icount==0){
                echo "\nInput values. Empty Set.\n";
                break;
            }

            echo "\nIntern List\n";
            for ($i=0; $i < $icount; $i++) { 
                $internList[$i]->display();
            }
            
            break;

        default:
            # code...
            break;
    }

    $ch=readline("\nContinue (yes=1/no=0): ");
    } while ($ch != 0);
}

    menu();
    

?>