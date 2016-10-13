     <!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <?php
       $pMessage="";
           include("pagepermission.php");
            include("queCategoryMySQL.php");
            
        /*
        * Updating Record
        */
        function deleteRow($id){         
                require("connectionString.php"); 


                // sql to delete a record
                $sql = $conn->prepare("DELETE FROM categoryList WHERE iSL=?");
                $sql->bind_param('i',$id);
                $id=$id;
                $flag=false;
                if ($sql->execute() === TRUE) {
                    $pMessage= "Record deleted successfully";
                    $flag=true;
                } else {
                    $pMessage= "Error deleting record: " . $conn->error;
                }

                $conn->close();
                return $flag;
        }      
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" ){
            if (1!=0){
                //$id=$_POST["selectQuestion"];
                $flag=deleteRow($_GET["id"]);
                include("categoryListMySQL.php");
                require("connectionString.php");
                $pMessage="Record deleted successfully";
                if($flag){
                    $url='catListAll.php';
                    echo '<script type="text/javascript">';
                    echo 'window.location.href="'.$url.'";';
                    echo '</script>';
                    echo '<noscript>';
                    echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                    echo '</noscript>'; exit;  
                
                    }
            }
        
        }

       
        if ($_SERVER["REQUEST_METHOD"] == "GET" ){
            if(isset($_GET["id"])){
                $id=$_GET["id"];
                $name=getCat($_GET["id"]);
               
                $_SESSION["updateQueID"]=$id;
            }
            
        
        }
       
         function getCat($id){
             require("connectionString.php");
                
            $sql = "SELECT  cCat FROM categoryList where iSL=$id";
            $result = mysqli_query($conn, $sql);
            //echo "id=$id\n"; 
            //var_dump($sql);
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                 while ($row = mysqli_fetch_assoc($result)) {
                            $_SESSION["category"]= $row["cCat"];                            
                                      
                 }
                 //echo "que  ".$_SESSION["question"];
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
            <li style="float:left; text-align:left; "><a href="catListAll.php">Return Back</a></li><br><br>
       
        
        <h3>Delete Category</h3>

        <form id="formDeleteCat"  action="" method="POST" name="formDeleteCat">
            <style>
            input{
                 background-color: #b0aaaa;
            }
            </style>
            <label>Category to delete</label><br>
        
                <input type="text" name="inputCat" readonly id="inputCat" placeholder="Category" value="<?php echo $_SESSION["category"]; ?>" ><br>
               
                
                <input type="submit"  id="inDelete" value="Delete" >
            </form>
            <p id="pMessage"><?php  echo $pMessage;?></p>
            
        </div>
<?php 
include("footer.php");
?>
</body>
</html>