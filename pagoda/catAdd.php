<!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <?php
    $pMessage="";
            function addRow($cCat,$cDesc = ""){         
                 require("connectionString.php");
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);                
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }


                
                // prepare sql and bind parameters
                $sql = $conn->prepare("INSERT INTO categoryList (cCat,cDesc) 
                VALUES (?, ?)");
                $sql->bind_param('ss', $cCat,$cDesc);
               
            
                // insert a row                
                if ($sql->execute() === TRUE) {
                    //echo $sql->insert_id;
                    $pMessage= "Record Added successfully";
                    
                } else {
                    $pMessage= "Error Adding record: " . $conn->error;
                    
                }

                $conn->close();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!empty($_POST["inputCat"])){
                if(!empty($_POST["inputDesc"])){
                    addRow($_POST["inputCat"], $_POST["inputDesc"]);
                }
                else{
                     addRow($_POST["inputCat"]);
                }
               
               // echo "<style> form{display:none;} </style>";
                $pMessage = "Record Added successfully";
            }
            else{
                $pMessage= "Input category";
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
            <h3>Add Category</h3> 
            <form id="fromAddCat" action="" method="POST" name="fromAddCat">
                <input type="text" required name="inputCat" placeholder="Category" id="inputCat" ><br>
                <input type="text" name="inputDesc" placeholder="Description" id="inputDesc" ><br>
                <input type="submit" name="submit" value="Add Category"><br>
            </form>
            <p id="pMessage"><?php  echo $pMessage;?></p>
        </div>
<?php 
include("footer.php");
?>
</body>
</html>