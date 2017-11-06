<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Secure Page</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>

<?php
include_once "dbconfig/dbconfig.php";
?>
<?php
$code=$_GET['code'];

$sql="SELECT *FROM userinfo WHERE code='$code'";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($res))
{
		$email=$row['email'];
	if(mysqli_num_rows($res)==1)
	{
	$sql1="UPDATE userinfo SET status='activated' WHERE email='$email'";
    $res1=mysqli_query($con,$sql1);
	if($res)
	{
		echo"<div class='container'><div class='alert alert-success'><strong>Account Successfully Activated..!!</strong>
		<br> <a href='index.php'> Go to login page</a></div></div>";
		
		$sql2="UPDATE userinfo SET code='\0' WHERE email='$email'";
        $res2=mysqli_query($con,$sql2);
	}
	else
		echo"<div class='container'><div class='alert alert-danger'>Ooops !! Something Went Wrong..!!</div></div>";
	}
	else
		echo"<div class='container'><div class='alert alert-danger'>Link Expired or Used Once...!!</div></div>";
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
   
</body>
</html>