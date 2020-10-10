<?php include "../include/connection.php"; ?>
<?php
if(isset($_GET['del'])){
    $del = $_GET['del'];
    $delete_query = "delete from bid where bidid='$del'";
    $run = mysqli_query($con,$delete_query);
    if($run){
        echo "<script>alert('Person Rejected.')</script>";
    }
    
    header("location: manage.php");
}

?>