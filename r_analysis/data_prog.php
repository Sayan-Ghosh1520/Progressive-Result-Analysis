<?php
include 'config.php';
  $batch=$_SESSION['batch']; 

  //--------------------semester tables----------
  $table_sem1 = $batch."_1_sem";
  $table_sem2 = $batch."_2_sem";
  $table_sem3 = $batch."_3_sem";
  $table_sem4 = $batch."_4_sem";
  $table_sem5 = $batch."_5_sem";
  $table_sem6 = $batch."_6_sem";
  $table_sem7 = $batch."_7_sem";
  $table_sem8 = $batch."_8_sem";

  //--------------------subject tables----------
  $table_sub1 = $batch."_1_sub";
  $table_sub2 = $batch."_2_sub";
  $table_sub3 = $batch."_3_sub";
  $table_sub4 = $batch."_4_sub";
  $table_sub5 = $batch."_5_sub";
  $table_sub6 = $batch."_6_sub";
  $table_sub7 = $batch."_7_sub";
  $table_sub8 = $batch."_8_sub";


$i = 0; 
$n_count = array();
while($i < 8){
$count = mysqli_query($conn,"SELECT COUNT(*) Stu_Appeared FROM `$table_sem1` union all SELECT COUNT(*) FROM `$table_sem2` union all SELECT COUNT(*) FROM `$table_sem3` union all SELECT COUNT(*) FROM `$table_sem4` union all SELECT COUNT(*) FROM `$table_sem5` union all SELECT COUNT(*) FROM `$table_sem6` union all SELECT COUNT(*) FROM `$table_sem7` union all SELECT COUNT(*) FROM `$table_sem8`");
                        while($row = mysqli_fetch_array($count)){
                          $n_count[$i] = $row[0];
                          $i++;
                        }
            }            

$i = 0; 
$pass_count = array();
while($i < 8){
$count = mysqli_query($conn,"SELECT COUNT(*) Stu_Passed FROM `$table_sem1` WHERE STATUS='PASS' union all SELECT COUNT(*) FROM `$table_sem2` WHERE STATUS='PASS'  union all SELECT COUNT(*) FROM `$table_sem3` WHERE STATUS='PASS'  union all SELECT COUNT(*) FROM `$table_sem4` WHERE STATUS='PASS'  union all SELECT COUNT(*) FROM `$table_sem5` WHERE STATUS='PASS'  union all SELECT COUNT(*) FROM `$table_sem6` WHERE STATUS='PASS'  union all SELECT COUNT(*) FROM `$table_sem7` WHERE STATUS='PASS'  union all SELECT COUNT(*) FROM `$table_sem8` WHERE STATUS='PASS'");
                        while($row = mysqli_fetch_array($count)){
                          $pass_count[$i] = $row[0];
                          $i++;
                        }
            } 

$i = 0; 
$fail_count = array();
while($i < 8){
$count = mysqli_query($conn,"SELECT COUNT(*) Stu_failed FROM `$table_sem1` WHERE STATUS='FAIL' union all SELECT COUNT(*) FROM `$table_sem2` WHERE STATUS='FAIL'  union all SELECT COUNT(*) FROM `$table_sem3` WHERE STATUS='FAIL'  union all SELECT COUNT(*) FROM `$table_sem4` WHERE STATUS='FAIL'  union all SELECT COUNT(*) FROM `$table_sem5` WHERE STATUS='FAIL'  union all SELECT COUNT(*) FROM `$table_sem6` WHERE STATUS='FAIL'  union all SELECT COUNT(*) FROM `$table_sem7` WHERE STATUS='FAIL'  union all SELECT COUNT(*) FROM `$table_sem8` WHERE STATUS='FAIL'");
                        while($row = mysqli_fetch_array($count)){
                          $fail_count[$i] = $row[0];
                          $i++;
                        }
            }


$pass_per = array();
$pass_per[0] = round(($pass_count[0] * 100)/$n_count[0],2);
$pass_per[1] = round(($pass_count[1] * 100)/$n_count[1],2);
$pass_per[2] = round(($pass_count[2] * 100)/$n_count[2],2);
$pass_per[3] = round(($pass_count[3] * 100)/$n_count[3],2);
$pass_per[4] = round(($pass_count[4] * 100)/$n_count[4],2);
$pass_per[5] = round(($pass_count[5] * 100)/$n_count[5],2);
$pass_per[6] = round(($pass_count[6] * 100)/$n_count[6],2);
$pass_per[7] = round(($pass_count[7] * 100)/$n_count[7],2);



//-----------------------------1st sem attempts---------------------------------------


$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem1` WHERE BACK_APP_COUNT = 0 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem1_1_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem1` WHERE BACK_APP_COUNT = 1 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem1_2_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem1` WHERE BACK_APP_COUNT = 2 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem1_3_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem1` WHERE BACK_APP_COUNT = 3 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem1_4_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem1` WHERE BACK_APP_COUNT = 4 AND STATUS='FAIL'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem1_5_atm = $row['COUNT(*)'];
                        } 


//-----------------------------2nd sem attempts---------------------------------------

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem2` WHERE BACK_APP_COUNT = 0 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem2_1_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem2` WHERE BACK_APP_COUNT = 1 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem2_2_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem2` WHERE BACK_APP_COUNT = 2 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem2_3_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem2` WHERE BACK_APP_COUNT = 3 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem2_4_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem2` WHERE BACK_APP_COUNT = 4 AND STATUS='FAIL'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem2_5_atm = $row['COUNT(*)'];
                        }


