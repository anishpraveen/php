     <!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <?php
       $pMessage="";
       $string;
       include("pagepermission.php");
            include("populateDropdown.php");
            
            /*
            * Listing Question from DB from macthing category
            */
                function listQue($iQID){
                require("connectionString.php");
                
               $string="";

                $sql = "SELECT b.cCat as Category, a.cQuestion as Question
                        FROM qatable AS a, categoryList AS b, queCategory AS c
                        WHERE c.iQID =$iQID
                        AND c.iCatID = b.iSL
                        AND c.iQID = a.iSL";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $i=1;
                    $string.= "<table><tr><th>SL</th><th>Category</th></tr>";

                    while($row = mysqli_fetch_assoc($result)) { 
                        if($i==1)
                          $string.= $row["Question"];
                        $string.= "<tr><td>" . $i. "</td><td> " . $row["Category"]. "</td></tr>";
                        $i++;
                    }
                    $string.= "</table>";
                } else {
                    $string.= "0 results";
                }

                mysqli_close($conn);
                return $string;
                }
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" ){
            if (strcasecmp($_POST["SelectQuestion"], "SelectQuestion")!=0){
                $string=listQue($_POST["SelectQuestion"]);
                
            }
            else{
                $pMessage="Input question.";
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
        <h3>Show Category </h3>
        
        

        <form id="formEditCat"  action="" method="POST" name="formEditCat">
            
            <label>Select Question to list category.</label><br>
         <select id="SelectQuestion"  required name="SelectQuestion">
         <!--<option value="SelectQuestion" hidden="hidden" > Select Question </option>-->
            <?php populateQuestionDDL(); ?>
            </select><br>
               
                <input type="submit"  id="inUpdate" value="Get Category" >
            </form>
            <p id="pMessage" style="color:red;"><?php  echo $pMessage;?></p>

            <div id="divOutput">
            <style>
                    
                   table{
                       margin-top:10px;
                       margin-left:40%;
                       text-align: left;
                   }
                    </style>
            <?php  if ($_SERVER["REQUEST_METHOD"] == "POST" )
                        //if(!isset($_POST["selectCategory"]))
                           echo $string;
                ?>
            </div>
            
        </div>
<?php 
include("footer.php");
?>
</body>
</html>