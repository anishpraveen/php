<?php 

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "QandA_DB";
// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname; ";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
echo "<br>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS `qatable` (
  `iSL` int(11) NOT NULL AUTO_INCREMENT,
  `cQuestion` varchar(500) NOT NULL,
  `cAnswer` varchar(500) NOT NULL,
  PRIMARY KEY (`iSL`)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
echo "<br>";

echo "successfully";
?>