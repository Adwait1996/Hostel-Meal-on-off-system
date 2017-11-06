<html lang="en">
<head>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php

include_once "dbconfig/dbconfig.php";
session_start();

include_once "smtp.php";
?>
<?php
if(isset($_POST['sub_btn1']))
            {
     
			    $email=$_POST['vemail'];
                $code=md5(rand(0,10000));
                $sql="UPDATE userinfo SET code='$code' WHERE email='$email'";
                $res=mysqli_query($con,$sql);
                    if($res)
                    {
                 $mail->addAddress($email);     // Add a recipient
                $mail->Subject = 'Verification link';
                $mail->Body    = 'Your Verification  code is '.$code.'<br>click on this link to activate your account <a href="http://pg3online.epizy.com/verification.php?code='.$code.'">  http://pg3online.epizy.com/verification.php?code='.$code.'"click here ..!!</a> activate';
                if(!$mail->send()) {
                    echo"<div class='alert alert-danger'>";
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    echo"</div>";
                } else 
                {
                    echo"<div class='alert alert-success' id='success'>";
                    echo"<span class='fa fa-check-circle fa-2x'></span>";
                    echo 'A verification link has been sent to your email..!!'.$email.'<br> COMPLETE YOUR REGISTRATION BY VERIFYING YOUR EMAIL'; 
                    echo"</div>";
                }
            }
            
		}
?>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </body>
</html>