//-----------------------------3rd sem attempts---------------------------------------

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem3` WHERE BACK_APP_COUNT = 0 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem3_1_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem3` WHERE BACK_APP_COUNT = 1 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem3_2_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem3` WHERE BACK_APP_COUNT = 2 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem3_3_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem3` WHERE BACK_APP_COUNT = 3 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem3_4_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem3` WHERE BACK_APP_COUNT = 4 AND STATUS='FAIL'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem3_5_atm = $row['COUNT(*)'];
                        }  


//-----------------------------4th sem attempts---------------------------------------

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem4` WHERE BACK_APP_COUNT = 0 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem4_1_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem4` WHERE BACK_APP_COUNT = 1 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem4_2_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem4` WHERE BACK_APP_COUNT = 2 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem4_3_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem4` WHERE BACK_APP_COUNT = 3 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem4_4_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem4` WHERE BACK_APP_COUNT = 4 AND STATUS='FAIL'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem4_5_atm = $row['COUNT(*)'];
                        } 


//-----------------------------5th sem attempts---------------------------------------

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem5` WHERE BACK_APP_COUNT = 0 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem5_1_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem5` WHERE BACK_APP_COUNT = 1 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem5_2_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem5` WHERE BACK_APP_COUNT = 2 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem5_3_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem5` WHERE BACK_APP_COUNT = 3 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem5_4_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem5` WHERE BACK_APP_COUNT = 4 AND STATUS='FAIL'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem5_5_atm = $row['COUNT(*)'];
                        }


//-----------------------------6th sem attempts---------------------------------------

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem6` WHERE BACK_APP_COUNT = 0 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem6_1_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem6` WHERE BACK_APP_COUNT = 1 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem6_2_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem6` WHERE BACK_APP_COUNT = 2 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem6_3_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem6` WHERE BACK_APP_COUNT = 3 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem6_4_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem6` WHERE BACK_APP_COUNT = 4 AND STATUS='FAIL'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem6_5_atm = $row['COUNT(*)'];
                        }


//-----------------------------7th sem attempts---------------------------------------

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem7` WHERE BACK_APP_COUNT = 0 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem7_1_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem7` WHERE BACK_APP_COUNT = 1 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem7_2_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem7` WHERE BACK_APP_COUNT = 2 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem7_3_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem7` WHERE BACK_APP_COUNT = 3 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem7_4_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem7` WHERE BACK_APP_COUNT = 4 AND STATUS='FAIL'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem7_5_atm = $row['COUNT(*)'];
                        }


//-----------------------------8th sem attempts---------------------------------------

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem8` WHERE BACK_APP_COUNT = 0 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem8_1_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem8` WHERE BACK_APP_COUNT = 1 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem8_2_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem8` WHERE BACK_APP_COUNT = 2 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem8_3_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem8` WHERE BACK_APP_COUNT = 3 AND STATUS='PASS'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem8_4_atm = $row['COUNT(*)'];
                        }

$sql1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem8` WHERE BACK_APP_COUNT = 4 AND STATUS='FAIL'");
                        while($row = mysqli_fetch_array($sql1)){
                          $sem8_5_atm = $row['COUNT(*)'];
                        }


//-------------------------------------Topper List Data----------------------------------------    

//---------------1st sem------------

$sql2 = mysqli_query($conn,"SELECT SPI, NAME FROM `$table_sem1` WHERE TOTAL = (SELECT MAX(TOTAL) FROM `$table_sem1` LIMIT 1);");
                        while($row = mysqli_fetch_array($sql2)){
                          $top_name_1 = $row['NAME'];
                          $top_spi_1 = $row['SPI'];
                        } 

//---------------2nd sem------------

$sql2 = mysqli_query($conn,"SELECT SPI, NAME FROM `$table_sem2` WHERE TOTAL = (SELECT MAX(TOTAL) FROM `$table_sem2` LIMIT 1);");
                        while($row = mysqli_fetch_array($sql2)){
                          $top_name_2 = $row['NAME'];
                          $top_spi_2 = $row['SPI'];
                        } 

//---------------3rd sem------------

$sql2 = mysqli_query($conn,"SELECT SPI, NAME FROM `$table_sem3` WHERE TOTAL = (SELECT MAX(TOTAL) FROM `$table_sem3` LIMIT 1);");
                        while($row = mysqli_fetch_array($sql2)){
                          $top_name_3 = $row['NAME'];
                          $top_spi_3 = $row['SPI'];
                        }

//---------------4th sem------------

$sql2 = mysqli_query($conn,"SELECT SPI, NAME FROM `$table_sem4` WHERE TOTAL = (SELECT MAX(TOTAL) FROM `$table_sem4` LIMIT 1);");
                        while($row = mysqli_fetch_array($sql2)){
                          $top_name_4 = $row['NAME'];
                          $top_spi_4 = $row['SPI'];
                        }

//---------------5th sem------------

$sql2 = mysqli_query($conn,"SELECT SPI, NAME FROM `$table_sem5` WHERE TOTAL = (SELECT MAX(TOTAL) FROM `$table_sem5` LIMIT 1);");
                        while($row = mysqli_fetch_array($sql2)){
                          $top_name_5 = $row['NAME'];
                          $top_spi_5 = $row['SPI'];
                        } 

//---------------6th sem------------

$sql2 = mysqli_query($conn,"SELECT SPI, NAME FROM `$table_sem6` WHERE TOTAL = (SELECT MAX(TOTAL) FROM `$table_sem6` LIMIT 1);");
                        while($row = mysqli_fetch_array($sql2)){
                          $top_name_6 = $row['NAME'];
                          $top_spi_6 = $row['SPI'];
                        } 

//---------------7th sem------------

$sql2 = mysqli_query($conn,"SELECT SPI, NAME FROM `$table_sem7` WHERE TOTAL = (SELECT MAX(TOTAL) FROM `$table_sem7` LIMIT 1);");
                        while($row = mysqli_fetch_array($sql2)){
                          $top_name_7 = $row['NAME'];
                          $top_spi_7 = $row['SPI'];
                        }

//---------------8th sem------------

