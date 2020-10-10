<?php include'../include/connection.php';
if(!$_SESSION['email']){
    header('location :login.php');
}
$email=$_SESSION['email'];
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
    <div class="container-fluid mt-4">
        <div class="row">

            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2"></div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 mb-4">
                <?php 
           
                $query="select * from project";
                $run=mysqli_query($con,$query);
                while($row=mysqli_fetch_array($run))
                {?>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 colxs-6">
                                <a href="projectdetails.php?pid=<?php echo $row['pid'];?>" class="card-link">
                                    <h3 class="card-title h4 mt-4"><b>Project Title : </b><?php echo $row['pname']?></h3>
                                </a>
                                <p class="card-text mt-4"><b>Project Desc : </b><?php echo $row['pdesc'];?></p>
                                <p class="card-text small mt-4"><b>Skill Required : </b><?php echo $row['skill1']." ".$row['skill2']." ".$row['skill3'];?></p>
                                <p class="card-text"><b>Project category :</b><?php echo $row['psubname'];?></p>
                                <p class="text-dark h4"><b>Project Owner :</b><?php echo $row['ownername'];?></p>
                                <p class="card-text mt-4"><b>Mobile Number : </b><?php echo $row['mobile'];?></p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 colxs-6">
                                <img src="../images/<?php echo $row['image1'];?>" alt="unavailable" height="200px">
                                <p class="text-muted mt-4"><b>Available for Location :</b><?php echo $row['location1'];echo $row['location2'];?></p>
                                <p class="h4">Project Type : <?php echo $row['ptype']; ?></p>
                                <p class="h4">Price : <?php echo $row['price']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2"></div>

        </div>
    </div>

</body>

</html>
