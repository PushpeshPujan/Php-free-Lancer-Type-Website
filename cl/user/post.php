
<?php include'../include/connection.php';
    if(!$_SESSION['email']){
        header('location: login.php');
    }
        $email=$_SESSION['email'];
        $sql="select * from signup where email='$email'";
        $run=mysqli_query($con,$sql);
        while($result=mysqli_fetch_array($run)){
            $name=$result['name'];
            $mobile=$result['mobile'];
        }?>
<?php include "../include/nav.php"?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>POST PAGE</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">
    <link href="../assets/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>


<?php
      $pname_error = $pdesc_error = $skill1_error =$skill2_error = $skill3_error=  $location1_error=   $location2_error =$budget_error=$price_error=$days_error="";
    $pname_color = $pdesc_color = $skill1_color = $skill2_color =$skill3_color=   $location1_color=   $location2_color = $budget_color=$price_color=$days_color="";
    
    if(isset($_POST['send'])){
        $pname = $_POST['pname'];
        $pdesc = trim($_POST['pdesc']);
        $skill1 = $_POST['skill1'];
        $skill2 = $_POST['skill2'];
        $skill3 = $_POST['skill3'];
        $plan = $_POST['plan'];
        $location1 = $_POST['location1'];
        $location2 = $_POST['location2'];
        $budget = $_POST['budget'];
        $ptype = $_POST['ptype'];
        $currency = $_POST['currency'];
        $psubname = $_POST['psubname'];
        $price = $_POST['price'];
        $ptype = $_POST['ptype'];
        $pperiod = $_POST['pperiod'];
        $days = $_POST['days'];
        $contesttype = $_POST['contesttype'];
    


   
    
        if($pname ==""){
            $pname_error = "<p class='text-danger small'> please write your project name</p>";
            $pname_color = "is-invalid";
            }
        elseif(!preg_match("/^[A-ZA-z ]*$/",$pname)){
            $pname_error = "<p class='small text-danger'>only alphabet allowed</p>";
        }
        elseif($pdesc ==""){
            $pdesc_error = "<p class='text-danger small'>please write your project description</p>";
             $pdesc_color = "is-invalid";
            }
        elseif(!preg_match("/^[A-ZA-z .,]*$/",$pdesc)){
             $pdesc_error = "<p class='small text-danger'>only alphabet allowed</p>";
        }
        
        elseif($skill1 ==""){
            $skill1_error = "<p class='text-danger small'>  please write your necessary skill for the project</p>";
             $skill1_color = "is-invalid";
            }
        elseif(!preg_match("/^[A-ZA-z .]*$/",$skill1)){
            $skill1_error = "<p class='small text-danger'>only alphabet allowed</p>";
        }
            
        elseif($skill2 ==""){
            $skill2_error = "<p class='text-danger small'> please write your necessary skill for the project</p>";
             $skill2_color = "is-invalid";
            }
        elseif(!preg_match("/^[A-ZA-z .]*$/",$skill2)){
            $skill2_error = "<p class='small text-danger'>only alphabet allowed</p>";
        }
        elseif($skill3 ==""){
            $skill3_error = "<p class='text-danger small'> please write your skill</p>";
             $skill3_color = "is-invalid";
            }
        elseif(!preg_match("/^[A-ZA-z .]*$/",$skill3)){
            $skill3_error = "<p class='small text-danger'>only alphabet allowed</p>";
        }
        

        elseif($location1 ==""){
            $location1_error = "<p class='text-danger small'> please write your contact</p>";
             $location1_color = "is-invalid";
            }
        elseif(!preg_match("/^[A-ZA-z0-9 ]*$/",$location1)){
            $location1_error = "<p class='small text-danger'>only ten number allowed</p>";
        }
            
        elseif($location2 ==""){
            $location2_error = "<p class='text-danger small'> please write your contact</p>";
             $location2_color = "is-invalid";
            }
        elseif(!preg_match("/^[A-ZA-z0-9 ]*$/",$location2)){
            $location2_error = "<p class='small text-danger'>only ten number allowed</p>";
        }
       
        elseif($budget ==""){
            $budget_error = "<p class='text-danger small'> please select your idproof name</p>";
             $budget_color = "is-invalid";
        }
        
        elseif($psubname ==""){
            $psubname_error = "<p class='text-danger small'> please select your idproof name</p>";
             $psubname_color = "is-invalid";
             }
    
        elseif($price ==""){
            $price_error = "<p class='text-danger small'> please write your password name</p>";
            $price_color = "is-invalid";
        }
        elseif($days ==""){
            $days_error = "<p class='text-danger small'> please write your password name</p>";
            $days_color = "is-invalid";
        }
      
        
        else{
              if($_FILES['images']['name']!=''){
                $image=rand(111111111,999999999).'_'.$_FILES['images']['name'];
                move_uploaded_file($_FILES['images']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            }
          
            $query="insert into project(pname,pdesc,image1,skill1,skill2,skill3,plan,location1,location2,budget,psubname,currency,price,ptype,pperiod,days,contesttype,ownername,mobile)value('$pname','$pdesc','$image','$skill1','$skill2','$skill3','$plan','$location1','$location2','$budget','$psubname','$currency','$price','$ptype','$pperiod','$days','$contesttype','$name','$mobile')";
            $run=mysqli_query($con,$query);
            if($run){
           echo "<script>alert('Your project posted successfully.')</script>";
           echo "<script>window.open('../home.php','_self')</script>";
            }
            else{
                echo"<script>alert('error')</script>";
            }
        }
    }
    ?>

<body>
    <div class="row w-100 m-2 p-0">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="card-header text-primary">Project Information</div>
                <div class="card-body">
                    <form action="post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="pname">Choose a name for your project</label>
                            <input type="text" class="form-control" <?php echo "$pname_color"; ?> name="pname" placeholder="enter your project name here" value="<?php if(isset($_POST['send'])){echo"$pname";} ?>"> <?php echo"$pname_error"; ?>
                        </div>
                        <div class="form-group">
                            <label for="pdesc">Tell us more about your project</label>
                            <textarea class="form-control" <?php echo "$pdesc_color"; ?>  rows="3" col="30" name="pdesc"><?php if(isset($_POST['send'])){echo"$pdesc";} ?></textarea><?php echo"$pdesc_error"; ?>
                        </div>
                        <div class="form-group">
                            <label for="images">Upload files here</label>
                            <input type="file" required class="form-control-file" id="images" name="images">
                        </div>

                        <div class="form-group">
                            <label for="skill1">Skill</label>
                            <input type="text" class="form-control" <?php echo "$skill1_color"; ?> name="skill1" placeholder="enter your skill here" value="<?php if(isset($_POST['send'])){echo"$skill1";} ?>"><?php echo "$skill1_error"; ?>
                        </div>
                        <div class="form-group">
                            <label for="skill2">Add more Skill</label>
                            <input type="text" class="form-control" <?php echo "$skill2_color"; ?> name="skill2" placeholder="enter your skill here" value="<?php if(isset($_POST['send'])){echo"$skill2";} ?>"><?php echo "$skill2_error"; ?>
                        </div>
                        <div class="form-group">
                            <label for="skill3">Add more Skill</label>
                            <input type="text" class="form-control" <?php echo "$skill3_color"; ?> name="skill3" placeholder="enter your skill here" value="<?php if(isset($_POST['send'])){echo"$skill3";} ?>"><?php echo "$skill3_error"; ?>
                        </div>
                        <div class="form-group">
                            <label for="plan">How would you like to get it done?</label>
                            <select class="form-control" required id="plan" name="plan">
                                <option>Post a project</option>
                                <option>Start a contest</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="location1">Where will this project be done?</label>
                            <input type="text" class="form-control" <?php echo "$location1_color"; ?> name="location1" placeholder="enter your location here" value="<?php if(isset($_POST['send'])){echo"$location1";} ?>"><?php echo "$location1_error"; ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" <?php echo "$location2_color"; ?> name="location2" placeholder="enter your location here" value="<?php if(isset($_POST['send'])){echo"$location2";} ?>"><?php echo "$location2_error"; ?>
                        </div>

                        <div class="form-group">
                            <label for="budget">How do you want to pay?</label>
                            <select class="form-control" id="plan" name="budget" required>
                                <option>Pay fixed price</option>
                                <option>Pay by the hour</option>
                                <option>Contest Now</option>
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="ptype">How do you want to pay?</label>
                            <select class="form-control" id="ptype" name="ptype">
                                <option>Standard project</option>
                                <option>Recruiter project</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="currency">What is your estimated budget?</label>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <select class="form-control" required id="currency1" name="currency">
                                        <option>INR</option>
                                        <option>USD</option>
                                        <option>CAD</option>
                                        <option>EUR</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 colxs-6">
                                    <select class="form-control" id="plan" name="psubname">
                                        <option>very small project(12500-37500)</option>
                                        <option>micro project(600-1500)</option>
                                        <option>small project(37500-75000)</option>
                                        <option>medium project(75000-150000)</option>
                                        <option>Large project(150000-250000)</option>
                                        <option>Basic(100-400)</option>
                                        <option>Moderate(400-750)</option>
                                        <option>standard(1250-2000)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact">Set Price</label>
                            <input type="text" class="form-control" <?php echo "$price_color"; ?>name="price" placeholder="enter your contact here" value="<?php if(isset($_POST['send'])){echo"$price";} ?>"> <?php echo "$price_error"; ?>
                        </div>
                        <div class="form-group">
                            <label for="pperiod">Project Time period</label>
                            <select class="form-control" id="plan" name="pperiod">
                                <option>with in 1 day</option>
                                <option>with in 30 days</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="days">Days to make contest</label>
                            <input type="text" placeholder="enter days upto which want contest" name="days" class="form-control"<?php echo "$days_color"; ?> value="<?php if(isset($_POST['send'])){echo"$days";} ?>"><?php echo "$days_error"; ?>
                        </div>
                        <div class="form-group">
                            <label for="contesttype">Contest Type</label>
                            <select class="form-control" id="plan" name="contesttype">
                                <option>Basic contest</option>
                                <option>guaranteed contest</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <input type="submit" class="btn btn-primary btn-block" name="send" value="Yes , Post my project">
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
