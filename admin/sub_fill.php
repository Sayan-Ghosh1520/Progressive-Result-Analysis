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
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <style>
    body {
      overflow-x: hidden; 
    }
    label{
      width: 200px;
      text-align: end;
      height: 25px;
      margin-bottom: 10px;
    }
    input{
      border-radius: 5px;
      border: 1px solid ;
      padding: 3px;
      margin-bottom: 10px;
    }
    option{
      width: 200px;
    }
    select{
      width: 200px;
      height: 30px;
    }
    h4{
      text-align: left;
      margin-left: 150px;
      text-decoration: underline;
      margin-top: 30px;
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
  <title>PRA Admin</title>
</head>

<body class="text-center">
  <div class="row">

    <!-- sidebar -->
    <div class="col-3">
      <main>
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
              <a href="sub_fill.php" class="nav-link active">
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


    <div class="col-9">
          <br>
          <h2>Subject Information</h2>
          <hr width="90%">
          <form method="post" action="import.php">
          <label>Select Batch:</label>
          <select name="batch" required>
            <option value="" selected></option>
            <option value="<?php echo date("Y")-10; ?>_<?php echo date("Y")-6; ?>"><?php echo date("Y")-10; ?>-<?php echo date("Y")-6; ?></option>     
            <option value="<?php echo date("Y")-4; ?>_<?php echo date("Y"); ?>"><?php echo date("Y")-4; ?>-<?php echo date("Y"); ?></option>    
            <option value="<?php echo date("Y")-3; ?>_<?php echo date("Y")+1; ?>"><?php echo date("Y")-3; ?>-<?php echo date("Y")+1; ?></option>
            <option value="<?php echo date("Y")-2; ?>_<?php echo date("Y")+2; ?>"><?php echo date("Y")-2; ?>-<?php echo date("Y")+2; ?></option>
            <option value="<?php echo date("Y")-1; ?>_<?php echo date("Y")+3; ?>"><?php echo date("Y")-1; ?>-<?php echo date("Y")+3; ?></option>
          </select>
          <br>
          <label for="semSelect">Select Semester:</label>
          <select name="seme" required>
                <option value="" selected></option>    
                <option value="_1_">1st</option>      
                <option value="_2_">2nd</option>
                <option value="_3_">3rd</option>
                <option value="_4_">4th</option>
                <option value="_5_">5th</option>      
                <option value="_6_">6th</option>
                <option value="_7_">7th</option>
                <option value="_8_">8th</option>
            </select>
          <br> <br> <br>
          <h4>Subject 1:</h4>
          <label for="">Subject Name: </label>
          <input type="text" name="sub1" id="" placeholder="Subject Name" required></input> <br>
          <label for="">Subject Code</label>
          <input type="text" name="sub_c_1" id="" placeholder="Subject Code"  required/> <br>
          <label for="">Subject Abbreviation:</label>
          <input type="text" name="sub_ab_1" placeholder="SUB" required> <br>
          <label for="">Teacher Assigned:</label>
          <select name="teach1" id="" required>
            <option value=""></option>
            <?php
              $result = mysqli_query($conn, "SELECT username FROM `teacher_list`");
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='$row[username]'>$row[username]</option>";
              }
            ?>
          </select>

          <h4>Subject 2:</h4>
          <label for="">Subject Name: </label>
          <input type="text" name="sub2" id="" placeholder="Subject Name" required></input> <br>
          <label for="">Subject Code</label>
          <input type="text" name="sub_c_2" id="" placeholder="Subject Code" required /> <br>
          <label for="">Subject Abbreviation:</label>
          <input type="text" name="sub_ab_2" placeholder="SUB" required> <br>
          <label for="">Teacher Assigned:</label>
          <select name="teach2" id="" required>
            <option value=""></option>
            <?php
              $result = mysqli_query($conn, "SELECT username FROM `teacher_list`");
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='$row[username]'>$row[username]</option>";
              }
            ?>
          </select>

          <h4>Subject 3:</h4>
          <label for="">Subject Name: </label>
          <input type="text" name="sub3" id="" placeholder="Subject Name" required></input> <br>
          <label for="">Subject Code</label>
          <input type="text" name="sub_c_3" id="" placeholder="Subject Code"  required/> <br>
          <label for="">Subject Abbreviation:</label>
          <input type="text" name="sub_ab_3" placeholder="SUB" required> <br>
          <label for="">Teacher Assigned:</label>
          <select name="teach3" id="" required>
            <option value=""></option>
            <?php
              $result = mysqli_query($conn, "SELECT username FROM `teacher_list`");
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='$row[username]'>$row[username]</option>";
              }
            ?>
          </select>

          <h4>Subject 4:</h4>
          <label for="">Subject Name: </label>
          <input type="text" name="sub4" id="" placeholder="Subject Name" required></input> <br>
          <label for="">Subject Code</label>
          <input type="text" name="sub_c_4" id="" placeholder="Subject Code"  required/> <br>
          <label for="">Subject Abbreviation:</label>
          <input type="text" name="sub_ab_4" placeholder="SUB" required> <br>
          <label for="">Teacher Assigned:</label>
          <select name="teach4" id="" required>
            <option value=""></option>
            <?php
              $result = mysqli_query($conn, "SELECT username FROM `teacher_list`");
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='$row[username]'>$row[username]</option>";
              }
            ?>
          </select>

          <h4>Subject 5:</h4>
          <label for="">Subject Name: </label>
          <input type="text" name="sub5" id="" placeholder="Subject Name" required></input> <br>
          <label for="">Subject Code</label>
          <input type="text" name="sub_c_5" id="" placeholder="Subject Code"  required/> <br>
          <label for="">Subject Abbreviation:</label>
          <input type="text" name="sub_ab_5" placeholder="SUB" required> <br>
          <label for="">Teacher Assigned:</label>
          <select name="teach5" id="" required>
            <option value=""></option>
            <?php
              $result = mysqli_query($conn, "SELECT username FROM `teacher_list`");
              while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value='$row[username]'>$row[username]</option>";
              }
            ?>
          </select><br><br>

          <input class="btn-primary" type="submit" name="teach" value="SUBMIT"><br><br>
          </form>
        </div>

  <!-- Bootstrap JS -->
  <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>

</body>

</html>