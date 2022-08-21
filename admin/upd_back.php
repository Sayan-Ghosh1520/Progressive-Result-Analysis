<?php
include 'config.php';
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
      /*text-decoration: none;*/
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

    .button {
    display: block;
    padding: 10px;
    text-align: center;
    border-radius: 30px;
    text-decoration: none;
    color: white;
    line-height: 25px;
    }

    .button:hover {
      text-decoration: none;
    }

    select {
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
    <title>PRA Admin</title>
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
            <span class="fs-4">PRA Admin</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <!-- <li>
              <a href="#" class="nav-link text-white">
                Dashboard
              </a>
            </li> -->
            <li class="nav-item">
              <a href="input_file.php" class="nav-link text-white" aria-current="page">
                Import Data
              </a>
            </li>
            <li>
              <a href="sub_fill.php" class="nav-link text-white">
                Fill Subject
              </a>
            </li>
            <li>
              <a href="teach_register.php" class="nav-link text-white">
                Register Teacher
              </a>
            </li>
            <li>
              <a href="upd_back.php" class="nav-link active">
                Marks Update (Backlog)
              </a>
            </li>
            <li>
              <a href="upd_rv.php" class="nav-link text-white">
                Marks Update (RV/RRV)
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
        <strong style="font-size:22px;">Select Batch:</strong>
         <select id="year" name="year1" required>
              <option>Select Year</option>
              <!-- <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option> -->
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
              <option value="2029">2029</option>
              <option value="2030">2030</option>
        </select>
        -
        <select id="year" name="year2" required>
              <option>Select Year</option>
             <!--  <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option> -->
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
              <option value="2029">2029</option>
              <option value="2030">2030</option>
          </select><br>
        <strong style="font-size:22px;">Semester:</strong>
         <select name="seme" required>
                <option value="" selected>Select Semester</option>    
                <option value="1">1st</option>      
                <option value="2">2nd</option>
                <option value="3">3rd</option>
                <option value="4">4th</option>
                <option value="5">5th</option>      
                <option value="6">6th</option>
                <option value="7">7th</option>
                <option value="8">8th</option>
            </select><br><br>
        <button type="submit" class="btn btn-secondary" name="verify"> Search &darr;</button>
      </div>
      </form>

      <?php

        $toggle_id1 = "collapse";
        $toggle_id2 = "collapse";
        if(isset($_POST['verify'])){
            $yr1 = $_POST['year1'];
            $yr2 = $_POST['year2'];
            $seme = $_POST['seme'];
            $yr = $yr1."_".$yr2; 
            $table = $yr1."_".$yr2."_".$seme."_sem";
            $sql = "SELECT * FROM $table WHERE STATUS = 'FAIL'";
            $tog = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($tog);
        if($num){
          $toggle_id1 = "";
    
      ?>
      <div class="<?php echo $toggle_id1;?>">
        <div class="card card-body" style="width:80%; position:relative; margin: 10px 100px;">


          <div class="card text-center">
            <h5 class="card-header">List Of Failed Students</h5>
            <div class="card-body">
              <table border="1">
                  <tr style="border: 1px solid black;">
                    <th width=5% style="border: 1px solid black;">URN</th>
                    <th width=10% style="border: 1px solid black;">NAME</th>
                    <th width=5% style="border: 1px solid black;">STATUS</th>
                    <th width=5% style="border: 1px solid black;">Operation</th>
                  </tr>
                  <?php
                    $info = mysqli_query($conn,$sql);
                          while($row = mysqli_fetch_assoc($info)){
                  ?>
                  <tr>
                    <td style="border: 1px solid black;"><?php echo $row['URN'];?></td>
                    <td style="border: 1px solid black;"><?php echo $row['NAME'];?></td>
                    <td style="border: 1px solid black;"><?php echo $row['STATUS'];?></td>
                    <td style="border: 1px solid black;"><a class="button btn-primary" href='marksupdate.php?b_urn=<?php echo $row['URN'];?>&yr=<?php echo $yr;?>&sem=<?php echo $seme;?>'>Update Marks</a></td>
                  </tr>
                  <?php            
                             }
                  ?> 
              </table>
            </div> <br>
          </div>

        </div>
      <?php  
      }else{
            $toggle_id2 = "";

      ?>    
       
        <div class="<?php echo $toggle_id2;?>">

              <div class="alert alert-danger" style="width:80%; position:relative; margin:10px 100px;" role="alert">
               NO records found for this URN. Please re-check or give valid Inputs.
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
</body>

</html>
