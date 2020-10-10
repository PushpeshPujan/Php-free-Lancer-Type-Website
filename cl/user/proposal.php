<?php include'../include/connection.php';
 if(!$_SESSION['email']){
        header('location: login.php');
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

<body class="bg-white">
    <?php include'../include/nav.php';?>
    <div class="container-fluid mt-4">
        <div class="row">
            <?php

      $id=$_SESSION['id'];
     $query="select * from project where pid='$id'";
        $run1=mysqli_query($con,$query);
            while($row=mysqli_fetch_array($run1)){
             ?>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <h3 class="card-header">Employer Information</h3>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="card-text h2"><?php echo $row['pname'];?></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-4">
                                <img src="../images/<?php echo $row['image1']; ?>" alt="" height="140px" width="60%">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-4">
                                <span class="text-primary">Rs. <?php echo $row['price'];?></span>
                                <span class="text-primary ml-2"><?php echo $row['currency'];?></span>
                                <p class="text-dark small mt-2"><b>Description :</b><?php echo $row['pdesc'];?></p>
                            </div>
                        </div>
                        <div class="col-12 text-muted mt-4">Budget :<?php echo $row['budget'];?></div>
                        <div class="col-12 text-dark">Project Completion Time Chosen <?php echo $row['pperiod'];?></div>

                    </div>
                </div>
            </div>
            <?php  } ?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <div class="col-12">
                    <a href="projectdetails.php?pid=<?php echo $_SESSION['id'];?>" class="btn btn-outline-info">Details</a>
                    <a href="proposal.php" class="btn btn-outline-warning">Proposal</a>
                </div>
                <?php 
                    $query="select bid.*,project.* from bid,project where bid.pid=project.pid";
                    $run=mysqli_query($con,$query);

                    while($row=mysqli_fetch_array($run)){
                               ?>
                <div class="card mb-2 mt-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="card-body">

                        <div class="row">

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <img src="../images/<?php echo $row['image'];?>" alt="" height="140px" width="80%">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">

                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <h4 class="card-title"><?php echo $row['name'];?></h4>
                                                <span class="lead"><b>Replying To :</b> </span> <span class="card-title"><?php echo $row['ownername'];?></span>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><span class="text-muted h4"><b>Project Title :</b></span>
                                                <span class="card-title h4"><?php echo $row['pname'];?></span>
                                            </div>
                                        </div>
                                        <div class="card-text mt-4"><?php echo $row['proposal'];?></div>
                                        <p class="text-muted mt-4" style="font-weight:bold;"><b>Charges :</b><?php echo $row['hourly']." Hourly "."and ".$row['weekly']."  Weekly charge";?></p>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>