$sql2 = mysqli_query($conn,"SELECT SPI, NAME FROM `$table_sem8` WHERE TOTAL = (SELECT MAX(TOTAL) FROM `$table_sem8` LIMIT 1);");
                        while($row = mysqli_fetch_array($sql2)){
                          $top_name_8 = $row['NAME'];
                          $top_spi_8 = $row['SPI'];
                        }


//-------------------------Subjects And Teacher Data----------------------------

//--------------1st sem-----------                        

$sql4 = mysqli_query($conn,"SELECT * FROM `$table_sub1`");
                      $i = 0; $_1_sub = array();
                     while($row = mysqli_fetch_array($sql4)){
                        $_1_sub[$i] = $row[0];
                        $i++;
                      }
$i = 0; 
$_1_sub_name = array();
$_1_sub_teacher = array();
while($i < 5){
$sql5 = mysqli_query($conn,"SELECT * FROM `$table_sub1` WHERE Sub_code='$_1_sub[$i]'");                   
                      while($row = mysqli_fetch_array($sql5)){
                        $_1_sub_ab[$i] = $row[1];
                        $_1_sub_name[$i] = $row[2];
                        $_1_sub_teacher[$i] = $row[3];
                        $i++;
                      }
                    }

$pass_sub1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem1` WHERE $_1_sub[0] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub1)){  
                            $_1_pass_sub1 = $row[0];
                        }
                        
$_1_pp_sub1 = round(($_1_pass_sub1 * 100)/$n_count[0],2); 

$pass_sub2 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem1` WHERE $_1_sub[1] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub2)){  
                            $_1_pass_sub2 = $row[0];
                        }
                        
$_1_pp_sub2 = round(($_1_pass_sub2 * 100)/$n_count[0],2);

$pass_sub3 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem1` WHERE $_1_sub[2] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub3)){  
                            $_1_pass_sub3 = $row[0];
                        }
                        
$_1_pp_sub3 = round(($_1_pass_sub3 * 100)/$n_count[0],2);

$pass_sub4 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem1` WHERE $_1_sub[3] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub4)){  
                            $_1_pass_sub4 = $row[0];
                        }
                        
$_1_pp_sub4 = round(($_1_pass_sub4 * 100)/$n_count[0],2);

$pass_sub5 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem1` WHERE $_1_sub[4] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub5)){  
                            $_1_pass_sub5 = $row[0];
                        }
                        
$_1_pp_sub5 = round(($_1_pass_sub5 * 100)/$n_count[0],2); 

$att1 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=0,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=0,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=0,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=0,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=0,1,null)) as Count_Sub5_attempt from `$table_sem1`"); 
                        while($row = mysqli_fetch_array($att1)){  
                            $sem1_sub1_att_1 = $row[0];
                            $sem1_sub2_att_1 = $row[1];
                            $sem1_sub3_att_1 = $row[2];
                            $sem1_sub4_att_1 = $row[3];
                            $sem1_sub5_att_1 = $row[4];
                        }

$att2 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=1,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=1,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=1,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=1,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=1,1,null)) as Count_Sub5_attempt from `$table_sem1`"); 
                        while($row = mysqli_fetch_array($att2)){  
                            $sem1_sub1_att_2 = $row[0];
                            $sem1_sub2_att_2 = $row[1];
                            $sem1_sub3_att_2 = $row[2];
                            $sem1_sub4_att_2 = $row[3];
                            $sem1_sub5_att_2 = $row[4];
                        }  

$att3 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=2,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=2,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=2,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=2,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=2,1,null)) as Count_Sub5_attempt from `$table_sem1`"); 
                        while($row = mysqli_fetch_array($att3)){  
                            $sem1_sub1_att_3 = $row[0];
                            $sem1_sub2_att_3 = $row[1];
                            $sem1_sub3_att_3 = $row[2];
                            $sem1_sub4_att_3 = $row[3];
                            $sem1_sub5_att_3 = $row[4];
                        } 

$att4 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=3,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=3,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=3,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=3,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=3,1,null)) as Count_Sub5_attempt from `$table_sem1`"); 
                        while($row = mysqli_fetch_array($att4)){  
                            $sem1_sub1_att_4 = $row[0];
                            $sem1_sub2_att_4 = $row[1];
                            $sem1_sub3_att_4 = $row[2];
                            $sem1_sub4_att_4 = $row[3];
                            $sem1_sub5_att_4 = $row[4];
                        }  



//--------------2nd sem-----------                        

 $sql4 = mysqli_query($conn,"SELECT * FROM `$table_sub2`");
                      $i = 0; $_2_sub = array();
                     while($row = mysqli_fetch_array($sql4)){
                        $_2_sub[$i] = $row[0];
                        $i++;
                      }
$i = 0; 
$_2_sub_name = array();
$_2_sub_teacher = array();
while($i < 5){
$sql5 = mysqli_query($conn,"SELECT * FROM `$table_sub2` WHERE Sub_code='$_2_sub[$i]'");                   
                      while($row = mysqli_fetch_array($sql5)){
                        $_2_sub_ab[$i] = $row[1];
                        $_2_sub_name[$i] = $row[2];
                        $_2_sub_teacher[$i] = $row[3];
                        $i++;
                      }
                    }

$pass_sub1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem2` WHERE $_2_sub[0] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub1)){  
                            $_2_pass_sub1 = $row[0];
                        }
                        
$_2_pp_sub1 = round(($_2_pass_sub1 * 100)/$n_count[1],2); 

$pass_sub2 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem2` WHERE $_2_sub[1] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub2)){  
                            $_2_pass_sub2 = $row[0];
                        }
                        
$_2_pp_sub2 = round(($_2_pass_sub2 * 100)/$n_count[1],2);

$pass_sub3 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem2` WHERE $_2_sub[2] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub3)){  
                            $_2_pass_sub3 = $row[0];
                        }
                        
