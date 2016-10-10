<?php

$servername = "192.168.0.3";
$username = "america";
$password = "QvLhfUkK";
$dbname = "gopagoda";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);                
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>