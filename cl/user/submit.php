<?php
include('../include/connection.php');
if(!$_SESSION['email']){
    header('location :login.php');
}
$msg="";
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['comment'])){
	$name=mysqli_real_escape_string($con,$_POST['name']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$comment=mysqli_real_escape_string($con,$_POST['comment']);
	
	mysqli_query($con,"insert into contact_us(name,email,comment) values('$name','$email','$comment')");
	$msg="Thanks message";
	
	$html="<table><tr><td>$name</td></tr><tr><td>$comment</td></tr></table>";
	
	include('../smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
    $mail->CharSet   = "UTF-8";
	$mail->SMTPAuth=true;
    $mail->SMTPDebug  = 2;
	$mail->Username="pushpeshpujan2k14@gmail.com";
	$mail->Password="give your email password here";
	$mail->SetFrom("pushpeshpujan2k14@gmail.com");
	$mail->addAddress("$email");
	$mail->IsHTML(true);
	$mail->Subject="New Contact Us";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		//echo "Mail send";
        echo"<script>window.open('manage.php','_self')</script>";
	}else{
		//echo "Error occur";
	}
	echo $msg;
}
?>