$_2_pp_sub3 = round(($_2_pass_sub3 * 100)/$n_count[1],2);

$pass_sub4 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem2` WHERE $_2_sub[3] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub4)){  
                            $_2_pass_sub4 = $row[0];
                        }
                        
$_2_pp_sub4 = round(($_2_pass_sub4 * 100)/$n_count[1],2);

$pass_sub5 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem2` WHERE $_2_sub[4] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub5)){  
                            $_2_pass_sub5 = $row[0];
                        }
                        
$_2_pp_sub5 = round(($_2_pass_sub5 * 100)/$n_count[1],2); 

$att1 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=0,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=0,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=0,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=0,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=0,1,null)) as Count_Sub5_attempt from `$table_sem2`"); 
                        while($row = mysqli_fetch_array($att1)){  
                            $sem2_sub1_att_1 = $row[0];
                            $sem2_sub2_att_1 = $row[1];
                            $sem2_sub3_att_1 = $row[2];
                            $sem2_sub4_att_1 = $row[3];
                            $sem2_sub5_att_1 = $row[4];
                        }

$att2 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=1,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=1,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=1,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=1,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=1,1,null)) as Count_Sub5_attempt from `$table_sem2`"); 
                        while($row = mysqli_fetch_array($att2)){  
                            $sem2_sub1_att_2 = $row[0];
                            $sem2_sub2_att_2 = $row[1];
                            $sem2_sub3_att_2 = $row[2];
                            $sem2_sub4_att_2 = $row[3];
                            $sem2_sub5_att_2 = $row[4];
                        }  

$att3 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=2,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=2,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=2,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=2,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=2,1,null)) as Count_Sub5_attempt from `$table_sem2`"); 
                        while($row = mysqli_fetch_array($att3)){  
                            $sem2_sub1_att_3 = $row[0];
                            $sem2_sub2_att_3 = $row[1];
                            $sem2_sub3_att_3 = $row[2];
                            $sem2_sub4_att_3 = $row[3];
                            $sem2_sub5_att_3 = $row[4];
                        } 

$att4 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=3,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=3,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=3,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=3,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=3,1,null)) as Count_Sub5_attempt from `$table_sem2`"); 
                        while($row = mysqli_fetch_array($att4)){  
                            $sem2_sub1_att_4 = $row[0];
                            $sem2_sub2_att_4 = $row[1];
                            $sem2_sub3_att_4 = $row[2];
                            $sem2_sub4_att_4 = $row[3];
                            $sem2_sub5_att_4 = $row[4];
                        }  



//--------------3rd sem-----------                        

 $sql4 = mysqli_query($conn,"SELECT * FROM `$table_sub3`");
                      $i = 0; $_3_sub = array();
                     while($row = mysqli_fetch_array($sql4)){
                        $_3_sub[$i] = $row[0];
                        $i++;
                      }
$i = 0; 
$_3_sub_name = array();
$_3_sub_teacher = array();
while($i < 6){
$sql5 = mysqli_query($conn,"SELECT * FROM `$table_sub3` WHERE Sub_code='$_3_sub[$i]'");                   
                      while($row = mysqli_fetch_array($sql5)){
                        $_3_sub_ab[$i] = $row[1];
                        $_3_sub_name[$i] = $row[2];
                        $_3_sub_teacher[$i] = $row[3];
                        $i++;
                      }
                    }

$pass_sub1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem3` WHERE $_3_sub[0] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub1)){  
                            $_3_pass_sub1 = $row[0];
                        }
                        
$_3_pp_sub1 = round(($_3_pass_sub1 * 100)/$n_count[2],2); 

$pass_sub2 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem3` WHERE $_3_sub[1] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub2)){  
                            $_3_pass_sub2 = $row[0];
                        }
                        
$_3_pp_sub2 = round(($_3_pass_sub2 * 100)/$n_count[2],2);

$pass_sub3 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem3` WHERE $_3_sub[2] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub3)){  
                            $_3_pass_sub3 = $row[0];
                        }
                        
$_3_pp_sub3 = round(($_3_pass_sub3 * 100)/$n_count[2],2);

$pass_sub4 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem3` WHERE $_3_sub[3] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub4)){  
                            $_3_pass_sub4 = $row[0];
                        }
                        
$_3_pp_sub4 = round(($_3_pass_sub4 * 100)/$n_count[2],2);

$pass_sub5 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem3` WHERE $_3_sub[4] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub5)){  
                            $_3_pass_sub5 = $row[0];
                        }
                        
$_3_pp_sub5 = round(($_3_pass_sub5 * 100)/$n_count[2],2);

// $pass_sub6 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem3` WHERE $_3_sub[5] >= 28;");                        
//                         while($row = mysqli_fetch_array($pass_sub6)){  
//                             $_3_pass_sub6 = $row[0];
//                         }
                        
// $_3_pp_sub6 = round(($_3_pass_sub6 * 100)/$n_count[2],2);  

$att1 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=0,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=0,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=0,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=0,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=0,1,null)) as Count_Sub5_attempt from `$table_sem3`"); 
                        while($row = mysqli_fetch_array($att1)){  
                            $sem3_sub1_att_1 = $row[0];
                            $sem3_sub2_att_1 = $row[1];
                            $sem3_sub3_att_1 = $row[2];
                            $sem3_sub4_att_1 = $row[3];
                            $sem3_sub5_att_1 = $row[4];
                            // $sem3_sub6_att_1 = $row[5];
                        }

$att2 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=1,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=1,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=1,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=1,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=1,1,null)) as Count_Sub5_attempt from `$table_sem3`"); 
                        while($row = mysqli_fetch_array($att2)){  
                            $sem3_sub1_att_2 = $row[0];
                            $sem3_sub2_att_2 = $row[1];
                            $sem3_sub3_att_2 = $row[2];
                            $sem3_sub4_att_2 = $row[3];
                            $sem3_sub5_att_2 = $row[4];
                            // $sem3_sub6_att_2 = $row[5];
                        }  

