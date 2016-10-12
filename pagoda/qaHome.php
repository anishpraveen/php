<!DOCTYPE html>
<html>

<head>
    <link href="css/style1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
</head>

<body>

<?php 
include("pagepermission.php");
include("header.php");
?>
        <div id="divContent" style=" padding-bottom:200px;">
<h2>Question bank</h2>
<table item-width="400px" style=" margin-left:35%;" >
    <tr>
        <td style="background-color: #7bb4e0;">
            <h3>Q&A</h3>
            <ol style="float:left; text-align:left; ">
                <li style="float:left; text-align:left; "><a href="qaList.php">List Q&A</a></li><br>
                <li style="float:left; text-align:left; "><a href="qaAdd.php">Add Q&A</a></li><br>
                <li style="float:left; text-align:left; "><a href="qaEdit.php">Edit Q&A</a></li><br>
                <li style="float:left; text-align:left; "><a href="qaDelete.php">Delete Q&A</a></li><br><br>
                
            </ol>
        </td>
        <td style="background-color: #7bb4e0;">
            <h3>Category</h3>
            <ol style="float:right; text-align:left; padding-right:10px;">
                <li><a href="catList.php">List Category</a></li><br>
                <li><a href="catAdd.php">Add Category</a></li><br>
                <li><a href="catEdit.php">Edit Category</a></li><br>
                <li><a href="catDelete.php">Delete Category</a></li><br>
                
            </ol>
        </td>
    </tr>
    <tr>
        <td>
            <li style="float:left; text-align:left; "><a href="qaSelect.php">Display Questions Category</a></li><br>
        </td>
        <td>
            <li style="padding-right:10px;"><a href="catSelect.php">Display Category Questions</a></li><br>
        </td>

    </tr>
    <tr style="color:#7bb4e0; padding:20px; height:50px; font-size:25px;">
        <td>User Management</td>
        <td><a style="color:#7bb4e0; padding-right:10px; " href="qaUser.php">User List</a></td>
    </tr>
</table>
</div>
<?php 
include("footer.php");
?>
</body>

</html>