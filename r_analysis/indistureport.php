<?php
include 'config.php';
include 'sr_data.php';

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
    <title>Student Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style media="screen">
    .barChart {
      width: 70%;
      margin: 50px auto;
    }
    
    .donutChart {
      width: 30%;
      float: left;
      margin-left: 120px;
    }
    
    .radarChart {
      width: 30%;
      margin-right: 120px;
      float: right;
    }
    
    .histoGram {
      width: 60%;
      margin: 20px auto;
      height: 400 px;
    }
    
    .student-info {
      display: block;
    }
    
    h3 {
      align-content: center;
    }
    
    th {
      border: 1px solid black;
    }
    
    td {
      border: 1px solid black;
    }
    
    table {
      width: 90%;
      text-align: center;
    }
    </style>
  </head>

  <body class="container" style="font-size: 22px;">
    <br>
    <center>
      <h2> <u> Student Progress Report </u> </h2>
      <br>
      <h3 class="card-title">Student Name: <?php echo $name;?></h3>
      <br> </center>
    <div class="row">
        <p style="margin:20px;"> <strong>Branch:- </strong> Information Technology<br>
            <br> <strong>University Roll Number:- </strong> <?php echo $urn;?><br>
            <br> <strong>Semester:- </strong> <?php echo $sem; ?> Semester <br><br>
        </p>
    </div>
    <br>
    <center>
      <table style="border: 1px solid black;">
        <tr style="border: 1px solid black;">
          <th width=20%>Subject Code</th>
          <th width=40%>Subject Name</th>
          <th width=15%>Marks Obtained</th>
          <th width=15%>Total Marks</th>
          <th width=10%>Status</th>
        </tr>
        <tr>
          <td>
            <?php echo $sub[0];?>
          </td>
          <td>
            <?php echo $sub_name[0];?>
          </td>
          <td>
            <?php echo $sub_1;?>
          </td>
          <td>100</td>
          <td rowspan="5">
            <?php echo $status;?>
          </td>
        </tr>
        <tr>
          <td>
            <?php echo $sub[1];?>
          </td>
          <td>
            <?php echo $sub_name[1];?>
          </td>
          <td>
            <?php echo $sub_2;?>
          </td>
          <td>100</td>
        </tr>
        <tr>
          <td>
            <?php echo $sub[2];?>
          </td>
          <td>
            <?php echo $sub_name[2];?>
          </td>
          <td>
            <?php echo $sub_3;?>
          </td>
          <td>100</td>
          <tr>
            <td>
              <?php echo $sub[3];?>
            </td>
            <td>
              <?php echo $sub_name[3];?>
            </td>
            <td>
              <?php echo $sub_4;?>
            </td>
            <td>100</td>
          </tr>
          <tr>
            <td>
              <?php echo $sub[4];?>
            </td>
            <td>
              <?php echo $sub_name[4];?>
            </td>
            <td>
              <?php echo $sub_5;?>
            </td>
            <td>100</td>
          </tr>
      </table>
    </center>
    <br><br><br><br>

    <!--------------------------------------- Bar Chart --------------------------------------------------------->
    <div class="barChart text-center">
      <h3>Bar Chart</h3><br>
    <canvas id="studentBarChartSem1" width="800px"></canvas>
    <script>
      const ctx = document.getElementById('studentBarChartSem1').getContext('2d');
      const studentBarChartSem1 = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['<?php echo $sub_ab[0];?>', '<?php echo $sub_ab[1];?>', '<?php echo $sub_ab[2];?>', '<?php echo $sub_ab[3];?>', '<?php echo $sub_ab[4];?>'],
          datasets: [{
              label: 'Student Marks',
              data: [<?php echo $sub_1;?>, <?php echo $sub_2;?>, <?php echo $sub_3;?>, <?php echo $sub_4;?>, <?php echo $sub_5;?>, ],
              // All the values coorespond to marks same Subject
              // 78 is student's marks in sub 1 , 63 in sub 2 and so on
              backgroundColor: `#0275d860`,
              borderColor: `#0275d8`,
              borderWidth: 2
            },
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
              data: [<?php echo $a_sub_1;?>, <?php echo $a_sub_2;?>, <?php echo $a_sub_3;?>, <?php echo $a_sub_4;?>, <?php echo $a_sub_5;?>, ],
              // This set represents average marks in all subjects
              backgroundColor: '#f0ad4e60',

              borderColor: '#f0ad4e',
              borderWidth: 2
            },
            {
              label: 'Class Lowest',
              data: [<?php echo $l_sub_1;?>, <?php echo $l_sub_2;?>, <?php echo $l_sub_3;?>, <?php echo $l_sub_4;?>, <?php echo $l_sub_5;?>, ],
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
              beginAtZero: true
            }
          }
        }
      });
    </script>
  </div>
