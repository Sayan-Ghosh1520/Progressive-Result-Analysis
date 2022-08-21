<?php
include 'config.php';
session_start();

$urn = $_SESSION['urn'];
$sem = $_SESSION['sem'];
$table_sem = $_SESSION['sem']."_sem";
$table_sub = $_SESSION['sem']."_sub";

$j = 0;
$sql4 = mysqli_query($conn,"SELECT * FROM $table_sub");
                      $i = 0; $sub = array();
                     while($row = mysqli_fetch_array($sql4)){
                        $sub[$i] = $row[0];
                        $i++;
                      }
$i = 0; 
$sub_name = array();
$sub_ab = array();
$sub_teacher = array();
while($i < 5){
$sql5 = mysqli_query($conn,"SELECT * FROM $table_sub WHERE Sub_code='$sub[$i]'");                   
                      while($row = mysqli_fetch_array($sql5)){
                        $sub_name[$i] = $row[2];
                        $sub_ab[$i] = $row[1];
                        //$sub_teacher[$i] = $row[3];
                        $i++;
                      }
                    }

$info = mysqli_query($conn,"SELECT * FROM $table_sem WHERE URN = '$urn'");
                      while($row = mysqli_fetch_array($info)){
                      $name = $row['NAME'];
                      $sub_1 = $row[4];
                      $sub_2 = $row[5];
                      $sub_3 = $row[6];
                      $sub_4 = $row[7];
                      $sub_5 = $row[8];
                      $tot = $row[9];
                      $status = $row[10];
                       }
                       
$h_sub = mysqli_query($conn,"SELECT MAX($sub[0]),MAX($sub[1]),MAX($sub[2]),MAX($sub[3]),MAX($sub[4]),MAX(TOTAL) from $table_sem");                       
                       while($row = mysqli_fetch_array($h_sub)){
                      $h_sub_1 = $row[0];
                      $h_sub_2 = $row[1];
                      $h_sub_3 = $row[2];
                      $h_sub_4 = $row[3];
                      $h_sub_5 = $row[4];
                      $h_tot = $row[5];
                    }
                
$a_sub = mysqli_query($conn,"SELECT AVG($sub[0]),AVG($sub[1]),AVG($sub[2]),AVG($sub[3]),AVG($sub[4]),AVG(TOTAL) from $table_sem");                       
                       while($row = mysqli_fetch_array($a_sub)){
                      $a_sub_1 = $row[0];
                      $a_sub_2 = $row[1];
                      $a_sub_3 = $row[2];
                      $a_sub_4 = $row[3];
                      $a_sub_5 = $row[4];
                      $a_tot = $row[5];
                       }    
$l_sub = mysqli_query($conn,"SELECT MIN($sub[0]),MIN($sub[1]),MIN($sub[2]),MIN($sub[3]),MIN($sub[4]),MIN(TOTAL) from $table_sem");                       
                       while($row = mysqli_fetch_array($l_sub)){
                      $l_sub_1 = $row[0];
                      $l_sub_2 = $row[1];
                      $l_sub_3 = $row[2];
                      $l_sub_4 = $row[3];
                      $l_sub_5 = $row[4];
                      $l_tot = $row[5];
                       } 

$result = mysqli_query($conn,"SELECT * FROM login_data");
                     while($row = mysqli_fetch_array($result)){
                     $profile = $row['username'];
                      }                         

$sql13 = mysqli_query($conn,"SELECT COUNT(STATUS) FROM $table_sem WHERE STATUS = 'PASS';");
                        while($row = mysqli_fetch_array($sql13)){
                          $pass = $row['COUNT(STATUS)'];
                        }
                        
$sql14 = mysqli_query($conn,"SELECT COUNT(STATUS) FROM $table_sem WHERE STATUS = 'FAIL';");
                        while($row = mysqli_fetch_array($sql14)){
                          $fail = $row['COUNT(STATUS)'];
                        }                        

?>