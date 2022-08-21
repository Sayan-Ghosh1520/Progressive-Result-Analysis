<!DOCTYPE html>
<html lang="en">
<head>
    <title>How To Create Simple Login Form Design In Bootstrap 5</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>

<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form accept="" class="shadow p-4">    
                <div class="mb-5 text-center">
                    <h3 class="text-primary">Create Account</h3>
                </div>              

                <div class="input-group mb-4">
                <span class="input-group-text bg-primary">
                    <i class="bi bi-person-fill text-white"></i></span>
                    <input type="email" class="form-control" name="username" id="username" placeholder="Username">
                </div>

                <div class="input-group mb-4">
                <span class="input-group-text bg-primary">
                    <i class="bi bi-envelope text-white"></i></span>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>


                <div class="input-group mb-4">
                <span class="input-group-text bg-primary">
                    <i class="bi bi-key-fill text-white"></i></span>
                    <input type="password" class="form-control" name="password" id="Password" placeholder="Password">
                </div>
                

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary" style="padding: 5px 40px 5px 40px;">Register</button>
                </div>

                <hr>
                
                <p class="text-center mt-3">Already have an account?
                    <span class="text-primary"><a href="login.php">Log in</a></span>
                </p>
                
            </form>
        </div>
    </div>
</div>
    
    <!-- Bootstrap JS -->
    <script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>
</html>