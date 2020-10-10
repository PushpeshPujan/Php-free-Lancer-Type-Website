<?php
    session_start();
    session_destroy();
    header('location: login.php');
    die();
     if(!$_SESSION['email']){
        session_start();
        session_destroy();
         die();
    }
?>