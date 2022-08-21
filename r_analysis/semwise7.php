<?php
session_start();
include 'config.php';
$y_sem7 = (date("Y")-4)."_".date("Y");
$_SESSION['y_sem7']=$y_sem7;
include 'data7.php';
$table_sem = $y_sem7. "_7_sem";
$table_sub = $y_sem7. "_7_sub";
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"></script>
  <title>Semwise Report</title>
  <style media="screen">
    body{
      overflow-x: hidden;
    }
    th {
      border: 1px solid black;
    }

    td {
      border: 1px solid black;
    }

    table {
      width: 95%;
      margin: 20px auto;
    }

    .donutChart {
      width: 20%;
      margin: 50px auto;
      align-items: center;
    }

    .barChart {
      width: 70%;
      margin: auto;
      padding-top: 50px;
    }

    .distgraph {
      width: 70%;
      margin: auto;
    }

    h2 {
      text-align: center;
      margin-top: 20px;
      text-decoration: underline;
    }

    .commentBox{
      border: 2px solid gray;
      width: 90%;
      height: 100px;
      margin: 10px auto;
    }
  .jumbotron{
      background-color: #e9ecef80;
      border-radius: 10px;
      padding: 20px;
      padding-bottom: 100px;
    }
  </style>
</head>

<body style="font-size: 22px;">
  <!-- the top title -->
  <center>
  <h2>Department of Information Technology <br>
    Result Analysis Batch: <?php echo date("Y")-4; ?>-<?php echo date("Y"); ?>
   </h2>
</center>

   <!-- the info section -->
   <div class="container">
     Semester: 7<br>

     Session: Jul <?php echo date("Y")-1; ?>-Dec <?php echo date("Y")-1; ?><br>
     RESULTS DECLARED ON :- <?php echo $date_r_1."<br>";?>
     TOTAL NO. OF STUDENTS APPEARED :- <?php echo $n_count."<br>";?>
     TOTAL NO. OF STUDENTS PASSED :-  <?php echo $pass_1."<br>";?>
     TOTAL NO. OF STUDENTS FAILED :- <?php echo $fail_1."<br>";?>
     PASS PERCENTAGE:- <?php echo $pp."%<br>";?>
     CLASS TOPPER (WITH SPI):-  <?php echo $topper;?> (SPI: <?php echo $spi;?>)<br><br><br>
   </div>


  <div class="text-center">
    <h2> Semester 7 Results</h2><br>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <th width=10% style="border: 1px solid black;">URN</th>
        <th width=30% style="border: 1px solid black;">Student Name</th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[0];?></th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[1];?></th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[2];?></th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[3];?></th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[4];?></th>
        <th width=5% style="border: 1px solid black;">Total</th>
        <th width=5% style="border: 1px solid black;">Percent</th>
        <th width=10%>Status</th>
      </tr>

      <?php
        $info = mysqli_query($conn,"SELECT * FROM `$table_sem`");
              while($row = mysqli_fetch_array($info)){
      ?>

      <tr>
        <td style="border: 1px solid black;"><?php echo $row['URN'];?></td>
        <td style="border: 1px solid black;"><?php echo $row['NAME'];?></td>
        <td style="border: 1px solid black;"><?php echo $row[4];?></td>
        <td style="border: 1px solid black;"><?php echo $row[6];?></td>
        <td style="border: 1px solid black;"><?php echo $row[8];?></td>
        <td style="border: 1px solid black;"><?php echo $row[10];?></td>
        <td style="border: 1px solid black;"><?php echo $row[12];?></td>
        <td style="border: 1px solid black;"><?php echo $row[14];?></td>
        <td style="border: 1px solid black;"><?php echo ($row[14]/1000)*100 ."%";?></td>
        <td style="border: 1px solid black;"><?php echo $row[16];?></td>
      </tr>
    <?php            
               }
    ?>  
    </table>
  </div>
  <br> <br> <br> <br>
