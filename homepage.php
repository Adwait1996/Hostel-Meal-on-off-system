<?php
include_once"dbconfig/dbconfig.php";
date_default_timezone_set("Asia/Kolkata");
session_start();
if(!isset($_SESSION['email']))
    header('location: index.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome Ms Bhawan's Boarders</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
          .shift{
              margin-left: 1.15%;
              margin-right: 1.15%;
          }
          body{
           -webkit-user-select: none; /*for safari and android*/
            -moz-user-select: none;   /*for mozilla*/
            -ms-user-select: none; /* for microsoft internet explorer*/
            user-select: none;   /*for chrome*/
          }
          #message3
          {
              padding-top: 2%;
              padding-bottom: 2%;
              margin-top: 5px;
          }
      </style>
  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
                        <div class="container-fluid shift bg-info" align="center">
                            <div class="col-md-12">
                                <img alt="Bootstrap Image Preview" src="images/mylogo1.png"  height="120px" width="120px"class="img-rounded">
                           
                                <h2 class="text-center">
                                Welcome To Ms bhawan's  online Meal ON - OFF system.
                                </h2>
                            </div>
					    </div>
                    </div>
                    <?php
                    if(isset($_SESSION['email']))
                    {
                        ?>
					<nav class="navbar navbar-expand-sm navbar-dark bg-dark" role="navigation">
							 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
							 <a class="navbar-brand" href="#"> MS Bhawan Pg 3</a>
						
						<div class="collapse navbar-collapse" id="nav-content">   
                        <ul class="navbar-nav">
                        <li class="nav-item">
                        <a id="modal-948075" href="#modal-container-948075" role="button" class="btn" data-toggle="modal">About Developer</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#down">view status</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['email'];?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="Preview">
                        <a class="dropdown-item" href="https://twitter.com/Twitter?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">Follow Us On Twitter</a>
                        <a class="dropdown-item" href="https://www.facebook.com/groups/kupghall3/">Like Us On Facebook</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                        </li>
                         <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="Preview">
                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#flipFlop1">
                            <i class="fa fa-lock" aria-hidden="true"></i> &nbsp;&nbsp;Change Password
                            </button>
                        </div>
                        </li>
                        
                        </ul>
                            
                        </div>
                    </nav>
					<div class="jumbotron well">
						<h2>
							Welcome Users
                            									

						</h2>
						<p>
							This online System Was created to provide the users to turn their meal on/off
                            from anywhere and easily.
                            <br>
                            This system will help you all to get a more transparent way to turn your meal on/off.
                            
						</p>
                        
					</div>
                     <?php
                                    $name=$_SESSION['name'];
                                    $id=$_SESSION['id'];
                                    $sql1="SELECT *FROM userinfo WHERE id='$id' AND name='$name'";
                                    $res1=mysqli_query($con,$sql1);
                                    if(mysqli_num_rows($res1)==1)
                                    {
                                        while($row=mysqli_fetch_assoc($res1))
                                        {
                                      $status=$row['status'];
                                            $approval=$row['approval'];
                                    if($status=="disabled")
                                    {
                                        ?>
                                    
                                      <style>
                                    #form_show
                                          {
                                              pointer-events: none;
                                              opacity: 0.5;
                                              
                                          }
                            
                                          
                                    </style>
                                   <div class="jumbotron well bg-danger text-white" id="message3">
                            <h2>Your Accout Is Disabled
                                Your Meal is Off <i class="fa fa-times" aria-hidden="true"></i></h2>
                            </div>
                                    <?php
                                    }
                                            else if($approval=="not approved"&& $status=="activated")
                                            {
                                                ?>
                                                      <div class="jumbotron well bg-warning" id="message3">
                            <h2><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp;Your Account Verification is pending!!
                                 </h2>
                                                          <h4><i class="fa fa-check" aria-hidden="true"></i> Your Email is verified</h4>
                                                          <h4> <i class="fa fa-clock-o" aria-hidden="true"></i> Your Account is not verified by the Admin</h4>
                            </div>
                                   <style>
                                    #form_show
                                          {
                                              pointer-events: none;
                                              opacity: 0.5;
                                              
                                          }
                            
                                          
                                    </style>
                    <?php
                                            }
                                            else
                                            {
                                                ?>
                                                                        <div class="jumbotron well bg-success text-white" id="message3" style="opacity: .8;">
                            <h3><img src="images/verified.png" width="50px" height="50px"> &nbsp; Account is verified an is Active
                                 </h3>
                    </div>
                    <?php
                                            }
                                                
                                        }
                                    }
                                        ?>
                   
                    
					<div class="row">
						<div class="col-md-5">
							<a href="https://msbhawanpghall3.wixsite.com/pghall3" target="_blank" class="btn btn-primary btn-default active btn-block">
								Visit Pg3 Website
                            </a>
                            <br>
                            <div class="container-fluid">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                    <a href="viewall"> View All Borders Calender</a>
                                        </li>
                                        <li class="list-group-item">
                                    <a href="viewallguest"> View All Border's Guest Calender</a>
                                        </li>
                                        <li class="list-group-item">
                                    <a href="managerview"> View today's Info</a>
                                        </li>
                                          <li class="list-group-item">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#flipFlop">
                                    Read The Instructions
                                    </button>
                                        </li>
                                    </ul>
                            </div>
						</div>
						<div class="col-md-2">
						</div>
						<div class="col-md-5">
							<div class="alert alert-success">
								<h4>
									Alert!
								</h4> <strong>Warning!</strong> After changing your meal status always check the status table to confirm.<a href="#down" class="alert-link">Click Here to Check</a>
							</div>
							
                            <br>
							<blockquote class="blockquote   bg-warning">
								<p>
									You all are requested to pay the meal charge in time.
								</p> <small>thankyou...!<cite>online</cite></small>
							</blockquote>
                            
                            
						</div>
                        
					</div>
					<h3>
                            Change your status from the form below.
					</h3>
					 
					
					<div class="modal fade" id="modal-container-948075" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									 
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>
									<h4 class="modal-title" id="myModalLabel">
										Developer of this System.
									</h4>
								</div>
								<div class="modal-body">
									<ul>
                                    <li><b>Name:</b>&nbsp; Adwait Anand</li>
                                        <li> <b>Email:</b>&nbsp;<a href="mailto:adwaitanand1996@gmail.com"> adwaitanand1996@gmail.com</a></li>
                                        <li> <b> Phone:</b> &nbsp; 7980359586</li>
                                        <li><b> Address:</b> &nbsp; PG 3 university Of kalyani</li>
                                        <li> <a href="https://www.facebook.com/adwaitanand1996" target="_blank" > Follow Me On Facebook</a></li>
                                    </ul>
								</div>
								<div class="modal-footer">
									 
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Close
									</button> 
									<button type="button" class="btn btn-primary" data-dismiss="modal">
										OK
									</button>
								</div>
							</div>
							
						</div>
						
					</div>
                    <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="modalLabel">How to Use this System?</h4>
                            </div>
                            <div class="modal-body">
                            <ol>
                            <li>First of all you have to register in this system. </li> 
                                <li>By default your meal will be ON And your Guest Status will be OFF.   </li>
                                <li> You can Alter these with the help of the ON /OFF Forms. </li>
                                <li>All You need to do is JUST select the Valid Date Time  and Press ON/OFF Button to Change the status.</li>
                                <li> <b>Important Instructions:--</b></li>
                                <li>You can turn ON /OFF meal during the specified time limit.</li>
                                <li>For Current Day Morning time limit is : <mark>From 18:00 of previous day and upto 08:00 of current day.</mark></li>
                                <li><mark>For Current Day Night time limit is: From 8:00 to 18:00 Of Current Day.</mark></li>
                                <li> If you Turn Off your meal in future date then your Current status Will be On until that Date and Time Limit Is Reached.</li>
                                <li>If you Turn ON your meal in future date then your Current status Will be OFF until that Date and Time Limit Is Reached. </li>
                                <li> If You turn OFF /ON your meal For the next day then your current status will be shown <mark> after Midnight i.e 00:00:00 or From next date.</mark></li>
                            </ol>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- Change password--->
                    <div class="modal fade" id="flipFlop1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="modalLabel">Change Password</h4>
                                </div>
                                <div class="modal-body">
                                <form id="change_pass" action="change-pass.php" method="post">
                                <div class="form-group">
                                    <div class="col-md-9">
                                        <lable>Your Current Password</lable>
                                    <input type="password" class="form-control" id="op" name="oldpassword">
                                    </div>
                                    </div>  
                                    <hr>
                                    <div class="form-group">
                                    <div class="col-md-9">
                                        <lable>Type  New Password</lable>
                                    <input type="password" class="form-control" id="np" name="newpassword">
                                    </div>
                                    </div>
                                     <div class="form-group">
                                    <div class="col-md-9">
                                        <lable>Confirm  New Password</lable>
                                    <input type="password" class="form-control" id="cp" name="confirmpassword">
                                    </div>
                                    </div>
                                     <div class="form-group">
                                    <div class="col-md-9">
                                    <button type="submit" class="btn btn-success" name="sub_btn_password" id="sub_btn123">Change it!</button> 
                                    </div>
                                    </div>
                                </form>
                                </div>
                                <div class="modal-footer">
                                <span id="successmessage"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Change password ends-->
					
					<div class="row" id="form_show">
                        <?php
                        $name=$_SESSION['name'];
                        $id=$_SESSION['id'];
                        $sql="SELECT *FROM meal_status WHERE id='$id' AND name='$name'";
                        $res=mysqli_query($con,$sql);
                        if(mysqli_num_rows($res)==1)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $status=$row['Status'];
                                $status_g=$row['Status_g'];
                                $From_date=$row['From_date'];
                                $mn=$row['mn'];
                                $g_num=$row['guest_num'];
                                $From_date_g=$row['From_date_g'];
                                $mn_g=$row['mn_g'];
                                if($status=="OFF")
                                {
                     ?>
						<div class="col-md-6">
							<div class="card card-primary">
								<div class="card-header text-white bg-danger">
									<h5 class="card-title">
                                        <img src="images/man.png" height="75px" width="75px">
										Your Meal is Set to Turn Off From <?php echo $From_date."&nbsp;".$mn ?>
									</h5>
								</div>
								<div class="card-block">
									<form method="post" action="action.php?action=useron" autocomplete="off" id="useron">
                                      <div class="form-group"> <!-- Date input -->
                                          <div class="col-9">
                                        <label class="" for="date">Meal On From</label>
                                              <div class="input-group">
                                              <span class="input-group-addon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Date</span>
                                        <input class="form-control" id="date" name="date"  placeholder="dd/mm/yyyy" type="text"  required onfocus="blur();">
                                              </div>
                                      </div>
                                        </div>
                                         <div class="form-group"> 
                                             <div class="col-9"><!-- Date input -->
                                        <label class="">Select The Meal Time</label>
                                        <select class="custom-select" name="select_input">
                                            <option value="Morning">Morning</option>
                                            <option value="Night">Night</option>
                                              
                                             </select>
                                        </div>
                                        </div>
                                       <div class="form-group">
                                           <div class="col-9"><!-- Submit button -->
                                         <button class="btn btn-success " name="sub_btn1" type="submit">Turn It On &nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></button>
                                           </div>
                                           </div>
                                    </form>
								</div>
                                <?php
                                if(isset($_SESSION['message']))
                                {
                                    ?>
                                <div id="successmessage_user" class="alert alert-danger">
                                <?php
                                    echo $_SESSION['message'];
                                    ?>
                                </div>
                                <?php
                                    unset($_SESSION['message']);
                                }
                                    
                                    ?>
								<div class="card-footer">
									last turned off on <?php echo $From_date ; echo"&nbsp;".$mn; ?>
								</div>
							</div><br>
						</div>
                        <?php
                                }
                                else
                                {
                        ?>
						<div class="col-md-6">
							<div class="card card-primary">
								<div class="card-header text-white bg-success">
									<h5 class="card-title">
                                        <img src="images/man.png" height="75px" width="75px">
										Your Meal is Set to Turn ON From <?php echo $From_date."&nbsp;".$mn ?>
									</h5>
								</div>
								<div class="card-block">
									<form method="post" action="action.php?action=useroff" autocomplete="off" id="useroff">
                                      <div class="form-group"> <!-- Date input -->
                                          <div class="col-9">
                                              <label class="" for="date">Meal Off From</label>
                                              <div class="input-group">
                                              <span class="input-group-addon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Date</span>
                                        <input class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" type="text"  required onfocus="blur();">
                                              </div>   
                                      </div>
                                        </div>
                                         <div class="form-group"> <!-- Date input -->
                                          <div class="col-9">
                                        <label class="">Select The Meal Time</label>
                                        <select class="custom-select" name="select_input">
                                            <option value="Morning">Morning</option>
                                            <option value="Night">Night</option>
                                              
                                        </select>
                                              
                                      </div>
                                        </div>
                                       <div class="form-group">
                                           <div class="col-9"><!-- Submit button -->
                                         <button class="btn btn-danger " name="sub_btn2" type="submit" id="useable">Turn It Off&nbsp; &nbsp; <i class="fa fa-power-off" aria-hidden="true"></i></button>
                                       </div>
                                        </div>
                                    </form>
								</div>
                                <?php
                                if(isset($_SESSION['message']))
                                {
                                    ?>
                                <div id="successmessage_user" class="alert alert-danger">
                                <?php
                                    echo $_SESSION['message'];
                                    ?>
                                </div>
                                <?php
                                    unset($_SESSION['message']);
                                }
                                    
                                    ?>
                                <div class="card-footer">
									last turned ON date <?php echo $From_date ; echo"&nbsp;".$mn; ?>
								</div>
							</div><br>
						</div>
                        <?php
                                }
                        ?>
                        
                        <?php
                        if($status_g=="OFF")
                        {
                        ?>
						<div class="col-md-6">
							<div class="card card-info">
								<div class="card-header text-white bg-danger">
									<h5 class="card-title">
                                        <img src="images/default.jpg" height="75px" width="75px">
										Your Guest is Set to Turn Off From <?php echo $From_date_g."&nbsp;".$mn_g ?>
									</h5>
								</div>
								<div class="card-block">
                                    
                                    <form method="post" action="action.php?action=gueston" autocomplete="off" id="gueston" >
                                        <div class="row">
                                    <div class="col-md-3">
                                        
                                            <div class="form-group">
                                                <div class="col-9">
                                                    <label> Select number of Guests</label>
                                                    <select class="custom-select" name="g_num">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                    </select>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="col-md-9">
                                      <div class="form-group"> <!-- Date input -->
                                          <div class="col-9">
                                        <label class="">Meal On From</label>
                                              <div class="input-group">
                                              <span class="input-group-addon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Date</span>
                                        <input class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" type="text"  required onfocus="blur();">
                                              </div>
                                              
                                      </div>
                                        </div>
                                         <div class="form-group"> <!-- Date input -->
                                          <div class="col-9">
                                        <label class="">Select The Meal Time</label>
                                        <select class="custom-select" name="select_input">
                                            <option value="Morning">Morning</option>
                                            <option value="Night">Night</option>
                                              
                                        </select>
                                              
                                      </div>
                                        </div>
                                       <div class="form-group">
                                           <div class="col-9"><!-- Submit button -->
                                         <button class="btn btn-success " name="sub_btn3" type="submit" id="useable">Turn It On (Guest)&nbsp;<i class="fa fa-check-circle" aria-hidden="true"></i></button>
                                       </div>
                                        </div>
                                        </div>
                                            </div>
                                    </form>
                                    
								</div>
                                 <?php
                                if(isset($_SESSION['message_guest']))
                                {
                                    ?>
                                <div id="successmessage_guest" class="alert alert-danger">
                                <?php
                                    echo $_SESSION['message_guest'];
                                    ?>
                                </div>
                                <?php
                                    unset($_SESSION['message_guest']);
                                }
                            
                                    ?>
								<div class="card-footer">
									Your last guest meal turned off date: <?php echo $From_date_g ; echo"&nbsp;".$mn_g."&nbsp;".$g_num."Guest(s)"; ?>
								</div>
							</div><br>
						</div>
                        <?php
                        }
                                else
                                {
                        ?>
						<div class="col-md-6">
							<div class="card">
								<div class="card-header text-white bg-success">
									<h5 class="card-title">
                                        <img src="images/default.jpg" height="75px" width="75px">
										Your Guest is Set to Turn ON From <?php echo $From_date_g."&nbsp;".$mn_g ?>
									</h5>
								</div>
								<div class="card-block">
									<form method="post" action="action.php?action=guestoff" autocomplete="off" id="guestoff">
                                      <div class="form-group"> <!-- Date input -->
                                          <div class="col-9">
                                        <label class="">Meal Off From</label>
                                              <div class="input-group">
                                              <span class="input-group-addon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>Date</span>
                                        <input class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" type="text"  required onfocus="blur();">
                                              </div>   
                                      </div>
                                        </div>
                                         <div class="form-group"> <!-- Date input -->
                                          <div class="col-9">
                                        <label class="">Select The Meal Time</label>
                                        <select class="custom-select" name="select_input">
                                            <option value="Morning">Morning</option>
                                            <option value="Night">Night</option>
                                              
                                        </select>
                                              
                                      </div>
                                        </div>
                                       <div class="form-group"> 
                                           <div class="col-9"><!-- Submit button -->
                                           <button class="btn btn-danger " name="sub_btn4" type="submit" id="useable"><b>Turn Off All Guests&nbsp; &nbsp; <i class="fa fa-power-off" aria-hidden="true"></i></b> </button>
                                           </div>
                                       </div>
                                    </form>
                                     
                                    
								</div>
                                 <?php
                                if(isset($_SESSION['message_guest']))
                                {
                                    ?>
                                <div id="successmessage_guest" class=" alert text-white bg-danger">
                                <?php
                                    echo $_SESSION['message_guest'];
                                    ?>
                                </div>
                                <?php
                                    unset($_SESSION['message_guest']);
                                }
                                    ?>
								<div class="card-footer">
									Your last guest meal turned On date: <?php echo $From_date_g ; echo"&nbsp;".$mn_g."&nbsp;".$g_num."&nbsp; Guest(s)"; ?>
								</div>
							</div><br>
						</div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>  
				</div>
			</div>
			<div class="row" id="down">
                
				<div class="col-md-12">
                    <br>
                    <div class="card">
                    <legend> Your meal Status</legend>
                    <label> Current Status </label>
                    <?php 
                $live=strtotime(date('d-m-Y'));    
                $From_date1=str_replace('/','-',$From_date);
                $time=strtotime($From_date1);
                $date=strtotime(date('d-m-Y',$time));
                        $ctime=date('Gis');
                        $m_start_string="00:00:00";
                        $m_start=date('Gis',strtotime($m_start_string));
                        $m_end_string="08:00:00";
                        $m_end=date('Gis',strtotime($m_end_string));
                        $n_start=$m_end;
                         $n_end_string="18:00:00";
                        $n_end=date('Gis',strtotime($n_end_string));
                        
                        
                if($live==$date && $mn=="Morning" && $status=="ON" &&$ctime>=$m_start && $ctime<$m_end)
                {
                    ?>
                        <div class="card-header text-white bg-success"> ON<span class="fa fa-check fa-fw"></span></div>
                        <?php
                }
                        else  if($live==$date && $mn=="Night" && $status=="ON" &&$ctime>=$m_start && $ctime<$m_end)
                {
                    ?>
                        <div class="card-header text-white bg-danger"> OFF<span class="fa fa-times fa-fw"></span></div>
                        <?php
                }
                else if($live==$date && $mn=="Morning" && $status=="OFF" &&$ctime>=$m_start && $ctime<$m_end)
                {
                    ?>
                    <div class="card-header text-white bg-danger"> OFF<span class="fa fa-times fa-fw"></span></div>
                        <?php
                }
                        else  if($live==$date && $mn=="Night" && $status=="OFF" &&$ctime>=$m_start && $ctime<$m_end)
                {
                    ?>
                        <div class="card-header text-white bg-success"> ON<span class="fa fa-check fa-fw"></span></div>
                        <?php
                }
//-----------------------------------------------------------------------------
                        else  if($live==$date && $mn=="Morning" && $status=="ON" &&$ctime>=$n_start && $ctime<$n_end)
                {
                    ?>
                        <div class="card-header text-white bg-success"> ON<span class="fa fa-check fa-fw"></span></div>
                        <?php
                }
                        else if ($live==$date && $mn=="Night" && $status=="ON" &&$ctime>=$n_start && $ctime<$n_end)
                        {
                            ?>
                        <div class="card-header text-white bg-success"> ON<span class="fa fa-check fa-fw"></span></div>
                        <?php
                        }
                        else  if($live==$date && $mn=="Morning" && $status=="OFF" &&$ctime>=$n_start && $ctime<$n_end)
                {
                    ?>
                        <div class="card-header text-white bg-danger"> OFF<span class="fa fa-times fa-fw"></span></div>
                        <?php
                }
                        else if($live==$date && $mn=="Night" && $status=="OFF" &&$ctime>=$n_start && $ctime<$n_end)
                        {
                            ?>
                        <div class="card-header text-white bg-danger"> OFF <span class="fa fa-times fa-fw"></span></div>
                            <?php
                        }
                    
                         else if($live<$date && $status=="ON")
                {
                
                ?>
                    <div class="card-header text-white bg-danger"> OFF<span class="fa fa-times fa-fw"></span></div>
                    <?php
                }
                else if($live<$date && $status=="OFF")
                {
                    ?>
                    <div class="card-header text-white bg-success"> ON<span class="fa fa-check fa-fw"></span></div>
                    <?php
                }
                    else if($live>$date && $status=="ON")
                    {
                    ?>
                    <div class=" card-header text-white bg-success"> <b> ON<span class="fa fa-check fa-fw"></span></b></div>
                    <?php
                    }
                    else
                    {
                    ?>
                    <div class=" card-header text-white bg-danger"> OFF  <span class="fa fa-times fa-fw"></span></div>
                    <?php
                    }
                    ?>
                    <div class="card-block">
                    <label> Your qued request </label>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>
									#
								</th>
								<th>
									status
								</th>
								<th>
									from date
								</th>
								<th>
									morning / night
								</th>
							</tr>
						</thead>
						<tbody>
							<tr class="active">
								<td>
									2
								</td>
								<td>
								  <?php echo $status; ?>
								</td>
								<td>
									<?php echo $From_date; ?>
								</td>
								<td>
									<?php echo $mn; ?>
								</td>
							</tr>
						</tbody>
					</table>
                    </div>
                    </div>
                    <br>
                    <div class="card">
                    <legend> Your Guest Meal Status</legend>
                    <label> current status</label>
                    <?php 
                $live=strtotime(date('d-m-Y'));    
                $From_date1=str_replace('/','-',$From_date_g);
                $time=strtotime($From_date1);
                $date1=strtotime(date('d-m-Y',$time));
                        $ctime=date('Gis');
                        $m_start_string="00:00:00";
                        $m_start=date('Gis',strtotime($m_start_string));
                        $m_end_string="08:00:00";
                        $m_end=date('Gis',strtotime($m_end_string));
                        $n_start=$m_end;
                        $n_end_string="18:00:00";
                        $n_end=date('Gis',strtotime($n_end_string));
                        
               if($live==$date1 && $mn_g=="Morning" && $status_g=="ON" &&$ctime>=$m_start && $ctime<$m_end)
                {
                    ?>
                        <div class="card-header text-white bg-success"> ON<span class="fa fa-check fa-fw"></span></div>
                        <?php
                }
                else if($live==$date1 && $mn_g=="Night" && $status_g=="ON" &&$ctime>=$m_start && $ctime<$m_end)
                {
                    ?>
                        <div class="card-header text-white bg-danger"> OFF<span class="fa fa-times fa-fw"></span></div>
                        <?php
                }
                else if($live==$date1 && $mn_g=="Morning" && $status_g=="OFF" &&$ctime>=$m_start && $ctime<$m_end)
                {
                    ?>
                    <div class="card-header text-white bg-danger"> OFF<span class="fa fa-times fa-fw"></span></div>
                        <?php
                }
                        else if($live==$date1 && $mn_g=="Night" && $status_g=="OFF" &&$ctime>=$m_start && $ctime<$m_end)
                {
                    ?>
                        <div class="card-header text-white bg-success"> ON<span class="fa fa-check fa-fw"></span></div>
                        <?php
                }
                        else if ($live==$date1 && $mn_g=="Night" && $status_g=="ON" && $ctime>=$n_start && $ctime<$n_end)
                        {
                            ?>
                        <div class="card-header text-white bg-success"> ON<span class="fa fa-check fa-fw"></span></div>
                        <?php
                        }
                        else if($live==$date1 && $mn_g=="Morning" && $status_g=="ON" &&$ctime>=$m_start && $ctime<$m_end)
                {
                    ?>
                        <div class="card-header text-white bg-success"> ON<span class="fa fa-check fa-fw"></span></div>
                        <?php
                }
                        else if($live==$date1 && $mn_g=="Morning" && $status_g=="ON" &&$ctime>=$n_start && $ctime<$n_end)
                {
                    ?>
                        <div class="card-header text-white bg-success"> ON<span class="fa fa-check fa-fw"></span></div>
                        <?php
                }       else if($live==$date1 && $mn_g=="Morning" && $status_g=="OFF" &&$ctime>=$n_start && $ctime<$n_end)
                {
                    ?>
                        <div class="card-header text-white bg-danger"> OFF<span class="fa fa-times fa-fw"></span></div>
                        <?php
                }
                        else if($live==$date1 && $mn_g=="Night" && $status_g=="OFF" &&$ctime>=$n_start && $ctime<$n_end)
                        {
                            ?>
                        <div class="card-header text-white bg-danger"> OFF<span class="fa fa-times fa-fw"></span></div>
                            <?php
                        }
                    
                         else if($live<$date1 && $status_g=="ON")
                {
                
                ?>
                    <div class="card-header text-white bg-danger"> OFF<span class="fa fa-times fa-fw"></span></div>
                    <?php
                }
                else if($live<$date1 && $status_g=="OFF")
                {
                    ?>
                    <div class="card-header text-white bg-success"> ON<span class="fa fa-check fa-fw"></span></div>
                    <?php
                }
                    else if($live>$date1 && $status_g=="ON")
                    {
                    ?>
                    <div class=" card-header text-white bg-success"> <b> ON<span class="fa fa-check fa-fw"></span></b></div>
                    <?php
                    }
                    else
                    {
                    ?>
                    <div class=" card-header text-white bg-danger"> OFF  <span class="fa fa-times fa-fw"></span></div>
                    <?php
                    }
                    ?>
                        <div class="card-block">
                    <label> Your qued request </label>
                    <table class="table table-bordered">
						<thead>
							<tr>
								<th>
									Number of Guests
								</th>
								<th>
									Status
								</th>
								<th>
									From Date
								</th>
								<th>
				                    Morning / Night
								</th>
							</tr>
						</thead>
						<tbody>
							<tr class="active">
								<td>
									<?php echo $g_num; ?>
								</td>
								<td>
								    <?php echo $status_g; ?>
								</td>
								<td>
									<?php echo $From_date_g; ?>
								</td>
								<td>
									<?php echo $mn_g; ?>
								</td>
							</tr>
						</tbody>
					</table>
                        </div>
                    </div>
					<div class="jumbotron well">
					 <h2> Address:</h2>
					<address>
						 <strong>MS Bhawan PG 3.</strong><br> University Of Kalyani<br> Kalyani, Nadia -741235<br> <abbr title="Phone">Phone:</abbr> 9062668271
					</address>
                    </div>
				</div>
			</div>
		</div>
	</div>
        <?php
                    }
                    else
                    {
        ?>
        <div class="container-fluid text-white bg-danger">
        <h3> Please Login To Acess this page</h3>
            <ul>
            <li class=""> <a class="text-white"href="index"> Go to Login Page.</a></li>
                <li> <a class="text-white" href="registeration"> Go to Registration Page.</a></li>
            </ul>
        </div>
        <?php
                    }
        ?>
</div>

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

      <script>
    $(document).ready(function(){
      var date = new Date();
      date.setDate(date.getDate());
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
        startDate: date,
      };
      date_input.datepicker(options);

         
        
    });
      </script>
      <script>
    $("#change_pass").submit(function(event){
    event.preventDefault(); //prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
    
    $.ajax({
        url : post_url,
        type: request_method,
        data : form_data
    }).done(function(response){ //
        $("#successmessage").html(response);
        clearInput();
    });
});
          function clearInput() {
	$("#change_pass :input").each( function() {
	   $(this).val('');
	});
          }
</script>
  </body>
</html>