<?php include '../include/connection.php';
if(!$_SESSION['email']){
    header('location :login.php');
}
 $email=$_SESSION['email'];
?>

<?php
    if(isset($_GET['pid']) && $_GET['pid']!=''){
        $pid=$_GET['pid'];
        $_SESSION['id']=$pid;
        $query="select * from project where pid='$pid'";
        $run=mysqli_query($con,$query);
        $check=mysqli_num_rows($run);
        if($check>0){
            while($row=mysqli_fetch_array($run)){
                $pname = $row['pname'];
                $id = $row['pid'];
                $pdesc = $row['pdesc'];
                $skill1 = $row['skill1'];
                $skill2 = $row['skill2'];
                $skill3 = $row['skill3'];
                $plan = $row['plan'];
                $location1 = $row['location1'];
                $location2 = $row['location2'];
                $budget = $row['budget'];
                $ptype = $row['ptype'];
                $currency = $row['currency'];
                $psubname = $row['psubname'];
                $price = $row['price'];
                $ptype = $row['ptype'];
                $pperiod = $row['pperiod'];
                $days = $row['days'];
                $contesttype = $row['contesttype'];
                $ownername = $row['ownername'];
            }
        }
        else{
            header('location: ../login.php');
            die();
        }
    }
?>

<?php
$sql= mysqli_query($con,"select * from signup where email='$email'"); 
$result=mysqli_fetch_assoc($sql);
$image=$result['image'];
//print_r($result);
//extract($_REQUEST);
//error_reporting(1);
if(isset($_POST['place']))
{
    $name=$_POST['name'];
    $ownername=$_POST['ownername'];
    $email=$_POST['email'];
    $hourly=$_POST['hourly'];
    $weekly=$_POST['weekly'];
    $proposal=$_POST['proposal'];
    $pid=$_POST['pid'];
    $contact=$_POST['mobile'];
    //$image=$result['image'];
  $sql= mysqli_query($con,"select * from bid where email='$email' and name='$name' and pid='$pid'");
  if(mysqli_num_rows($sql)>0) 
  {
      $msg= "<h1 style='color:red'>You have already bid in it.</h1>"; 
      echo $msg;
  }
  else
  {
   $sql="insert into bid(	name,email,image,Contact,hourly,weekly,proposal,pid,ownername)values('$name','$email','$image','$contact','$hourly','$weekly','$proposal','$pid','$ownername')";
      $run=mysqli_query($con,$sql);
      if($run){
      echo"<script>alert('Successfully Bidding Happpened.')</script>";
     echo "<script>window.open('browse.php','_self')</script>";
      }
   }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <?php include'../include/nav.php';?>
    <div class="container-fluid mt-4 mb-2">
        <div class="row">
           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <div class="col-12">
              <a href="projectdetails.php?pid=<?php echo $_SESSION['id'];?>" class="btn btn-outline-info">Details</a>
              <a href="proposal.php" class="btn btn-outline-warning">Proposal</a>
              </div>
               <div class="col-12 mt-4"><h3 class="text-dark"><b>Project Name :</b><?php echo $pname;?></h3></div>
                <div class="card">
                    <div class="card-header">Project Details</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <p class="card-text" style="font-family:arial;font-size:22px;"><b>Project Desc :</b><?php echo $pdesc;?></p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><b>Price : </b><b><?php echo "RS.".$price;?></b></div>
                        </div>
                        <h5 class="lead mt-4"><?php echo "<b>Skills Required :</b>".$skill1." ".$skill2." ".$skill3;?></h5>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">Place a bid</div>
                    <div class="card-body">
                        <h4 class="card-title">
                            You will be able to edit your bid until the project is awarded to someone.
                        </h4>
                        <h6 class="card-text"><b>Bid Details</b></h6>
                        <form action="projectdetails.php" method="post" enctype="multipart/form-data">
                           <div class="form-group">
                                <label for="pid">Pid</label>
                                <input type="text" name="pid" value="<?php echo $id;?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="ownername">Ownername</label>
                                <input type="text" name="ownername" value="<?php echo $ownername;?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" name="name" value="<?php echo $result['name'];?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="email" name="email" value="<?php echo $result['email'];?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Contact Number</label>
                                <input type="text" name="mobile" value="<?php echo $result['mobile'];?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <label for="hourly">Hourly Limit</label>
                                        <input type="text" name="hourly" placeholder="hourly price" class="form-control">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <label for="weekly">Weekly Limit</label>
                                        <input type="text" name="weekly" placeholder="weekly price" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="proposal">Proposal</label>
                                <textarea name="proposal" id="" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                    <input type="submit" class="btn btn-success btn-block" name="place" value="Place Bid">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
        </div>
    </div>

</body>

</html>
