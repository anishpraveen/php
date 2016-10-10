<?php

 function insertQcategory($iQID,$iCatID){
            require("connectionString.php");              

                
                // prepare sql and bind parameters
                $sql = $conn->prepare("INSERT INTO queCategory (iQID,iCatID) 
                VALUES (?, ?)");
                $sql->bind_param('ii', $iQID,$iCatID);
               
            
                // insert a row                
                if ($sql->execute() === TRUE) {
                    //echo $sql->insert_id;
                    $pMessage= "Record Added successfully";
                    
                } else {
                    $pMessage= "Error Adding record: " . $conn->error;
                    
                }

                $conn->close();
        }


    function deleteQcategory($iQID,$iCatID){
            require("connectionString.php");             


                
                // prepare sql and bind parameters
                $sql = $conn->prepare("DELETE FROM queCategory WHERE iQID=? AND iCatID=? ");
              
                $sql->bind_param('ii', $iQID,$iCatID);             
            
               
                if ($sql->execute() === TRUE) {
                    
                    $pMessage= "Record deleted successfully";
                    
                } else {
                    $pMessage= "Error Adding record: " . $conn->error;
                    
                }

                $conn->close();
        }

?>