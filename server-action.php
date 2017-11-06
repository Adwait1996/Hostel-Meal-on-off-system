<?php
include_once "dbconfig/dbconfig.php";
date_default_timezone_set("Asia/Kolkata");
error_reporting(0);
?>

<?php

//definig time
$ctime=date('Gis');
//MORNING LIMIT STARTS
$m_start_time=strtotime("00:00:00");
$m_start=date('Gis',$m_start_time);
//MORNING TIME LIMIT ENDS
$m_end_time=strtotime("08:00:00");
$m_end=date('Gis',$m_end_time);
//NIGHT LIMIT STARTS
$n_start_time=strtotime("08:33:00");
$n_start=date('Gis',$n_start_time);
//MORNING TIME LIMIT ENDS
$n_end_time=strtotime("23:50:00");
$n_end=date('Gis',$n_end_time);
//creating a dynamic table 

$c=date('d-m-y');
$d= $c ."M";
$e=$c."N";
$f=$c."M(G)";
$g=$c."N(G)";
$month=date('F-Y');

$sql1="CREATE TABLE IF NOT EXISTS `msbhawan`.`$month`( `id` INT(10) NOT NULL AUTO_INCREMENT , `name` VARCHAR(55) NOT NULL,UNIQUE (`id`)) ENGINE = MYISAM";
$res1=mysqli_query($con,$sql1);

$sql="ALTER TABLE `$month` ADD `$d` VARCHAR(55) NOT NULL , ADD `$e` VARCHAR(55) NOT NULL, ADD `$f` VARCHAR(55) NOT NULL DEFAULT  'OFF0', ADD `$g` VARCHAR(55) NOT NULL DEFAULT  'OFF0'";
$res=mysqli_query($con,$sql);


