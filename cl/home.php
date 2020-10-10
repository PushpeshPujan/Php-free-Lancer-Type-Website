<?php include 'include/connection.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HomePage |</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <?php include'include/navigation.php';?>
    <div class="container-fluid mt-2">
        <div class="container-fluid" style="position:relatiive;">
            <img src="images/c.jpg" alt="img" width="100%" style="top=50%" />
            <div class="text-warning text-center img-top" style="position:absolute;top:30%;left:40%;font-size:80px;">CLANCER</div>
        </div>
        <div class="container-fluid mt-2">
            <div class="col-12">
                <h1 class="text-muted text-center mt-4 mb-4 text-info">Landing page</h1>
            </div>
            <div class="row">
                <?php 
                            $sql="select * from project order by price desc";
                            $run=mysqli_query($con,$sql);
                    while($res=mysqli_fetch_array($run)){?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

                    <div class="card"style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="card-body">
                            <img src="images/<?php echo $res['image1'];?>" alt="images" class="card-img-top" height="220px" />
                            <h4 class="card-text mt-4"><b>Budget :</b><?php echo $res['budget'];?></h4>
                            <p class="card-text lead mt-4"> Project desc :<b></b><?php echo $res['pdesc'];?></p>
                        </div>
                    </div>

                </div>
                <?php } ?>
            </div>
        </div>


        <div class="conatiner-fluid mt-4">
            <div class="col-12 mt-2">
                <h2 class="text-primary" style="text-align:center;">What's great about it?</h2>
            </div>
        </div>
        <div class="container-fluid mt-4">
            <div class="row">
                <?php
                    $sql="select * from project where ptype='Standard project'";
                    $run=mysqli_query($con,$sql);

                    while($row=mysqli_fetch_array($run)){?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

                    <div class="card"style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="card-body">
                            <img src="images/<?php echo $row['image1']?>" alt="" class="card-img-top" height="220px" />
                            <h4 class="card-title mt-4"><b>Project Title :</b><?php echo $row['pname']; ?></h4>
                            <p class="card-text mt-4"><b>Project Desc :</b><?php echo $row['pdesc']; ?></p>
                        </div>
                    </div>

                </div>
                <?php } ?>
            </div>
        </div>

        <div class="container-fluid mt-2">

            <div class="row">
                <?php 
                $sql="select * from project where plan='Start a contest'";
                $run=mysqli_query($con,$sql);
                
                
                while($result=mysqli_fetch_array($run)){?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card"style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="card-body">
                            <img src="images/<?php echo['image1'] ?>" alt="" class="card-img-top" height="220px" />
                            <h4 class="card-title"><b>Project Title :</b><?php $result['pname'];?></h4>
                            <p class="card-text"><b>Project Desc :</b><?php  $result['pdesc'];?>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
        <div class="container-fluid mt-2">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-text text-center">Crowd favorites</h2>
                    <h3 class="card-text text-center">Here are some of our most popular projects:</h3>
                    <div class="row">
                        <?php 
                        $sql="select * from project where skill1='Php' and skill2='CSS' and skill3='Java Script'";
                        $run=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($run)){
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="card"style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                <div class="card-body">
                                    <img src="images/<?php echo $row['image1'];?>" alt="" class="card-img-top" height="220px" />
                                    <h4 class="card-link"><b>Project title :</b><?php echo $row['pname'] ?></h4>
                                    <p class="card-link"><b>Project Desc :</b><?php echo $row['pdesc'];?></p>
                                    <p class="card-link"><b>Price :</b><?php echo $row['price'];?></p>
                                </div>
                            </div>

                        </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 text-center mt-4 mb-4">
            <h3 class="text-center">Some more creative persons</h3>
        </div>
        <div class="container-fluid mt-2">
            <div class="row">

                <?php 
                        $sql="select * from bid where hourly >1500";
                        $run=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($run)){
                         ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card"style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="card-body">
                            <img src="images/<?php echo $row['image'];?>" alt="" class="card-img-top" height="220px">
                            <h4 class="card-text text-primary"><b>Employee Name :</b><?php echo $row['name'];?></h4>
                            <p class="card-text mt-4"><b>Contact No. :</b><?php echo $row['Contact'];?></p>
                            <p class="card-text mt-4"><b>Proposal :</b><?php echo $row['proposal'];?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
            </div>
        </div>


        <div class="col-12 text-center text-dark">
            <h3>
                <h3 class="text-center">Some more creative persons requirement</h3>
            </h3>
        </div>
        <div class="container mt-4">
            <div class="row">
                <?php $sql="select skill1,pname from project where budget='Pay fixed price'";
            $run=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($run)){
            ?>
                <div class="col-lg-3 col-md-3 colsm-3 col-xs-3">
                    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                        <div class="card-body">
                            <p class="card-text"><b>Project Title :</b><?php echo $row['pname']; ?></p>
                            <p class="card-text"><b>Skill :</b><?php echo $row['skill1']; ?></p>

                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>

        <div class="container-fluid mt-4 mb-4 bg-dark text-white">
            <div class="row ">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p class="lead">
                        <a href="" class="text-white">India / English</a>
                    </p>
                    <p class="lead">
                        <a href="" class="text-white">Help & Support</a>
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p class="lead">
                        <a href="" class="text-white">Categories</a>
                    </p>
                    <p class="lead">
                        <a href="" class="text-white"> Projects</a>
                    </p>
                    <p class="lead">
                        <a href="" class="text-white"> Contests</a>
                    </p>

                    <p class="lead">
                        <a href="" class="text-white"> Freelancers</a>
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p class="lead">
                        <a href="" class="text-white">About us</a>
                    </p>
                    <p class="lead">
                        <a href="" class="text-white"> How it Works</a>
                    </p>
                    <p class="lead">
                        <a href="" class="text-white"> Security
                        </a>
                    </p>

                    <p class="lead">
                        <a href="" class="text-white"> Investor</a>
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                    <p class="lead">
                        <a href="" class="text-white">Privacy Policy </a>
                    </p>
                    <p class="lead">
                        <a href="" class="text-white"> Terms and Conditions</a>
                    </p>
                    <p class="lead">
                        <a href="" class="text-white"> Copyright Policy
                        </a>
                    </p>

                    <p class="lead">
                        <a href="" class="text-white"> Code of Conduct</a>
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="col-lg-3 col-md-3 colsm-3 colxs-3"></div>
                <div class="col-lg-3 col-md-3 colsm-3 colxs-3"></div>
                <div class="col-lg-3 col-md-3 colsm-3 colxs-3">
                    <span><i class="fa fa-facebook fa-2x"></i></span>
                    <span><i class="fa fa-twitter fa-2x"></i></span>
                    <span><i class="fa fa-youtube fa-2x"></i></span>
                    <span><i class="fa fa-wifi fa-2x"></i></span>
                    <span><i class="fa fa-instagram fa-2x"></i></span>

                </div>
            </div>
            <hr color="white" />
            <div class=" row w-100">

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <p class="lead">Registered User</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <p class="lead">Total Job Posted</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
            </div>


        </div>

    </div>
</body>

</html>
