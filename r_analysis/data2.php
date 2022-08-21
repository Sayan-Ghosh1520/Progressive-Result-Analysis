<?php
include 'config.php';
$y_sem2=$_SESSION['y_sem2'];
$table_sem = $y_sem2. "_2_sem";
$table_sub = $y_sem2. "_2_sub";

// $sql1 = mysqli_query($conn,"SELECT date FROM `$table_sem` LIMIT 1;");
//                     while($row = mysqli_fetch_array($sql1)){
//                       $date_1 = $row[0];
//                     }

$sql2 = mysqli_query($conn,"SELECT r_date FROM `$table_sem` LIMIT 1;");
                    while($row = mysqli_fetch_array($sql2)){
                      $date_r_1 = $row[0];
                    }                    

$sql4 = mysqli_query($conn,"SELECT * FROM `$table_sub`");
                      $i = 0; $_1_sub = array();
                     while($row = mysqli_fetch_array($sql4)){
                        $_1_sub[$i] = $row[0];
                        $i++;
                      }
$i = 0; 
$_1_sub_name = array();
$_1_sub_ab = array();
$_1_sub_teacher = array();
while($i < 5){
$sql5 = mysqli_query($conn,"SELECT * FROM `$table_sub` WHERE Sub_code='$_1_sub[$i]'");                   
                      while($row = mysqli_fetch_array($sql5)){
                        $_1_sub_name[$i] = $row[2];
                        $_1_sub_ab[$i] = $row[1];
                        $_1_sub_teacher[$i] = $row[3];
                        $i++;
                      }
                    }
                    
$sql6 = mysqli_query($conn,"SELECT AVG(TOTAL * 100.0/ 1000) as 'AVERAGE' FROM `$table_sem`;");
                    while($row = mysqli_fetch_array($sql6)){
                      $avg_per_1 = $row['AVERAGE'];
                    }
  
$sql7 = mysqli_query($conn,"SELECT COUNT(STATUS) FROM `$table_sem` WHERE STATUS = 'PASS';");
                        while($row = mysqli_fetch_array($sql7)){
                          $pass_1 = $row['COUNT(STATUS)'];
                        }
                        
$sql8 = mysqli_query($conn,"SELECT COUNT(STATUS) FROM `$table_sem` WHERE STATUS = 'FAIL';");
                        while($row = mysqli_fetch_array($sql8)){
                          $fail_1 = $row['COUNT(STATUS)'];
                        }

