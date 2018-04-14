<?php
	session_start();
	if(isset($_POST['updateEmployee'])){
	$appoint_id = $_POST['appoint_id'];
	$pref_date = $_POST['pref_date'];
	$pref_time = $_POST['pref_time'];
	$status = $_POST['status'];
 	$con=mysqli_connect ("localhost", "root", "", "mysqli_prm"); 
	$sql= "UPDATE `tbl_appointment` SET `pref_date`='$pref_date',`pref_time`='$pref_time', `status`='Users Approval' WHERE appoint_id = '$appoint_id'";
	$result = mysqli_query($con, $sql);
	

		header("Location: admission.php?id=");

	}
	
?>	