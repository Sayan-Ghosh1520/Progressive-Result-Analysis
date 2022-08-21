<?php
  include 'config.php';
  session_start();
  $batch= $_POST['batch'];
  $_SESSION['batch']=$batch;
  $table_sem1 = $batch."_1_sem";
  $table_sem2 = $batch."_2_sem";
  $table_sem3 = $batch."_3_sem";
  $table_sem4 = $batch."_4_sem";
  $table_sem5 = $batch."_5_sem";
  $table_sem6 = $batch."_6_sem";
  $table_sem7 = $batch."_7_sem";
  $table_sem8 = $batch."_8_sem";
  include 'data_prog.php';

?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Progressive Report</title>
  <style media="screen">

  </style>
</head>

<body class="container">
 <br>
  <table border="1" class="text-center">
   <tr>
    <th colspan="3"> <h3>BHILAI INSTITUTE OF TECHNOLOGY <br>
            DEPARTMENT OF INFORMATION TECHNOLOGY<br>
            BATCH (<?php echo $batch;?>)</h3> </th>
   </tr>
  <tr>
    <th width=10% style="border: 1px solid black;padding: 15px;"> ROLL NO. </th>
    <th width=10% style="border: 1px solid black;padding: 15px;">NAME OF STUDENT</th>
    <th width=10% style="border: 1px solid black;padding: 15px;">GRAND TOTAL</th>
  </tr>

  <?php
        $info = mysqli_query($conn,"Select URN,NAME,sum(TOTAL) Grand_Total from ( select URN,NAME,TOTAL from $table_sem1 union all select URN,NAME,TOTAL from $table_sem2 union all select URN,NAME,TOTAL from $table_sem3 union all select URN,NAME,TOTAL from $table_sem4 union all select URN,NAME,TOTAL from $table_sem5 union all select URN,NAME,TOTAL from $table_sem6 union all select URN,NAME,TOTAL from $table_sem7 union all select URN,NAME,TOTAL from $table_sem8 ) t group by URN ORDER BY Grand_total DESC LIMIT 10");
              while($row = mysqli_fetch_array($info)){
      ?>

  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $row['URN'];?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $row['NAME'];?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $row['Grand_Total'];?></td>
  </tr>
  <?php            
               }
    ?> 

  </table>

  <div class="empty-space" style="height:100px;"></div>
          <table class="text-center" id="print" style="visibility: hidden;">
            <tr>
              <th style="padding-left: 70px;">Dated:<br><?php echo date("d/m/Y"); ?></th>
              <th style="padding-left: 100px;">In-Charge<br>(Result Analysis)</th>
              <th style="padding-left: 100px;">H . O . D<br>(Information Technology)</th>
            </tr>
          </table>
  <p style="page-break-after: always;"></p>
  <br> 




  <div class="text-center" id="print1" style="visibility: hidden;">
    <h3>BHILAI INSTITUTE OF TECHNOLOGY <br>
    DEPARTMENT OF INFORMATION TECHNOLOGY <br></h3>
  </div> 
  <div class="text-center"> 
    <h5>OVERALL DEGREE ANALYSIS <br>
    BATCH (<?php echo $batch;?>)</h5>
  </div>


  <table border="1" class="text-center">
<tr>
  <th rowspan="2" style="border: 1px solid black;">Semester</th>
  <th rowspan="2" style="border: 1px solid black;">Total no. of students apllied</th>
  <th rowspan="2" style="border: 1px solid black;">Total no. of students passed</th>
  <th rowspan="2" style="border: 1px solid black;">Total no. of students failed</th>
  <th rowspan="2" style="border: 1px solid black;">Passing Percentage</th>
  <th colspan="5" style="border: 1px solid black;">No. of students passed in</th>

</tr>
<tr>
  <th>1st Attempt</th>
  <th>2nd Attempt</th>
  <th>3rd Attempt</th>
  <th>4th Attempt</th>
  <th>NOT Cleared</th>
