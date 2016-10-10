<?php 

require("connectionString.php"); 


// Create database
/*$sql = "CREATE DATABASE IF NOT EXISTS $dbname; ";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
*/
echo "<br>";


// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS `qatable` (
  `iSL` int(11) NOT NULL AUTO_INCREMENT,
  `cQuestion` varchar(500) NOT NULL,
  `cAnswer` varchar(500) NOT NULL,
  PRIMARY KEY (`iSL`)
)";

if ($conn->query($sql) === TRUE) {
    echo "qatable created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
echo "<br>";
require("connectionString.php"); 
echo "<br>";

$sql = "CREATE TABLE IF NOT EXISTS `categoryList` (
  `iSL` int(11) NOT NULL AUTO_INCREMENT,
  `cCat` varchar(500) NOT NULL,
  `cDesc` varchar(500) NOT NULL,
  PRIMARY KEY (`iSL`)
)";

if ($conn->query($sql) === TRUE) {
    echo "categoryList created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
echo "<br>";

require("connectionString.php"); 

echo "<br>";

$sql = "CREATE TABLE IF NOT EXISTS `queCategory` (
  `iSL` int(11) NOT NULL AUTO_INCREMENT,
  `iQID` int(11) NOT NULL,
  `iCatID` int(11) NOT NULL,
  PRIMARY KEY (`iSL`),
  FOREIGN KEY (`iCatID`) 
    REFERENCES `categoryList` (`iSL`) 
    ON DELETE CASCADE,
  FOREIGN KEY (`iQID`) 
   REFERENCES `qatable` (`iSL`) 
   ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "queCategory created successfully";
} else {
    echo "queCategory creating table: " . $conn->error;
}

$conn->close();
echo "<br>";
/*
require("connectionString.php"); 
$sql = "ALTER TABLE `queCategory`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`iCatID`) REFERENCES `categoryList` (`iSL`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_que` FOREIGN KEY (`iQID`) REFERENCES `qatable` (`iSL`) ON DELETE CASCADE;";

if ($conn->query($sql) === TRUE) {
    echo "queCategory altered successfully";
} else {
    echo "Error queCategory table: " . $conn->error;
}

$conn->close();
echo "<br>";
*/
?>