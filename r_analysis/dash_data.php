<?php
include 'config.php';

$result = mysqli_query($conn,"SELECT * FROM login_data");
                     while($row = mysqli_fetch_array($result)){
                     $profile = $row['username'];
                      }  

//----------------------------------ODD SEMESTERS---------------------------------------------------------   


$table1 = (date("Y")-1)."_".(date("Y")+3)."_1_sem";
$table3 = (date("Y")-2)."_".(date("Y")+2)."_3_sem";
$table5 = (date("Y")-3)."_".(date("Y")+1)."_5_sem";
$table7 = (date("Y")-4)."_".(date("Y"))."_7_sem";

$sql1 = mysqli_query($conn,"SELECT ROUND(MAX(TOTAL) *100/1000,2) AS HighestMarks FROM $table7;");
                      while($row1 = mysqli_fetch_array($sql1)){
                        $high_7 = $row1['HighestMarks'];
                      }
$sql2 = mysqli_query($conn,"SELECT ROUND(AVG(TOTAL * 100.0/ 1000),2) as 'AVERAGE' FROM $table7;");
                      while($row2 = mysqli_fetch_array($sql2)){
                        $avg_7 = $row2['AVERAGE'];
                      }  
                      $sql3 = mysqli_query($conn,"SELECT ROUND(MIN(TOTAL) *100/1000,2) AS LowestMarks FROM $table7;");
                      while($row3 = mysqli_fetch_array($sql3)){
                        $low_7 = $row3['LowestMarks'];
                      }

$sql4 = mysqli_query($conn,"SELECT ROUND(MAX(TOTAL) *100/1000,2) AS HighestMarks FROM $table5;");
                      while($row1 = mysqli_fetch_array($sql4)){
                        $high_5 = $row1['HighestMarks'];
                      }

$sql5 = mysqli_query($conn,"SELECT ROUND(AVG(TOTAL * 100.0/ 1000),2) as 'AVERAGE' FROM $table5;");
                      while($row2 = mysqli_fetch_array($sql5)){
                        $avg_5 = $row2['AVERAGE'];
                      }

$sql6 = mysqli_query($conn,"SELECT ROUND(MIN(TOTAL) *100/1000,2) AS LowestMarks FROM $table5;");
                      while($row3 = mysqli_fetch_array($sql6)){
                        $low_5 = $row3['LowestMarks'];
                      }

$sql7 = mysqli_query($conn,"SELECT ROUND(MAX(TOTAL) *100/1000,2) AS HighestMarks FROM $table3;");
                      while($row1 = mysqli_fetch_array($sql7)){
                        $high_3 = $row1['HighestMarks'];
                      }

$sql8 = mysqli_query($conn,"SELECT ROUND(AVG(TOTAL * 100.0/ 1000),2) as 'AVERAGE' FROM $table3;");
                      while($row2 = mysqli_fetch_array($sql8)){
                        $avg_3 = $row2['AVERAGE'];
                      }

$sql9 = mysqli_query($conn,"SELECT ROUND(MIN(TOTAL) *100/1000,2) AS LowestMarks FROM $table3;");
                      while($row3 = mysqli_fetch_array($sql9)){
                        $low_3 = $row3['LowestMarks'];
                      }

$sql10 = mysqli_query($conn,"SELECT ROUND(MAX(TOTAL) *100/1000,2) AS HighestMarks FROM $table1;");
                      while($row1 = mysqli_fetch_array($sql10)){
                        $high_1 = $row1['HighestMarks'];
                      }

$sql11 = mysqli_query($conn,"SELECT ROUND(AVG(TOTAL * 100.0/ 1000),2) as 'AVERAGE' FROM $table1;");
                      while($row2 = mysqli_fetch_array($sql11)){
                        $avg_1 = $row2['AVERAGE'];
                      }

$sql12 = mysqli_query($conn,"SELECT ROUND(MIN(TOTAL) *100/1000,2) AS LowestMarks FROM $table1;");
                      while($row3 = mysqli_fetch_array($sql12)){
                        $low_1 = $row3['LowestMarks'];
                      }

$sql13 = mysqli_query($conn,"SELECT AVG(TOTAL * 100.0/ 1000) as 'AVERAGE' FROM $table3;");
                    while($row = mysqli_fetch_array($sql13)){
                      $avg_per_3 = $row['AVERAGE'];
                    }

$sql14 = mysqli_query($conn,"SELECT AVG(TOTAL * 100.0/ 1000) as 'AVERAGE' FROM $table5;");
                        while($row = mysqli_fetch_array($sql14)){
                          $avg_per_5 = $row['AVERAGE'];
                        }

$sql15 = mysqli_query($conn,"SELECT AVG(TOTAL * 100.0/ 1000) as 'AVERAGE' FROM $table7;");
                        while($row = mysqli_fetch_array($sql15)){
                          $avg_per_7 = $row['AVERAGE'];
                        } 

$sql16 = mysqli_query($conn,"SELECT AVG(TOTAL * 100.0/ 1000) as 'AVERAGE' FROM $table1;");
                        while($row = mysqli_fetch_array($sql16)){
                          $avg_per_1 = $row['AVERAGE'];
                        }    