<div class="container text-center" id="print" style="visibility: hidden;">
            <div class="row">
                <div class="col-md">
                   Dated:<br>
                   <?php echo date('d/m/20y');?>
                 </div>
                 <div class="col-md">
                   In-Charge<br>
                   (Result Analysis)
                 </div>
                 <div class="col-md">
                   H . O . D<br>
                   (Information Technology)
                 </div>
               </div>
            </div>
  <p style="page-break-after: always;"></p>
  <br> 


<div class="container text-center">
    <div class="row">
    <div class="distgraph col-lg-12 col-md-12 col-sm-12">
    <h3>Distribution Graph</h3> <br>
    <div>
      <canvas id="myChart1"></canvas>
    </div>
    <script>
    Chart.register(ChartDataLabels);
    var ctxb = document.getElementById("myChart1").getContext("2d");
    var myChart = new Chart(ctxb, {
      type: "line",
      data: {
        labels: [

          "<20%",
          "20-40%",
          "40-60%",
          "60-80%",
          ">80%",
        ],
        datasets: [{
          label: "Semester 7",
          data: [
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM `$table_sem` WHERE TOTAL >0 AND TOTAL<= 200;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>,
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM `$table_sem` WHERE TOTAL >200 AND TOTAL<= 400;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>,
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM `$table_sem` WHERE TOTAL >400 AND TOTAL<= 600;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                      }
                      ?>,
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM `$table_sem` WHERE TOTAL >600 AND TOTAL<= 800;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                      }
                      ?>,
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM `$table_sem` WHERE TOTAL >800 AND TOTAL<= 1000;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                      }
                      ?>, 0, 50],
          backgroundColor: "#5bc0de80",
        },],
        plugins: {
         datalabels: { // This code is used to display data values
                //anchor: 'end',
                //align: 'bottom',
                formatter: Math.round,
                font: {
                    weight: 'bold',
                    //size: 16
                }
            }
        }

      },
    });
  </script>
  </div>
  <br><br><br>
  <div class="barChart col-lg-12 col-md-12 col-sm-12" style="padding-top: 100px;">
    <h3>Bar Chart</h3> <br>
    <div class="">
      <canvas id="studentBarChartSem1"></canvas>
    </div>
    <script>
      Chart.register(ChartDataLabels);
      const ctx = document.getElementById('studentBarChartSem1').getContext('2d');
      const studentBarChartSem1 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['<?php echo $_1_sub_ab[0];?>', '<?php echo $_1_sub_ab[1];?>', '<?php echo $_1_sub_ab[2];?>', '<?php echo $_1_sub_ab[3];?>', '<?php echo $_1_sub_ab[4];?>'],
            datasets: [
              {
                label: 'Class Highest',
                data: [<?php echo $h_sub_1;?>, <?php echo $h_sub_2;?>, <?php echo $h_sub_3;?>, <?php echo $h_sub_4;?>, <?php echo $h_sub_5;?>, 0, 100],
                // This set represents highest marks in all subjects
                backgroundColor: '#5cb85c60',
                borderColor: '#5cb85c',
                borderWidth: 2
              },
              {
                label: 'Class Average',
                data: [<?php echo $a_sub_1;?>, <?php echo $a_sub_2;?>, <?php echo $a_sub_3;?>, <?php echo $a_sub_4;?>, <?php echo $a_sub_5;?>,  0, 100],
                // This set represents average marks in all subjects
                backgroundColor: '#f0ad4e60',

                borderColor: '#f0ad4e',
                borderWidth: 2
              },
              {
                label: 'Class Lowest',
                data: [<?php echo $l_sub_1;?>, <?php echo $l_sub_2;?>, <?php echo $l_sub_3;?>, <?php echo $l_sub_4;?>, <?php echo $l_sub_5;?>,  0, 100],
                // This set represents lowest marks in all subjects
                backgroundColor: '#d9534f60',

                borderColor: '#d9534f',
                borderWidth: 2
              }
            ]
          },
        options: {
          scales: {
        y: {
          beginAtZero: true,
          max: 100
        }
      },
           plugins: {
        datalabels: {
            anchor: 'end',
            align: 'top',
            formatter: Math.round,
            font: {
                weight: 'bold',
                size: 15
            }
        }
    }
        }
      });
    </script>
  </div>
  </div>
