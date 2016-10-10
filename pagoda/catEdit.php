     <!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <?php
       $pMessage="";
            include("populateDropdown.php");
        /*
        * Updating Record
        */
        function updateQAtable($cCat,$id,$cDesc = ""){
                 require("connectionString.php");
               


                // sql to update a record
                $sql = $conn->prepare("UPDATE categoryList SET cCat=?, cDesc=? WHERE iSL=?");
                $sql->bind_param('ssi',$cCat,$cDesc,$id);
                $id=$id;
                if ($sql->execute() === TRUE) {
                    $pMessage= "Record updated successfully";
                } else {
                    $pMessage= "Error deleting record: " . $conn->error;
                }

                $conn->close();
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" ){
            if (strcasecmp($_POST["selectCategory"], "selectCategory")!=0){
                updateQAtable($_POST["inputCat"],$_POST["selectCategory"],$_POST["inputDesc"]);
                $pMessage="Record updated successfully";
            }
            else{
                $pMessage="Input category.";
            }
        
        }

       

        function getRow($id){
             require("connectionString.php");
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
        <h3>Edit Category </h3>
        
        

        <form id="formEditCat"  action="" method="POST" name="formEditCat">
            
            <label>Select Category to edit.</label><br>
         <select id="selectCategory"  required name="selectCategory">
         <option value="selectCategory" hidden="hidden" > Select Category </option>
            <?php populateCategoryDDL(); ?>
            </select><br>
                <input type="text" name="inputCat" required id="inputCat" placeholder="Category" value="<?php  ?>" ><br>
                <input type="text" name="inputDesc" placeholder="Description" id="inputDesc" value="<?php  ?>" ><br>
                <input type="submit"  id="inUpdate" value="Update" >
            </form>
            <p id="pMessage" style="color:red;"><?php  echo $pMessage;?></p>
            
        </div>
<?php 
include("footer.php");
?>
</body>
</html>