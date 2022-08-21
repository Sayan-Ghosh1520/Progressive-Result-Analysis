<?php

include 'config.php';

session_start();
if(isset($_SESSION['username'])){}
  else{
    header('location: ../login.php');
  }

$y_sem1 = (date("Y")-1)."_".(date("Y")+3)."_1_sem";
$y_sem3 = (date("Y")-2)."_".(date("Y")+2)."_3_sem";
$y_sem5 = (date("Y")-3)."_".(date("Y")+1)."_5_sem";
$y_sem7 = (date("Y")-4)."_".(date("Y"))."_7_sem";

$y_sem2 = (date("Y")-1)."_".(date("Y")+3)."_2_sem";
$y_sem4 = (date("Y")-2)."_".(date("Y")+2)."_4_sem";
$y_sem6 = (date("Y")-3)."_".(date("Y")+1)."_6_sem";      
$y_sem8 = (date("Y")-4)."_".(date("Y"))."_8_sem";  

include 'dash_data.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

  <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <meta charset="utf-8">
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script type="text/javascript">
    function oesem(x){
      if(x==0){
        document.getElementById('OddSem').style.display='block';
        document.getElementById('EvenSem').style.display='none';
      }
      else if(x==1){
        document.getElementById('EvenSem').style.display='block';
        document.getElementById('OddSem').style.display='none';
      }
    }
  </script>
  <title>RESULT ANALYSIS</title>
  <style media="screen">
    body {
      overflow-x: hidden; 
    }
    .progress {
      margin: 20px 0px;
      opacity: 0.8;
      height: 20px;
      font-size: 18px;
    }


    .card {
      padding: 20px;
      border: 0px;
      margin-top: 30px;
      text-align: center;

    }

    main {
      position: fixed;
      height: 100% !important;
    }

    a {
      text-decoration: none;
      color: white;
    }
  </style>
</head>

<body class="text-center">


  <div class="row">
    <!-- the left side -->
    <!-- sidebar -->

    <div class="col-3" id="sidebar">

      <main>
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height:100%;">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32">
              <use xlink:href="#bootstrap" />
            </svg>
            <span class="fs-4">Result Analysis</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link active" aria-current="page">
                Dashboard
              </a>
            </li>
            <li class="nav-item has-submenu mt-2">
              <a href="#" class="nav-link text-white nav-link">
                Semesterwise
              </a> 
              <ul style="list-style-type:none;" class="submenu collapse">
                <li> <a class="nav-link" href="semwise1.php" target="_blank">Semester 1</a> </li>
                <li> <a class="nav-link" href="semwise2.php" target="_blank">Semester 2</a> </li>
                <li> <a class="nav-link" href="semwise3.php" target="_blank">Semester 3</a> </li>
                <li> <a class="nav-link" href="semwise4.php" target="_blank">Semester 4</a> </li>
                <li> <a class="nav-link" href="semwise5.php" target="_blank">Semester 5</a> </li>
                <li> <a class="nav-link" href="semwise6.php" target="_blank">Semester 6</a> </li>
                <li> <a class="nav-link" href="semwise7.php" target="_blank">Semester 7</a> </li>
                <li> <a class="nav-link" href="semwise8.php" target="_blank">Semester 8</a> </li>
                <br>
              </ul>
            </li>
