<?php 

session_start();

if(isset($_SESSION['UserName'])){
    session_unset();
    session_destroy();
    header("Location: ./login.php");
}else{
    header("Location: ./login.php");
}


?>