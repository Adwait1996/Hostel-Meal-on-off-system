<?php

include_once"../dbconfig/dbconfig.php";
date_default_timezone_set("Asia/Kolkata");
session_start();
include('way2sms-api.php');
include_once "server-action.php";
?>

<?php 

if(isset($_GET['id'])&& isset($_GET['name']))
{
    $id=$_GET['id'];
    $name=$_GET['name'];
    $action=$_GET['action'];
	$phone=$_GET['phone'];
    $date=date('d/m/Y');
    $time_current=date(Gis);
    $mor_limit_start="00:00:00";
    $mor_limit_end="08:00:00";
    $nig_limit_start="08:00:00";
    $nig_limit_end="18:00:00";
    $mor_time_start=date(Gis,strtotime($mor_limit_start));
    $mor_time_end=date(Gis,strtotime($mor_limit_end));
    $nig_time_start=date(Gis,strtotime($nig_limit_start));
    $nig_time_end=date(Gis,strtotime($nig_limit_end));
    if($action=="disable")
    {
        $mn="";
        if($time_current>=$mor_time_start && $time_current <$mor_time_end)
            $mn="Morning";
       if($time_current>=$nig_time_start && $time_current< $nig_time_end)
            $mn="Night";
        if($time_current>=$nig_time_end)
        {
            $mn="Morning";
            $date=date('d/m/Y',strtotime('+1 day'));
        }
                
        $sql="UPDATE userinfo SET status='disabled' WHERE id='$id' AND name='$name'";
        $sql1="UPDATE meal_status SET Status='OFF',From_date='$date',mn='$mn',Status_g='OFF0',From_date_g='$date',mn_g='$mn' WHERE id='$id' AND name='$name'";
        $res=mysqli_query($con,$sql);
            $res1=mysqli_query($con,$sql1);
        if($res&&$res1)
		{
			sendWay2SMS ( '*your way to sms number without astriks*' , '**your way2sms pass without astriks**' , $phone , 'Your Meal  And guest (if any) is OFF FROM  '. $date.',' .$mn.' KINDLY CLEAR YOUR DUES AS FAST AS POSSIBLE @MS Bhawan');
            header('location:admin_user_control');
		}
        else
            echo"Ooops Something Happened..!!";
    }
    //reenable
    if($action=="reenable")
    {
          $mn="";
        if($time_current>=$mor_time_start && $time_current <$mor_time_end)
            $mn="Morning";
       if($time_current>=$nig_time_start && $time_current< $nig_time_end)
            $mn="Night";
        if($time_current>=$nig_time_end)
        {
            $mn="Morning";
            $date=date('d/m/Y',strtotime('+1 day'));
        }
           
        $sql="UPDATE userinfo SET status='activated' WHERE id='$id' AND name='$name'";
        $sql1="UPDATE meal_status SET Status='ON',From_date='$date',mn='$mn' WHERE id='$id' AND name='$name'";
        $res=mysqli_query($con,$sql);
            $res1=mysqli_query($con,$sql1);
        if($res&&$res1)
		{
			sendWay2SMS ( 'your number' , 'your pass' , $phone , 'CONGRATS ! YOUR ACCOUNT IS ACTIVE AGAIN..!! From'.$date.','.$mn.'  @MS Bhawan');
            header('location:admin_user_control');
		}
        else
            echo"Ooops Something Happened..!!";
    }
    //activate
    if($action=="pending")
    {
        $mn="";
        if($time_current>=$mor_time)
            $mn="Morning";
       else if($time_current>=$nig_time)
            $mn="Night";
                
        $sql="UPDATE userinfo SET status='activated',SET code='\0' WHERE id='$id' AND name='$name'";
        $res=mysqli_query($con,$sql);
        if($res)
		{
			sendWay2SMS ( 'your number' , 'your pass' , $phone , 'CONGRATS ! YOUR ACCOUNT IS ACTIVATED BY ADMIN.. NO need to verify your Email!! @MS Bhawan');
            header('location:admin_user_control');
		}
        else
            echo"Ooops Something Happened..!!";
    }
}
?>