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


require("connectionString.php"); 

echo "<br>";

$sql = "CREATE TABLE IF NOT EXISTS `login` (
  `iUID` int(11) NOT NULL AUTO_INCREMENT,
  `cUsername` varchar(500) NOT NULL,
  `cPassword` varchar(500) NOT NULL,
  `iType` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iUID`)
)";

if ($conn->query($sql) === TRUE) {
    echo "login created successfully";
} else {
    echo "login creating table: " . $conn->error;
}

$conn->close();
echo "<br>";


require("connectionString.php"); 

echo "<br>";

$sql = "INSERT INTO `login` (`cUsername`, `cPassword`, `iType`) VALUES
('root12', 'root12', 1);";

if ($conn->query($sql) === TRUE) {
    echo "login acc created successfully";
} else {
    echo "login acc creating table: " . $conn->error;
}

$conn->close();
echo "<br>";


require("connectionString.php"); 

echo "<br>";

$sql = "CREATE TABLE IF NOT EXISTS `userDetail` (
  `iUID` int(11) NOT NULL,
  `cEmail` varchar(500) NOT NULL,
  `cCountry` varchar(500) NOT NULL,
  `cState` varchar(500) NOT NULL,
  `cImageURL` varchar(500) NOT NULL,
  FOREIGN KEY (`iUID`) 
    REFERENCES `login` (`iUID`) 
    ON DELETE CASCADE  
)";

if ($conn->query($sql) === TRUE) {
    echo "userDetail created successfully";
} else {
    echo "userDetail creating table: " . $conn->error;
}

$conn->close();
echo "<br>";

?>