<?php include '../include/connection.php'; ?>

<?php 
      $name_error = $email_error = $mobile_error =$address_error =$password_error="";
      $name_color = $email_color = $mobile_color = $address_color =$password_color="";
    
    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $password = $_POST['password'];
          if($name ==""){
            $name_error = "<p class='text-danger small'> please write your name here</p>";
            $name_color = "is-invalid";
            }
        elseif(!preg_match("/^[A-ZA-z ]*$/",$name)){
            $pname_error = "<p class='small text-danger'>only alphabet allowed</p>";
        }
        elseif($email ==""){
            $email_error = "<p class='text-danger small'>Search is empty please write your email</p>";
             $email_color = "is-invalid";
             }
         elseif(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email)){
            $email_error = "<p class='small text-danger'>only @ allowed</p>";
        }
        elseif($mobile ==""){
            $mobile_error = "<p class='text-danger small'> please write your contact</p>";
             $mobile_color = "is-invalid";
            }
        elseif(!preg_match("/^[0-9]{10}$/",$mobile)){
            $mobile_error = "<p class='small text-danger'>only ten number allowed</p>";
        }
        
          if($address ==""){
            $address_error = "<p class='text-danger small'> please write your name here</p>";
            $address_color = "is-invalid";
            }
        elseif(!preg_match("/^[A-ZA-z ,]*$/",$address)){
            $address_error = "<p class='small text-danger'>only alphabet allowed</p>";
        }
        elseif($password ==""){
            $password_error = "<p class='text-danger small'> please write your contact</p>";
             $password_color = "is-invalid";
            }
        elseif(!preg_match("/^[A-ZA-z0-9 @]*$/",$password)){
            $location1_error = "<p class='small text-danger'>only ten number allowed</p>";
        }
        else{
             if($_FILES['images']['name']!=''){
                $image=rand(111111111,999999999).'_'.$_FILES['images']['name'];
                move_uploaded_file($_FILES['images']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            }
            
            $query="insert into signup(name,email,image,mobile,address,password)value('$name','$email','$image','$mobile','$address','$password')";
            $run=mysqli_query($con,$query);
            if($run){
                echo"<script>alert('Successfully registered now you can login')</script>";
                echo"<script>window.open('login.php','_self')</script>";
            }
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <?php include '../include/nav.php'; ?>
    <div class="row w-100 m-2 p-0">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="card " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="card-header bg-success text-white"> Signup Here</div>
                <div class="card-body">
                    <form action="signup.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control"  <?php echo "$name_color"; ?>name="name" placeholder="enter your name here"value="<?php if(isset($_POST['send'])){echo"$name";} ?>"><?php echo"$name_error"; ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"<?php echo "$email_color"; ?> name="email" placeholder="enter your email here"value="<?php if(isset($_POST['send'])){echo"$email";} ?>"><?php echo"$email_error"; ?>
                        </div>
                          <div class="form-group">
                            <label for="images">Upload files here</label>
                            <input type="file" required class="form-control-file" id="images" name="images">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" <?php echo "$mobile_color"; ?>name="mobile" placeholder="enter your mobile here"value="<?php if(isset($_POST['send'])){echo"$mobile";} ?>"><?php echo"$mobile_error"; ?>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" <?php echo "$address_color"; ?>id="" cols="30" rows="4"><?php if(isset($_POST['send'])){echo"$address";} ?></textarea><?php echo"$address_error"; ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password"<?php echo "$password_color"; ?> placeholder="enter your password here"value="<?php if(isset($_POST['send'])){echo"$password";} ?>"><?php echo"$password_error"; ?>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-success btn-block" name="send">Signup</button>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>

                    </form>

                </div>
            </div>


        </div>

    </div>

</body>

</html>
