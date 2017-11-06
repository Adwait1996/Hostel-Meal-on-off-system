<?php
include_once "dbconfig/dbconfig.php";
date_default_timezone_set("Asia/Kolkata");
session_start();
include_once "server-action.php";
?>
<?php
 $name=$_SESSION['name'];
$id=$_SESSION['id'];
$livetime= date('Gis');
$livedate= date('d/m/Y');
$timelimitvarm="08:30:00";
$timelimitm= date('Gis',strtotime($timelimitvarm));
$timelimitvarn="18:00:00";
$timelimitn= date('Gis',strtotime($timelimitvarn));
$action=$_GET['action'];
if($action=="useron")
{
    $From_date_on=$_POST['date'];
    $date=date('d/m/Y',strtotime(str_replace('/','-',$From_date_on)));
    $select_input_on=$_POST['select_input'];
    
   
    if($livedate==$date && $select_input_on=="Morning" && $livetime>$timelimitm)
    {
        $msg="Time limit Expired for Morning" ;
        $_SESSION['message']=$msg;
        header('location:homepage.php#form_show');
    }
    else if($livedate==$date && $select_input_on=="Night" &&$livetime>$timelimitn)
    {
        $msg="Time limit Expired for Night" ;
        $_SESSION['message']=$msg;
        header('location:homepage.php#form_show');
    }
    else
    {
    $sql="UPDATE meal_status SET From_date='$From_date_on',mn='$select_input_on',Status='ON' WHERE id='$id' AND name='$name'";
    $res=mysqli_query($con,$sql);
    if($res)
    {
        header('location:homepage.php#form_show');
    }  
    else
        echo "SERVER SCRIPT  ERROR".$res;
    }
}

if($action=="useroff")
{
    $From_date_on=$_POST['date'];
    $select_input_on=$_POST['select_input'];
    $date=date('d/m/Y',strtotime(str_replace('/','-',$From_date_on)));
    if($livedate==$date && $select_input_on=="Morning" &&$livetime>$timelimitm)
    {
        $msg="Time limit Expired for Morning" ;
        $_SESSION['message']=$msg;
        header('location:homepage.php#form_show');
    }
    else if($livedate==$date && $select_input_on=="Night" &&$livetime>$timelimitn)
    {
      $msg="Time limit Expired for Night" ;
        $_SESSION['message']=$msg;
        header('location:homepage.php#form_show'); 
    }
    else
    {
    $sql="UPDATE meal_status SET From_date='$From_date_on',mn='$select_input_on',Status='OFF' WHERE id='$id' AND name='$name'";
    $res=mysqli_query($con,$sql);
    if($res)
    {
        header('location:homepage.php#form_show');
    }
    else
        echo " ERROR";
    }
}

if($action=="gueston")
{
    $g_num=$_POST['g_num'];
    $From_date_on=$_POST['date'];
    $select_input_on=$_POST['select_input'];
    $date=date('d/m/Y',strtotime(str_replace('/','-',$From_date_on)));
    if($livedate==$date && $select_input_on=="Morning" &&$livetime>$timelimitm)
    {
       $msg="Time limit Expired for Morning" ;
        $_SESSION['message_guest']=$msg;
        header('location:homepage.php#form_show');
    }
    else if($livedate==$date && $select_input_on=="Night" &&$livetime>$timelimitn)
    {
     $msg="Time limit Expired for Night" ;
        $_SESSION['message_guest']=$msg;
        header('location:homepage.php#form_show');
    }
    else
    {
    $sql="UPDATE meal_status SET guest_num='$g_num',From_date_g='$From_date_on',mn_g='$select_input_on',Status_g='ON' WHERE id='$id' AND name='$name'";
    $res=mysqli_query($con,$sql);
    if($res)
       {
        header('location:homepage.php#form_show');
    } 
    else
        echo " ERROR";
    }
}


if($action=="guestoff")
{
    $From_date_on=$_POST['date'];
    $select_input_on=$_POST['select_input'];
    $date=date('d/m/Y',strtotime(str_replace('/','-',$From_date_on)));
    if($livedate==$date && $select_input_on=="Morning" &&$livetime>$timelimitm)
    {
        $msg="Time limit Expired for Morning" ;
        $_SESSION['message_guest']=$msg;
        header('location:homepage.php#form_show');
    }
    else if($livedate==$date && $select_input_on=="Night" &&$livetime>$timelimitn)
    {
      $msg="Time limit Expired for Night" ;
        $_SESSION['message_guest']=$msg;
        header('location:homepage.php#form_show'); 
    }
    else
    {
    
    $sql="UPDATE meal_status SET From_date_g='$From_date_on',mn_g='$select_input_on',Status_g='OFF',guest_num='0' WHERE id='$id' AND name='$name'";
    $res=mysqli_query($con,$sql);
    if($res)
       {
        header('location:homepage.php#form_show');
       }
    else
        echo " ERROR";
    }
}
?>