<!--             <li class="mt-2">
              <a href="indistu.php" class="nav-link text-white">
                Individual Student
              </a>
            </li> -->
            <li class="mt-2">
              <a href="progressive.php" class="nav-link text-white">
                Progressive Analysis
              </a>
            </li>


          </ul>
          <div class="emptyspace" style="min-height:auto;">

          </div>
          <hr>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/default-user.jpg" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong><?php echo $_SESSION['username'];?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
            </ul>
          </div>

        </div>
      </main>

    </div>

    <!-- the right side -->
    <!-- page content -->


    <br> <br>
    <div class="col-9" style="margin-left: -50px; margin-right: -100px;">
      <!-- the alerts -->
      <div class="row" style="margin:10px; margin-top:30px;">
        <div class="col-3">
          <div class="alert alert-primary" role="alert">
            Theory Subjects: 5
          </div>
        </div>
        <div class="col-3">
          <div class="alert alert-success" role="alert">
            Practical Subjects: 4
          </div>
        </div>
        <div class="col-3">
          <div class="alert alert-warning" role="alert">
            No. of Classes:
          </div>
        </div>
        <div class="col-3">
          <div class="alert alert-info" role="alert">
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="SemOdd">Odd Sem</label>
              <input class="form-check-input" type="radio" name="inlineSemSelect" onclick="oesem(0)" checked>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label" for="SemEven">Even Sem</label>
              <input class="form-check-input" type="radio" name="inlineSemSelect" onclick="oesem(1)">
            </div>
          </div>
        </div>
      </div>



      <!------------------------------------------------------ ODD SEM --------------------------------------------->
      <div id="OddSem" class="white-box">
      <div class="row">
        <div class="col-6">
          <div class="chart container" style="width:95%; margin-top:30px;">
            <h2>Semester Wise Progress</h2>
            <canvas id="myChart_o"></canvas>
            <script>
              var xValues = ["Semester 1 ", "Semester 3", "Semester 5", "Semester 7"];
              var yValues = [55, 49, 30, 100]; //change these values as well, along with lower values
              var barColors = ["#5bc0de80", "#5cb85c80", "#f0ad4e90", "#0275d890", "brown"];

              new Chart("myChart_o", {
                type: "bar",
                data: {
                  labels: xValues,
                  datasets: [{
                    backgroundColor: barColors,
                    data: [<?php echo $avg_per_1;?>, <?php echo $avg_per_3;?>, <?php echo $avg_per_5;?>, <?php echo $avg_per_7;?>, 0, 100]
                    // let the last 2 values be extra 0 and 100 for y graph values
                  }]
                },
                options: {
                  legend: {
                    display: false
                  },
                  title: {
                    display: true,
                    // text: "Semester wise overall progress"
                  }
                }
              });
            </script>
          </div>
        </div>
        <div class="col-6">

          <div class="container" style="  width: 90%; margin-top:30px;">
            <h2>Score Area</h2> <br>
            <div>
              <canvas id="myChart1_o"></canvas>
            </div>
          </div>


          <script>
            var ctx = document.getElementById("myChart1_o").getContext("2d");
            var myChart = new Chart(ctx, {
              type: "line",
              data: {
                labels: [

                  "0-20%",
                  "20-40%",
                  "40-60%",
                  "60-80%",
                  "80-100%",
                ],
                datasets: [{
                    label: "Semester 1",
                    data: [
                    <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem1 WHERE TOTAL >0 AND TOTAL<= 200;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>, 
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem1 WHERE TOTAL >200 AND TOTAL<= 400;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>,
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem1 WHERE TOTAL >400 AND TOTAL<= 600;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem1 WHERE TOTAL >640 AND TOTAL<= 800;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem1 WHERE TOTAL >800 AND TOTAL<= 1000;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 0, 50],
                    backgroundColor: "#5bc0de80",
                  },
                  {
                    label: "Semester 3",
                    data: [
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem3 WHERE TOTAL >0 AND TOTAL<= 200;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>, 
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem3 WHERE TOTAL >200 AND TOTAL<= 400;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>,
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem3 WHERE TOTAL >400 AND TOTAL<= 600;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem3 WHERE TOTAL >600 AND TOTAL<= 800;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem3 WHERE TOTAL >800 AND TOTAL<= 1000;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 0, 50],
                    backgroundColor: "#5cb85c80",
                  },
                  {
                    label: "Semester 5",
                    data: [
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem5 WHERE TOTAL >0 AND TOTAL<= 200;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>, 
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem5 WHERE TOTAL >200 AND TOTAL<= 400;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem5 WHERE TOTAL >400 AND TOTAL<= 600;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem5 WHERE TOTAL >600 AND TOTAL<= 800;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem5 WHERE TOTAL >800 AND TOTAL<= 1000;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 0, 50],
                    backgroundColor: "#f0ad4e80",
                  },
                  {
                    label: "Semester 7",
                    data: [
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem7 WHERE TOTAL >0 AND TOTAL<= 200;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>,
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem7 WHERE TOTAL >200 AND TOTAL<= 400;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>,
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem7 WHERE TOTAL >400 AND TOTAL<= 600;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem7 WHERE TOTAL >600 AND TOTAL<= 800;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem7 WHERE TOTAL >800 AND TOTAL<= 1000;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 0, 50],
                    backgroundColor: "#0275d880",
                  },

                ],
              },
            });
          </script>
        </div>

      </div>
      <br>
      <!-- the lower cards section -->
      <!-- all Semesters -->
      <div class="row">

        <div class="card col-3">
          <div class="card-header">
            <h3 class="card-title">Semester 1</h3>
          </div>
          <div class="card-body" style="background: #5bc0de80;">
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $high_1; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $high_1; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $avg_1; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $avg_1; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $low_1; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $low_1; ?>%</div>
            </div><br>
            <!-- <p class="card-text">Additional info will be provided.
              Feature under Development.</p> -->
            <a  href="semwise1.php" target="_blank" class="btn btn-info" style="color:white;">Complete Analysis</a>
          </div>
        </div>

        <div class="card col-3">
          <div class="card-header">
            <h3 class="card-title">Semester 3</h3>
          </div>
          <div class="card-body" style="background:#5cb85c80">
             <div class="progress">
              <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $high_3; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $high_3; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $avg_3; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $avg_3; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $low_3; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $low_3; ?>%</div>
            </div><br>
            <!-- <p class="card-text">Additional info will be provided.
              Feature under Development.</p> -->
            <a  href="semwise3.php" target="_blank" class="btn btn-success">Complete Analysis</a>
          </div>
        </div>

        <div class="card col-3">
          <div class="card-header">
            <h3 class="card-title">Semester 5</h3>
          </div>
          <div class="card-body" style="background:#f0ad4e80">
          <div class="progress">
              <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $high_5; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $high_5; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $avg_5; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $avg_5; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $low_5; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $low_5; ?>%</div>
            </div><br>
            <!-- <p class="card-text">Additional info will be provided.
              Feature under Development.</p> -->
            <a  href="semwise5.php" target="_blank" class="btn btn-alert" style="background:#f0ad4e; color: white;">Complete Analysis</a>
          </div>
        </div>

        <div class="card col-3">
          <div class="card-header">
            <h3 class="card-title">Semester 7</h3>
          </div>
          <div class="card-body" style="background:#0275d880">
                      
          <div class="progress">
              <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $high_7; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $high_7; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $avg_7; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $avg_7; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $low_7; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $low_7; ?>%</div>
            </div><br>
            <!-- <p class="card-text">Additional info will be provided.
              Feature under Development.</p> -->
            <a  href="semwise7.php" target="_blank" class="btn btn-primary">Complete Analysis</a>
          </div>
        </div>
      </div>
    </div>  





