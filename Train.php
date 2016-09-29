<?php

class train{
    private $tid;
    private $start;
    private $dest;

    public function setTid($tid){
        $this->tid=$tid;
    }

    public function setStart($start){
        $this->start=$start;
    }

    public function setDest($dest){
        $this->dest=$dest;
    }

    public function getTid(){
       return $this->tid;
    }

    public function getStart(){
       return $this->start;
    }

    public function getDest(){
       return $this->dest;
    }
}

class passenger{
    private $passengerList=array();
    private $n;

    public function setpList($n){
        echo "\nEnter passenger detail\n";
        $this->n=$n;
        for ($i=0; $i < $n; $i++) { 
            $this->passengerList[$i]=readline("Name: ");
        }
    }

    public function getpList(){
        echo $this->n;
        echo "\nPassenger detail\n";
        for ($i=0; $i < $this->n; $i++) { 
           echo "Name: " .$this->passengerList[$i]."\n";
        }
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


class ticket{
    private $train;
    private $pList;
    private $fee;

    public function setTicket($n,$tid,$start,$dest){
        $this->train=new train();
        $this->pList=new passenger();
        $this->fee=new fare();
        $this->pList->setpList($n);
        $this->train->setTid($tid);
        $this->train->setStart($start);
        $this->train->setDest($dest);
    }

    public function getfare(){
        return $this->fee->calc();
    }

    public function getTicket(){
        echo"\nTrain: ". $this->train->getTid();
        echo"\nStart: ". $this->train->getStart();
        echo"\nDest: ". $this->train->getDest();
        echo"\nPeople: "; $this->pList->getpList();
        echo"\nFare: ". $this->fee->getAmt();
    }
}



function menu(){
    $n;
    $tid;
    $start;
    $dest;
    $count=-1;
    $t[]=new ticket();
    $flag=0;
    $fareflag=0;

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
                echo"\nEnter ticket details\n";
                $tid=readline("Enter Train number: ");
                $start=readline("Starting Station: ");
                $dest=readline("Destination : ");
                do{
                    $n=readline("Enter number of passenger: ");
                    if(ctype_digit($n)!=TRUE){
                         echo("\nInput proper choice(numericals only).\n");                         
                         }
                }while(ctype_digit($n)!=TRUE);
                ++$count;
                $t[$count]=new ticket();
                $t[$count]->setTicket($n,$tid,$start,$dest);
                $fareflag=0;
                $flag=1;
                break;

            case '2':
                if($flag==0){
                    echo"\nEnter ticket details\n";
                    $tid=readline("Enter Train number: ");
                    $start=readline("Starting Station: ");
                    $dest=readline("Destination : ");
                    do{
                        $n=readline("Enter number of passenger: ");
                        if(ctype_digit($n)!=TRUE){
                             echo("\nInput proper choice(numericals only).\n");                         
                           }
                        }while(ctype_digit($n)!=TRUE);
                    $t[$count]->setTicket($n,$tid,$start,$dest);
                    $flag=1;
                    //break;
                }
                echo "\nFare: ". $t[$count]->getfare() ."\n";
                $fareflag=1;
                break;

            case '3':
                if($flag==0 && $fareflag==0){
                    echo"\nEnter ticket details and get fare";
                    break;
                }
                if($fareflag==0){
                    echo "\nFare: ". $t[$count]->getfare() ."\n";                    
                }
                echo"\nTicket Details\n";
                $t[$count]->getTicket();
                break;

            case '4':
                 echo"\nAll Issued Ticket Details\n";
                for ($i=0; $i <= $count; $i++) {                     
                    $t[$i]->getTicket();
                }
                break;

            default:
                # code...
                break;
        }

        $ch=readline("\nContinue (yes=1/no=0): ");
    }while ($ch != 0);

    

}

menu();


?>