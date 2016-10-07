<!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>

<body>
<?php 
include("header.php");
?>
        <div id="divContent"  style=" padding-bottom:200px;">
            <h2>Question bank</h2>
            <ol style="float:left; text-align:left; ">
                <li><a href="qaList.php">List Q&A</a></li><br>
                <li><a href="qaAdd.php">Add Q&A</a></li><br>
                <li><a href="qaEdit.php">Edit Q&A</a></li><br>
                <li><a href="qaDelete.php">Delete Q&A</a></li><br>
            </ol>
        </div>
       
<?php 
include("footer.php");
?>
</body>

</html>