$sql2="SELECT *FROM userinfo";
$res2=mysqli_query($con,$sql2);
while($row1=mysqli_fetch_assoc($res2))
{
$name1=$row1['name'];
   $id=$row1['id'];
    $approval=$row1['approval'];
        if($approval=="approved")
        {
$sql4="INSERT INTO `$month` (id,name) VALUES('$id','$name1') ON DUPLICATE KEY UPDATE id=id";
$res4=mysqli_query($con,$sql4);
        }
}
// Fetching the data of Each User With id---------------------------------------------------------------------------
for($i=1;$i<100;$i++)
{
    
    
    $sql="SELECT *FROM meal_status WHERE id='$i'";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res)==1)
    {
        while($row=mysqli_fetch_assoc($res))
        {
            //FETCHING RECORDS FROM meal_status TABLE----------------------------------------------------
            $status=$row['Status'];
            $status_g=$row['Status_g'];
            $From_date=$row['From_date'];
            $mn=$row['mn'];
            $g_num=$row['guest_num'];
            $From_date_g=$row['From_date_g'];
            $mn_g=$row['mn_g'];
            $guest_num=$row['guest_num'];
            
            //USELESS CODE STARTS-------------------------------------------------------------------------------
         if($mn=="Morning")
         {
             $vartime="00:00:00";
             $dtime=date('Gis',strtotime($vartime));
            
         }
            else if($mn=="Night")
            {
               $vartime="11:00:00";
               $dtime=date('Gis',strtotime($vartime));
                
            
            }
            if($mn_g=="Morning")
            {
               $vartime="00:00:00";
               $dtime_g=date('Gis',strtotime($vartime)); 
            }
            else if($mn_g=="Night")
            {
               $vartime="11:00:00";
               $dtime_g=date('Gis',strtotime($vartime)); 
            }
            //USELESS CODE ENDS-------------------------------------------------------------------------------------
            
                //BORDERS TIME AND DATE
                $live=strtotime(date('d-m-Y'));  //LIVE DATE  
                $From_date1=str_replace('/','-',$From_date);
                $time=strtotime($From_date1);
                $date=strtotime(date('d-m-Y',$time));
                //guest TIME AND DATE
                $From_date2=str_replace('/','-',$From_date_g);
                $time1=strtotime($From_date2);
                $date1=strtotime(date('d-m-Y',$time1));
           
                
    //borders---------------------------------------------------------------------------------------------------------   
            
              if($live<$date && $status=="ON" &&$ctime<=$m_end)
                {
                
                        $sql="UPDATE `$month`SET`$d`='OFF' WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
                }
				else if($live<$date && $status=="ON" &&$ctime>$m_end)
				{
					    $sql="UPDATE `$month`SET`$e`='OFF' WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
				}
                else if($live<$date && $status=="OFF" &&$ctime<=$m_end)
                {
                       $sql="UPDATE `$month`SET`$d`='ON' WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
                    
                }   
                 else if($live<$date && $status=="OFF" &&$ctime>$m_end)
				 {
					$sql="UPDATE `$month`SET `$e`='ON' WHERE id='$i'";
                        $res=mysqli_query($con,$sql); 
					 
				 }					 
                        
                else if($live==$date && $mn=="Morning" && $status=="ON")
                {
                    
                        $sql="UPDATE `$month`SET`$d`='ON',`$e`='ON' WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
                        
                }
                else if($live==$date && $mn=="Morning" && $status=="OFF")
                {
                
                            $sql="UPDATE `$month`SET`$d`='OFF',`$e`='OFF' WHERE id='$i'";
                                $res=mysqli_query($con,$sql);
                    
                }
                        else if ($live==$date && $mn=="Night" && $status=="ON")
                        {
                    
                                $sql="UPDATE `$month`SET`$e`='ON' WHERE id='$i'";
                                $res=mysqli_query($con,$sql);
                
                        }
                        else if($live==$date && $mn=="Night" && $status=="OFF")
                        {
                        
                                    $sql="UPDATE `$month`SET`$e`='OFF' WHERE id='$i'";
                                    $res=mysqli_query($con,$sql);
                
                        }
                    else if($live>$date && $status=="ON")
                    {
                        $sql="UPDATE `$month`SET`$d`='ON',`$e`='ON' WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
                    }
                    else if($live>$date && $status=="OFF")
                    {
                       $sql="UPDATE `$month`SET`$d`='OFF',`$e`='OFF'WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
    
                    }
            //guest-------------------------------------------------------------------------------------------------------
                 
                if($live<$date1 && $status_g=="ON" && $ctime<=$m_end)
                {
                        $ds="OFF".$guest_num;
                        $sql="UPDATE `$month`SET`$f`='$ds' WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
                }
				else if($live<$date1 && $status_g=="ON" && $ctime>$m_end)
				{
					    $ds="OFF".$guest_num;
                        $sql="UPDATE `$month`SET`$g`='$ds' WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
				}
                else if($live<$date1 && $status_g=="OFF" &&$ctime<=$m_end )
                {
                       $ds="ON".$guest_num;
                       $sql="UPDATE `$month`SET`$f`='$ds' WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
                    
                }
				else if($live<$date1 && $status_g=="OFF" &&$ctime>$m_end )
				{
					    $ds="ON".$guest_num;
                        $sql="UPDATE `$month`SET`$g`='$ds' WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
				}
            
                   else if($live==$date1 && $mn_g=="Morning" && $status_g=="ON")
                {
                         $ds="ON".$guest_num;
                        $sql="UPDATE `$month`SET`$f`='$ds',`$g`='$ds' WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
                        
                }
                else if($live==$date1 && $mn_g=="Morning" && $status_g=="OFF")
                {
                             $ds="OFF".$guest_num;
                            $sql="UPDATE `$month`SET`$f`='$ds',`$g`='$ds' WHERE id='$i'";
                                $res=mysqli_query($con,$sql);
                    
                }
                        else if ($live==$date1 && $mn_g=="Night" && $status_g=="ON")
                        {
                                $ds="ON".$guest_num;
                                $sql="UPDATE `$month`SET`$g`='$ds' WHERE id='$i'";
                                $res=mysqli_query($con,$sql);
                
                        }
                        else if($live==$date1 && $mn_g=="Night" && $status_g=="OFF")
                        {
                            $ds="OFF".$guest_num;
                        
                                    $sql="UPDATE `$month`SET`$g`='$ds' WHERE id='$i'";
                                    $res=mysqli_query($con,$sql);
                
                        }
                    else if($live>$date1 && $status_g=="ON")
                    {
                        $ds="ON".$guest_num;
                        $sql="UPDATE `$month`SET`$f`='$ds',`$g`='$ds' WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
                    }
                    else if($live>$date1 && $status_g=="OFF")
                    {
                       $ds="OFF".$guest_num;
                       $sql="UPDATE `$month`SET`$f`='$ds',`$g`='$ds' WHERE id='$i'";
                        $res=mysqli_query($con,$sql);
    
                    }
            
                    //END OF LOGIC
            
                }
        //END OF WHILE LOOP
     }
    //END OF MYSQLI_NUM_ROWS=1
        
    }
//END OF FOR LOOP FOR 1 TO 100
//WHOLE CODE ENDS----------------------------------------------------------------------------------------------------------
?>



