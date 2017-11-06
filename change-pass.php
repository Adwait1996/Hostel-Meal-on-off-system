<?php
include_once"dbconfig/dbconfig.php";
session_start();
?>
<?php
$oldpass=mysqli_escape_string($con,md5($_POST['oldpassword']));
$newpass=mysqli_escape_string($con,md5($_POST['newpassword']));
$confirmpass=mysqli_escape_string($con,md5($_POST['confirmpassword']));
    $email=$_SESSION['email'];
    $sql="SELECT *FROM userinfo WHERE email='$email'";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
        $pass=$row['password'];
        if($oldpass==$pass)
        {
           if($newpass==$confirmpass)
           {
               if($newpass==$pass)
               {
                   echo"Your new password is same as old password try another password";
               }
               else
               {
                  $sql1="UPDATE userinfo SET password='$newpass' WHERE email='$email'";
                   $res1=mysqli_query($con,$sql1);
                   if($res)
                       echo" PASSWORD CHANGED SUCCESSFULLY !!";
                   else
                       echo"OOPS SOMETHING HAPPENED..!!!";
               }
           }
            else
                echo"New passwords did'nt match !!";
        }
        else
            echo"Previous Password is incorrect !!";
    }

?>