$count = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem`;");
                        while($row = mysqli_fetch_array($count)){
                          $n_count = $row['COUNT(*)'];
                        }
 
 $pp = round(($pass_1 * 100)/$n_count,2);  
 $fp = round(($fail_1 * 100)/$n_count,2);                     
 
 
 $h_sub = mysqli_query($conn,"SELECT MAX($_1_sub[0]),MAX($_1_sub[1]),MAX($_1_sub[2]),MAX($_1_sub[3]),MAX($_1_sub[4]),MAX(TOTAL) from `$table_sem` where $_1_sub[0] != 'ABS' AND $_1_sub[1] != 'ABS' AND $_1_sub[2] != 'ABS' AND $_1_sub[3] != 'ABS' AND $_1_sub[4] != 'ABS'");                       
                        while($row = mysqli_fetch_array($h_sub)){
                       $h_sub_1 = $row[0];
                       $h_sub_2 = $row[1];
                       $h_sub_3 = $row[2];
                       $h_sub_4 = $row[3];
                       $h_sub_5 = $row[4];
                       $h_tot = $row[5];
                        }
 
 $a_sub = mysqli_query($conn,"SELECT AVG($_1_sub[0]),AVG($_1_sub[1]),AVG($_1_sub[2]),AVG($_1_sub[3]),AVG($_1_sub[4]),AVG(TOTAL) from `$table_sem` where $_1_sub[0] != 'ABS' AND $_1_sub[1] != 'ABS' AND $_1_sub[2] != 'ABS' AND $_1_sub[3] != 'ABS' AND $_1_sub[4] != 'ABS'");                       
                        while($row = mysqli_fetch_array($a_sub)){
                       $a_sub_1 = $row[0];
                       $a_sub_2 = $row[1];
                       $a_sub_3 = $row[2];
                       $a_sub_4 = $row[3];
                       $a_sub_5 = $row[4];
                       $a_tot = $row[5];
                        }  
                          
 $l_sub = mysqli_query($conn,"SELECT MIN($_1_sub[0]),MIN($_1_sub[1]),MIN($_1_sub[2]),MIN($_1_sub[3]),MIN($_1_sub[4]),MIN(TOTAL) from `$table_sem` where $_1_sub[0] != 'ABS' AND $_1_sub[1] != 'ABS' AND $_1_sub[2] != 'ABS' AND $_1_sub[3] != 'ABS' AND $_1_sub[4] != 'ABS'");                       
                        while($row = mysqli_fetch_array($l_sub)){
                       $l_sub_1 = $row[0];
                       $l_sub_2 = $row[1];
                       $l_sub_3 = $row[2];
                       $l_sub_4 = $row[3];
                       $l_sub_5 = $row[4];
                       $l_tot = $row[5];
                        } 
                       
$top = mysqli_query($conn,"SELECT * FROM `$table_sem` WHERE TOTAL=(select max(TOTAL) from `$table_sem`);");                        
                        while($row = mysqli_fetch_array($top)){  
                            $topper = $row['NAME'];
                            $spi = $row['SPI'];
                        } 

// ----------SUBJECT 1---------------
$pass_sub1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[0] >= 33;");                        
                        while($row = mysqli_fetch_array($pass_sub1)){  
                            $n_pass_sub1 = $row[0];
                        }
                        
$pp_sub1 = round(($n_pass_sub1 * 100)/$n_count,2);        

$sql9 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[0] > 75;");                        
                        while($row = mysqli_fetch_array($sql9)){  
                            $n_sub1_above_75 = $row[0];
                        }
                        
$sql10 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[0] <= 75 AND $_1_sub[0] >= 61;");                        
                        while($row = mysqli_fetch_array($sql10)){  
                            $n_sub1_btw_61_75 = $row[0];
                        }   
                        
$sql11 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[0] <= 60 AND $_1_sub[0] >= 51;");                        
                        while($row = mysqli_fetch_array($sql11)){  
                            $n_sub1_btw_51_60 = $row[0];
                        }
                        
$sql12 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[0] <= 50 AND $_1_sub[0] >= 35;");                        
                        while($row = mysqli_fetch_array($sql12)){  
                            $n_sub1_btw_35_50 = $row[0];
                        }
                        
$sql13 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[0] < 35;");                        
                        while($row = mysqli_fetch_array($sql13)){  
                            $n_sub1_below_35 = $row[0];
                        } 
                        
                        
                        
// ----------SUBJECT 2---------------
$pass_sub2 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[1] >= 33;");                        
                        while($row = mysqli_fetch_array($pass_sub2)){  
                            $n_pass_sub2 = $row[0];
                        }
                        
$pp_sub2 = round(($n_pass_sub2 * 100)/$n_count,2);        

$sql15 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[1] > 75;");                        
                        while($row = mysqli_fetch_array($sql15)){  
                            $n_sub2_above_75 = $row[0];
                        }
                        
$sql16 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[1] <= 75 AND $_1_sub[1] >= 61;");                        
                        while($row = mysqli_fetch_array($sql16)){  
                            $n_sub2_btw_61_75 = $row[0];
                        }   
                        
$sql17 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[1] <= 60 AND $_1_sub[1] >= 51;");                        
                        while($row = mysqli_fetch_array($sql17)){  
                            $n_sub2_btw_51_60 = $row[0];
                        }
                        
$sql18 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[1] <= 50 AND $_1_sub[1] >= 35;");                        
                        while($row = mysqli_fetch_array($sql18)){  
                            $n_sub2_btw_35_50 = $row[0];
                        }
                        
$sql19 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[1] < 35;");                        
                        while($row = mysqli_fetch_array($sql19)){ 
                            $n_sub2_below_35 = $row[0];
                        }
                        
   
                        
// ----------SUBJECT 3---------------
$pass_sub3 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[2] >= 33;");                        
                        while($row = mysqli_fetch_array($pass_sub3)){  
                            $n_pass_sub3 = $row[0];
                        }
                        
$pp_sub3 = round(($n_pass_sub3 * 100)/$n_count,2);        

$sql21 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[2] > 75;");                        
                        while($row = mysqli_fetch_array($sql21)){  
                            $n_sub3_above_75 = $row[0];
                        }
                        
$sql22 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[2] <= 75 AND $_1_sub[2] >= 61;");                        
                        while($row = mysqli_fetch_array($sql22)){  
                            $n_sub3_btw_61_75 = $row[0];
                        }   
                        
$sql23 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[2] <= 60 AND $_1_sub[2] >= 51;");                        
                        while($row = mysqli_fetch_array($sql23)){  
                            $n_sub3_btw_51_60 = $row[0];
                        }
                        
$sql24 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[2] <= 50 AND $_1_sub[2] >= 35;");                        
                        while($row = mysqli_fetch_array($sql24)){  
                            $n_sub3_btw_35_50 = $row[0];
                        }
                        
$sql25 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[2] < 35;");                        
                        while($row = mysqli_fetch_array($sql25)){  
                            $n_sub3_below_35 = $row[0];
                        } 
                        
$sql26 = mysqli_query($conn,"SELECT * FROM `$table_sem` WHERE $_1_sub[2]=(select MAX($_1_sub[2]) from `$table_sem`);");                        
                        while($row = mysqli_fetch_array($sql26)){  
                            $topper_sub3 = $row['NAME'];
                            $m_sub3 = $row[6];
                        }   
                      
                        
// ----------SUBJECT 4---------------
$pass_sub4 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[3] >= 33;");                        
                        while($row = mysqli_fetch_array($pass_sub4)){  
                            $n_pass_sub4 = $row[0];
                        }
                        
$pp_sub4 = round(($n_pass_sub4 * 100)/$n_count,2);        

$sql27 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[3] > 75;");                        
                        while($row = mysqli_fetch_array($sql27)){  
                            $n_sub4_above_75 = $row[0];
                        }
                        
$sql28 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[3] <= 75 AND $_1_sub[3] >= 61;");                        
                        while($row = mysqli_fetch_array($sql28)){  
                            $n_sub4_btw_61_75 = $row[0];
                        }   
                        
$sql29 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[3] <= 60 AND $_1_sub[3] >= 51;");                        
                        while($row = mysqli_fetch_array($sql29)){  
                            $n_sub4_btw_51_60 = $row[0];
                        }
                        
$sql30 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[3] <= 50 AND $_1_sub[3] >= 35;");                        
                        while($row = mysqli_fetch_array($sql30)){  
                            $n_sub4_btw_35_50 = $row[0];
                        }
                        
$sql31 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[3] < 35;");                        
                        while($row = mysqli_fetch_array($sql31)){  
                            $n_sub4_below_35 = $row[0];
                        } 
                        
 
                        
                        
// ----------SUBJECT 5---------------
$pass_sub5 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[4] >= 33;");                        
                        while($row = mysqli_fetch_array($pass_sub5)){  
                            $n_pass_sub5 = $row[0];
                        }
                        
$pp_sub5 = round(($n_pass_sub5 * 100)/$n_count,2);        

$sql33 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[4] > 75;");                        
                        while($row = mysqli_fetch_array($sql33)){  
                            $n_sub5_above_75 = $row[0];
                        }
                        
$sql34 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[4] <= 75 AND $_1_sub[4] >= 61;");                        
                        while($row = mysqli_fetch_array($sql34)){  
                            $n_sub5_btw_61_75 = $row[0];
                        }   
                        
$sql35 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[4] <= 60 AND $_1_sub[4] >= 51;");                        
                        while($row = mysqli_fetch_array($sql35)){  
                            $n_sub5_btw_51_60 = $row[0];
                        }
                        
$sql36 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[4] <= 50 AND $_1_sub[4] >= 35;");                        
                        while($row = mysqli_fetch_array($sql36)){  
                            $n_sub5_btw_35_50 = $row[0];
                        }
                        
$sql37 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem` WHERE $_1_sub[4] < 35;");                        
                        while($row = mysqli_fetch_array($sql37)){  
                            $n_sub5_below_35 = $row[0];
                        } 
                       
     
                       
