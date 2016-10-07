<!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <?php
    $pMessage="";
            function addRow($cQuestion,$cAnswer){         
                 $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "QandA_DB";  
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);                
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }


                
                // prepare sql and bind parameters
                $sql = $conn->prepare("INSERT INTO qatable (cQuestion, cAnswer) 
                VALUES (?, ?)");
                $sql->bind_param('ss', $cQuestion,$cAnswer);
               
            
                // insert a row                
                if ($sql->execute() === TRUE) {
                    $pMessage= "Record Added successfully";
                } else {
                    $pMessage= "Error Adding record: " . $conn->error;
                }

                $conn->close();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST["inputQue"]) && !empty($_POST["inputAns"])){
                addRow($_POST["inputQue"],$_POST["inputAns"]);
               // echo "<style> form{display:none;} </style>";
                $pMessage = "Record Added successfully";
            }
            else{
                $pMessage= "Input both fields";
            }
        }
        
        ?>
</head>

<body>
<?php 
include("header.php");
?>
        <div id="divContent" >
            <li style="float:left; text-align:left; "><a href="qaHome.php">Return Home</a></li><br><br>
            <h3>Add Question</h3> 
            <form id="fromAddQA" action="" method="POST" name="fromAddQA">
                <input type="text" name="inputQue" placeholder="Question" id="inputQue" ><br>
                <input type="text" name="inputAns" placeholder="Answer" id="inputAns" ><br>
                <input type="submit" name="submit" value="Add Question"><br>
            </form>
            <p id="pMessage"><?php  echo $pMessage;?></p>
        </div>
<?php 
include("footer.php");
?>
</body>
</html>