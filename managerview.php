<?php
include_once"dbconfig/dbconfig.php";
date_default_timezone_set("Asia/Kolkata");
include_once "server-action.php";
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
                                <img alt="Bootstrap Image Preview" src="images/mylogo1.png"  height="100px" width="100px"class="img-rounded">
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
                        <a class="navbar-brand" href="#">MS Bhawan</a>

                        <!-- Links -->
                        <div class="collapse navbar-collapse" id="nav-content">   
                        <ul class="navbar-nav">
                        <li class="nav-item">
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#smallShoes">
                         About the developer
                        </button>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="homepage">Go To HomePage</a>
                        </li>
                            <li class="nav-item">
                        <a class="nav-link" href="index">Go To Login Page</a>
                        </li>
                            <li class="nav-item">
                        <a class="nav-link" href="registeration">Go To Registration Page</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        Quick Link
                        </a>
                        <div class="dropdown-menu" aria-labelledby="Preview">
                        <a class="dropdown-item" href="viewall"> View All Border Calender</a>
                        <a class="dropdown-item" href="viewallguest">View All Guests Calender</a>
                        </div>
                        </li>
                        </ul>
                        </div>
                    </nav>
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
            </div>
      <div class="container-fluid">
      <div class="card">
      <div class="card-heading bg-success text-white text-center">
          <h4>Today's Information.. of meal on-off.</h4>
          
          </div>
          <div class="card-block">
              <h5> <?php echo date('d/m/Y');?> &nbsp;&nbsp;</h5>
              <div class="table-responsive">
              <table class=" table table-hover table-striped table-bordered">
                  <thead>
                  <tr>
                      <th>Sl_no</th>
                      <th>Name</th>
                      <th>Meal_status <br><span class="badge badge-success"> M</span> &nbsp; &nbsp; &nbsp;<span class="badge badge-warning"> N</span>
                      </th>
                      <th>Guest_Info<br><span class="badge badge-success"> M</span> &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;<span class="badge badge-warning"> N</span>
                      </th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      $month=date('F-Y');
                      $index1=date('d-m-y')."M";
                      $index2=date('d-m-y')."N";
                      $index3=date('d-m-y')."M(G)";
                      $index4=date('d-m-y')."N(G)";
                      $sql="SELECT id, name,`$index1` ,`$index2`,`$index3`,`$index4` FROM `$month` ";
                      $res=mysqli_query($con,$sql);
                      
                      $count_mor=0;
                      $count_nig=0;
                      $count_mor_g=0;
                      $count_nig_g=0;
                      
                      $extra=1;
                      
                      if(!isset($_SESSION['extravariable']) || empty ($_SESSION['extravariable']))
                      {
                          $extra=1;
                          $_SESSION['extravariable']=$extra;
                      }
                      else
                          $extra=$_SESSION['extravariable'];
                      
                      while($row=mysqli_fetch_assoc($res))
                      {
                          $id=$row['id'];
                          $name=$row['name'];
                          $morn=$row[$index1];
                          $nig=$row[$index2];
                          $mor_g=$row[$index3];
                          $nig_g=$row[$index4];
                          if($morn=="")
                              $morn="NOT AVAILABLE";
                          if($nig=="")
                              $nig="NOT AVAILABLE";
                          if($mor_g=="")
                              $mor_g="NOT AVAILABLE 0";
                          if($nig_g=="")
                           $nig_g="NOT AVAILABLE 0";
                          
                          
                          if($morn=="ON")
                              $count_mor=$count_mor+1;
                          if($nig=="ON")
                              $count_nig=$count_nig+1;
                          
                          preg_match_all('/^([^\d]+)(\d+)/', $mor_g, $match);

                         $textm = $match[1][0];
                         $numm =  $match[2][0];
                          if($textm=="ON")
                              $count_mor_g=$count_mor_g+$numm;
                          
                           preg_match_all('/^([^\d]+)(\d+)/', $nig_g, $match_n);

                         $textn = $match_n[1][0];
                         $numn =  $match_n[2][0];
                          if($textn=="ON")
                              $count_nig_g=$count_nig_g+$numn;
                              
                      ?>
                  <tr>
                      <td> <?php echo $id;?></td>
                      <td> <?php echo $name;?></td>
                      <td>  <div class="badge badge-success"><?php echo $morn;?></div>&nbsp; &nbsp;<div class="badge badge-warning"> <?php echo $nig;?></div> </td>
                      
                      
                      <td> <div class="badge badge-success"><?php echo $textm;?></div>
                          <div class="badge badge-pill badge-success"><?php echo $numm;;?>
                          </div>&nbsp; &nbsp;<div class="badge badge-warning"> <?php echo $textn;?></div>
                          <div class="badge badge-pill badge-warning"> <?php echo $numn;?></div></td>
                     
                      
                  </tr>
                      <?php
                      }
                      ?>
                  </tbody>
              </table>
                  
              </div>
              <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
              <div class="table-responsive">
    
              <table class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>
                      Time
                      </th>
                      <th>
                      Borders
                      </th>
                      <th>
                      Guest(s)
                      </th>
                      <th>
                          Extra
                      </th>
                      <th>
                      Total meal
                      </th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td> Morning</td> <td><?php echo $count_mor;?></td><td><?php echo $count_mor_g;?></td><td><?php echo $extra;?></td> <td> <?php echo $count_mor_g+$count_mor+$extra;?></td>   
                  </tr>
                      <tr>
                      <td> Night </td> <td><?php  echo $count_nig;?></td><td><?php echo $count_nig_g;?></td><td><?php echo $extra ;?></td> <td><?php echo $count_nig_g+$count_nig+$extra; ?></td>
                      </tr>
                  
                  </tbody>
                  
              </table>
              </div>
                  </div>
              </div>
          </div>
          <div class="card-footer">
          </div>
      </div>
      </div>
       <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>
</html>