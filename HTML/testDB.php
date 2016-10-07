<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "QandA_DB";

/*
* Adding Row
*/
 /*       try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO qatable (cQuestion, cAnswer) 
            VALUES (:cQuestion, :cAnswer)");
            $stmt->bindParam(':cQuestion', $cQuestion);
            $stmt->bindParam(':cAnswer', $cAnswer);
        
            // insert a row
            $cQuestion = "What is the use of 'echo' in php?";
            $cAnswer = "It is used to print a data in the webpage.";
        
            $stmt->execute();    

            echo "New records created successfully";
            }
        catch(PDOException $e)
            {
            echo "Error: " . $e->getMessage();
            }
        $conn = null;
*/


/*
* Listing Record from DB
*/
/*
            echo "<table style='border: solid 1px black;'>";
            echo "<tr><th>Id</th><th>Question</th><th>Answer</th></tr>";

            class TableRows extends RecursiveIteratorIterator { 
                function __construct($it) { 
                    parent::__construct($it, self::LEAVES_ONLY); 
                }

                function current() {
                    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
                }

                function beginChildren() { 
                    echo "<tr>"; 
                } 

                function endChildren() { 
                    echo "</tr>" . "\n";
                } 
            } 

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT iSL, cQuestion, cAnswer FROM qatable"); 
                $stmt->execute();

                // set the resulting array to associative
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
                    echo $v;
                }
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
            echo "</table>";
*/

/*
* Deleting Record
*/
 /*           try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // sql to delete a record
                $sql = "DELETE FROM qatable WHERE iSL=3";

                // use exec() because no results are returned
                $conn->exec($sql);
                echo "Record deleted successfully";
                }
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
                }

            $conn = null;
*/

/*
* Updating Record
*/
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE qatable SET cQuestion=:cQuestion, cAnswer=:cAnswer WHERE iSL=2";
            
    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cQuestion', $cQuestion);
    $stmt->bindParam(':cAnswer', $cAnswer);
    
    // Adding values
    $cQuestion = "What is the use of 'echo' in php?";
    $cAnswer = "It is used to print a data in the webpage.";

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;


?>