$att3 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=2,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=2,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=2,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=2,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=2,1,null)) as Count_Sub5_attempt from `$table_sem3`"); 
                        while($row = mysqli_fetch_array($att3)){  
                            $sem3_sub1_att_3 = $row[0];
                            $sem3_sub2_att_3 = $row[1];
                            $sem3_sub3_att_3 = $row[2];
                            $sem3_sub4_att_3 = $row[3];
                            $sem3_sub5_att_3 = $row[4];
                            // $sem3_sub6_att_3 = $row[5];
                        } 

$att4 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=3,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=3,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=3,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=3,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=3,1,null)) as Count_Sub5_attempt from `$table_sem3`"); 
                        while($row = mysqli_fetch_array($att4)){  
                            $sem3_sub1_att_4 = $row[0];
                            $sem3_sub2_att_4 = $row[1];
                            $sem3_sub3_att_4 = $row[2];
                            $sem3_sub4_att_4 = $row[3];
                            $sem3_sub5_att_4 = $row[4];
                            // $sem3_sub6_att_4 = $row[5];
                        }                                                                        



//--------------4th sem-----------                        

 $sql4 = mysqli_query($conn,"SELECT * FROM `$table_sub4`");
                      $i = 0; $_4_sub = array();
                     while($row = mysqli_fetch_array($sql4)){
                        $_4_sub[$i] = $row[0];
                        $i++;
                      }
$i = 0; 
$_4_sub_name = array();
$_4_sub_teacher = array();
while($i < 6){
$sql5 = mysqli_query($conn,"SELECT * FROM `$table_sub4` WHERE Sub_code='$_4_sub[$i]'");                   
                      while($row = mysqli_fetch_array($sql5)){
                        $_4_sub_ab[$i] = $row[1];
                        $_4_sub_name[$i] = $row[2];
                        $_4_sub_teacher[$i] = $row[3];
                        $i++;
                      }
                    }

$pass_sub1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem4` WHERE $_4_sub[0] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub1)){  
                            $_4_pass_sub1 = $row[0];
                        }
                        
$_4_pp_sub1 = round(($_4_pass_sub1 * 100)/$n_count[3],2); 

$pass_sub2 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem4` WHERE $_4_sub[1] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub2)){  
                            $_4_pass_sub2 = $row[0];
                        }
                        
$_4_pp_sub2 = round(($_4_pass_sub2 * 100)/$n_count[3],2);

$pass_sub3 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem4` WHERE $_4_sub[2] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub3)){  
                            $_4_pass_sub3 = $row[0];
                        }
                        
$_4_pp_sub3 = round(($_4_pass_sub3 * 100)/$n_count[3],2);

$pass_sub4 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem4` WHERE $_4_sub[3] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub4)){  
                            $_4_pass_sub4 = $row[0];
                        }
                        
$_4_pp_sub4 = round(($_4_pass_sub4 * 100)/$n_count[3],2);

$pass_sub5 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem4` WHERE $_4_sub[4] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub5)){  
                            $_4_pass_sub5 = $row[0];
                        }
                        
$_4_pp_sub5 = round(($_4_pass_sub5 * 100)/$n_count[3],2);

// $pass_sub6 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem4` WHERE $_4_sub[5] >= 28;");                        
//                         while($row = mysqli_fetch_array($pass_sub6)){  
//                             $_4_pass_sub6 = $row[0];
//                         }
                        
// $_4_pp_sub6 = round(($_4_pass_sub6 * 100)/$n_count[3],2);

$att1 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=0,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=0,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=0,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=0,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=0,1,null)) as Count_Sub5_attempt from `$table_sem4`"); 
                        while($row = mysqli_fetch_array($att1)){  
                            $sem4_sub1_att_1 = $row[0];
                            $sem4_sub2_att_1 = $row[1];
                            $sem4_sub3_att_1 = $row[2];
                            $sem4_sub4_att_1 = $row[3];
                            $sem4_sub5_att_1 = $row[4];
                            // $sem4_sub6_att_1 = $row[5];
                        }

$att2 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=1,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=1,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=1,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=1,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=1,1,null)) as Count_Sub5_attempt from `$table_sem4`"); 
                        while($row = mysqli_fetch_array($att2)){  
                            $sem4_sub1_att_2 = $row[0];
                            $sem4_sub2_att_2 = $row[1];
                            $sem4_sub3_att_2 = $row[2];
                            $sem4_sub4_att_2 = $row[3];
                            $sem4_sub5_att_2 = $row[4];
                            // $sem4_sub6_att_2 = $row[5];
                        }  

$att3 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=2,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=2,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=2,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=2,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=2,1,null)) as Count_Sub5_attempt from `$table_sem4`"); 
                        while($row = mysqli_fetch_array($att3)){  
                            $sem4_sub1_att_3 = $row[0];
                            $sem4_sub2_att_3 = $row[1];
                            $sem4_sub3_att_3 = $row[2];
                            $sem4_sub4_att_3 = $row[3];
                            $sem4_sub5_att_3 = $row[4];
                            // $sem4_sub6_att_3 = $row[5];
                        } 

$att4 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=3,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=3,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=3,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=3,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=3,1,null)) as Count_Sub5_attempt from `$table_sem4`"); 
                        while($row = mysqli_fetch_array($att4)){  
                            $sem4_sub1_att_4 = $row[0];
                            $sem4_sub2_att_4 = $row[1];
                            $sem4_sub3_att_4 = $row[2];
                            $sem4_sub4_att_4 = $row[3];
                            $sem4_sub5_att_4 = $row[4];
                            // $sem4_sub6_att_4 = $row[5];
                        }                                                                        