</div > 
<br><br><br><br>
<div class="container text-center" id="print1" style="visibility: hidden;">
            <div class="row">
                <div class="col-md">
                   Dated:<br>
                   <?php echo date('d/m/20y');?>
                 </div>
                 <div class="col-md">
                   In-Charge<br>
                   (Result Analysis)
                 </div>
                 <div class="col-md">
                   H . O . D<br>
                   (Information Technology)
                 </div>
               </div>
            </div>
  <p style="page-break-after: always;"></p>
  <br> 

<div class="text-center"> 
  <h2>Top 10 Students</h2><br>
    <table style="border: 1px solid black;">
      <tr style="border: 1px solid black;">
        <th width=10% style="border: 1px solid black;">URN</th>
        <th width=30% style="border: 1px solid black;">Student Name</th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[0];?></th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[1];?></th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[2];?></th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[3];?></th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[4];?></th>
        <th width=5% style="border: 1px solid black;">Total</th>
        <th width=5% style="border: 1px solid black;">Percent</th>
        <th width=10% style="border: 1px solid black;">Status</th>
      </tr>
      <?php
        $info = mysqli_query($conn,"SELECT * FROM `$table_sem` ORDER BY `TOTAL` DESC LIMIT 10");
              while($row = mysqli_fetch_array($info)){
      ?>

      <tr>
        <td style="border: 1px solid black;"><?php echo $row['URN'];?></td>
        <td style="border: 1px solid black;"><?php echo $row['NAME'];?></td>
        <td style="border: 1px solid black;"><?php echo $row[4];?></td>
        <td style="border: 1px solid black;"><?php echo $row[6];?></td>
        <td style="border: 1px solid black;"><?php echo $row[8];?></td>
        <td style="border: 1px solid black;"><?php echo $row[10];?></td>
        <td style="border: 1px solid black;"><?php echo $row[12];?></td>
        <td style="border: 1px solid black;"><?php echo $row[14];?></td>
        <td style="border: 1px solid black;"><?php echo ($row[14]/1000)*100 ."%";?></td>
        <td style="border: 1px solid black;"><?php echo $row[16];?></td>
      </tr>
    <?php            
               }
    ?> 
    </table>
  </div>
  <br><br><br><br><br>
