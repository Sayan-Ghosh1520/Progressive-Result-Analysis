<?php
//Database connection
$server = "localhost";
$uname_db = "root";
$pass_db = "";
$db = "result_analysis";

$conn = mysqli_connect($server,$uname_db,$pass_db,$db);

if (!$conn) {
  die("Connection Failed!!".mysqli_connect_error());
}
?>
