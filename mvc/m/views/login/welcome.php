Welcome

<?php 

session_start();
if(isset($_SESSION['username']) && !is_null($_SESSION['username'])){
 echo "$username"; 

}

else{
    echo "Invalid";
    return call('pages', 'error');
}
?>