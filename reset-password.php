
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
<body>
<?php
	include_once "dbconfig/dbconfig.php";
	session_start();
   $code=$_GET['code'];
   $sql="SELECT *FROM userinfo WHERE code='$code'";
   $res=mysqli_query($con,$sql);
   while($row=mysqli_fetch_assoc($res))
   {
	   $email=$row['email'];
	   $_SESSION['email']=$email;
   if(mysqli_num_rows($res)==1)
   {
    echo"<div class='container'>
        <div class='row text-center '>
            <div class='col-md-12'>
                <br /><br />
                <h2> Forgot Password : Reset</h2>
               
                <h5>( Reset your forgotten Password )</h5>
                 <br />
            </div>
        </div>
         <div class='row '>
               
                  <div class='col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                        <strong>   Enter your New Password </strong>  
                            </div>
                            <div class='panel-body'>
                                <form role='form' name='f1' action='reset-password2.php' method='POST'>
                                       <br />
                                     
                                            <div class='form-group input-group'>
                                            <span class='input-group-addon'><i class='fa fa-lock'  ></i></span>
                                            <input type='password' class='form-control'  placeholder='Your Password' name='pass1' required />
                                        </div>
										
										 <div class='form-group input-group'>
                                            <span class='input-group-addon'><i class='fa fa-lock'  ></i></span>
                                            <input type='password' class='form-control'  placeholder='Retype Password' name='pass2' required/>
                                        </div> 
                                     <input type='submit' name='sub_btn' class='btn btn-primary ' value='Reset Password'/>
                                    <hr />
                                    Not register ? <a href='registeration.php' >click here </a> 
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>";
   }
   else
	   echo"Fake link / Link Used Once..!! :(";
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