//--------------5th sem-----------                        

 $sql4 = mysqli_query($conn,"SELECT * FROM `$table_sub5`");
                      $i = 0; $_5_sub = array();
                     while($row = mysqli_fetch_array($sql4)){
                        $_5_sub[$i] = $row[0];
                        $i++;
                      }
$i = 0; 
$_5_sub_name = array();
$_5_sub_teacher = array();
while($i < 6){
$sql5 = mysqli_query($conn,"SELECT * FROM `$table_sub5` WHERE Sub_code='$_5_sub[$i]'");                   
                      while($row = mysqli_fetch_array($sql5)){
                        $_5_sub_ab[$i] = $row[1];
                        $_5_sub_name[$i] = $row[2];
                        $_5_sub_teacher[$i] = $row[3];
                        $i++;
                      }
                    }

$pass_sub1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem5` WHERE $_5_sub[0] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub1)){  
                            $_5_pass_sub1 = $row[0];
                        }
                        
$_5_pp_sub1 = round(($_5_pass_sub1 * 100)/$n_count[4],2); 

$pass_sub2 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem5` WHERE $_5_sub[1] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub2)){  
                            $_5_pass_sub2 = $row[0];
                        }
                        
$_5_pp_sub2 = round(($_5_pass_sub2 * 100)/$n_count[4],2);

$pass_sub3 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem5` WHERE $_5_sub[2] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub3)){  
                            $_5_pass_sub3 = $row[0];
                        }
                        
$_5_pp_sub3 = round(($_5_pass_sub3 * 100)/$n_count[4],2);

$pass_sub4 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem5` WHERE $_5_sub[3] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub4)){  
                            $_5_pass_sub4 = $row[0];
                        }
                        
$_5_pp_sub4 = round(($_5_pass_sub4 * 100)/$n_count[4],2);

$pass_sub5 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem5` WHERE $_5_sub[4] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub5)){  
                            $_5_pass_sub5 = $row[0];
                        }
                        
$_5_pp_sub5 = round(($_5_pass_sub5 * 100)/$n_count[4],2);

// $pass_sub6 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem5` WHERE $_5_sub[5] >= 28;");                        
//                         while($row = mysqli_fetch_array($pass_sub6)){  
//                             $_5_pass_sub6 = $row[0];
//                         }
                        
// $_5_pp_sub6 = round(($_5_pass_sub6 * 100)/$n_count[4],2);

$att1 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=0,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=0,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=0,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=0,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=0,1,null)) as Count_Sub5_attempt from `$table_sem5`"); 
                        while($row = mysqli_fetch_array($att1)){  
                            $sem5_sub1_att_1 = $row[0];
                            $sem5_sub2_att_1 = $row[1];
                            $sem5_sub3_att_1 = $row[2];
                            $sem5_sub4_att_1 = $row[3];
                            $sem5_sub5_att_1 = $row[4];
                            // $sem5_sub6_att_1 = $row[5];
                        }

$att2 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=1,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=1,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=1,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=1,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=1,1,null)) as Count_Sub5_attempt from `$table_sem5`"); 
                        while($row = mysqli_fetch_array($att2)){  
                            $sem5_sub1_att_2 = $row[0];
                            $sem5_sub2_att_2 = $row[1];
                            $sem5_sub3_att_2 = $row[2];
                            $sem5_sub4_att_2 = $row[3];
                            $sem5_sub5_att_2 = $row[4];
                            // $sem5_sub6_att_2 = $row[5];
                        }  

$att3 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=2,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=2,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=2,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=2,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=2,1,null)) as Count_Sub5_attempt from `$table_sem5`"); 
                        while($row = mysqli_fetch_array($att3)){  
                            $sem5_sub1_att_3 = $row[0];
                            $sem5_sub2_att_3 = $row[1];
                            $sem5_sub3_att_3 = $row[2];
                            $sem5_sub4_att_3 = $row[3];
                            $sem5_sub5_att_3 = $row[4];
                            // $sem5_sub6_att_3 = $row[5];
                        } 

$att4 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=3,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=3,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=3,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=3,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=3,1,null)) as Count_Sub5_attempt from `$table_sem5`"); 
                        while($row = mysqli_fetch_array($att4)){  
                            $sem5_sub1_att_4 = $row[0];
                            $sem5_sub2_att_4 = $row[1];
                            $sem5_sub3_att_4 = $row[2];
                            $sem5_sub4_att_4 = $row[3];
                            $sem5_sub5_att_4 = $row[4];
                            // $sem5_sub6_att_4 = $row[5];
                        }                                                                        



//--------------6th sem-----------                        

 $sql4 = mysqli_query($conn,"SELECT * FROM `$table_sub6`");
                      $i = 0; $_6_sub = array();
                     while($row = mysqli_fetch_array($sql4)){
                        $_6_sub[$i] = $row[0];
                        $i++;
                      }
$i = 0; 
$_6_sub_name = array();
$_6_sub_teacher = array();
while($i < 6){
$sql5 = mysqli_query($conn,"SELECT * FROM `$table_sub6` WHERE Sub_code='$_6_sub[$i]'");                   
                      while($row = mysqli_fetch_array($sql5)){
                        $_6_sub_ab[$i] = $row[1];
                        $_6_sub_name[$i] = $row[2];
                        $_6_sub_teacher[$i] = $row[3];
                        $i++;
                      }
                    }

$pass_sub1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem6` WHERE $_6_sub[0] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub1)){  
                            $_6_pass_sub1 = $row[0];
                        }
                        
$_6_pp_sub1 = round(($_6_pass_sub1 * 100)/$n_count[5],2); 

$pass_sub2 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem6` WHERE $_6_sub[1] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub2)){  
                            $_6_pass_sub2 = $row[0];
                        }
                        
$_6_pp_sub2 = round(($_6_pass_sub2 * 100)/$n_count[5],2);

