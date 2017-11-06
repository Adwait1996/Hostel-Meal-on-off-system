<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<?php
include_once "smtp.php";
include_once "dbconfig/dbconfig.php";
?>

<?php
$code=md5(rand(0,10000));
$email=mysqli_escape_string($con,$_POST['email']);
$sql="SELECT *FROM userinfo WHERE email='$email'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)==1)
{
	while($row=mysqli_fetch_assoc($res))
	{
		$status=$row['status'];
		if($status=='pending')
			echo"<div class='alert alert-warning'> Verifty Your Email First..!!</div>";
		else
		{
            $mail->addAddress($email);
            $mail->Subject = 'Password Reset  link';
            $mail->Body    = 'Your reset   code is '.$code.'<br>click on this link to reset your password <a href="http://localhost/msbhawan/reset-password.php?code='.$code.'"> http://localhost/msbhawan/reset-password.php?code='.$code.'<br>click here ..!! to</a> Reset Your Password';


            if(!$mail->send()) {
                echo"<div class='alert alert-danger'>";
                echo"Message could not be sent.";
                echo" Mailer Error: " . $mail->ErrorInfo;echo"</div>";
            }
             else{
             echo"<div class='alert alert-success'>";
             echo"<span class='fa fa-check-circle fa-3x'></span>";
                $sql1="UPDATE userinfo SET code='$code' WHERE email='$email'";
                $res1=mysqli_query($con,$sql1);
                echo "<br>A reset link has been sent to your email..!!<b>'.$email.'</b>";echo"</div>";	
            }
       }
	}
}
else
{
	echo"<div class='alert alert-danger' align='center'>";
	echo"THIS EMAIL <strong>".$email."</strong> IS NOT REGISTERED..!!!";echo" <br> <a href='reset-link.php'> Refresh ..<i class='fa fa-refresh' aria-hidden='true'></i></a></div>";
}
			
?>

   <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>