<br><br><br>


    <!--------------------------------------- Donut Chart --------------------------------------------------------->
    <div class="donutChart text-center" style="margin-top: 40px;">
      <h3>Donut Chart</h3><br>
      <center><canvas id="donutSem1" width="750" height="600"></canvas></center>
      <script>
      var don = document.getElementById("donutSem1");
      var donutSem1 = new Chart(don, {
        type: 'doughnut',
        data: {
          labels: ['Lowest', 'Student', 'Highest', 'Unscored'],
          datasets: [{
            label: 'Score',
            data: [<?php echo $l_tot;?>, <?php echo $tot;?>, <?php echo $h_tot;?>, 1000 - <?php echo $h_tot;?>],
            backgroundColor: ['#d9534f60', '#0275d860', '#5cb85c60', '#f0ad4e60'],
            borderColor: ['#d9534f', '#0275d8', '#5cb85c', '#f0ad4e'],
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


   <!--------------------------------------- Radar Chart --------------------------------------------------------->
    <div class="radarChart text-center" style="margin-top: 40px;">
      <h3>Radar Chart</h3><br>
      <center><canvas id="radar-chart" width="750" height="600"></canvas></center>
      <script>
      new Chart(document.getElementById("radar-chart"), {
        type: 'radar',
        data: {
          labels: ["<?php echo $sub_ab[0];?>", "<?php echo $sub_ab[1];?>", "<?php echo $sub_ab[2];?>", "<?php echo $sub_ab[3];?>", "<?php echo $sub_ab[4];?>"],
          datasets: [{
            label: "Student",
            fill: true,
            backgroundColor: "#0275d880",
            borderColor: "#0275d8",
            //            pointBorderColor: "#fff",
            //            pointBackgroundColor: "rgba(179,181,198,1)",
            data: [<?php echo $sub_1;?>, <?php echo $sub_2;?>, <?php echo $sub_3;?>, <?php echo $sub_4;?>, <?php echo $sub_5;?>, ]
          }, {
            label: "Highest",
            fill: true,
            backgroundColor: "#5cb85c80",
            borderColor: "#5cb85c",
            //            pointBorderColor: "#fff",
            //            pointBackgroundColor: "rgba(255,99,132,1)",
            //            pointBorderColor: "#fff",
            data: [<?php echo $h_sub_1;?>, <?php echo $h_sub_2;?>, <?php echo $h_sub_3;?>, <?php echo $h_sub_4;?>, <?php echo $h_sub_5;?>, ]
          }, {
            label: "Average",
            fill: true,
            backgroundColor: "#f0ad4e80",
            borderColor: "#f0ad4e",
            //            pointBorderColor: "#fff",
            //            pointBackgroundColor: "rgba(179,181,198,1)",
            data: [<?php echo $a_sub_1;?>, <?php echo $a_sub_2;?>, <?php echo $a_sub_3;?>, <?php echo $a_sub_4;?>, <?php echo $a_sub_5;?>, ]
          }, {
            label: "Lowest",
            fill: true,
            backgroundColor: "#d9534f80",
            borderColor: "#d9534f",
            //            pointBorderColor: "#fff",
            //            pointBackgroundColor: "rgba(179,181,198,1)",
            data: [<?php echo $l_sub_1;?>, <?php echo $l_sub_2;?>, <?php echo $l_sub_3;?>, <?php echo $l_sub_4;?>, <?php echo $l_sub_5;?>, ]
          }]
        },
        options: {
          title: {
            display: true,
            // text: 'Distribution in % of world population'
          }
        }
      });
      </script>
    </div>


    <!--------------------------------------- Histogram --------------------------------------------------------->
<!--     <div class="histoGram">
      <canvas id="histoSem1"></canvas>
      <script>
      var ctx = document.getElementById("histoSem1").getContext('2d');
      var histoSem1 = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sem1", "Sem2", "Sem3", "Sem4", ],
          datasets: [{
            label: 'Overall progress',
            data: [78, 82, 77, 79, ],
            backgroundColor: '#0275d8',
            borderColor: `#0275d880`,
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            },
          }
        }
      });
      </script>
    </div> -->
    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
  </body>

  </html>
