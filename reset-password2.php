<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MS Bhawan</title>
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
session_start();
?>
<?php
$email=$_SESSION['email'];
$pass1=mysqli_escape_string($con,md5($_POST['pass1']));
$pass2=mysqli_escape_string($con,md5($_POST['pass2']));
if($pass1==$pass2)
{
	$sql="UPDATE userinfo SET password='$pass1' WHERE email='$email'";
	$res=mysqli_query($con,$sql);
	if($res)
	{
		echo"<div class='container'><div class='alert alert-success'>";
		echo"PASSWORD Successfully Changed..!! :)<a href='index.php'> Go to login page </a>";
		echo"</div></div>";
		$sql1="UPDATE userinfo SET code='\0' WHERE email='$email'";
	    $res1=mysqli_query($con,$sql1);
		session_destroy();
	}
	else
		echo"<div class='container'><div class='alert alert-danger'>Ooops !! Something Went Wrong..!!<a href='../src/'> Go to login page </a></div></div>";
}
else
	echo"<div class='container'><div class='alert alert-danger'>PASSWORDs did not match..!! :( <a href='../src/'> Go to login page </a></div></div>";

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
   
</body>
</html>