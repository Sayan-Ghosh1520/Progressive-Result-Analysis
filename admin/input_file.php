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
    /*label {
      width: 50px;
      margin-bottom: 20px;
    }*/

    body {
      overflow-x: hidden; 
    }

    input {
      width: 210px;
    }

    
    main {
      position: fixed;
      height: 100% !important;
    }

    a {
      text-decoration: none;
      color: white;
    }
    .drop-zone {
      max-width: 400px;
      margin-left: 30%;
      height: 200px;
      padding: 25px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      font-family: "Quicksand", sans-serif;
      font-weight: 500;
      font-size: 20px;
      cursor: pointer;
      color: #cccccc;
      border: 4px dashed grey;
      border-radius: 10px;
    }

    .drop-zone--over {
      border-style: solid;
    }

    .drop-zone__input {
      display: none;
    }

    .drop-zone__thumb {
      width: 100%;
      height: 100%;
      border-radius: 10px;
      overflow: hidden;
      background-color: #cccccc;
      background-size: cover;
      position: relative;
    }

    .drop-zone__thumb::after {
      content: attr(data-label);
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 5px 0;
      color: #ffffff;
      background: rgba(0, 0, 0, 0.75);
      font-size: 14px;
      text-align: center;
    }
    input{
      border-radius: 10px;
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
              <a href="input_file.php" class="nav-link active" aria-current="page">
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
    <h3>File Input</h3>
    <hr width="90%">

    <form method="post" action="import.php" enctype="multipart/form-data">
        <label>Choose Batch:</label>
            <select name="batch" required>
                <option value="" selected></option>  
                <option value="<?php echo date("Y")-10; ?>_<?php echo date("Y")-6; ?>"><?php echo date("Y")-10; ?>-<?php echo date("Y")-6; ?></option>  
                <option value="<?php echo date("Y")-4; ?>_<?php echo date("Y"); ?>"><?php echo date("Y")-4; ?>-<?php echo date("Y"); ?></option>    
                <option value="<?php echo date("Y")-3; ?>_<?php echo date("Y")+1; ?>"><?php echo date("Y")-3; ?>-<?php echo date("Y")+1; ?></option>
                <option value="<?php echo date("Y")-2; ?>_<?php echo date("Y")+2; ?>"><?php echo date("Y")-2; ?>-<?php echo date("Y")+2; ?></option>
                <option value="<?php echo date("Y")-1; ?>_<?php echo date("Y")+3; ?>"><?php echo date("Y")-1; ?>-<?php echo date("Y")+3; ?></option>
            </select><br><br>
        <label>Choose Semester:</label>    
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
            </select><br><br>

        <!-- <input type="file" name="excel_file" accept=".csv"><br> -->
          <div class="drop-zone">
            <span class="drop-zone__prompt">Drop file here or click to upload</span>
            <input type="file" name="excel_file" class="drop-zone__input" accept=".csv">
          </div>

        <br><input class="btn-primary" type="submit" name="semester" value="Import"><br><br>
    </form>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
  <script>
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
      const dropZoneElement = inputElement.closest(".drop-zone");

      dropZoneElement.addEventListener("click", (e) => {
        inputElement.click();
      });

      inputElement.addEventListener("change", (e) => {
        if (inputElement.files.length) {
          updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
      });

      dropZoneElement.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
      });

      ["dragleave", "dragend"].forEach((type) => {
        dropZoneElement.addEventListener(type, (e) => {
          dropZoneElement.classList.remove("drop-zone--over");
        });
      });

      dropZoneElement.addEventListener("drop", (e) => {
        e.preventDefault();

        if (e.dataTransfer.files.length) {
          inputElement.files = e.dataTransfer.files;
          updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
        }

        dropZoneElement.classList.remove("drop-zone--over");
      });
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} dropZoneElement
     * @param {File} file
     */
    function updateThumbnail(dropZoneElement, file) {
      let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

      // First time - remove the prompt
      if (dropZoneElement.querySelector(".drop-zone__prompt")) {
        dropZoneElement.querySelector(".drop-zone__prompt").remove();
      }

      // First time - there is no thumbnail element, so lets create it
      if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnailElement);
      }

      thumbnailElement.dataset.label = file.name;

    }
  </script>

</body>

</html>