</tr>
<tr>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;">1st</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $n_count[0]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_count[0]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $fail_count[0]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_per[0]; ?>%</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem1_1_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem1_2_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem1_3_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem1_4_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem1_5_atm; ?></td>
</tr>
<tr>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;">2nd</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $n_count[1]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_count[1]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $fail_count[1]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_per[1]; ?>%</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem2_1_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem2_2_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem2_3_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem2_4_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem2_5_atm; ?></td>
</tr>
<tr>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;">3rd</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $n_count[2]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_count[2]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $fail_count[2]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_per[2]; ?>%</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem3_1_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem3_2_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem3_3_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem3_4_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem3_5_atm; ?></td>
</tr>
<tr>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;">4th</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $n_count[3]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_count[3]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $fail_count[3]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_per[3]; ?>%</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem4_1_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem4_2_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem4_3_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem4_4_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem4_5_atm; ?></td>
</tr>
<tr>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;">5th</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $n_count[4]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_count[4]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $fail_count[4]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_per[4]; ?>%</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem5_1_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem5_2_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem5_3_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem5_4_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem5_5_atm; ?></td>
</tr>
<tr>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;">6th</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $n_count[5]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_count[5]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $fail_count[5]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_per[5]; ?>%</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem6_1_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem6_2_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem6_3_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem6_4_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem6_5_atm; ?></td>
</tr>
<tr>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;">7th</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $n_count[6]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_count[6]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $fail_count[6]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_per[6]; ?>%</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem7_1_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem7_2_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem7_3_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem7_4_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem7_5_atm; ?></td>
</tr>
<tr>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;">8th</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $n_count[7]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_count[7]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $fail_count[7]; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $pass_per[7]; ?>%</td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem8_1_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem8_2_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem8_3_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem8_4_atm; ?></td>
  <td style="border: 1px solid black;padding-top: 15px;padding-bottom: 15px;"><?php echo $sem8_5_atm; ?></td>
</tr>
  </table>

  <div class="empty-space" style="height:100px;"></div>
          <table class="text-center" id="print2" style="visibility: hidden;">
            <tr>
              <th style="padding-left: 70px;">Dated:<br><?php echo date("d/m/Y"); ?></th>
              <th style="padding-left: 100px;">In-Charge<br>(Result Analysis)</th>
              <th style="padding-left: 100px;">H . O . D<br>(Information Technology)</th>
            </tr>
          </table>
  <p style="page-break-after: always;"></p>
  <br>

  <div class="text-center" id="print3" style="visibility: hidden;">
    <h3>BHILAI INSTITUTE OF TECHNOLOGY <br>
    DEPARTMENT OF INFORMATION TECHNOLOGY <br></h3>
  </div> 
  <div class="text-center"> 
    <h5>SEMESTER WISE TOPPER'S <br>
    BATCH (<?php echo $batch;?>)</h5>
  </div>

  <table border="1" class="text-center">
    <tr>
      <th width=10% style="border: 1px solid black;padding: 15px;">SEMESTER</th>
      <th width=10% style="border: 1px solid black;padding: 15px;">TOPPER'S NAME</th>
      <th width=10% style="border: 1px solid black;padding: 15px;">SPI</th>
    </tr>
    
    <tr>
      <td style="border: 1px solid black;padding: 15px;">1st</td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_name_1;?></td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_spi_1;?></td>
    </tr>

    <tr>
      <td style="border: 1px solid black;padding: 15px;">2nd</td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_name_2;?></td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_spi_2;?></td>
    </tr>

    <tr>
      <td style="border: 1px solid black;padding: 15px;">3rd</td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_name_3;?></td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_spi_3;?></td>
    </tr>

    <tr>
      <td style="border: 1px solid black;padding: 15px;">4th</td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_name_4;?></td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_spi_4;?></td>
    </tr>

    <tr>
      <td style="border: 1px solid black;padding: 15px;">5th</td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_name_5;?></td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_spi_5;?></td>
    </tr>

    <tr>
      <td style="border: 1px solid black;padding: 15px;">6th</td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_name_6;?></td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_spi_6;?></td>
    </tr>

    <tr>
      <td style="border: 1px solid black;padding: 15px;">7th</td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_name_7;?></td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_spi_7;?></td>
    </tr>

    <tr>
      <td style="border: 1px solid black;padding: 15px;">8th</td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_name_8;?></td>
      <td style="border: 1px solid black;padding: 15px;"><?php echo $top_spi_8;?></td>
    </tr>
  </table>

  <div class="empty-space" style="height:100px;"></div>
          <table class="text-center" id="print4" style="visibility: hidden;">
            <tr>
              <th style="padding-left: 70px;">Dated:<br><?php echo date("d/m/Y"); ?></th>
              <th style="padding-left: 100px;">In-Charge<br>(Result Analysis)</th>
              <th style="padding-left: 100px;">H . O . D<br>(Information Technology)</th>
            </tr>
          </table>
  <p style="page-break-after: always;"></p>
  <br>

  <div class="text-center" id="print5" style="visibility: hidden;">
    <h3>BHILAI INSTITUTE OF TECHNOLOGY <br>
    DEPARTMENT OF INFORMATION TECHNOLOGY <br></h3>
  </div> 
  <div class="text-center"> 
    <h5>SUBJECT WISE PERFORMANCE ANALYSIS <br>
    BATCH (<?php echo $batch;?>)<br>SEMESTER - I</h5>
  </div>

