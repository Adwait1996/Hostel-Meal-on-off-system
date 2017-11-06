<?php
//include "microProtector.php";

include_once"../dbconfig/dbconfig.php";
date_default_timezone_set("Asia/Kolkata");
include_once "../server-action.php";
session_start();
?>
<html lang="en">
  <head>
     
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Secure page</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
      <style>
          .shift{
              margin-left: 1.15%;
              margin-right: 1.15%;
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
                        <div class="container-fluid bg-info shift">
                            <div class="col-md-12" align="center">
                                <img alt="Bootstrap Image Preview" src="../images/mylogo1.png"  height="120px" width="120px"class="img-rounded">
                                <h2 class="text-center">
                                Welcome To Ms bhawan's  online Meal ON / OFF system.
                                </h2>
                            </div>
					    </div>
                    </div>
					<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- Brand -->
                        <a class="navbar-brand" href="#">MS Bhawan PG3</a>

                        <!-- Links -->
                        <div class="collapse navbar-collapse" id="nav-content">   
                        <ul class="navbar-nav">
                        <li class="nav-item">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#smallShoes">
                         About the developer
                        </button>
                        </li>
                            <?php
                            $sql1="SELECT *FROM userinfo WHERE approval='not approved'";
                            $res1=mysqli_query($con,$sql1);
                            $count=mysqli_num_rows($res1);
                            ?>
                        <li class="nav-item">
                        <a  class="nav-link" href="pending-request">Pending Requests <span class="badge badge-pill badge-danger"><?php echo $count;?></span></a>
                        </li>
                             <?php
                            $sql2="SELECT *FROM userinfo WHERE approval='approved' AND status='activated'";
                            $res2=mysqli_query($con,$sql2);
                            $count_active=mysqli_num_rows($res2);
                            ?>
                             <li class="nav-item">
                        <a  class="nav-link" href="#">Active Users<span class="badge badge-pill badge-success"><?php echo $count_active;?></span></a>
                        </li>
                            <?php
                            $sql3="SELECT *FROM userinfo WHERE approval='approved' AND status='disabled'";
                            $res3=mysqli_query($con,$sql3);
                            $count_disabled=mysqli_num_rows($res3);
                            ?>
                            <li class="nav-item">
                        <a  class="nav-link" href="#">Disabled users<span class="badge badge-pill badge-danger"><?php echo $count_disabled;?></span></a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="Preview">
                        <a class="dropdown-item" href="#">Dropdown Link 1</a>
                        <a class="dropdown-item" href="#">Dropdown Link 2</a>
                        <a class="dropdown-item" href="#">Dropdown Link 3</a>
                        </div>
                        </li>
                        </ul>
                        </div>
                    </nav>
                    </div>
                </div>
            </div>
        </div>
      </div>
        <div class="modal fade" id="smallShoes" tabindex="-1" role="dialog" aria-labelledby="modalLabelSmall" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">

            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="modalLabelSmall">Adwait Anand</h4>
            </div>

            <div class="modal-body">
            <ul>
            <li>A student Of Kalyani University.</li>    
            </ul>
            </div>

            </div>
            </div>
            </div>
        <div class="container-fluid">
             <div class="row">
                <div class="col-md-4">
        <div class="card ">
            <div class="card-header  bg-warning">
            SET the Number OF Extra Meal 
            </div>
           
            <div class="card-block">
            <form class="form-inline" acton="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <div class="col-md-12">
                  
                <select class="custom-select" name="select_input">
                    <option value="1"> 1</option>
                    <option value="2"> 2</option>
                    <option value="3"> 3</option>
                    <option value="4"> 4</option>
                    <option value="5"> 5</option>
                    <option value="6"> 6</option>
                    <option value="7"> 7</option>
                    <option value="8"> 8</option>
                    <option value="9"> 9</option>
                    <option value="10"> 10</option>
                    <option value="11"> 11</option>
                    <option value="12"> 12</option>
                </select>
                </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="sub_btn" class="btn btn-primary"> Update</button>
                    </div>
            </form>
        </div>
            <?php
            if(isset($_POST['sub_btn']))
                $_SESSION['extravariable']=$_POST['select_input'];
            else
                $_SESSION['extravariable']=1;
            
            ?>
            <div class="card-footer">
            Current Number Of Extra Meal = &nbsp;<?php echo $_SESSION['extravariable'];?>
            </div>
            </div><br>
            </div>
            <div class="col-md-8">
                 <div class="container-fluid">
                <ul>
                    <li> <a href="../index"> Go To Login Page.</a></li><br>
                     <li> <a href="../viewall"> View All Borders Calender of &nbsp;<?php echo date('F-Y');?>.Till date</a></li><br>
                    <li> <a href="../viewallguest"> View All Border's Guest Calender of &nbsp;<?php echo date('F-Y');?>.Till date</a></li><br>
                    <li><a href="../managerview"> View Todays Meal info </a></li>
                     </ul>
                </div>
                 </div>
            
        </div>
            
      <div class="card ">
      <div class="card-heading text-white bg-success text-center">
         List Of All borders Registered.. 
      </div>
          <div class="card-block">
             
              <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>
                        sl_no
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email ID
                    </th> 
					<th>
					Phone Numbers
					</th>
                    <th>
                        Action buttons
                    </th>
                    <th>
                        Current Status
                    </th>
                    </tr>
                </thead>
                  <tbody>
                       <?php
              $sql="SELECT u.*,m.* FROM userinfo u, meal_status m WHERE u.id=m.id AND u.approval='approved'";
              $res=mysqli_query($con,$sql);
              while($row=mysqli_fetch_assoc($res))
              {
                  $status=$row['status'];
                  $Status=$row['Status'];
				  $phone=$row['phone'];
              ?>
                  <tr>
                      <td class="center"> <?php echo $row['id'];?></td>
                      <td class="center"> <?php echo $row['name'];?></td>
                      <td class="center"> <?php echo $row['email'];?></td>
					  <td class="center"> <?php echo $row['phone'];?></td>
                      <td class="">
                          <?php
                            if($status=="activated")
                            {
                            ?>
                  
                          <a class="btn btn-danger" href="admin_action.php?id=<?php echo $row['id'];?>&name=<?php echo $row['name'];?>&action=disable&phone=<?php echo $row['phone'];?>"><b>Disable Account and meal off</b></a>
                          <?php
                            }
                                else if($status=="pending")
                                {
                            ?>
                          &nbsp; &nbsp; &nbsp;<a class="btn btn-success" href="admin_action.php?id=<?php echo $row['id'];?>&name=<?php echo $row['name'];?>&action=pending&phone=<?php echo $row['phone'];?>"> Activate User</a>
                      <?php
                                }
                            else if($status=="disabled")
                            {
                                
                        ?>
                      &nbsp; &nbsp; &nbsp;<a class="btn btn-primary" href="admin_action.php?id=<?php echo $row['id'];?>&name=<?php echo $row['name'];?>&action=reenable&phone=<?php echo $row['phone'];?>"> Re Enable Account and Meal on</a></td>
                      <?php
                            }
                      ?>
                      <td class="center">
                      <?php
                  if($Status=="ON")
                  {
                    ?>
                          <div class="text text-success"><b>ON and Account is Active.!! <span class="fa fa-check fa-fw"></span></b></div>
                          <?php
                  }
                  else if($Status=="OFF")
                  {
                      ?>
                          <div class="text text-danger"> <b>Meal is Currently Off..!! <span class="fa fa-times fa-fw"></span></b></div>  
                          <?php
                  }
                      ?>
                      </td>
                  </tr>
                       <?php
              }
              ?>
                     
                  </tbody>
              </table>
              </div>
             
          </div>
           <div class="panel-footer">
               
          </div>
      </div>
      </div>
      
      
      
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>
