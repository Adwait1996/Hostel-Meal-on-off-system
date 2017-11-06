<?php
include_once"../dbconfig/dbconfig.php";
date_default_timezone_set("Asia/Kolkata");
session_start();
include('way2sms-api.php');
?>
<?php
if(isset($_GET['id'])&& isset($_GET['phone']))
{
    $id=$_GET['id'];
    $action=$_GET['action'];
	$phone=$_GET['phone'];
    $name=$_GET['name'];
    
    if($action=="approve")
    {
           
        $sql="UPDATE userinfo SET approval='approved' WHERE id='$id' AND phone='$phone'";
        $res=mysqli_query($con,$sql);
        if($res)
		{
			sendWay2SMS ( '7059121742' , 'adwait1996' , $phone , 'Your Request has been approved ,From @MS Bhawan');
            header('location:pending-request');
		}
        else
            echo"Ooops Something Happened..!!";
    }
    //delete
    if($action=="delete")
    {           
        $sql="DELETE FROM userinfo WHERE id='$id' AND phone='$phone'";
        $sql1="DELETE FROM meal_status WHERE id='$id' AND name='$name'";
        $res=mysqli_query($con,$sql);
            $res1=mysqli_query($con,$sql1);
        if($res&&$res1)
		{
			sendWay2SMS ( '7059121742' , 'adwait1996' , $phone , 'Your Request has been Deleted You made a Fake Registration @MS Bhawan');
            header('location:pending-request');
		}
        else
            echo"Ooops Something Happened..!!";
    }
}
    ?>