<?php
include 'config.php';
$b_urn = $_GET['b_urn'];
$yr = $_GET['yr'];
$sem = $_GET['sem'];
$table = $yr."_".$sem."_sem";
$table_sub = $yr."_".$sem."_sub";


 $sql = mysqli_query($conn,"SELECT * FROM $table WHERE URN = $b_urn");
   while($row = mysqli_fetch_array($sql)){
                         $urn = $row[0];
                        $name =  $row[1];
                        $subject1 = $row[4];
                        $subject2 = $row[6];
                        $subject3 = $row[8];
                        $subject4 = $row[10];
                        $subject5 = $row[12];
                        $total = $row[14];             
                    }


    $i = 0;
    $s_code = array(); 
    $s_name = array(); 

    while($i < 5){
        $sql = mysqli_query($conn,"SELECT * FROM $table_sub");                   
                      while($row = mysqli_fetch_array($sql)){
                        $s_code[$i] = $row[0];
                        $s_name[$i] = $row[2];
                        $i++;
                    }
                }

    $subj1_code = $s_code[0]; 
    $subj2_code = $s_code[1];
    $subj3_code = $s_code[2];           
    $subj4_code = $s_code[3];
    $subj5_code = $s_code[4];

	$subj1_name = $s_name[0]; 
    $subj2_name = $s_name[1];
    $subj3_name = $s_name[2];           
    $subj4_name = $s_name[3];
    $subj5_name = $s_name[4];


 if(isset($_POST['upd'])){
  	$spi = $_POST['b_spi'];
 	$cpi = $_POST['b_cpi'];
 	$sub1 = $_POST['b_sub1'];
 	if ($sub1==$subject1) {
 		$itt_1=0;
 	}
 	elseif (($sub1<28)||($sub1>=28)) {
 		$itt_1=1;
 	}
    $sub2 = $_POST['b_sub2'];
    if ($sub2==$subject2) {
 		$itt_2=0;
 	}
 	elseif (($sub2<28)||($sub2>=28)) {
 		$itt_2=1;
 	}
    $sub3 = $_POST['b_sub3'];
    if ($sub3==$subject3) {
 		$itt_3=0;
 	}
 	elseif (($sub3<28)||($sub3>=28)) {
 		$itt_3=1;
 	}
    $sub4 = $_POST['b_sub4'];
    if ($sub4==$subject4) {
 		$itt_4=0;
 	}
 	elseif (($sub4<28)||($sub4>=28)) {
 		$itt_4=1;
 	}
    $sub5 = $_POST['b_sub5'];
    if ($sub5==$subject5) {
 		$itt_5=0;
 	}
 	elseif (($sub5<28)||($sub5>=28)) {
 		$itt_5=1;
 	}

    $total = $_POST['b_total'];
    if ($sub1 >= 28 && $sub2 >= 28 && $sub3 >= 28 && $sub4 >= 28 && $sub5 >= 28) {
            $status = "PASS";
        }else{
            $status = "FAIL";
        }

    $query = "UPDATE `$table` SET SPI='$spi', CPI='$cpi', $subj1_code='$sub1', SUB_1_Atmp=SUB_1_Atmp+$itt_1, $subj2_code='$sub2', SUB_2_Atmp=SUB_2_Atmp+$itt_2, $subj3_code='$sub3', SUB_3_Atmp=SUB_3_Atmp+$itt_3, $subj4_code='$sub4', SUB_4_Atmp=SUB_4_Atmp+$itt_4, $subj5_code='$sub5', SUB_5_Atmp=SUB_5_Atmp+$itt_5, TOTAL='$total', BACK_APP_COUNT=BACK_APP_COUNT+1, STATUS='$status' WHERE URN = $b_urn";
    mysqli_query($conn,$query);
    echo "<script type='text/javascript'>
			alert('Marks Updated!!');
		  </script>";
}
?>

<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>PRA Admin</title>
		<!-- Bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<title></title>
		<style>
			table{
				margin: 20px auto;
			}
		</style>
	</head>
	<body>
		<button type="button" class="btn btn-light" style="margin: 20px;"> &larr; Back</button>
<div class="text-center">
		<h2>Student Marks Update</h2><hr> <br>
		<strong>Name: </strong><em> <?php echo $name; ?></em> <br>
		<strong>URN: </strong><em> <?php echo $b_urn; ?></em> <br>
		<strong>Semester: </strong> <em> <?php echo $sem; ?></em> <br><br>

    <form method="POST">
		<table class="table">
			<thead class="thead-light">
				<tr>
					<th>Subject</th>
					<th>Previous Marks</th>
					<th>Updated Marks</th>
				</tr>
			</thead>	
				<tr>
					<td> <?php echo $subj1_name; ?></td>
					<td> <?php echo $subject1; ?></td>
					<td><input type="text" name="b_sub1" value="<?php echo $subject1; ?>"></td>
				</tr>
				<tr>
					<td> <?php echo $subj2_name; ?></td>
					<td> <?php echo $subject2; ?></td>
					<td><input type="text" name="b_sub2" value="<?php echo $subject2; ?>"></td>
				</tr>
				<tr>
					<td> <?php echo $subj3_name; ?></td>
					<td> <?php echo $subject3; ?></td>
					<td><input type="text" name="b_sub3" value="<?php echo $subject3; ?>"></td>
				</tr>
				<tr>
					<td> <?php echo $subj4_name; ?></td>
					<td> <?php echo $subject4; ?></td>
					<td><input type="text" name="b_sub4" value="<?php echo $subject4; ?>"></td>
				</tr>
				<tr>
					<td> <?php echo $subj5_name; ?></td>
					<td> <?php echo $subject5; ?></td>
					<td><input type="text" name="b_sub5" value="<?php echo $subject5; ?>"></td>
				</tr>
				<tr>
					<td> TOTAL</td>
					<td> <?php echo $total; ?></td>
					<td><input type="text" name="b_total" value="<?php echo $total; ?>"></td>
				</tr>
		</table>
		<br><br>
		<label>SPI:</label>&nbsp;<input type="text" name="b_spi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>CPI:</label>&nbsp;<input type="text" name="b_cpi"><br><br>
		<input type="submit" name="upd" value="UPDATE"/>
	</form>	
	</div>
		<!-- Bootstrap JS -->
		<script src="https://www.markuptag.com/bootstrap/5/js/bootstrap.bundle.min.js"></script>

		<script type="text/javascript">
			let btnBack = document.querySelector('button');
			btnBack.addEventListener('click', () => {
				window.history.back();
				window.history.back();
				window.history.back();
			})
		</script>
	</body>
</html>