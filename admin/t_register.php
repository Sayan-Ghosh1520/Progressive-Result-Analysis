<?php
if(isset($_POST['rat'])){
    
    $db = mysqli_connect('localhost','root','','result_analysis');

    $user = $_POST['user'];
    $title = $_POST['title'];
    $username = $title.$user;
    // $email = $_POST['email'];
    // $pass1 = $_POST['pass1'];
    // $pass2 = $_POST['pass2'];
    // if($pass1 == $pass2){
    //   $root = "teacher";
      $query = "INSERT INTO teacher_list (Srn, username)";
        $query.="VALUES ('', '$username')";
        mysqli_query($db,$query);
        echo "<script>window.location.href='teach_register.php';</script>";
    // }else{
    //   echo '<script>alert("Password Does not Match :( Try Again!")</script>';
    // }
 }

 // if(isset($_POST['rad'])){
    
 //    $db = mysqli_connect('localhost','root','','result_analysis');

 //    $user = $_POST['user'];
 //    $title = $_POST['title'];
 //    $username = $title.$user;
 //    $email = $_POST['email'];
 //    $pass1 = $_POST['pass1'];
 //    $pass2 = $_POST['pass2'];
 //    if($pass1 == $pass2){
 //      $root = "admin";
 //      $query = "INSERT INTO login_data (Srn, username, email, password, root)";
 //        $query.="VALUES ('', '$username', '$email', '$pass1', '$root')";
 //        mysqli_query($db,$query);
 //        echo "<script>window.location.href='teach_register.php';</script>";
 //    }else{
 //      echo '<script>alert("Password Does not Match :( Try Again!")</script>';
 //    }
 // }    
?>