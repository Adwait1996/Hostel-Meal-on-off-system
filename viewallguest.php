<?php
include_once"dbconfig/dbconfig.php";
date_default_timezone_set("Asia/Kolkata");
include_once "server-action.php";
error_reporting(0);
?>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
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
<link href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.bootstrap4.min.css" rel="stylesheet"/>
    <style>
 #span1,#span2
        {
            width: 25px;
            margin: 2px;
        }
    </style>
   
</head>

<body>
    <div class="jumbotron"><h2> <?php echo date('F-Y');?><small> guest table</small></h2></div>
    <div class="container-fluid">
    <ul class="list-group">
    <li class="list-group-item"> <a href="/"> Go To Login Page</a></li>   
        <li class="list-group-item" > <a href="viewall"> View All Border's Calender</a></li>  
        <li class="list-group-item"> <a href="managerview"> View Todays Calender</a></li>  
        <li class="list-group-item" > <a href="registeration"> Go To Registration Page</a></li>  
    </ul>
    </div>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card text-center">
                        <div class="card-header bg-warning">
                             Guests Table
                        </div>
                        <div class="card-block" style="margin-top: 1%;">
                            
                            <div class="table-responsive">
                             <div class="col-md-12" style="overflow-x: auto">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                   
                                    <thead>
                                        <tr>
                                            <th>Sl_no</th>
                                            <th>Borders_Name</th>
                                            
                                            <?php
                                            for($col=1;$col<=date('d');$col++)
                                            {
                                            ?>
                                            <th><?php echo "DAY___0".$col."&nbsp;"; echo"<br>"; echo"M &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N"?></th>
                                             <?php
                                            }
                                            ?>
                                           
                                           <th> total__counts<br> &nbsp;M&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; T </th>
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
                                            <tr class="table-success">
                                            <td class="center"> <?php echo $id;?></td>
                                            <td cass="center"> <?php echo $name;?></td>
                                            <?php
                                                $mci=0;
                                                $nci=0;
                                            for($col=1;$col<=date('d');$col++)
                                            {
                                                if($col<10)
                                                    $col="0".$col;
                                               
                                                $monthd=date('m');
                                                $year=date('y');
                                                $str1=$col.'-'.$monthd.'-'.$year.'M(G)';
                                                    ${"statusm$col"}=$row[$str1];
                                                    if(${"statusm$col"}=="")
                                                       ${"statusm$col"}="OFF0";
                                                    preg_match_all('/^([^\d]+)(\d+)/', ${"statusm$col"}, $match);

                                                    ${"textm$col"} = $match[1][0];
                                                    ${"numm$col"} =  $match[2][0];
                                                    $str3=$col.'-'.$monthd.'-'.$year.'N(G)';
                                                    ${"statusn$col"}=$row[$str3];
                                                   if(${"statusn$col"}=="")
                                                       ${"statusn$col"}="OFF0";
                                                    preg_match_all('/^([^\d]+)(\d+)/', ${"statusn$col"}, $match);
                                                     
                                                    ${"textn$col"} = $match[1][0];
                                                    ${"numn$col"} =  $match[2][0];
                                                   
                                                
                                                
                                                    if(${"textm$col"}=="ON")
                                                    {
                                                        
                                                       $mci=$mci+${"numm$col"};
                                                    }
                                                    if(${"textn$col"}=="ON")
                                                    {
                                                       $nci=$nci+${"numn$col"};
                                                    }
                                                
                                                
                                            ?>
                                           <td><div><div id="span1" class="badge badge-success"><?php echo ${"textm$col"};?></div><div id="span2" class="badge badge-warning"><?php echo ${"textn$col"};?></div></div><div><div id="span1" class="badge badge-success"><?php echo ${"numm$col"};?></div><div id="span2" class="badge badge-warning"><?php echo ${"numn$col"};?></div></div></td>
                                             <?php
                                            }            
                                                
                                        
                                      
                                            ?>
                                             <td> <div><div id="span1" class="badge badge-success"><?php echo $mci;?></div><div id="span2" class="badge badge-warning"><?php echo $nci;?></div><div id="span2" class="badge badge-primary"><?php echo $nci+$mci;?></div></div></td> 
                                        </tr>
                                        
                                        <?php
                                            }
                                        ?>
                                        
                                        <tr class="bg-light">
                                            <td>xxx</td><td> Daily counts</td>
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
                                                $str1=$j.'-'.$monthd.'-'.$year.'M(G)';
                                                    ${"statusm$j"}=$row1[$str1];
                                                     preg_match_all('/^([^\d]+)(\d+)/', ${"statusm$j"}, $match);

                                                    ${"textm$j"} = $match[1][0];
                                                    ${"numm$j"} =  $match[2][0];
                                                    $str3=$j.'-'.$monthd.'-'.$year.'N(G)';
                                                     preg_match_all('/^([^\d]+)(\d+)/', ${"statusn$j"}, $match);

                                                    ${"textn$j"} = $match[1][0];
                                                    ${"numn$j"} =  $match[2][0];
                                                    ${"statusn$j"}=$row1[$str3];
                                                    if(${"textm$j"}=="ON")
                                                      ${"mc$j"}=${"mc$j"}+${"numm$j"};
                                                    if(${"textn$j"}=="ON")
                                                      ${"nc$j"}=${"nc$j"}+${"numn$j"};
                                            }
                                            ?>
                                            <td><div><div id="span1" class="badge badge-pill badge-danger"><?php echo ${"mc$j"};?></div><div id="span2" class="badge badge-pill badge-info"><?php echo ${"nc$j"};?></div></div></td>
                                            <?php
                                        }
                                    }
                                        ?>
                                            <td> lol</td>
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