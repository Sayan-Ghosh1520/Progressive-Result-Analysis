<?php
include 'config.php';
$b_urn = $_GET['urn'];
$sem = $_GET['sem'];
$table = $_GET['table'];
$table_sub = $_GET['table_sub']; 

 $sql = mysqli_query($conn,"SELECT * FROM $table WHERE URN = $b_urn");
   while($row = mysqli_fetch_array($sql)){
                         $urn = $row[0];
                        $name =  $row[1];
                        $subject1 = $row[4];
                        $subject2 = $row[6];
                        $subject3 = $row[8];
                        $subject4 = $row[10];
                        $subject5 = $row[12];             
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
 	$sub1 = $_POST['b_sub1'];
    $sub2 = $_POST['b_sub2'];
    $sub3 = $_POST['b_sub3'];
    $sub4 = $_POST['b_sub4'];
    $sub5 = $_POST['b_sub5'];
    $total = $sub1+$sub2+$sub3+$sub4+$sub5;
    if ($sub1 >= 28 && $sub2 >= 28 && $sub3 >= 28 && $sub4 >= 28 && $sub5 >= 28) {
            $status = "PASS";
        }else{
            $status = "FAIL";
        }

    $query = mysqli_query($conn,"UPDATE `$table` SET $subj1_code='$sub1', $subj2_code='$sub2', $subj3_code='$sub3', $subj4_code='$sub4', $subj5_code='$sub5', TOTAL='$total', BACK_APP_COUNT=BACK_APP_COUNT, STATUS='$status' WHERE URN = $b_urn");
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
		<title>PRA Admin</title>
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
					<td><input type="text" name="b_sub1"></td>
				</tr>
				<tr>
					<td> <?php echo $subj2_name; ?></td>
					<td> <?php echo $subject2; ?></td>
					<td><input type="text" name="b_sub2"></td>
				</tr>
				<tr>
					<td> <?php echo $subj3_name; ?></td>
					<td> <?php echo $subject3; ?></td>
					<td><input type="text" name="b_sub3"></td>
				</tr>
				<tr>
					<td> <?php echo $subj4_name; ?></td>
					<td> <?php echo $subject4; ?></td>
					<td><input type="text" name="b_sub4"></td>
				</tr>
				<tr>
					<td> <?php echo $subj5_name; ?></td>
					<td> <?php echo $subject5; ?></td>
					<td><input type="text" name="b_sub5"></td>
				</tr>
		</table>
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