//----------------------------------EVEN SEMESTERS---------------------------------------------------------   

$table2 = (date("Y")-1)."_".(date("Y")+3)."_2_sem";
$table4 = (date("Y")-2)."_".(date("Y")+2)."_4_sem";
$table6 = (date("Y")-3)."_".(date("Y")+1)."_6_sem";      
$table8 = (date("Y")-4)."_".(date("Y"))."_8_sem";        

$sql17 = mysqli_query($conn,"SELECT ROUND(MAX(TOTAL) *100/1000,2) AS HighestMarks FROM $table8;");
                      while($row1 = mysqli_fetch_array($sql17)){
                        $high_8 = $row1['HighestMarks'];
                      }

$sql18 = mysqli_query($conn,"SELECT ROUND(AVG(TOTAL * 100.0/ 1000),2) as 'AVERAGE' FROM $table8;");
                      while($row2 = mysqli_fetch_array($sql18)){
                        $avg_8 = $row2['AVERAGE'];
                      } 

$sql32 = mysqli_query($conn,"SELECT ROUND(MIN(TOTAL) *100/1000,2) AS LowestMarks FROM $table8;");
                      while($row3 = mysqli_fetch_array($sql32)){
                        $low_8 = $row3['LowestMarks'];
                      }

$sql19 = mysqli_query($conn,"SELECT ROUND(MAX(TOTAL) *100/1000,2) AS HighestMarks FROM $table6;");
                      while($row1 = mysqli_fetch_array($sql19)){
                        $high_6 = $row1['HighestMarks'];
                      }

$sql20 = mysqli_query($conn,"SELECT ROUND(AVG(TOTAL * 100.0/ 1000),2) as 'AVERAGE' FROM $table6;");
                      while($row2 = mysqli_fetch_array($sql20)){
                        $avg_6 = $row2['AVERAGE'];
                      }

$sql21 = mysqli_query($conn,"SELECT ROUND(MIN(TOTAL) *100/1000,2) AS LowestMarks FROM $table6;");
                      while($row3 = mysqli_fetch_array($sql21)){
                        $low_6 = $row3['LowestMarks'];
                      }

$sql22 = mysqli_query($conn,"SELECT ROUND(MAX(TOTAL) *100/1000,2) AS HighestMarks FROM $table4;");
                      while($row1 = mysqli_fetch_array($sql22)){
                        $high_4 = $row1['HighestMarks'];
                      }

$sql23 = mysqli_query($conn,"SELECT ROUND(AVG(TOTAL * 100.0/ 1000),2) as 'AVERAGE' FROM $table4;");
                      while($row2 = mysqli_fetch_array($sql23)){
                        $avg_4 = $row2['AVERAGE'];
                      }

$sql24 = mysqli_query($conn,"SELECT ROUND(MIN(TOTAL) *100/1000,2) AS LowestMarks FROM $table4;");
                      while($row3 = mysqli_fetch_array($sql24)){
                        $low_4 = $row3['LowestMarks'];
                      }

$sql25 = mysqli_query($conn,"SELECT ROUND(MAX(TOTAL) *100/1000,2) AS HighestMarks FROM $table2;");
                      while($row1 = mysqli_fetch_array($sql25)){
                        $high_2 = $row1['HighestMarks'];
                      }

$sql26 = mysqli_query($conn,"SELECT ROUND(AVG(TOTAL * 100.0/ 1000),2) as 'AVERAGE' FROM $table2;");
                      while($row2 = mysqli_fetch_array($sql26)){
                        $avg_2 = $row2['AVERAGE'];
                      }

$sql27 = mysqli_query($conn,"SELECT ROUND(MIN(TOTAL) *100/1000,2) AS LowestMarks FROM $table2;");
                      while($row3 = mysqli_fetch_array($sql27)){
                        $low_2 = $row3['LowestMarks'];
                      }

$sql28 = mysqli_query($conn,"SELECT AVG(TOTAL * 100.0/ 1000) as 'AVERAGE' FROM $table4;");
                    while($row = mysqli_fetch_array($sql28)){
                      $avg_per_4 = $row['AVERAGE'];
                    }

$sql29 = mysqli_query($conn,"SELECT AVG(TOTAL * 100.0/ 1000) as 'AVERAGE' FROM $table6;");
                        while($row = mysqli_fetch_array($sql29)){
                          $avg_per_6 = $row['AVERAGE'];
                        }

$sql30 = mysqli_query($conn,"SELECT AVG(TOTAL * 100.0/ 1000) as 'AVERAGE' FROM $table8;");
                        while($row = mysqli_fetch_array($sql30)){
                          $avg_per_8 = $row['AVERAGE'];
                        } 

$sql31 = mysqli_query($conn,"SELECT AVG(TOTAL * 100.0/ 1000) as 'AVERAGE' FROM $table2;");
                        while($row = mysqli_fetch_array($sql31)){
                          $avg_per_2 = $row['AVERAGE'];
                        }                                                                       

?>