<!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <?php
    include("populateCheckbox.php");
    $pMessage="";
            function addRow($cQuestion,$cAnswer){    
                $id=-1;     
                 require("connectionString.php"); 
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
                    $id= $sql->insert_id;
                    $pMessage= "Record Added successfully";
                } else {
                    $pMessage= "Error Adding record: " . $conn->error;
                }

                $conn->close();
                return $id;
        }

        include("queCategoryMySQL.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST["inputQue"]) && !empty($_POST["inputAns"])){
                $id=addRow($_POST["inputQue"],$_POST["inputAns"]);
                if($id!=0){
                    if(!empty($_POST['check_list'])) {
                            foreach($_POST['check_list'] as $check) {
                                    //echo $check; 
                                    insertQcategory($id,$check);
                            }
                        }
                    
                }
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
                <style>
                    label + a{
                    position: relative;
                    margin-left: 90%; 
                    padding-left: 100px; 
                    height: 18px;
                    width: 18px;  
                        
                    }
                    a{
                        padding-left: 9%;
                        padding-right: 15%;
                        
                    }
                   table{
                       margin-top:10px;
                       margin-left:35%;
                       text-align: left;
                   }
                    </style>
                <?php populateCategoryCB() ?>
                <input type="submit" name="submit" value="Add Question"><br>
            </form>
            <p id="pMessage"><?php  echo $pMessage;?></p>
        </div>
<?php 
include("footer.php");
?>
</body>
</html>