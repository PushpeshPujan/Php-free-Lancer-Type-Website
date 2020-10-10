<?php include '../include/connection.php';
if(!$_SESSION['email']){
header('location: login.php');
}
?>
<?php
$email=$_SESSION['email'];
 $sql="select * from signup where email='$email'";
 $run=mysqli_query($con,$sql);
while($res=mysqli_fetch_array($run)){
$name1=$res['name'];}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Bid Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body class="bg-dark">
    <?php include '../include/nav.php';?>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <div class="card">
                    <h2 class="card-title text-center mt-2">Manage Here</h2>
                    <div class="card-body">
                       <?php
                        $query = "select bid.* from bid ,project where bid.ownername='$name1'";
                      $run = mysqli_query($con,$query);
                     $check=mysqli_num_rows($run);
                    if($check>0){ ?>
                        <table class="table table-bordered table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Contact</th>
                                    <th>Hourly Charge</th>
                                    <th>Weekly Charge</th>
                                    <th class="text-center">Proposal</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                     <?php 
                      while($row=mysqli_fetch_array($run)){
                        $name = $row['name'];
                        $contact = $row['Contact'];
                        $email = $row['email'];
                        $hourly = $row['hourly'];
                        $weekly = $row['weekly'];
                        $proposal = $row['proposal'];
                        $id = $row['bidid'];
                    
                          echo"
                          <tr>
                          <td>$name</td>
                          <td>$email</td>
                          <td>$contact</td>
                          <td>Rs.$hourly</td>
                          <td>Rs.$weekly</td>
                          <td>$proposal</td>
                          <td>
                              <a href='delete.php?del=$id' class='btn btn-danger btn-sm'>Delete</a> |
                              <a href='accept.php?accept=$id' class='btn btn-success btn-sm '>Accept</a>
                          </td>
                          </tr>
                          ";
                      }
                    }
                                else{
                                        echo"<script>alert('You haven't Bid yet.')</script>";
                                     echo "<div class='card'>
                                <div class='card-body text-center''>
                                   <i class='fas fa-search fa-3x text-muted''></i>
                                    <h2 class='text-muted h4'> Sorry! Search not Found</h2>
                                    <p class='text-muted'>check spelling or try with diffrent keywords</p>
                                </div>
                            </div>";
                                            }
                      ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        </div>
    </div>

</body>

</html>