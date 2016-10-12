<?php 
 require("connectionString.php"); 
$host = 'localhost';
$user = 'root';
$pass = 'root';

mysql_connect($host, $user, $pass);

mysql_select_db('QandA_DB');

if(isset($_POST['username']))
{
 $name=$_POST['username'];

 $checkdata=" SELECT cUsername FROM login WHERE cUsername='$name' ";

 $query=mysql_query($checkdata);

 if(mysql_num_rows($query)>0)
 {
  echo "User Name Already Exist";
 }
 else
 {
  echo "OK";
 }
 exit();
}
?>