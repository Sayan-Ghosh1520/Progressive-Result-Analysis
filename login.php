<?php
include 'r_analysis/config.php';

session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM login_data WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    while($row = mysqli_fetch_array($result)){
                       $_SESSION['username'] = $row['username'];
                       $root = $row['root'];
                     }
    if($num == 1 AND $root=='teacher'){
        header('location: r_analysis/dashboard.php');   
    }
    else if($num == 1 AND $root=='admin'){
        header('location: admin/input_file.php');
    }else{
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        header('location: login.php');
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<title>RESULT ANALYSIS</title>
<body>

<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="" method="POST" class="shadow p-4">    
                <div class="mb-5 text-center">
                    <h3 class="text-primary">Login</h3>
                </div>              

                <div class="input-group mb-4">
                <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                </div>

                <div class="input-group mb-4">
                <span class="input-group-text bg-primary">
                    <i class="bi bi-key-fill text-white"></i></span>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>

                <label class="mb-4">
                    <input type="checkbox" name="RememberMe"> Remember Me
                </label>                

                <div class="mb-3 text-center">
                    <button type="submit" name="login" class="btn btn-primary" style="padding: 5px 40px 5px 40px;">Login</button>
                </div>

                <hr>

                <p class="text-center mb-0">Forgot password?<a href="registration.php" class="text-decoration-none"> Reset Password</a></p>
                
            </form>
        </div>
    </div>
</div>
    
    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>
</html>