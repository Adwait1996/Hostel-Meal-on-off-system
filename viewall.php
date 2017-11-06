<?php
include_once"dbconfig/dbconfig.php";
date_default_timezone_set("Asia/Kolkata");
include_once"server-action.php";
error_reporting(0);
?>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MS Bhawan Borders Calender</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.bootstrap4.min.css" rel="stylesheet"/>
    <style>
 #span1,#span2
        {
            width: 25px;
            margin: 2px;
        }
        .fixediv
        {
          display: none;
        }
        body
        {
            -webkit-user-select: none; /*for safari and android*/
            -moz-user-select: none;   /*for mozilla*/
            -ms-user-select: none; /* for microsoft internet explorer*/
            user-select: none;   /*for chrome*/
        }
</style>
</head>

<body>
    <div class="jumbotron bg-info"><h2> <?php echo date('F-Y');?></h2>
    
    </div>
    <div class="container-fluid">
    <ul class="list-group">
    <li class="list-group-item"> <a href="/"> Go To Login Page</a></li>   
        <li class="list-group-item" > <a href="viewallguest"> View All Guests Calender</a></li>  
        <li class="list-group-item"> <a href="managerview"> View Todays Calender</a></li>  
        <li class="list-group-item" > <a href="registeration"> Go To Registration Page</a></li>  
    </ul>
    </div>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-header text-white bg-success">
                             All Registered Boarders Meal Calender
                        </div>
                        <div class="card-block" style="margin-top: 1%;">
                            
                            <div class="table-responsive">
                             <div class="col-md-12" style="overflow-x: auto">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                   
                                    <thead>
                                        <tr>
                                            
                                            <th>Sl no</th>
                                            <th>Borders_Name</th>
                                            
                                            
                                            <?php
                                            for($col=1;$col<=date('d');$col++)
                                            {
                                            ?>
                                            <th><?php echo "DAY___0".$col."&nbsp;"; echo"<br>"; echo"M &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N"?></th>
                                             <?php
                                            }
                                            ?>
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $month=date('F-Y');
                                            $sql="SELECT *FROM `$month`";
                                            $res=mysqli_query($con,$sql);
                                            if(mysqli_num_rows($res)>0)
                                            {
                                                
                                            while($row=mysqli_fetch_assoc($res))
                                            {
                                                 $id=$row['id'];
                                                $name=$row['name'];
                                               
                                                
                                            ?>
                                            <tr class="table-warning">
                                            
                                            <td class="center"> <?php echo $id;?></td>
                                            <td cass="center"> <?php echo $name;?></td>
                                            
                                            <?php
                                            for($col=1;$col<=date('d');$col++)
                                            {
												if($col<10)
                                                    $col="0".$col;
                                               
                                                $monthd=date('m');
                                                $year=date('y');
                                                $str1=$col.'-'.$monthd.'-'.$year.'M';
                                                    ${"statusm$col"}=$row[$str1];
                                                    $str3=$col.'-'.$monthd.'-'.$year.'N';
                                                    ${"statusn$col"}=$row[$str3];
                                                
                                                   if(${"statusn$col"}=="")
                                                    ${"statusn$col"}="OFF";
                                                   if(${"statusm$col"}=="")
                                                       ${"statusm$col"}="OFF";
                                                
                                            ?>
                                           <td><div><div id="span1" class="badge badge-success"><?php echo ${"statusm$col"};?></div><div id="span2" class="badge badge-warning"><?php echo ${"statusn$col"};?></div></div></td>
                                             <?php
                                            }            
                                                
                                            }
                                      
                                            ?>
                                                </tr>
                                        
                                        <tr class="table-info">
                                            <td>958</td><td> Daily counts</td>
                                        <?php
                                                
                                        for($j=1;$j<=date('d');$j++)
                                        {
											if($j<10)
                                                    $j="0".$j;
                                            ${"mc$j"}=0;
                                            ${"nc$j"}=0;
                                                                                        
                                            $month=date('F-Y');
                                            $sql1="SELECT *FROM `$month`";
                                            $res1=mysqli_query($con,$sql1);
                                            while($row1=mysqli_fetch_assoc($res1))
                                            {
                                                
                                            
                                                $monthd=date('m');
                                                $year=date('y');
                                                $str1=$j.'-'.$monthd.'-'.$year.'M';
                                                    ${"statusm$j"}=$row1[$str1];
                                                    $str3=$j.'-'.$monthd.'-'.$year.'N';
                                                    ${"statusn$j"}=$row1[$str3];
                                                    if(${"statusm$j"}=="ON")
                                                      ${"mc$j"}++;
                                                    if(${"statusn$j"}=="ON")
                                                      ${"nc$j"}++;
                                            }
                                            ?>
                                            <td><div><div id="span1" class="badge badge-pill badge-danger"><?php echo ${"mc$j"};?></div><div id="span2" class="badge badge-pill badge-info"><?php echo ${"nc$j"};?></div></div></td>
                                            <?php
                                        }
                                    }
                                        ?>
                                            </tr>
                                        
                                    </tbody>
                                     
                                </table>
                                    </div>                            
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            
            
            <script src="//code.jquery.com/jquery-1.12.4.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>

        <script>
            $(document).ready(function () {
                 var table = $('#dataTables-example').dataTable( {
        scrollY: true,
            scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            leftColumns: 2
        }
    } );
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    
   
</body>
</html>