$pass_sub3 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem6` WHERE $_6_sub[2] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub3)){  
                            $_6_pass_sub3 = $row[0];
                        }
                        
$_6_pp_sub3 = round(($_6_pass_sub3 * 100)/$n_count[5],2);

$pass_sub4 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem6` WHERE $_6_sub[3] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub4)){  
                            $_6_pass_sub4 = $row[0];
                        }
                        
$_6_pp_sub4 = round(($_6_pass_sub4 * 100)/$n_count[5],2);

$pass_sub5 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem6` WHERE $_6_sub[4] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub5)){  
                            $_6_pass_sub5 = $row[0];
                        }
                        
$_6_pp_sub5 = round(($_6_pass_sub5 * 100)/$n_count[5],2);

// $pass_sub6 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem6` WHERE $_6_sub[5] >= 28;");                  
//                         while($row = mysqli_fetch_array($pass_sub6)){  
//                             $_6_pass_sub6 = $row[0];
//                         }
                        
// $_6_pp_sub6 = round(($_6_pass_sub6 * 100)/$n_count[5],2);

$att1 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=0,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=0,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=0,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=0,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=0,1,null)) as Count_Sub5_attempt from `$table_sem6`"); 
                        while($row = mysqli_fetch_array($att1)){  
                            $sem6_sub1_att_1 = $row[0];
                            $sem6_sub2_att_1 = $row[1];
                            $sem6_sub3_att_1 = $row[2];
                            $sem6_sub4_att_1 = $row[3];
                            $sem6_sub5_att_1 = $row[4];
                            // $sem6_sub6_att_1 = $row[5];
                        }

$att2 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=1,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=1,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=1,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=1,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=1,1,null)) as Count_Sub5_attempt from `$table_sem6`"); 
                        while($row = mysqli_fetch_array($att2)){  
                            $sem6_sub1_att_2 = $row[0];
                            $sem6_sub2_att_2 = $row[1];
                            $sem6_sub3_att_2 = $row[2];
                            $sem6_sub4_att_2 = $row[3];
                            $sem6_sub5_att_2 = $row[4];
                            // $sem6_sub6_att_2 = $row[5];
                        }  

$att3 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=2,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=2,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=2,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=2,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=2,1,null)) as Count_Sub5_attempt from `$table_sem6`"); 
                        while($row = mysqli_fetch_array($att3)){  
                            $sem6_sub1_att_3 = $row[0];
                            $sem6_sub2_att_3 = $row[1];
                            $sem6_sub3_att_3 = $row[2];
                            $sem6_sub4_att_3 = $row[3];
                            $sem6_sub5_att_3 = $row[4];
                            // $sem6_sub6_att_3 = $row[5];
                        } 

$att4 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=3,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=3,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=3,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=3,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=3,1,null)) as Count_Sub5_attempt from `$table_sem6`"); 
                        while($row = mysqli_fetch_array($att4)){  
                            $sem6_sub1_att_4 = $row[0];
                            $sem6_sub2_att_4 = $row[1];
                            $sem6_sub3_att_4 = $row[2];
                            $sem6_sub4_att_4 = $row[3];
                            $sem6_sub5_att_4 = $row[4];
                            // $sem6_sub6_att_4 = $row[5];
                        }                                                                        



//--------------7th sem-----------                        

 $sql4 = mysqli_query($conn,"SELECT * FROM `$table_sub7`");
                      $i = 0; $_7_sub = array();
                     while($row = mysqli_fetch_array($sql4)){
                        $_7_sub[$i] = $row[0];
                        $i++;
                      }
$i = 0; 
$_7_sub_name = array();
$_7_sub_teacher = array();
while($i < 5){
$sql5 = mysqli_query($conn,"SELECT * FROM `$table_sub7` WHERE Sub_code='$_7_sub[$i]'");                   
                      while($row = mysqli_fetch_array($sql5)){
                        $_7_sub_ab[$i] = $row[1];
                        $_7_sub_name[$i] = $row[2];
                        $_7_sub_teacher[$i] = $row[3];
                        $i++;
                      }
                    }

$pass_sub1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem7` WHERE $_7_sub[0] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub1)){  
                            $_7_pass_sub1 = $row[0];
                        }
                        
$_7_pp_sub1 = round(($_7_pass_sub1 * 100)/$n_count[5],2); 

$pass_sub2 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem7` WHERE $_7_sub[1] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub2)){  
                            $_7_pass_sub2 = $row[0];
                        }
                        
$_7_pp_sub2 = round(($_7_pass_sub2 * 100)/$n_count[5],2);

$pass_sub3 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem7` WHERE $_7_sub[2] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub3)){  
                            $_7_pass_sub3 = $row[0];
                        }
                        
$_7_pp_sub3 = round(($_7_pass_sub3 * 100)/$n_count[5],2);

$pass_sub4 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem7` WHERE $_7_sub[3] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub4)){  
                            $_7_pass_sub4 = $row[0];
                        }
                        
$_7_pp_sub4 = round(($_7_pass_sub4 * 100)/$n_count[5],2);

