<!DOCTYPE html>
<html>

<head>
    <link href="css/style2.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

</head>
<body>
<h1>Hello</h1>
<?php 
echo 'While this is going to be parsed.';
$name=$_GET["firstname"];
echo "$name";
echo $_POST["firstname"];
echo "<br><br>";
echo $_POST["test"];

?>

</body>
</html>