<?php include'../include/connection.php';
if(!$_SESSION['email']){
        header('location: login.php');
    }
$email=$_SESSION['email'];
$sql= mysqli_query($con,"select * from signup where email='$email'"); 
$result=mysqli_fetch_assoc($sql);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Browse</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <?php include '../include/nav.php'?>
    <div class="container-fluid">
        <div class="row py-4">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <div class="card">
                    <div class="card-header h4">Recent projects</div>
                    <div class="card-body">
                        <h4 class="card-text ">Start bidding now on projects that meet your skills.</h4>
                        <a href="jobdetails.php" class="btn btn-primary btn-md mt-3 mb-2 ">Browse Project</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="card">
                    <div class="card-header"><?php echo $result['name'];?></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <img src="../images/<?php echo $result['image']?>" alt="" class="rounded-circle" height="80px" width="40%">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="card-text"><b>Contact No: <?php echo $result['mobile'];?></b></div>

                            </div>
                        </div>
                        <p class="card-text"><?php echo "<b>Address : </b>".$result['address'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
