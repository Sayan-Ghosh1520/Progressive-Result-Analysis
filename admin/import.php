<?php
use SimpleExcel\SimpleExcel;
include 'config.php';


//-----------------------------------FILE IMPORT--------------------------------------------------------//

if(isset($_POST['semester'])){
    if(!empty($_POST['batch'])) {
        $selected = $_POST['batch'];
        $seme = $_POST['seme'];
        
    } else {
        echo 'Please select the value.';
    }

    $table = $selected.$seme."sem";
    $table_sub = $selected.$seme."sub";

if(move_uploaded_file($_FILES['excel_file']['tmp_name'],$_FILES['excel_file']['name'])){
    require_once('SimpleExcel/SimpleExcel.php'); 
    
    $excel = new SimpleExcel('csv');                  
    
    $excel->parser->loadFile($_FILES['excel_file']['name']);           
    
    $foo = $excel->parser->getField(); 

    $count = 8;

    $i = 0;
    $s_code = array(); 
    while($i < 5){
        $sql = mysqli_query($conn,"SELECT * FROM $table_sub");                   
                      while($row = mysqli_fetch_array($sql)){
                        $s_code[$i] = $row[0];
                        $i++;
                    }
                }

    $subject1 = $s_code[0]; 
    $subject2 = $s_code[1];
    $subject3 = $s_code[2];           
    $subject4 = $s_code[3];
    $subject5 = $s_code[4];

    $sql = "CREATE TABLE IF NOT EXISTS $table (URN VARCHAR(12), NAME VARCHAR(50), SPI VARCHAR(5), CPI VARCHAR(5), $subject1 VARCHAR(3), SUB_1_Atmp INT(2), $subject2 VARCHAR(3), SUB_2_Atmp INT(2), $subject3 VARCHAR(3), SUB_3_Atmp INT(2), $subject4 VARCHAR(3), SUB_4_Atmp INT(2), $subject5 VARCHAR(3), SUB_5_Atmp INT(2), TOTAL INT(3),BACK_APP_COUNT INT(2), STATUS VARCHAR(4), r_date VARCHAR(10))";
    $result = mysqli_query($conn, $sql) or die ("Bad Create: $sql");

    while(count($foo)>$count){
        $urn = $foo[$count][1];
        $name = $foo[$count][3];
        $spi = $foo[$count][76];
        $cpi = $foo[$count][77];
        $subj1 = $foo[$count][6];
        $subj2 = $foo[$count][13];
        $subj3 = $foo[$count][20];
        $subj4 = $foo[$count][27];
        $subj5 = $foo[$count][34];
        $total = $foo[$count][78];
        $s_status = $foo[$count][79];
        $ittrator = 0;
        if ($subj1 >= 35 && $subj2 >= 35 && $subj3 >= 35 && $subj4 >= 35 && $subj5 >= 35 && $subj1 != 'AB' && $subj2 != 'AB' && $subj3 != 'AB' && $subj4 != 'AB' && $subj5 != 'AB' && $s_status == 'PASS') {
            $status = "PASS";
        }else{
            $status = "FAIL";
        }
        $r_date = $foo[$count][80];

        $query = "INSERT INTO $table (URN, NAME, SPI, CPI, $subject1, SUB_1_Atmp, $subject2, SUB_2_Atmp, $subject3, SUB_3_Atmp, $subject4, SUB_4_Atmp, $subject5, SUB_5_Atmp, TOTAL, BACK_APP_COUNT, STATUS, r_date) ";
        $query.="VALUES ('$urn','$name','$spi', '$cpi', '$subj1','$ittrator', '$subj2','$ittrator', '$subj3','$ittrator', '$subj4','$ittrator', '$subj5','$ittrator', '$total','$ittrator', '$status', '$r_date')";
        mysqli_query($conn,$query);
        $count++;
    }

    echo "<script>window.location.href='input_file.php';</script>";
 }
}


//---------------------------------------SUBJECT FILL------------------------------------------------------//

if(isset($_POST['teach'])){
    if(!empty($_POST['batch'])) {
        $selected = $_POST['batch'];
        $seme = $_POST['seme'];
        
    } else {
        echo 'Please select the value.';
    }

    $table_sub = $selected.$seme."sub";
    $sql = "CREATE TABLE IF NOT EXISTS $table_sub (Sub_code VARCHAR(15), Subject VARCHAR(9), FSN VARCHAR(50), Teachers VARCHAR(40))";
    $result = mysqli_query($conn, $sql) or die ("Bad Create: $sql");

    $sub_c_1 = $_POST['sub_c_1'];
    $sub_ab_1 = $_POST['sub_ab_1'];
    $sub1 = $_POST['sub1'];
    $teach1 = $_POST['teach1'];

    $sub_c_2 = $_POST['sub_c_2'];
    $sub_ab_2 = $_POST['sub_ab_2'];
    $sub2 = $_POST['sub2'];
    $teach2 = $_POST['teach2'];

    $sub_c_3 = $_POST['sub_c_3'];
    $sub_ab_3 = $_POST['sub_ab_3'];
    $sub3 = $_POST['sub3'];
    $teach3 = $_POST['teach3'];

    $sub_c_4 = $_POST['sub_c_4'];
    $sub_ab_4 = $_POST['sub_ab_4'];
    $sub4 = $_POST['sub4'];
    $teach4 = $_POST['teach4'];

    $sub_c_5 = $_POST['sub_c_5'];
    $sub_ab_5 = $_POST['sub_ab_5'];
    $sub5 = $_POST['sub5'];
    $teach5 = $_POST['teach5'];

    $query = "INSERT INTO $table_sub (Sub_code, Subject, FSN, Teachers)";
        $query.="VALUES ('$sub_c_1', '$sub_ab_1', '$sub1', '$teach1'),
                        ('$sub_c_2', '$sub_ab_2', '$sub2', '$teach2'),
                        ('$sub_c_3', '$sub_ab_3', '$sub3', '$teach3'),
                        ('$sub_c_4', '$sub_ab_4', '$sub4', '$teach4'),
                        ('$sub_c_5', '$sub_ab_5', '$sub5', '$teach5')";
        mysqli_query($conn,$query);
        echo "<script>window.location.href='sub_fill.php';</script>";
 }   
?>