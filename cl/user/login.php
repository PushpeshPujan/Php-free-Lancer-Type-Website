<?php include'../include/connection.php';

if(!$con){

 die('Could not Connect My Sql:' .mysqli_error());
}
//session_start();
//require('function.php');
$msg='';
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $sql="select * from signup where email='$email' and password='$pass'";
    $res=mysqli_query($con,$sql);
    $count=mysqli_num_rows($res);
    if($count>0){
        $_SESSION['email']=$email;
        header('location: browse.php');
        die();
    }
    else{
        echo"<script>alert('Please enter correct email and password.')</script>";
 }
}
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
     <?php include "../include/nav.php";?>

<body>
    <div class="container-fluid mt-4">
        <div class="row ">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="card " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="card-header bg-danger text-white"> Login Here</div>
                <div class="card-body">
                    <form action="login.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="enter your name here">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="enter your password here">
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-danger btn-block" name="login">Login</button>
                            </div>
                            <div class="col-lg-4"></div>
                        </div>

                    </form>

                </div>
            </div>


        </div>

    </div>



    </div>
</body>

</html>




