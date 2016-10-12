<?php
        session_start();

        if(isset($_SESSION["userType"])){
            if($_SESSION["userType"]==0){
                $url='qaList.php';
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.$url.'";';
                echo '</script>';
                echo '<noscript>';
                echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                echo '</noscript>'; exit;  
            }
            
        }
        else{
            $url='Register.php';
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.$url.'";';
                echo '</script>';
                echo '<noscript>';
                echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                echo '</noscript>'; exit;  
        }

?>