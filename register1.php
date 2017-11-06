
<?php
include_once "dbconfig/dbconfig.php";
date_default_timezone_set("Asia/Kolkata");
include_once "smtp.php";
?>

<?php
$name=mysqli_escape_string($con,$_POST['name']);
$phone=mysqli_escape_string($con,$_POST['phone']);
$email=mysqli_escape_string($con,$_POST['email']);
$pass=mysqli_escape_string($con,md5($_POST['pass']));
$cpass=mysqli_escape_string($con,md5($_POST['cpass']));
$status=mysqli_escape_string($con,$_POST['status']);
$code=md5(rand(0,10000));
$month=date('F-Y');
$time=date('Gis');
    $date=date('d/m/Y');
    $from_date;
    $m_end=date('Gis',strtotime('08:30:00'));
    $n_end=date('Gis',strtotime('18:00:00'));
    if($time<=$m_end)
    {
        $from_date=$date;
        $mn="Morning";
    }
    else if($time>$m_end && $time<$n_end)
    {
        $from_date=$date;
        $mn="Night";
    }
    else if($time>=$n_end)
    {
        $from_date=date('d/m/Y',strtotime('+1 day'));
        $mn="Morning";
    }
    
        
if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['cpass']))
{
	if($pass==$cpass)
	{
		$sql="INSERT INTO userinfo(name,phone,email,password,code) VALUES ('$name','$phone','$email','$pass','$code')";
		$res=mysqli_query($con,$sql);
        $sql1="INSERT INTO meal_status(name,email,Status,From_date,mn) VALUES ('$name','$email','$status','$from_date','$mn')";
		$res1=mysqli_query($con,$sql1);
		if($res && $res1)
		{
$mail->addAddress($email);     // Add a recipient
$mail->Subject = 'Verification link';
$mail->Body    = 'Your Verification  code is '.$code.'<br>click on this link to activate your account <a href="https://pg3online.ml/msbhawan/verification.php?code='.$code.'"> https://www.pg3online.ml/verification.php?code='.$code.' <br> click here to</a> activate';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else 
{
    echo "75"; 
}
		}
		else
		{
				echo"Ooops Something Happened..!!! <br> E-mail Already registered..!!<br>";
		}
	}
    else
        echo"Password did'nt match";
}
mysqli_close($con);
?>