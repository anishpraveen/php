<?php

include_once "ClassHuman.php";
include_once "ClassPassenger.php";
include_once "ClassStation.php";
include_once "ClassTicket.php";
include_once "ClassTrain.php";
include_once "ClassTrainList.php";

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
menu();

?>