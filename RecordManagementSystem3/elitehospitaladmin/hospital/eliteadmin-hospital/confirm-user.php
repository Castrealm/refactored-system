<?php



session_start();
include_once 'dbconnect.php';


if (!isset($_SESSION['userSession'])) {
 //header("Location: BookStore-Home-User.php");
}

$link = mysqli_connect('localhost', 'root', '', 'mysqli_prm');
		$sql = "Select * from loghistory";
		if($result = mysqli_query($link, $sql)){
			$row_cnt = mysqli_num_rows($result);
			mysqli_free_result($result);
		}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);

$userRow=$query->fetch_array();
$DBcon->close();

	if(isset($_GET['id'])){
	$id = $_GET['id'];
	$con=mysqli_connect ("localhost", "root", "", "mysqli_prm");		

	$result = mysqli_query($con, $sql);
	}
	else{
	
	}	

//Only process the form if $_POST isn't empty
//print_r($_POST); exit;

//Connect to MySQL
$mysqli = new mysqli('localhost', 'root', "", "mysqli_prm");

//Check our connection
if ($mysqli->connect_error) {
die('Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
}

//Insert our Data
$str = $userRow['first_name'];
echo $str;
$sql = "UPDATE `tbl_appointment` SET `status`='Open' WHERE appoint_id = '$id'";
$result = mysqli_query($con, $sql);

	echo '<script type = "text/javascript">
	alert("Appointment Accepted");
</script>';
header("Location: user-appointment.php" . urlencode(""));


//Print response from MySQL


//Close our Connection
$mysqli->close();

?>

