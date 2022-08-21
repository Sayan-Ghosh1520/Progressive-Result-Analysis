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
    width: 150px;
    text-align: end;
    height: 20px;
  }

    select,input{
    width: 200px;
    height: 35px;
    margin-bottom: 20px;
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
              <a href="sub_fill.php" class="nav-link text-white">
                Fill Subject
              </a>
            </li>
            <li>
              <a href="teach_register.php" class="nav-link active">
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
  <div class="">
      <form method="post" action="t_register.php">
      <h3>Teacher Registration</h3>
      <hr> <br>
      <label for="name">Name:</label>
      <input type="text" placeholder="Name" name="user"> <br>
      <label for="title">Title:</label>
        <select name="title" required>
                <option value="" selected> Title</option>    
                <option value="Mr. ">Mr</option>      
                <option value="Mrs. ">Mrs</option>
                <option value="Dr. ">Dr</option>
                <option value="Miss. ">Miss</option>
            </select><br>
<!--      <label for="email">Email ID:</label>
      <input type="email" placeholder="user@bitdurg.ac.in" name="email"> <br>
       <label for="passwd">Password</label>
      <input type="password" placeholder="********" name="pass1"> <br>
      <label for="passwdc">Confirm Password</label>
      <input type="password" placeholder="********" name="pass2"> <br> -->
      <input type="submit" class="btn btn-primary" name="rat" value="Register Teacher"></input>
      </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>

</body>

</html>