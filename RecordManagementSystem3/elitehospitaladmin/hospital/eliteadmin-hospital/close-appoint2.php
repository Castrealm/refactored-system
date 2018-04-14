<?php
	session_start();
	if(isset($_POST['updateEmployee'])){
	$appoint_id = $_POST['appoint_id'];
	$disease = $_POST['disease'];
	$status = $_POST['status'];
 	$con=mysqli_connect ("localhost", "root", "", "mysqli_prm"); 
	$sql= "UPDATE `tbl_appointment` SET `disease`='$disease', `status`='closed' WHERE appoint_id = '$appoint_id'";
	$result = mysqli_query($con, $sql);
	

		header("Location: admission.php?id=");

	}
	
?>	