<div class="container text-center" id="print2" style="visibility: hidden;">
            <div class="row">
                <div class="col-md">
                   Dated:<br>
                   <?php echo date('d/m/20y');?>
                 </div>
                 <div class="col-md">
                   In-Charge<br>
                   (Result Analysis)
                 </div>
                 <div class="col-md">
                   H . O . D<br>
                   (Information Technology)
                 </div>
               </div>
            </div>
  <p style="page-break-after: always;"></p>
  <br> 
  
  <div class="text-center">
  <h2>List of Failed Students</h2><br>
    <table style="border: 1px solid black;">
    <tr style="border: 1px solid black;">
        <th width=10% style="border: 1px solid black;">URN</th>
        <th width=30% style="border: 1px solid black;">Student Name</th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[0];?></th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[1];?></th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[2];?></th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[3];?></th>
        <th width=5% style="border: 1px solid black;"><?php echo $_1_sub_ab[4];?></th>
        <th width=5% style="border: 1px solid black;">Total</th>
        <th width=5% style="border: 1px solid black;">Percent</th>
        <th width=10% style="border: 1px solid black;">Status</th>
      </tr>
      <?php
        $info = mysqli_query($conn,"SELECT * FROM `$table_sem` WHERE STATUS='FAIL';");
              while($row = mysqli_fetch_array($info)){
      ?>

      <tr>
        <td style="border: 1px solid black;"><?php echo $row['URN'];?></td>
        <td style="border: 1px solid black;"><?php echo $row['NAME'];?></td>
        <td style="border: 1px solid black;"><?php echo $row[4];?></td>
        <td style="border: 1px solid black;"><?php echo $row[6];?></td>
        <td style="border: 1px solid black;"><?php echo $row[8];?></td>
        <td style="border: 1px solid black;"><?php echo $row[10];?></td>
        <td style="border: 1px solid black;"><?php echo $row[12];?></td>
        <td style="border: 1px solid black;"><?php echo $row[14];?></td>
        <td style="border: 1px solid black;"><?php echo ($row[14]/1000)*100 ."%";?></td>
        <td style="border: 1px solid black;"><?php echo $row[16];?></td>
      </tr>
    <?php            
               }
    ?> 
    </table>
  </div>

  <br>

  <div class="donutChart text-center">
    <h3>Donut Chart</h3>
    <center><canvas id="donutSem1"></canvas></center>
    <script>
      var don = document.getElementById("donutSem1");
      var donutSem1 = new Chart(don, {
        type: 'doughnut',
        data: {
          labels: ['Fail', 'Pass', ],
          datasets: [{
            label: 'Score',
            data: [<?php echo $fp;?>, <?php echo $pp;?>,],
            backgroundColor: [
              '#d9534f60',
              '#5cb85c60',
            ],
            borderColor: [
              '#d9534f',
              '#5cb85c',
            ],
            borderWidth: 2
          }]
        },
        options: {
          //cutoutPercentage: 40,
          responsive: true,
        }
      });
    </script>
  </div>

  <br><br><br><br>
      <div class="container text-center" id="print3" style="visibility: hidden;">
            <div class="row">
                <div class="col-md">
                   Dated:<br>
                   <?php echo date('d/m/20y');?>
                 </div>
                 <div class="col-md">
                   In-Charge<br>
                   (Result Analysis)
                 </div>
                 <div class="col-md">
                   H . O . D<br>
                   (Information Technology)
                 </div>
               </div>
            </div>
  <p style="page-break-after: always;"></p>        

  <!-- subject wise -->
  <center><h2>Subject Wise Analysis</h2></center><br>

  <!------------------------------------ Subject 1 ------------------------------------------------------>

  <div class="container jumbotron" style="border: 1px solid black;">
    <center> <h4>Subject: <?php echo $_1_sub_name[0]."(".$_1_sub_ab[0].")";?></h4></center>

  <strong>Teacher:</strong> <?php echo $_1_sub1_teacher;?>

  <table class="text-center" style="border: 1px solid black;">
  <tr style="border: 1px solid black;">
    <th rowspan="2" style="border: 1px solid black;">No. of Students appeared</th>
    <th rowspan="2" style="border: 1px solid black;">No. of students passed</th>
    <th rowspan="2" style="border: 1px solid black;">% of Passing</th>
    <th colspan="5" style="border: 1px solid black;">No. Of students scoring marks</th>
  </tr>
  <tr style="border: 1px solid black;">
    <th style="border: 1px solid black;"> &gt;75% Between</th>
    <th style="border: 1px solid black;">61% & 75%  Between</th>
    <th style="border: 1px solid black;">51% & 60%  Between</th>
    <th style="border: 1px solid black;">35% & 50%  Between</th>
    <th style="border: 1px solid black;"> &lt;35% </th>
  </tr>
    <tr>
      <td style="border: 1px solid black;"><?php echo $n_count;?></td>
      <td style="border: 1px solid black;"><?php echo $n_pass_sub1;?></td>
      <td style="border: 1px solid black;"><?php echo $pp_sub1."%";?></td>
      <td style="border: 1px solid black;"><?php echo $n_sub1_above_75;?></td>
      <td style="border: 1px solid black;"><?php echo $n_sub1_btw_61_75;?></td>
      <td style="border: 1px solid black;"><?php echo $n_sub1_btw_51_60;?></td>
      <td style="border: 1px solid black;"><?php echo $n_sub1_btw_35_50;?></td>
      <td style="border: 1px solid black;"><?php echo $n_sub1_below_35;?></td>
    </tr>
  </table>

  <strong>Top Scorer:</strong> <?php 
                              $sql26 = mysqli_query($conn,"SELECT * FROM `$table_sem` WHERE $_1_sub[0]=(select MAX($_1_sub[0]) from `$table_sem` where $_1_sub[0] != 'AB');");
                                        while($row = mysqli_fetch_array($sql26)){  
                                             echo $row['NAME']."  ( ".$row[4]." ), &nbsp;";
                                         } 
                             ?><br><br>

  <strong>Teacher's Comment:</strong>
  <div class="commentBox" style="border: 0.5px solid #b2beb5; height: 100px;"></div>
  <div style="float: right;"><br>Signature:______________&nbsp;&nbsp;&nbsp;</div>
  </div>