TOTAL NO. OF STUDENTS ENROLLED: <?php echo $n_count[0]; ?>
<br>
<table border="1" class="text-center">
  <tr>
    <th rowspan="2" width=10% style="border: 1px solid black;">SEMESTER</th>
    <th rowspan="2" width=20% style="border: 1px solid black;"> SUBJECT NAME</th>
    <th rowspan="2" width=30% style="border: 1px solid black;">SUBJECT TEACHER</th>
    <th colspan="4" style="border: 1px solid black;">NO. OF STUDENTS CLEARED THE SUBJECT</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;">1st Attempt</td>
    <td style="border: 1px solid black;">2nd Attempt</td>
    <td style="border: 1px solid black;">3rd Attempt</td>
    <td style="border: 1px solid black;">4th Attempt</td>
  </tr>
  <tr>
    <td rowspan="6">1st</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_1_sub_ab[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_1_sub_teacher[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub1_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub1_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub1_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub1_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_1_sub_ab[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_1_sub_teacher[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub2_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub2_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub2_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub2_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_1_sub_ab[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_1_sub_teacher[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub3_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub3_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub3_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub3_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_1_sub_ab[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_1_sub_teacher[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub4_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub4_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub4_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub4_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_1_sub_ab[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_1_sub_teacher[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub5_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub5_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub5_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem1_sub5_att_4; ?></td>
  </tr>    
</table>

<br>
<h5>Progressive Statistics:</h5>

<table border="1" class="text-center">
  <tr>
    <th style="border: 1px solid black;padding: 15px;">Subject Name</th>
    <th style="border: 1px solid black;padding: 15px;">Pass Percentage</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_1_sub_name[0]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_1_pp_sub1;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_1_sub_name[1]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_1_pp_sub2;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_1_sub_name[2]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_1_pp_sub3;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_1_sub_name[3]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_1_pp_sub4;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_1_sub_name[4]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_1_pp_sub5;?>%</td>
  </tr>
</table>

  <div class="empty-space" style="height:80px;"></div>
          <table class="text-center" id="print6" style="visibility: hidden;">
            <tr>
              <th style="padding-left: 70px;">Dated:<br><?php echo date("d/m/Y"); ?></th>
              <th style="padding-left: 100px;">In-Charge<br>(Result Analysis)</th>
              <th style="padding-left: 100px;">H . O . D<br>(Information Technology)</th>
            </tr>
          </table>
  <p style="page-break-after: always;"></p>


    <div class="text-center" id="print7" style="visibility: hidden;">
    <h3>BHILAI INSTITUTE OF TECHNOLOGY <br>
    DEPARTMENT OF INFORMATION TECHNOLOGY <br></h3>
  </div> 
  <div class="text-center"> 
    <h5>SUBJECT WISE PERFORMANCE ANALYSIS <br>
    BATCH (<?php echo $batch;?>)<br>SEMESTER - II</h5>
  </div>

TOTAL NO. OF STUDENTS ENROLLED: <?php echo $n_count[1]; ?>
<br>
<table border="1" class="text-center">
  <tr>
    <th rowspan="2" width=10% style="border: 1px solid black;">SEMESTER</th>
    <th rowspan="2" width=20% style="border: 1px solid black;"> SUBJECT NAME</th>
    <th rowspan="2" width=30% style="border: 1px solid black;">SUBJECT TEACHER</th>
    <th colspan="4" style="border: 1px solid black;">NO. OF STUDENTS CLEARED THE SUBJECT</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;">1st Attempt</td>
    <td style="border: 1px solid black;">2nd Attempt</td>
    <td style="border: 1px solid black;">3rd Attempt</td>
    <td style="border: 1px solid black;">4th Attempt</td>
  </tr>
  <tr>
    <td rowspan="6">2nd</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_2_sub_ab[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_2_sub_teacher[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub1_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub1_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub1_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub1_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_2_sub_ab[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_2_sub_teacher[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub2_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub2_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub2_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub2_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_2_sub_ab[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_2_sub_teacher[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub3_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub3_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub3_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub3_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_2_sub_ab[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_2_sub_teacher[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub4_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub4_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub4_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub4_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_2_sub_ab[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_2_sub_teacher[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub5_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub5_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub5_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem2_sub5_att_4; ?></td>
  </tr>    
</table>

<br>
<h5>Progressive Statistics:</h5>

<table border="1" class="text-center">
  <tr>
    <th style="border: 1px solid black;padding: 15px;">Subject Name</th>
    <th style="border: 1px solid black;padding: 15px;">Pass Percentage</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_2_sub_name[0]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_2_pp_sub1;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_2_sub_name[1]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_2_pp_sub2;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_2_sub_name[2]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_2_pp_sub3;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_2_sub_name[3]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_2_pp_sub4;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_2_sub_name[4]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_2_pp_sub5;?>%</td>
  </tr>
</table>

  <div class="empty-space" style="height:80px;"></div>
          <table class="text-center" id="print8" style="visibility: hidden;">
            <tr>
              <th style="padding-left: 70px;">Dated:<br><?php echo date("d/m/Y"); ?></th>
              <th style="padding-left: 100px;">In-Charge<br>(Result Analysis)</th>
              <th style="padding-left: 100px;">H . O . D<br>(Information Technology)</th>
            </tr>
          </table>
  <p style="page-break-after: always;"></p>


    <div class="text-center" id="print9" style="visibility: hidden;">
    <h3>BHILAI INSTITUTE OF TECHNOLOGY <br>
    DEPARTMENT OF INFORMATION TECHNOLOGY <br></h3>
  </div> 
  <div class="text-center"> 
    <h5>SUBJECT WISE PERFORMANCE ANALYSIS <br>
    BATCH (<?php echo $batch;?>)<br>SEMESTER - III</h5>
  </div>

TOTAL NO. OF STUDENTS ENROLLED: <?php echo $n_count[2]; ?>
<br>
<table border="1" class="text-center">
  <tr>
    <th rowspan="2" width=10% style="border: 1px solid black;">SEMESTER</th>
    <th rowspan="2" width=20% style="border: 1px solid black;"> SUBJECT NAME</th>
    <th rowspan="2" width=30% style="border: 1px solid black;">SUBJECT TEACHER</th>
    <th colspan="4" style="border: 1px solid black;">NO. OF STUDENTS CLEARED THE SUBJECT</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;">1st Attempt</td>
    <td style="border: 1px solid black;">2nd Attempt</td>
    <td style="border: 1px solid black;">3rd Attempt</td>
    <td style="border: 1px solid black;">4th Attempt</td>
  </tr>
  <tr>
    <td rowspan="7">3rd</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_3_sub_ab[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_3_sub_teacher[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub1_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub1_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub1_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub1_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_3_sub_ab[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_3_sub_teacher[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub2_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub2_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub2_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub2_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_3_sub_ab[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_3_sub_teacher[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub3_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub3_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub3_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub3_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_3_sub_ab[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_3_sub_teacher[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub4_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub4_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub4_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub4_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_3_sub_ab[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_3_sub_teacher[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub5_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub5_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub5_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub5_att_4; ?></td>
  </tr> 
  <!-- <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_3_sub_ab[5]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_3_sub_teacher[5]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub6_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub6_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub6_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem3_sub6_att_4; ?></td>
  </tr>  -->  
</table>

<br>
<h5>Progressive Statistics:</h5>

<table border="1" class="text-center">
  <tr>
    <th style="border: 1px solid black;padding: 15px;">Subject Name</th>
    <th style="border: 1px solid black;padding: 15px;">Pass Percentage</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_3_sub_name[0]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_3_pp_sub1;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_3_sub_name[1]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_3_pp_sub2;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_3_sub_name[2]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_3_pp_sub3;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_3_sub_name[3]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_3_pp_sub4;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_3_sub_name[4]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_3_pp_sub5;?>%</td>
  </tr>
  <!-- <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_3_sub_name[5]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_3_pp_sub6;?>%</td>
  </tr> -->
</table>

  <div class="empty-space" style="height:80px;"></div>
          <table class="text-center" id="print10" style="visibility: hidden;">
            <tr>
              <th style="padding-left: 70px;">Dated:<br><?php echo date("d/m/Y"); ?></th>
              <th style="padding-left: 100px;">In-Charge<br>(Result Analysis)</th>
              <th style="padding-left: 100px;">H . O . D<br>(Information Technology)</th>
            </tr>
          </table>
  <p style="page-break-after: always;"></p>


    <div class="text-center" id="print11" style="visibility: hidden;">
    <h3>BHILAI INSTITUTE OF TECHNOLOGY <br>
    DEPARTMENT OF INFORMATION TECHNOLOGY <br></h3>
  </div> 
  <div class="text-center"> 
    <h5>SUBJECT WISE PERFORMANCE ANALYSIS <br>
    BATCH (<?php echo $batch;?>)<br>SEMESTER - IV</h5>
  </div>

TOTAL NO. OF STUDENTS ENROLLED: <?php echo $n_count[3]; ?>
<br>
<table border="1" class="text-center">
  <tr>
    <th rowspan="2" width=10% style="border: 1px solid black;">SEMESTER</th>
    <th rowspan="2" width=20% style="border: 1px solid black;"> SUBJECT NAME</th>
    <th rowspan="2" width=30% style="border: 1px solid black;">SUBJECT TEACHER</th>
    <th colspan="4" style="border: 1px solid black;">NO. OF STUDENTS CLEARED THE SUBJECT</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;">1st Attempt</td>
    <td style="border: 1px solid black;">2nd Attempt</td>
    <td style="border: 1px solid black;">3rd Attempt</td>
    <td style="border: 1px solid black;">4th Attempt</td>
  </tr>
  <tr>
    <td rowspan="7">4th</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_4_sub_ab[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_4_sub_teacher[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub1_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub1_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub1_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub1_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_4_sub_ab[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_4_sub_teacher[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub2_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub2_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub2_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub2_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_4_sub_ab[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_4_sub_teacher[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub3_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub3_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub3_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub3_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_4_sub_ab[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_4_sub_teacher[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub4_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub4_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub4_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub4_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_4_sub_ab[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_4_sub_teacher[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub5_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub5_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub5_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub5_att_4; ?></td>
  </tr> 
<!--   <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_4_sub_ab[5]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_4_sub_teacher[5]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub6_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub6_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub6_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem4_sub6_att_4; ?></td>
  </tr>   --> 
</table>

<br>
<h5>Progressive Statistics:</h5>

<table border="1" class="text-center">
  <tr>
    <th style="border: 1px solid black;padding: 15px;">Subject Name</th>
    <th style="border: 1px solid black;padding: 15px;">Pass Percentage</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_4_sub_name[0]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_4_pp_sub1;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_4_sub_name[1]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_4_pp_sub2;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_4_sub_name[2]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_4_pp_sub3;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_4_sub_name[3]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_4_pp_sub4;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_4_sub_name[4]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_4_pp_sub5;?>%</td>
  </tr>
<!--   <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_4_sub_name[5]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_4_pp_sub6;?>%</td>
  </tr> -->
</table>

  <div class="empty-space" style="height:80px;"></div>
          <table class="text-center" id="print12" style="visibility: hidden;">
            <tr>
              <th style="padding-left: 70px;">Dated:<br><?php echo date("d/m/Y"); ?></th>
              <th style="padding-left: 100px;">In-Charge<br>(Result Analysis)</th>
              <th style="padding-left: 100px;">H . O . D<br>(Information Technology)</th>
            </tr>
          </table>
  <p style="page-break-after: always;"></p>


    <div class="text-center" id="print13" style="visibility: hidden;">
    <h3>BHILAI INSTITUTE OF TECHNOLOGY <br>
    DEPARTMENT OF INFORMATION TECHNOLOGY <br></h3>
  </div> 
  <div class="text-center"> 
    <h5>SUBJECT WISE PERFORMANCE ANALYSIS <br>
    BATCH (<?php echo $batch;?>)<br>SEMESTER - V</h5>
  </div>

TOTAL NO. OF STUDENTS ENROLLED: <?php echo $n_count[4]; ?>
<br>
<table border="1" class="text-center">
  <tr>
    <th rowspan="2" width=10% style="border: 1px solid black;">SEMESTER</th>
    <th rowspan="2" width=20% style="border: 1px solid black;"> SUBJECT NAME</th>
    <th rowspan="2" width=30% style="border: 1px solid black;">SUBJECT TEACHER</th>
    <th colspan="4" style="border: 1px solid black;">NO. OF STUDENTS CLEARED THE SUBJECT</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;">1st Attempt</td>
    <td style="border: 1px solid black;">2nd Attempt</td>
    <td style="border: 1px solid black;">3rd Attempt</td>
    <td style="border: 1px solid black;">4th Attempt</td>
  </tr>
  <tr>
    <td rowspan="7">5th</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_5_sub_ab[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_5_sub_teacher[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub1_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub1_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub1_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub1_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_5_sub_ab[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_5_sub_teacher[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub2_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub2_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub2_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub2_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_5_sub_ab[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_5_sub_teacher[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub3_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub3_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub3_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub3_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_5_sub_ab[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_5_sub_teacher[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub4_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub4_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub4_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub4_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_5_sub_ab[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_5_sub_teacher[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub5_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub5_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub5_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub5_att_4; ?></td>
  </tr> 
<!--   <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_5_sub_ab[5]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_5_sub_teacher[5]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub6_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub6_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub6_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem5_sub6_att_4; ?></td>
  </tr>      -->
</table>

<br>
<h5>Progressive Statistics:</h5>

<table border="1" class="text-center">
  <tr>
    <th style="border: 1px solid black;padding: 15px;">Subject Name</th>
    <th style="border: 1px solid black;padding: 15px;">Pass Percentage</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_5_sub_name[0]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_5_pp_sub1;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_5_sub_name[1]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_5_pp_sub2;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_5_sub_name[2]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_5_pp_sub3;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_5_sub_name[3]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_5_pp_sub4;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_5_sub_name[4]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_5_pp_sub5;?>%</td>
  </tr>
<!--   <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_5_sub_name[5]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_5_pp_sub6;?>%</td>
  </tr> -->
</table>

  <div class="empty-space" style="height:80px;"></div>
          <table class="text-center" id="print14" style="visibility: hidden;">
            <tr>
              <th style="padding-left: 70px;">Dated:<br><?php echo date("d/m/Y"); ?></th>
              <th style="padding-left: 100px;">In-Charge<br>(Result Analysis)</th>
              <th style="padding-left: 100px;">H . O . D<br>(Information Technology)</th>
            </tr>
          </table>
  <p style="page-break-after: always;"></p>


    <div class="text-center" id="print15" style="visibility: hidden;">
    <h3>BHILAI INSTITUTE OF TECHNOLOGY <br>
    DEPARTMENT OF INFORMATION TECHNOLOGY <br></h3>
  </div> 
  <div class="text-center"> 
    <h5>SUBJECT WISE PERFORMANCE ANALYSIS <br>
    BATCH (<?php echo $batch;?>)<br>SEMESTER - VI</h5>
  </div>

TOTAL NO. OF STUDENTS ENROLLED: <?php echo $n_count[5]; ?>
<br>
<table border="1" class="text-center">
  <tr>
    <th rowspan="2" width=10% style="border: 1px solid black;">SEMESTER</th>
    <th rowspan="2" width=20% style="border: 1px solid black;"> SUBJECT NAME</th>
    <th rowspan="2" width=30% style="border: 1px solid black;">SUBJECT TEACHER</th>
    <th colspan="4" style="border: 1px solid black;">NO. OF STUDENTS CLEARED THE SUBJECT</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;">1st Attempt</td>
    <td style="border: 1px solid black;">2nd Attempt</td>
    <td style="border: 1px solid black;">3rd Attempt</td>
    <td style="border: 1px solid black;">4th Attempt</td>
  </tr>
  <tr>
    <td rowspan="7">6th</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_6_sub_ab[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_6_sub_teacher[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub1_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub1_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub1_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub1_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_6_sub_ab[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_6_sub_teacher[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub2_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub2_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub2_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub2_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_6_sub_ab[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_6_sub_teacher[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub3_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub3_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub3_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub3_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_6_sub_ab[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_6_sub_teacher[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub4_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub4_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub4_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub4_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_6_sub_ab[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_6_sub_teacher[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub5_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub5_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub5_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub5_att_4; ?></td>
  </tr> 
<!--   <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_6_sub_ab[5]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_6_sub_teacher[5]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub6_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub6_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub6_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem6_sub6_att_4; ?></td>
  </tr>  -->
</table>

<br>
<h5>Progressive Statistics:</h5>

<table border="1" class="text-center">
  <tr>
    <th style="border: 1px solid black;padding: 15px;">Subject Name</th>
    <th style="border: 1px solid black;padding: 15px;">Pass Percentage</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_6_sub_name[0]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_6_pp_sub1;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_6_sub_name[1]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_6_pp_sub2;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_6_sub_name[2]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_6_pp_sub3;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_6_sub_name[3]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_6_pp_sub4;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_6_sub_name[4]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_6_pp_sub5;?>%</td>
  </tr>
<!--   <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_6_sub_name[5]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_6_pp_sub6;?>%</td>
  </tr> -->
</table>

  <div class="empty-space" style="height:80px;"></div>
          <table class="text-center" id="print16" style="visibility: hidden;">
            <tr>
              <th style="padding-left: 70px;">Dated:<br><?php echo date("d/m/Y"); ?></th>
              <th style="padding-left: 100px;">In-Charge<br>(Result Analysis)</th>
              <th style="padding-left: 100px;">H . O . D<br>(Information Technology)</th>
            </tr>
          </table>
  <p style="page-break-after: always;"></p>


    <div class="text-center" id="print17" style="visibility: hidden;">
    <h3>BHILAI INSTITUTE OF TECHNOLOGY <br>
    DEPARTMENT OF INFORMATION TECHNOLOGY <br></h3>
  </div> 
  <div class="text-center"> 
    <h5>SUBJECT WISE PERFORMANCE ANALYSIS <br>
    BATCH (<?php echo $batch;?>)<br>SEMESTER - VII</h5>
  </div>

TOTAL NO. OF STUDENTS ENROLLED: <?php echo $n_count[6]; ?>
<br>
<table border="1" class="text-center">
  <tr>
    <th rowspan="2" width=10% style="border: 1px solid black;">SEMESTER</th>
    <th rowspan="2" width=20% style="border: 1px solid black;"> SUBJECT NAME</th>
    <th rowspan="2" width=30% style="border: 1px solid black;">SUBJECT TEACHER</th>
    <th colspan="4" style="border: 1px solid black;">NO. OF STUDENTS CLEARED THE SUBJECT</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;">1st Attempt</td>
    <td style="border: 1px solid black;">2nd Attempt</td>
    <td style="border: 1px solid black;">3rd Attempt</td>
    <td style="border: 1px solid black;">4th Attempt</td>
  </tr>
  <tr>
    <td rowspan="6">7th</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_7_sub_ab[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_7_sub_teacher[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub1_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub1_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub1_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub1_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_7_sub_ab[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_7_sub_teacher[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub2_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub2_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub2_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub2_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_7_sub_ab[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_7_sub_teacher[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub3_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub3_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub3_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub3_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_7_sub_ab[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_7_sub_teacher[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub4_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub4_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub4_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub4_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_7_sub_ab[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_7_sub_teacher[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub5_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub5_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub5_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem7_sub5_att_4; ?></td>
  </tr>   
</table>

<br>
<h5>Progressive Statistics:</h5>

<table border="1" class="text-center">
  <tr>
    <th style="border: 1px solid black;padding: 15px;">Subject Name</th>
    <th style="border: 1px solid black;padding: 15px;">Pass Percentage</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_7_sub_name[0]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_7_pp_sub1;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_7_sub_name[1]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_7_pp_sub2;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_7_sub_name[2]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_7_pp_sub3;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_7_sub_name[3]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_7_pp_sub4;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_7_sub_name[4]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_7_pp_sub5;?>%</td>
  </tr>
</table>

  <div class="empty-space" style="height:80px;"></div>
          <table class="text-center" id="print18" style="visibility: hidden;">
            <tr>
              <th style="padding-left: 70px;">Dated:<br><?php echo date("d/m/Y"); ?></th>
              <th style="padding-left: 100px;">In-Charge<br>(Result Analysis)</th>
              <th style="padding-left: 100px;">H . O . D<br>(Information Technology)</th>
            </tr>
          </table>
  <p style="page-break-after: always;"></p>


    <div class="text-center" id="print19" style="visibility: hidden;">
    <h3>BHILAI INSTITUTE OF TECHNOLOGY <br>
    DEPARTMENT OF INFORMATION TECHNOLOGY <br></h3>
  </div> 
  <div class="text-center"> 
    <h5>SUBJECT WISE PERFORMANCE ANALYSIS <br>
    BATCH (<?php echo $batch;?>)<br>SEMESTER - VIII</h5>
  </div>

TOTAL NO. OF STUDENTS ENROLLED: <?php echo $n_count[7]; ?>
<br>
<table border="1" class="text-center">
  <tr>
    <th rowspan="2" width=10% style="border: 1px solid black;">SEMESTER</th>
    <th rowspan="2" width=20% style="border: 1px solid black;"> SUBJECT NAME</th>
    <th rowspan="2" width=30% style="border: 1px solid black;">SUBJECT TEACHER</th>
    <th colspan="4" style="border: 1px solid black;">NO. OF STUDENTS CLEARED THE SUBJECT</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;">1st Attempt</td>
    <td style="border: 1px solid black;">2nd Attempt</td>
    <td style="border: 1px solid black;">3rd Attempt</td>
    <td style="border: 1px solid black;">4th Attempt</td>
  </tr>
  <tr>
    <td rowspan="6">8th</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_8_sub_ab[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_8_sub_teacher[0]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub1_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub1_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub1_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub1_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_8_sub_ab[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_8_sub_teacher[1]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub2_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub2_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub2_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub2_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_8_sub_ab[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_8_sub_teacher[2]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub3_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub3_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub3_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub3_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_8_sub_ab[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_8_sub_teacher[3]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub4_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub4_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub4_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub4_att_4; ?></td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_8_sub_ab[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $_8_sub_teacher[4]; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub5_att_1; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub5_att_2; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub5_att_3; ?></td>
    <td style="border: 1px solid black;padding-top: 5px;padding-bottom: 5px;"><?php echo $sem8_sub5_att_4; ?></td>
  </tr>   
</table>

<br>
<h5>Progressive Statistics:</h5>

<table border="1" class="text-center">
  <tr>
    <th style="border: 1px solid black;padding: 15px;">Subject Name</th>
    <th style="border: 1px solid black;padding: 15px;">Pass Percentage</th>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_8_sub_name[0]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_8_pp_sub1;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_8_sub_name[1]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_8_pp_sub2;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_8_sub_name[2]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_8_pp_sub3;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_8_sub_name[3]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_8_pp_sub4;?>%</td>
  </tr>
  <tr>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_8_sub_name[4]; ?></td>
    <td style="border: 1px solid black;padding: 15px;"><?php echo $_8_pp_sub5;?>%</td>
  </tr>
</table>

  <div class="empty-space" style="height:60px;"></div>
          <table class="text-center" id="print20" style="visibility: hidden;">
            <tr>
              <th style="padding-left: 70px;">Dated:<br><?php echo date("d/m/Y"); ?></th>
              <th style="padding-left: 100px;">In-Charge<br>(Result Analysis)</th>
              <th style="padding-left: 100px;">H . O . D<br>(Information Technology)</th>
            </tr>
          </table>
  <center><button class="btn btn-primary" style="" id="print-btn" onclick="print_report()">Generate Report &rarr;</button></center><br>





  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


 <!-- Javascript function for print button -->
    <script type="text/javascript">
    function print_report() {
        var printButton = document.getElementById("print-btn");
        var footer = document.getElementById("print");
        var footer1 = document.getElementById("print1");
        var footer2 = document.getElementById("print2");
        var footer3 = document.getElementById("print3");
        var footer4 = document.getElementById("print4");
        var footer5 = document.getElementById("print5");
        var footer6 = document.getElementById("print6");
        var footer7 = document.getElementById("print7");
        var footer8 = document.getElementById("print8");
        var footer9 = document.getElementById("print9");
        var footer10 = document.getElementById("print10");
        var footer11 = document.getElementById("print11");
        var footer12 = document.getElementById("print12");
        var footer13 = document.getElementById("print13");
        var footer14 = document.getElementById("print14");
        var footer15 = document.getElementById("print15");
        var footer16 = document.getElementById("print16");
        var footer17 = document.getElementById("print17");
        var footer18 = document.getElementById("print18");
        var footer19 = document.getElementById("print19");
        var footer20 = document.getElementById("print20");

        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        footer.style.visibility = 'visible';
        footer1.style.visibility = 'visible';
        footer2.style.visibility = 'visible';
        footer3.style.visibility = 'visible';
        footer4.style.visibility = 'visible';
        footer5.style.visibility = 'visible';
        footer6.style.visibility = 'visible';
        footer7.style.visibility = 'visible';
        footer8.style.visibility = 'visible';
        footer9.style.visibility = 'visible';
        footer10.style.visibility = 'visible';
        footer11.style.visibility = 'visible';
        footer12.style.visibility = 'visible';
        footer13.style.visibility = 'visible';
        footer14.style.visibility = 'visible';
        footer15.style.visibility = 'visible';
        footer16.style.visibility = 'visible';
        footer17.style.visibility = 'visible';
        footer18.style.visibility = 'visible';
        footer19.style.visibility = 'visible';
        footer20.style.visibility = 'visible';

        //Print the page content
        window.print()

        //Set the print button to 'visible' again 
        printButton.style.visibility = 'visible';
        footer.style.visibility = 'hidden';
        footer1.style.visibility = 'hidden';
        footer2.style.visibility = 'hidden';
        footer3.style.visibility = 'hidden';
        footer4.style.visibility = 'hidden';
        footer5.style.visibility = 'hidden';
        footer6.style.visibility = 'hidden';
        footer7.style.visibility = 'hidden';
        footer8.style.visibility = 'hidden';
        footer9.style.visibility = 'hidden';
        footer10.style.visibility = 'hidden';
        footer11.style.visibility = 'hidden';
        footer12.style.visibility = 'hidden';
        footer13.style.visibility = 'hidden';
        footer14.style.visibility = 'hidden';
        footer15.style.visibility = 'hidden';
        footer16.style.visibility = 'hidden';
        footer17.style.visibility = 'hidden';
        footer18.style.visibility = 'hidden';
        footer19.style.visibility = 'hidden';
        footer20.style.visibility = 'hidden';
    }

</script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
