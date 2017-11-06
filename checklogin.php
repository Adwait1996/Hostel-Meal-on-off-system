
<?php
include_once "dbconfig/dbconfig.php";
session_start();
         include_once "smtp.php";
?>
<?php
$email=mysqli_escape_string($con,$_POST['email']);
$pass=mysqli_escape_string($con,md5($_POST['password']));
        
$sql="SELECT *FROM userinfo WHERE email='$email' AND password='$pass'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)==1)
{
   	while($row=mysqli_fetch_assoc($res))
	{
        
		$status=$row['status'];
		if($status=='pending')
		{ 
            $_SESSION['vemail']=$email;
			echo"Your Email <strong>".$email."</strong> is not verified <br>Verify Your Email First..!!<br>";
            echo"<form id='resend-form' action='resend.php' method='post'>
            <input type='hidden' name='vemail' value='$email'>
            <div id='success_message'><span class='fa fa-spin fa-circle-o-notch fa-fw'>Sending Email</span></div>
            <div class='form-group'> 
            <button type='submit' name='sub_btn1' class='btn btn-primary'> Resend Verification Email</button>
            </div>
            </form>";
        }
            else
		{
		    $_SESSION['name']=$row['name'];
            $_SESSION['email']=$row['email'];
            $_SESSION['id']=$row['id'];
            echo"successfull";
		}
	}
}
        else if(mysqli_num_rows(mysqli_query($con,"SELECT *FROM userinfo WHERE email='$email'"))==0)
        {
           echo" Email not registered";
        }
      else
	echo"Password incorrect";

?>