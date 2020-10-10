<?php
   session_start();
    $con=mysqli_connect("localhost","root","","clancer");
    define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/cl/');
    define('SITE_PATH','http://127.0.0.1/cl');
    define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'images/');
    define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'images');

?>