<!------------------------------------ Subject 2 ------------------------------------------------------>

  <div class="container jumbotron" style="border: 1px solid black;">
  <center> <h4>Subject: <?php echo $_1_sub_name[1]."(".$_1_sub_ab[1].")";?></h4></center>

<strong>Teacher:</strong> <?php echo $_1_sub2_teacher;?>

<table class="text-center" style="border: 1px solid black;">
  <tr style="border: 1px solid black;">
    <th rowspan="2" style="border: 1px solid black;">No. of Students appeared</th>
    <th rowspan="2" style="border: 1px solid black;">No. of students passed</th>
    <th rowspan="2" style="border: 1px solid black;">% of Passing</th>
    <th colspan="5" style="border: 1px solid black;">No. Of students scoring marks</th>
  </tr>
  <tr style="border: 1px solid black;">
    <th style="border: 1px solid black;"> &gt;75% Between</th>
    <th style="border: 1px solid black;">61% & 75%  Between</th>
    <th style="border: 1px solid black;">51% & 60%  Between</th>
    <th style="border: 1px solid black;">35% & 50%  Between</th>
    <th style="border: 1px solid black;"> &lt;35% </th>
  </tr>
  <tr>
    <td style="border: 1px solid black;"><?php echo $n_count;?></td>
    <td style="border: 1px solid black;"><?php echo $n_pass_sub2;?></td>
    <td style="border: 1px solid black;"><?php echo $pp_sub2."%";?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub2_above_75;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub2_btw_61_75;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub2_btw_51_60;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub2_btw_35_50;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub2_below_35;?></td>
  </tr>
</table>

<strong>Top Scorer:</strong> <?php 
                              $sql26 = mysqli_query($conn,"SELECT * FROM `$table_sem` WHERE $_1_sub[1]=(select MAX($_1_sub[1]) from `$table_sem` where $_1_sub[1] != 'AB');");          while($row = mysqli_fetch_array($sql26)){  
                                             echo $row['NAME']."  ( ".$row[6]." ), &nbsp;";
                                         } 
                             ?><br><br>

<strong>Teacher's Comment:</strong>
  <div class="commentBox" style="border: 0.5px solid #b2beb5; height: 100px;"></div>
  <div style="float: right;"><br>Signature:______________&nbsp;&nbsp;&nbsp;</div>
  </div>

  <br><br><br>
<div class="container text-center" id="print4" style="visibility: hidden;">
            <div class="row">
                <div class="col-md">
                   Dated:<br>
                   <?php echo date('d/m/20y');?>
                 </div>
                 <div class="col-md">
                   In-Charge<br>
                   (Result Analysis)
                 </div>
                 <div class="col-md">
                   H . O . D<br>
                   (Information Technology)
                 </div>
               </div>
            </div>

  <p style="page-break-after: always;"></p>



<!------------------------------------ Subject 3 ------------------------------------------------------>

  <center><h2></h2></center><br>
  <div class="container jumbotron" style="border: 1px solid black;">
  <center> <h4>Subject: <?php echo $_1_sub_name[2]."(".$_1_sub_ab[2].")";?></h4></center>

<strong>Teacher:</strong> <?php echo $_1_sub3_teacher;?>

