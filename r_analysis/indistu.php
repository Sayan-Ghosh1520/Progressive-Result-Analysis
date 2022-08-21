<?php
include 'config.php';
include 'dash_data.php';
session_start();
if(isset($_SESSION['username'])){}
  else{
    header('location: ../login.php');
  }
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
  <style media="screen">
    body {
      overflow-x: hidden;
    }

    main {
      position: fixed;
      height: 100% !important;
    }

    a {
      text-decoration: none;
      color: white;
    }

    .jumbotron {
      position: relative;
      /* //only to keep it completey centered on this pagr only */
      padding: 2rem;
      margin-bottom: 2rem;
      background-color: #e9ecef70;
      border-radius: .5rem;
      margin: 100px;
      width: 80%;
    }

    input {
      height: 35px;
      margin: 20px;
      border-radius: 35px;
      padding: 5px auto;
      text-align: center;
      display: inline-inline-block;
    }

    button {
      height: 35px;
      border-radius: 35px !important;
      padding: 5px auto;
      text-align: center;
    }
  </style>
    <title>RESULT ANALYSIS</title>
</head>

<body class="ntext-center">

  <div class="row">
    <!-- the left side -->
    <!-- sidebar -->

    <div class="col-3">

      <main class="text-center">
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
              <a href="dashboard.php" class="nav-link text-white" aria-current="page">
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
            <li class="mt-2">
              <a href="indistu.php" class="nav-link active">
                Individual Student
              </a>
            </li>
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

    <div class="col-9" style="margin-left: -50px; margin-right: -100px;">
      <!-- the alerts -->

      <form action="" method="POST">
      <div class="jumbotron text-center">
        <strong style="font-size:22px;">URN:</strong>
         <input type="text" name="urn" required><br>
        <strong style="font-size:22px;">SEM:</strong>
         <input type="text" name="sem" required><br>
        <button type="submit" class="btn btn-secondary" name="verify"> Verify Student &darr;</button>
      </div>
      </form>

      <?php

        $toggle_id1 = "collapse";
        $toggle_id2 = "collapse";
        if(isset($_POST['verify'])){
            $urn = $_POST['urn'];
            $sem = $_POST['sem'];
            $table_sem = $sem.'_sem';
            $_SESSION['urn'] = $urn;
            $_SESSION['sem'] = $sem;
            $sql = "SELECT * FROM $table_sem WHERE URN = '$urn'";
            $tog = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($tog);
        if($num == 1){
          $toggle_id1 = "";
    
      ?>
      <div class="<?php echo $toggle_id1;?>">
        <div class="card card-body" style="width:80%; position:relative; margin: 10px 100px;">


          <div class="card">
            <h5 class="card-header">Verify Student Info of: <?php echo $urn;?></h5>
            <div class="card-body">
              
              <?php
                $info = mysqli_query($conn,"SELECT * FROM $table_sem WHERE URN = '$urn'");
                while($row = mysqli_fetch_array($info)){
                $name = $row['NAME'];
                 }   
              ?>   
              <center>
                <h3 class="card-title">Student Name: <?php echo $name;?></h3> <br>
              </center>
              <p class="card-text" style="float:left; width: 400px; font-size:16px;">
                <!-- There was some error while using <table>
                      Till the time it's fixed, please echo on html.
                    </table> -->
                <strong>Branch:</strong> Information Technology <br>
                <strong>DoB:</strong> (date) <br>
                <strong>Year of Joining:</strong> (year) <br>
                <strong>Enrollement Number:</strong> (number) <br>
                <strong>Admission Number:</strong> (number) <br>
                <strong>Semester: </strong> <?php echo $sem; ?> <br>
              </p>
              <img src="img/default-user.jpg" height="150px" style="float:right;" alt="">
            </div> <br>
            <form action="indistureport.php" method="POST" target="_blank">
            <div class="card-footer">
              <input type="submit" class="btn btn-primary" style="float:right;" value="Generate Report &rarr;">
            </div>
            </form>
          </div>

        </div>
      <?php  
      }else{
            $toggle_id2 = "";

      ?>    
       
        <div class="<?php echo $toggle_id2;?>">

              <div class="alert alert-danger" style="width:80%; position:relative; margin:10px 100px;" role="alert">
               NO records found for this URN. Please re-check or type a valid URN.
              </div>
      </div>
        <?php
         }
        }
      ?>  

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
