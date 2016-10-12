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
                function listQue($iCatID){
                require("connectionString.php");
                
               $string="";

                $sql = "select a.cQuestion as Que, a.cAnswer as Ans, b.cCat as Category from qatable as a, categoryList as b, queCategory as c
                        where a.iSL=c.iQID
                        and c.iCatID=$iCatID
                        and c.iCatID=b.iSL";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $i=1;
                    $string.= "<table><tr><th>SL</th><th>Question</th><th>Answer</th></tr>";

                    while($row = mysqli_fetch_assoc($result)) { 
                        if($i==1)
                           $string.=$row["Category"];
                        $string.= "<tr><td>" . $i. "</td><td> " . $row["Que"]. "</td><td> " . $row["Ans"]. "</td></tr>";
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
            if (strcasecmp($_POST["selectCategory"], "selectCategory")!=0){
                $string=listQue($_POST["selectCategory"]);
                
            }
            else{
                $pMessage="Input category.";
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
        <h3>Display Questions </h3>
        
        

        <form id="formEditCat"  action="" method="POST" name="formEditCat">
            
            <label>Select Category to display questions.</label><br>
         <select id="selectCategory"  required name="selectCategory">
         <!--<option value="selectCategory" hidden="hidden" > Select Category </option> -->
            <?php populateCategoryDDL(); ?>
            </select><br>
               
                <input type="submit"  id="inUpdate" value="Get Questions" >
            </form>
            <p id="pMessage" style="color:red;"><?php  echo $pMessage;?></p>

            <div id="divOutput">
            <style>
                    
                   table{
                       margin-top:10px;
                       margin-left:42%;
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