<table class="text-center" style="border: 1px solid black;">
  <tr style="border: 1px solid black;">
    <th rowspan="2" style="border: 1px solid black;">No. of Students appeared</th>
    <th rowspan="2" style="border: 1px solid black;">No. of students passed</th>
    <th rowspan="2" style="border: 1px solid black;">% of Passing</th>
    <th colspan="5" style="border: 1px solid black;">No. Of students scoring marks</th>
  </tr>
  <tr style="border: 1px solid black;">
    <th style="border: 1px solid black;"> &gt;75% Between</th>
    <th style="border: 1px solid black;">61% & 75%  Between</th>
    <th style="border: 1px solid black;">51% & 60%  Between</th>
    <th style="border: 1px solid black;">35% & 50%  Between</th>
    <th style="border: 1px solid black;"> &lt;35% </th>
  </tr>
  <tr>
    <td style="border: 1px solid black;"><?php echo $n_count;?></td>
    <td style="border: 1px solid black;"><?php echo $n_pass_sub3;?></td>
    <td style="border: 1px solid black;"><?php echo $pp_sub3."%";?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub3_above_75;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub3_btw_61_75;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub3_btw_51_60;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub3_btw_35_50;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub3_below_35;?></td>
  </tr>
</table>

<strong>Top Scorer:</strong> <?php 
                              $sql26 = mysqli_query($conn,"SELECT * FROM `$table_sem` WHERE $_1_sub[2]=(select MAX($_1_sub[2]) from `$table_sem` where $_1_sub[2] != 'AB');");          while($row = mysqli_fetch_array($sql26)){  
                                             echo $row['NAME']."  ( ".$row[8]." ), &nbsp;";
                                         } 
                             ?><br><br>

<strong>Teacher's Comment:</strong>
  <div class="commentBox" style="border: 0.5px solid #b2beb5; height: 100px;"></div>
  <div style="float: right;"><br>Signature:______________&nbsp;&nbsp;&nbsp;</div>
  </div>



  <!------------------------------------ Subject 4 ------------------------------------------------------>

  <div class="container jumbotron" style="border: 1px solid black;">
  <center> <h4>Subject: <?php echo $_1_sub_name[3]."(".$_1_sub_ab[3].")";?></h4></center>

<strong>Teacher:</strong> <?php echo $_1_sub4_teacher;?>

<table class="text-center" style="border: 1px solid black;">
  <tr style="border: 1px solid black;">
    <th rowspan="2" style="border: 1px solid black;">No. of Students appeared</th>
    <th rowspan="2" style="border: 1px solid black;">No. of students passed</th>
    <th rowspan="2" style="border: 1px solid black;">% of Passing</th>
    <th colspan="5" style="border: 1px solid black;">No. Of students scoring marks</th>
  </tr>
  <tr style="border: 1px solid black;">
    <th style="border: 1px solid black;"> &gt;75% Between</th>
    <th style="border: 1px solid black;">61% & 75%  Between</th>
    <th style="border: 1px solid black;">51% & 60%  Between</th>
    <th style="border: 1px solid black;">35% & 50%  Between</th>
    <th style="border: 1px solid black;"> &lt;35% </th>
  </tr>
  <tr>
    <td style="border: 1px solid black;"><?php echo $n_count;?></td>
    <td style="border: 1px solid black;"><?php echo $n_pass_sub4;?></td>
    <td style="border: 1px solid black;"><?php echo $pp_sub4."%";?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub4_above_75;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub4_btw_61_75;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub4_btw_51_60;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub4_btw_35_50;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub4_below_35;?></td>
  </tr>
</table>

<strong>Top Scorer:</strong> <?php 
                              $sql26 = mysqli_query($conn,"SELECT * FROM `$table_sem` WHERE $_1_sub[3]=(select MAX($_1_sub[3]) from `$table_sem` where $_1_sub[3] != 'AB');");          while($row = mysqli_fetch_array($sql26)){ 
                                             echo $row['NAME']."  ( ".$row[10]." ), &nbsp;";
                                         } 
                             ?><br><br>

<strong>Teacher's Comment:</strong>
  <div class="commentBox" style="border: 0.5px solid #b2beb5; height: 100px;"></div>
  <div style="float: right;"><br>Signature:______________&nbsp;&nbsp;&nbsp;</div>
  </div>

  <br><br><br>