<!----------------------------------------------------------- EVEN SEM--------------------------------------------------------->
    <div id="EvenSem" style="display: none;">
      <div class="row">
        <div class="col-6">
          <div class="chart container" style="width:95%; margin-top:30px;">
            <h2>Semester Wise Progress</h2>
            <canvas id="myChart_e"></canvas>
            <script>
              var xValues = ["Semester 2 ", "Semester 4", "Semester 6", "Semester 8"];
              var yValues = [55, 49, 30, 100]; //change these values as well, along with lower values
              var barColors = ["#5bc0de80", "#5cb85c80", "#f0ad4e90", "#0275d890", "brown"];

              new Chart("myChart_e", {
                type: "bar",
                data: {
                  labels: xValues,
                  datasets: [{
                    backgroundColor: barColors,
                    data: [<?php echo $avg_per_2;?>, <?php echo $avg_per_4;?>, <?php echo $avg_per_6;?>, <?php echo $avg_per_8;?>, 0, 100]
                    // let the last 2 values be extra 0 and 100 for y graph values
                  }]
                },
                options: {
                  legend: {
                    display: false
                  },
                  title: {
                    display: true,
                    // text: "Semester wise overall progress"
                  }
                }
              });
            </script>
          </div>
        </div>
        <div class="col-6">

          <div class="container" style="  width: 90%; margin-top:30px;">
            <h2>Score Area</h2> <br>
            <div>
              <canvas id="myChart1_e"></canvas>
            </div>
          </div>


          <script>
            var ctx = document.getElementById("myChart1_e").getContext("2d");
            var myChart = new Chart(ctx, {
              type: "line",
              data: {
                labels: [

                  "0-20%",
                  "20-40%",
                  "40-60%",
                  "60-80%",
                  "80-100%",
                ],
                datasets: [{
                    label: "Semester 2",
                    data: [
                    <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem2 WHERE TOTAL >0 AND TOTAL<= 200;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>, 
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem2 WHERE TOTAL >200 AND TOTAL<= 400;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>,
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem2 WHERE TOTAL >400 AND TOTAL<= 600;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem2 WHERE TOTAL >600 AND TOTAL<= 800;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem2 WHERE TOTAL >800 AND TOTAL<= 1000;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 0, 50],
                    backgroundColor: "#5bc0de80",
                  },
                  {
                    label: "Semester 4",
                    data: [
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem4 WHERE TOTAL >0 AND TOTAL<= 200;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>, 
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem4 WHERE TOTAL >200 AND TOTAL<= 400;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>,
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem4 WHERE TOTAL >400 AND TOTAL<= 600;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem4 WHERE TOTAL >600 AND TOTAL<= 800;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem4 WHERE TOTAL >800 AND TOTAL<= 1000;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 0, 50],
                    backgroundColor: "#5cb85c80",
                  },
                  {
                    label: "Semester 6",
                    data: [
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem6 WHERE TOTAL >0 AND TOTAL<= 200;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>, 
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem6 WHERE TOTAL >200 AND TOTAL<= 400;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem6 WHERE TOTAL >400 AND TOTAL<= 600;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem6 WHERE TOTAL >600 AND TOTAL<= 800;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem6 WHERE TOTAL >800 AND TOTAL<= 1000;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 0, 50],
                    backgroundColor: "#f0ad4e80",
                  },
                  {
                    label: "Semester 8",
                    data: [
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem8 WHERE TOTAL >0 AND TOTAL<= 200;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>,
                      <?php
                        $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem8 WHERE TOTAL >200 AND TOTAL<= 400;");
                        while($row = mysqli_fetch_array($sql)){
                          echo $row['COUNT(NAME)'];
                        }
                      ?>,
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem8 WHERE TOTAL >400 AND TOTAL<= 600;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem8 WHERE TOTAL >600 AND TOTAL<= 800;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 
                      <?php
                      $sql = mysqli_query($conn,"SELECT COUNT(NAME) FROM $y_sem8 WHERE TOTAL >800 AND TOTAL<= 1000;");
                      while($row = mysqli_fetch_array($sql)){
                        echo $row['COUNT(NAME)'];
                      }
                      ?>, 0, 50],
                    backgroundColor: "#0275d880",
                  },

                ],
              },
            });
          </script>
        </div>

      </div>
      <br>
      <!-- the lower cards section -->
      <!-- all Semesters -->
      <div class="row">

        <div class="card col-3">
          <div class="card-header">
            <h3 class="card-title">Semester 2</h3>
          </div>
          <div class="card-body" style="background: #5bc0de80;">
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $high_2; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $high_2; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $avg_2; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $avg_2; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $low_2; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $low_2; ?>%</div>
            </div><br>
            <!-- <p class="card-text">Additional info will be provided.
              Feature under Development.</p> -->
            <a  href="semwise2.php" target="_blank" class="btn btn-info" style="color:white;">Complete Analysis</a>
          </div>
        </div>

        <div class="card col-3">
          <div class="card-header">
            <h3 class="card-title">Semester 4</h3>
          </div>
          <div class="card-body" style="background:#5cb85c80">
             <div class="progress">
              <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $high_4; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $high_4; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $avg_4; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $avg_4; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $low_4; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $low_4; ?>%</div>
            </div><br>
            <!-- <p class="card-text">Additional info will be provided.
              Feature under Development.</p> -->
            <a  href="semwise4.php" target="_blank" class="btn btn-success">Complete Analysis</a>
          </div>
        </div>

        <div class="card col-3">
          <div class="card-header">
            <h3 class="card-title">Semester 6</h3>
          </div>
          <div class="card-body" style="background:#f0ad4e80">
          <div class="progress">
              <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $high_6; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $high_6; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $avg_6; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $avg_6; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $low_6; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $low_6; ?>%</div>
            </div><br>
            <!-- <p class="card-text">Additional info will be provided.
              Feature under Development.</p> -->
            <a  href="semwise6.php" target="_blank" class="btn btn-alert" style="background:#f0ad4e; color: white;">Complete Analysis</a>
          </div>
        </div>

        <div class="card col-3">
          <div class="card-header">
            <h3 class="card-title">Semester 8</h3>
          </div>
          <div class="card-body" style="background:#0275d880">
                      
          <div class="progress">
              <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $high_8; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $high_8; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: <?php echo $avg_8; ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo $avg_8; ?>%</div>
            </div>
            <div class="progress">
              <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo $low_8; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $low_8; ?>%</div>
            </div><br>
            <!-- <p class="card-text">Additional info will be provided.
              Feature under Development.</p> -->
            <a  href="semwise8.php" target="_blank" class="btn btn-primary">Complete Analysis</a>
          </div>
        </div>
      </div>
    </div>  

    </div>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function(){
    document.querySelectorAll('.d-flex .nav-link').forEach(function(element){
      
      element.addEventListener('click', function (e) {
  
        let nextEl = element.nextElementSibling;
        let parentEl  = element.parentElement;	
  
          if(nextEl) {
              e.preventDefault();	
              let mycollapse = new bootstrap.Collapse(nextEl);
              
              if(nextEl.classList.contains('show')){
                mycollapse.hide();
              } else {
                  mycollapse.show();
                  // find other submenus with class=show
                  var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                  // if it exists, then close all of them
                  if(opened_submenu){
                    new bootstrap.Collapse(opened_submenu);
                  }
              }
          }
      }); // addEventListener
    }) // forEach
    }); 
  </script>

</body>


</html>