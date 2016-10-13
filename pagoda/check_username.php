<?php 
 include("connectionString.php"); 



if(isset($_POST['username'])){
    $name=$_POST['username'];

    $sql=" SELECT cUsername FROM login WHERE cUsername='$name' ";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0) {
        echo "User Name Already Exist";
    }
    else {
        echo "OK";
    }
    mysqli_close($conn);
    exit();
}
?>