<div class="container text-center" id="print5" style="visibility: hidden;">
            <div class="row">
                <div class="col-md">
                   Dated:<br>
                   <?php echo date('d/m/20y');?>
                 </div>
                 <div class="col-md">
                   In-Charge<br>
                   (Result Analysis)
                 </div>
                 <div class="col-md">
                   H . O . D<br>
                   (Information Technology)
                 </div>
               </div>
            </div>

  <p style="page-break-after: always;"></p>



<!------------------------------------ Subject 5 ------------------------------------------------------>

  <center><h2></h2></center><br>
  <div class="container jumbotron" style="border: 1px solid black;">
  <center> <h4>Subject: <?php echo $_1_sub_name[4]."(".$_1_sub_ab[4].")";?></h4></center>

<strong>Teacher:</strong> <?php echo $_1_sub5_teacher;?>

<table class="text-center" style="border: 1px solid black;">
  <tr style="border: 1px solid black;">
    <th rowspan="2" style="border: 1px solid black;">No. of Students appeared</th>
    <th rowspan="2" style="border: 1px solid black;">No. of students passed</th>
    <th rowspan="2" style="border: 1px solid black;">% of Passing</th>
    <th colspan="5" style="border: 1px solid black;">No. Of students scoring marks</th>
  </tr>
  <tr style="border: 1px solid black;">
    <th style="border: 1px solid black;"> &gt;75% Between</th>
    <th style="border: 1px solid black;">61% & 75%  Between</th>
    <th style="border: 1px solid black;">51% & 60%  Between</th>
    <th style="border: 1px solid black;">35% & 50%  Between</th>
    <th style="border: 1px solid black;"> &lt;35% </th>
  </tr>
  <tr>
    <td style="border: 1px solid black;"><?php echo $n_count;?></td>
    <td style="border: 1px solid black;"><?php echo $n_pass_sub5;?></td>
    <td style="border: 1px solid black;"><?php echo $pp_sub5."%";?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub5_above_75;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub5_btw_61_75;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub5_btw_51_60;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub5_btw_35_50;?></td>
    <td style="border: 1px solid black;"><?php echo $n_sub5_below_35;?></td>
  </tr>
</table>

<strong>Top Scorer:</strong> <?php 
                              $sql26 = mysqli_query($conn,"SELECT * FROM `$table_sem` WHERE $_1_sub[4]=(select MAX($_1_sub[4]) from `$table_sem` where $_1_sub[4] != 'AB');");          while($row = mysqli_fetch_array($sql26)){  
                                             echo $row['NAME']."  ( ".$row[12]." ), &nbsp;";
                                         } 
                             ?><br><br>

<strong>Teacher's Comment:</strong>
  <div class="commentBox" style="border: 0.5px solid #b2beb5; height: 100px;"></div>
  <div style="float: right;"><br>Signature:______________&nbsp;&nbsp;&nbsp;<br></div>
  </div>

  

  <div class="container text-center">
    <br><br><br><br><br><br><br>
    
    
    <center><button class="btn btn-primary" style="" id="print-btn" onclick="print_report()">Generate Report &rarr;</button></center>
    <div class="row" id="print6" style="visibility: hidden;">
      <div class="col-md">
          Dated:<br>
          <?php echo date('d/m/20y');?>
      </div>
      <div class="col-md">
          In-Charge<br>
          (Result Analysis)
      </div>
      <div class="col-md">
          H . O . D<br>
          (Information Technology)
      </div>
    </div>
  </div>


    
  <!-- Bootstrap JS -->
  <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
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

        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        footer.style.visibility = 'visible';
        footer1.style.visibility = 'visible';
        footer2.style.visibility = 'visible';
        footer3.style.visibility = 'visible';
        footer4.style.visibility = 'visible';
        footer5.style.visibility = 'visible';
        footer6.style.visibility = 'visible';

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
    }

</script>

</body>

</html>
