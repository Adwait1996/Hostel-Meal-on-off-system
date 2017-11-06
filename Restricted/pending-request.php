<?php
//include "microProtector.php";

include_once"../dbconfig/dbconfig.php";
date_default_timezone_set("Asia/Kolkata");
session_start();
$count=0;
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
                        <li class="nav-item">
                        <a class="nav-link" href="pending-request">Pending Requests <span class="badge badge-pill badge-danger" id="count"></span></a>
                        </li>
                            <li class="nav-item">
                        <a class="nav-link" href="admin_user_control">Back to Main LIST</a>
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
      
      <div class="card ">
      <div class="card-heading text-dark bg-warning text-center">
         Waiting for approval
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
                    <th colspan="2">
                        Action buttons
                    </th>
                    </tr>
                </thead>
                  <tbody>
                      <?php
              $sql="SELECT * FROM userinfo WHERE approval='not approved'";
              $res=mysqli_query($con,$sql);
              while($row=mysqli_fetch_assoc($res))
              {
                  $status=$row['status'];
				  $phone=$row['phone'];
                  $name=$row['name'];
                  $count++;
              ?>
                  <tr>
                      <td class="center"> <?php echo $row['id'];?></td>
                      <td class="center"> <?php echo $row['name'];?></td>
                      <td class="center"> <?php echo $row['email'];?></td>
					  <td class="center"> <?php echo $row['phone'];?></td>
                      <td class="">
                          <a class="btn btn-success" href="pending-action.php?action=approve&id=<?php echo $row['id'];?>&phone=<?php echo $phone;?>"> Approve</a>
                          &nbsp;&nbsp;
                          <a class="btn btn-danger" href="pending-action.php?action=delete&id=<?php echo $row['id'];?>&name=<?php echo $name;?>&phone=<?php echo $phone;?>"> Delete</a>
                      </td>
                      </tr>
                      <?php
              }
                  ?>
                      <script>
                      document.getElementById('count').innerHTML="<?php echo $count;?>";
                      </script>
                  </tbody>
                  </table>
              </div>
          </div>
      </div>
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>