$pass_sub5 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem7` WHERE $_7_sub[4] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub5)){  
                            $_7_pass_sub5 = $row[0];
                        }
                        
$_7_pp_sub5 = round(($_7_pass_sub5 * 100)/$n_count[5],2);

$att1 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=0,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=0,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=0,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=0,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=0,1,null)) as Count_Sub5_attempt from `$table_sem7`"); 
                        while($row = mysqli_fetch_array($att1)){  
                            $sem7_sub1_att_1 = $row[0];
                            $sem7_sub2_att_1 = $row[1];
                            $sem7_sub3_att_1 = $row[2];
                            $sem7_sub4_att_1 = $row[3];
                            $sem7_sub5_att_1 = $row[4];
                        }

$att2 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=1,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=1,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=1,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=1,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=1,1,null)) as Count_Sub5_attempt from `$table_sem7`"); 
                        while($row = mysqli_fetch_array($att2)){  
                            $sem7_sub1_att_2 = $row[0];
                            $sem7_sub2_att_2 = $row[1];
                            $sem7_sub3_att_2 = $row[2];
                            $sem7_sub4_att_2 = $row[3];
                            $sem7_sub5_att_2 = $row[4];
                        }  

$att3 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=2,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=2,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=2,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=2,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=2,1,null)) as Count_Sub5_attempt from `$table_sem7`"); 
                        while($row = mysqli_fetch_array($att3)){  
                            $sem7_sub1_att_3 = $row[0];
                            $sem7_sub2_att_3 = $row[1];
                            $sem7_sub3_att_3 = $row[2];
                            $sem7_sub4_att_3 = $row[3];
                            $sem7_sub5_att_3 = $row[4];
                        } 

$att4 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=3,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=3,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=3,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=3,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=3,1,null)) as Count_Sub5_attempt from `$table_sem7`"); 
                        while($row = mysqli_fetch_array($att4)){  
                            $sem7_sub1_att_4 = $row[0];
                            $sem7_sub2_att_4 = $row[1];
                            $sem7_sub3_att_4 = $row[2];
                            $sem7_sub4_att_4 = $row[3];
                            $sem7_sub5_att_4 = $row[4];
                        } 


//--------------8th sem-----------                        

 $sql4 = mysqli_query($conn,"SELECT * FROM `$table_sub8`");
                      $i = 0; $_8_sub = array();
                     while($row = mysqli_fetch_array($sql4)){
                        $_8_sub[$i] = $row[0];
                        $i++;
                      }
$i = 0; 
$_8_sub_name = array();
$_8_sub_teacher = array();
while($i < 5){
$sql5 = mysqli_query($conn,"SELECT * FROM `$table_sub8` WHERE Sub_code='$_8_sub[$i]'");                   
                      while($row = mysqli_fetch_array($sql5)){
                        $_8_sub_ab[$i] = $row[1];
                        $_8_sub_name[$i] = $row[2];
                        $_8_sub_teacher[$i] = $row[3];
                        $i++;
                      }
                    }

$pass_sub1 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem8` WHERE $_8_sub[0] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub1)){  
                            $_8_pass_sub1 = $row[0];
                        }
                        
$_8_pp_sub1 = round(($_8_pass_sub1 * 100)/$n_count[5],2); 

$pass_sub2 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem8` WHERE $_8_sub[1] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub2)){  
                            $_8_pass_sub2 = $row[0];
                        }
                        
$_8_pp_sub2 = round(($_8_pass_sub2 * 100)/$n_count[5],2);

$pass_sub3 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem8` WHERE $_8_sub[2] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub3)){  
                            $_8_pass_sub3 = $row[0];
                        }
                        
$_8_pp_sub3 = round(($_8_pass_sub3 * 100)/$n_count[5],2);

$pass_sub4 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem8` WHERE $_8_sub[3] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub4)){  
                            $_8_pass_sub4 = $row[0];
                        }
                        
$_8_pp_sub4 = round(($_8_pass_sub4 * 100)/$n_count[5],2);

$pass_sub5 = mysqli_query($conn,"SELECT COUNT(*) FROM `$table_sem8` WHERE $_8_sub[4] >= 28;");                        
                        while($row = mysqli_fetch_array($pass_sub5)){  
                            $_8_pass_sub5 = $row[0];
                        }
                        
$_8_pp_sub5 = round(($_8_pass_sub5 * 100)/$n_count[5],2); 

$att1 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=0,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=0,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=0,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=0,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=0,1,null)) as Count_Sub5_attempt from `$table_sem8`"); 
                        while($row = mysqli_fetch_array($att1)){  
                            $sem8_sub1_att_1 = $row[0];
                            $sem8_sub2_att_1 = $row[1];
                            $sem8_sub3_att_1 = $row[2];
                            $sem8_sub4_att_1 = $row[3];
                            $sem8_sub5_att_1 = $row[4];
                        }

$att2 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=1,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=1,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=1,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=1,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=1,1,null)) as Count_Sub5_attempt from `$table_sem8`"); 
                        while($row = mysqli_fetch_array($att2)){  
                            $sem8_sub1_att_2 = $row[0];
                            $sem8_sub2_att_2 = $row[1];
                            $sem8_sub3_att_2 = $row[2];
                            $sem8_sub4_att_2 = $row[3];
                            $sem8_sub5_att_2 = $row[4];
                        }  

$att3 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=2,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=2,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=2,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=2,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=2,1,null)) as Count_Sub5_attempt from `$table_sem8`"); 
                        while($row = mysqli_fetch_array($att3)){  
                            $sem8_sub1_att_3 = $row[0];
                            $sem8_sub2_att_3 = $row[1];
                            $sem8_sub3_att_3 = $row[2];
                            $sem8_sub4_att_3 = $row[3];
                            $sem8_sub5_att_3 = $row[4];
                        } 

$att4 = mysqli_query($conn,"SELECT count(if(SUB_1_Atmp=3,1,null)) as Count_Sub1_attempt, count(if(SUB_2_Atmp=3,1,null)) as Count_Sub2_attempt, count(if(SUB_3_Atmp=3,1,null)) as Count_Sub3_attempt, count(if(SUB_4_Atmp=3,1,null)) as Count_Sub4_attempt, count(if(SUB_5_Atmp=3,1,null)) as Count_Sub5_attempt from `$table_sem8`"); 
                        while($row = mysqli_fetch_array($att4)){  
                            $sem8_sub1_att_4 = $row[0];
                            $sem8_sub2_att_4 = $row[1];
                            $sem8_sub3_att_4 = $row[2];
                            $sem8_sub4_att_4 = $row[3];
                            $sem8_sub5_att_4 = $row[4];
                        }   



?>