//----------------------Teachers------------------------------------
$sql39 = mysqli_query($conn,"SELECT * FROM `$table_sub` WHERE Sub_code = '$_1_sub[0]';");                        
                        while($row = mysqli_fetch_array($sql39)){  
                          $_1_sub1_teacher = $row[3];
                        }  
                        
$sql40 = mysqli_query($conn,"SELECT * FROM `$table_sub` WHERE Sub_code = '$_1_sub[1]';");                        
                        while($row = mysqli_fetch_array($sql40)){  
                          $_1_sub2_teacher = $row[3];
                        }
                        
$sql41 = mysqli_query($conn,"SELECT * FROM `$table_sub` WHERE Sub_code = '$_1_sub[2]';");                        
                        while($row = mysqli_fetch_array($sql41)){  
                          $_1_sub3_teacher = $row[3];
                        }
                        
$sql42 = mysqli_query($conn,"SELECT * FROM `$table_sub` WHERE Sub_code = '$_1_sub[3]';");                        
                        while($row = mysqli_fetch_array($sql42)){  
                          $_1_sub4_teacher = $row[3];
                        }

$sql43 = mysqli_query($conn,"SELECT * FROM `$table_sub` WHERE Sub_code = '$_1_sub[4]';");                        
                        while($row = mysqli_fetch_array($sql43)){  
                          $_1_sub5_teacher = $row[3];
                        }
?>