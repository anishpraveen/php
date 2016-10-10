     <!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <?php
       $pMessage="";
            include("populateCheckbox.php");
            include("queCategoryMySQL.php");
             include("populateDropdown.php");
        /*
        * Updating Record
        */
        function updateQAtable($cQuestion,$cAnswer,$id){
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


                // sql to delete a record
                $sql = $conn->prepare("UPDATE qatable SET cQuestion=?, cAnswer=? WHERE iSL=?");
                $sql->bind_param('ssi',$cQuestion,$cAnswer,$id);
                $id=$id;
                if ($sql->execute() === TRUE) {
                    $pMessage= "Record updated successfully";
                } else {
                    $pMessage= "Error deleting record: " . $conn->error;
                }

                $conn->close();
        }
        
        
        

        if ($_SERVER["REQUEST_METHOD"] == "POST" ){
            if (strcasecmp($_POST["selectQuestion"], "selectQuestion")!=0){
                $id=$_POST["selectQuestion"];
                updateQAtable($_POST["inputQue"],$_POST["inputAns"],$id);
                include("categoryListMySQL.php");
                require("connectionString.php");
                
               

                $sql = "SELECT iSL, cCat FROM categoryList";
                $result = mysqli_query($conn, $sql);
                // deleting category of the question
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $i=1;
                   
                    while($row = mysqli_fetch_assoc($result)) {                        
                        deleteQcategory($id,$row["iSL"]);
                    }
                    
                } else {
                    echo "0 results";
                }

                mysqli_close($conn);
                // updating category of question id
                if(!empty($_POST['check_list'])) {
                            foreach($_POST['check_list'] as $check) {
                                    //echo $check; 
                                    insertQcategory($id,$check);
                            }
                        }
                $pMessage="Record updated successfully";
            }
        
        }

       

        function getRow($id){
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "QandA_DB";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT iSL, cQuestion, cAnswer FROM qatable where iSL=$id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                return $result;
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
            }

       
        
     ?>

</head>

<body>
<?php 
include("header.php");
?>
        <div id="divContent" >
            <li style="float:left; text-align:left; "><a href="qaHome.php">Return Home</a></li><br><br>
        <h3>Edit Question Bank</h3>
        
        

        <form id="formEditQA"  action="" method="POST" name="formEditQA">
            
            <label>Select Question to edit.</label><br>
         <select id="selectQuestion" name="selectQuestion">
            <?php populateQuestionDDL(); ?>
            </select><br>
                <input type="text" name="inputQue" id="inputQue" placeholder="Question" value="<?php  ?>" ><br>
                <input type="text" name="inputAns" placeholder="Answer" id="inputAns" value="<?php  ?>" ><br>
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
                <input type="submit"  id="inUpdate" value="Update" >
            </form>
            <p id="pMessage"><?php  echo $pMessage;?></p>
            
        </div>
<?php 
include("footer.php");
?>
</body>
</html>