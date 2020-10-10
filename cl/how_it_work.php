
<?php include 'include/connection.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>How it works</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
   <?php include'include/navigation.php'?>

    <div class="container mt-4">
        <div class="col-12">
            <h2 class="text-center">How can we help?</h2>
            <p class="text-center">
                <a href="user/post.php" class="btn btn-danger">I want to hire</a>
                <a href="user/browse.php" class="btn btn-primary ml-2">I want to work</a>
            </p>
        </div>


        <div class="card mt-4 py-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <h2 class="text-center">
                            What kind of work can I get done?
                        </h2>
                        <p class="text-muted p-2">
                            How does "anything you want" sound? We have experts representing every technical, professional, and creative field.
                        </p>
                        <a href="user/post.php" class="btn btn-danger btn-lg">POST A PROJECT</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <img src="" alt="">
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 mt-4">
            <p class="text-center" style="font-size:22px;"><b>Just give us the details about the work you need completed, and our freelancers will get it done faster, better, and cheaper than you could possibly imagine. This includes:</b></p>
        </div>

        <div class="card mt-4 py-4">
            <div class="card-body">
                <div class="row ">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <i class="fa fa-book fa-2x"></i>
                        <p class="lead">Small jobs, large jobs, anything in between</p>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <i class="fa fa-watch fa-2x"></i>
                        <p class="lead">Jobs that are on fixed price, or hourly terms </p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <i class="fa fa-notes fa-2x"></i>
                        <p class="lead">Work that requires specific skill sets, costs, or scheduling requirements. </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-primary mt-4 py-4">
            <div class="card-body">
                <div class="col-12">
                    <h2 class="text-center">So what are you waiting for?</h2>
                    <p class="text-center lead">Post a project today and get bids from talented freelancers.</p>
                    <a href="" class="btn btn-danger btn-lg" style="margin-left:420px;">Post a Project</a>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4 mb-4">
            <h2 class="text-center">Still not convinced? Check out the results!</h2>
            <p class="text-muted mt-4">Here are just some of the things you could get done on Freelancer.com. For more completed projects, visit our Project Showcase.</p>
        </div>


    </div>
</body>

</html>
