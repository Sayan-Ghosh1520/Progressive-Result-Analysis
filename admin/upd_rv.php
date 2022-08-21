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

    select, input {
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
              <a href="upd_back.php" class="nav-link text-white">
                Marks Update (Backlog)
              </a>
            </li>
            <li>
              <a href="upd_rv.php" class="nav-link active">
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
         <select name="batch" required>
                <option value="" selected>Select Batch</option>    
                <option value="<?php echo date("Y")-10; ?>_<?php echo date("Y")-6; ?>"><?php echo date("Y")-10; ?>-<?php echo date("Y")-6; ?></option>  
                <option value="<?php echo date("Y")-4; ?>_<?php echo date("Y"); ?>"><?php echo date("Y")-4; ?>-<?php echo date("Y"); ?></option>    
                <option value="<?php echo date("Y")-3; ?>_<?php echo date("Y")+1; ?>"><?php echo date("Y")-3; ?>-<?php echo date("Y")+1; ?></option>
                <option value="<?php echo date("Y")-2; ?>_<?php echo date("Y")+2; ?>"><?php echo date("Y")-2; ?>-<?php echo date("Y")+2; ?></option>
                <option value="<?php echo date("Y")-1; ?>_<?php echo date("Y")+3; ?>"><?php echo date("Y")-1; ?>-<?php echo date("Y")+3; ?></option>
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
            </select><br>
          <strong style="font-size:22px;">URN:</strong>
         <input type="text" name="urn" placeholder="Enter URN" required><br><br>
        <button type="submit" class="btn btn-secondary" name="verify"> Search &darr;</button>
      </div>
      </form>

      <?php

        $toggle_id1 = "collapse";
        $toggle_id2 = "collapse";
        if(isset($_POST['verify'])){
            $batch = $_POST['batch'];
            $urn = $_POST['urn'];
            $seme = $_POST['seme'];
            $table = $batch."_".$seme."_sem";
            $table_sub = $batch."_".$seme."_sub";
            $sql = "SELECT * FROM $table WHERE URN = $urn";
            $tog = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($tog);
        if($num == 1){
          $toggle_id1 = "";
    
      ?>
      <div class="<?php echo $toggle_id1;?>">
        <div class="card card-body" style="width:80%; position:relative; margin: 10px 100px;">


          <div class="card text-center">
            <h5 class="card-header">Student's Marks</h5>
            <div class="card-body">
              <center>
                <p class="card-text" style="width: 400px; font-size:16px;">
                  <?php while($row = mysqli_fetch_array($tog)){
                    $name = $row['NAME'];
                    $sub1 = $row[4];
                    $sub2 = $row[8];
                    $sub3 = $row[6];
                    $sub4 = $row[10];
                    $sub5 = $row[12];
                    } 
                  ?>
                    <strong>Name: </strong><?php echo $name; ?><br>
                    <strong>URN: </strong><?php echo $urn; ?><br>
                    <strong>Semester: </strong><?php echo $seme; ?><br>
                     <table border="1">
                          <tr style="border: 1px solid black;">
                          <?php
                            $sql_sub = mysqli_query($conn,"SELECT * FROM $table_sub");
                                  while($row = mysqli_fetch_assoc($sql_sub)){
                          ?>  
                            <th width="20%" style="border: 1px solid black;"><?php echo $row['Subject'];?></th>
                          <?php            
                             }
                          ?> 
                          </tr>

                          <tr>
                              <td style="border: 1px solid black;"><?php echo $sub1?></td>
                              <td style="border: 1px solid black;"><?php echo $sub2?></td>
                              <td style="border: 1px solid black;"><?php echo $sub3?></td>
                              <td style="border: 1px solid black;"><?php echo $sub4?></td>
                              <td style="border: 1px solid black;"><?php echo $sub5?></td>
                          </tr>
                     </table>  <br><br> 
                     <a class="button btn-primary" href='rv_upd_marks.php?urn=<?php echo $urn;?>&table=<?php echo $table;?>&table_sub=<?php echo $table_sub;?>&sem=<?php echo $seme;?>'>Update Marks</a>
              </p>
            </center>
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
