     <!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <?php
       $pMessage="";
       include("pagepermission.php");
            include("populateCheckbox.php");
            include("queCategoryMySQL.php");
            
        /*
        * Updating Record
        */
        function updateQAtable($cQuestion,$cAnswer,$id){
                require("connectionString.php"); 


                // sql to update a record
                $sql = $conn->prepare("UPDATE qatable SET cQuestion=?, cAnswer=? WHERE iSL=?");
                $sql->bind_param('ssi',$cQuestion,$cAnswer,$id);
                $id=$id;
                $flag=false;
                if ($sql->execute() === TRUE) {
                    $pMessage= "Record updated successfully";
                    $flag=true;
                } else {
                    $pMessage= "Error updating record: " . $conn->error;
                }

                $conn->close();
                return $flag;
        }
        
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" ){
            if (1!=0){
                //$id=$_POST["selectQuestion"];
                $flag=updateQAtable($_POST["inputQue"],$_POST["inputAns"],$_GET["id"]);
                include("categoryListMySQL.php");
                require("connectionString.php");
                
               

                $sql = "SELECT iSL, cCat FROM categoryList";
                $result = mysqli_query($conn, $sql);
                // deleting category of the question
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $i=1;
                   
                    while($row = mysqli_fetch_assoc($result)) {                        
                        deleteQcategory($_GET["id"],$row["iSL"]);
                    }
                    
                 } else {
                    echo "0 results";
                }

                mysqli_close($conn);
                // updating category of question id
                if(!empty($_POST['check_list'])) {
                            foreach($_POST['check_list'] as $check) {
                                    //echo $check; 
                                    insertQcategory($_GET["id"],$check);
                            }
                        }
                if($flag){
                    $url='qaListAll.php';
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="'.$url.'";';
                    echo '</script>';
                    echo '<noscript>';
                    echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                    echo '</noscript>'; exit;  
                
                    }
                $pMessage="Record updated successfully";
            }
        
        }

       
        if ($_SERVER["REQUEST_METHOD"] == "GET" )
        {
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                $name=getQue($_GET["id"]);
               
                $_SESSION["updateQueID"]=$id;
            }
            
        
        }
       
         function getQue($id){
             require("connectionString.php");
                
            $sql = "SELECT  cQuestion,cAnswer,iCatID
                    FROM qatable as a
                    left join queCategory
                    on iQID=a.iSL
                    where a.iSL=$id";
            $result = mysqli_query($conn, $sql);
            //echo "id=$id\n"; 
            //var_dump($sql);
            $string="<script type='text/javascript'>";
            $script="document.getElementById('in).checked=true;";
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                 while ($row = mysqli_fetch_assoc($result)) {
                            $_SESSION["question"]= $row["cQuestion"];                            
                             $_SESSION["answer"]= $row["cAnswer"];   
                             $string.= "document.getElementById(".$row["iCatID"] ." ).checked=true;";
                 }
                 //echo "que  ".$_SESSION["question"];
                 $string.='</script>';
                 $_SESSION["CheckboxSelect"]=$string;
                 //var_dump($_SESSION["CheckboxSelect"]);
                return $result;
            } else {
                echo "0 results val";
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
            <li style="float:left; text-align:left; "><a href="qaListAll.php">Return Back</a></li><br><br>
        <h3><br><h3>Question</h3></h3>
        
        

        <form id="formEditQA"  action="" method="POST" name="formEditQA">
            
            
                <input type="text" name="inputQue" id="inputQue" placeholder="Question" value="<?php if(isset($_SESSION["question"])) echo $_SESSION["question"]; ?>" ><br>
                <input type="text" name="inputAns" placeholder="Answer" id="inputAns" value="<?php if(isset($_SESSION["answer"])) echo   $_SESSION["answer"]; ?>" ><br>
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
                <?php populateCategoryCB() ;
                //getQue($_GET["id"]);
                 //session_start();
                 if(isset($_SESSION["CheckboxSelect"]))
                   echo $_SESSION["CheckboxSelect"];
                ?>
                <input type="submit"  id="inUpdate" value="Update" >
            </form>
            <p id="pMessage"><?php  echo $pMessage;?></p>
            
        </div>
<?php 
include("footer.php");
?>
</body>
</html>