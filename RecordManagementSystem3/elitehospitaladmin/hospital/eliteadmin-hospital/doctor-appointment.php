<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['doctorSession'])) {
 header("Location: book-appointment-login.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['doctorSession']);
$userRow=$query->fetch_array();
$username = $userRow['username'];
$first_name = $userRow['first_name'];

$query2 = "SELECT count(*) AS total FROM tbl_inbox where inbox_to='$username' and notification = 'unread'"; 
$link = mysqli_connect("localhost", "root", "")or die("cannot connect"); 
    mysqli_select_db($link, "mysqli_prm")or die("cannot select DB");
$result = mysqli_query($link ,$query2); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Appointment Records</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
                              
    <!-- color CSS -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    
</head>

<body>
     <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="doctor-appointment.php"><b><img src="../plugins/images/logo.png" width = "210px"/></b><span class="hidden-xs"></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                   
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div> 
          </a>
		  
                        <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
    


						<?php if($num_rows > 0) { echo"
						<div class='notify'><span class='heartbit'></span><span class='point'></span></div>";
						} ?> 
          </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have <?php echo $num_rows; ?> new messages</div>

                                <a class="text-center" href="inbox-doctor.php"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                        <!-- /.dropdown-messages -->
                    </li>
                    
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../plugins/images/users/admin.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $userRow['first_name'];?></b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                                                      <li><a href="doctor-logout.php?logout"><i class="fa fa-power-off"></i>  Logout</a></li>
													  <li><a href="inbox-doctor.php"><i class="ti-email"></i>  Inbox</a></li>

                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                   
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li> <a href="javascript:void(0);" class="waves-effect active"><i class="ti-folder p-r-10"></i> <span class="hide-menu"> Records <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="doctor-appointment.php">Appointment Records</a> </li>
							<li> <a href="doctor-archive.php">Archive</a> </li>

                        </ul>
                   							<li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user p-r-10"></i> <span class="hide-menu"> Leave Form <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="leave-form.php">Leave Application Form</a> </li>
							<li> <a href="doctor-leave-record.php">My Leave Records</a> </li>
                            
                        </ul>
                    </li>
                    
                    <li class="hide-menu">
                        <a href="javacript:void(0);">
                           
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Book Appointment Records</h4>
                    </div>
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
  <form>&nbsp;<input type="search" id="myInput" onkeyup="myFunction()" placeholder="Search Name" ></form>
  
  <table id="myTable">
  <tr class="header">
  <th align="center">ID</th>
  &nbsp;&nbsp;&nbsp;<th align="center">Patient Name</th>
  <th align="center">Address</th>
  <th align="center">Birthday</th>
  <th align="center">Gender</th>
  <th align="center">Specialization</th>
  <th align="center">Doctor</th>
  <th align="center">Preffered Date</th>
  <th align="center">Preffered Time</th>
  <th align="center">Email</th>
  <th align="center">Phone</th>
  <th align="center">Status</th>


 <input name="hr_name" type="hidden" value="<?php echo $userRow['first_name']; ?>">
  </tr>
<?php
		include("dbconnect.php");
		$query = "select * from tbl_appointment where doctor= '$first_name' and status = 'Open'";
		$run = mysqli_query($DBcon,$query);
		while($row = mysqli_fetch_array($run)) {
		$appoint_id = $row['appoint_id'];
		$patient_name = $row['patient_name'];
		
		$address = $row['address'];
		$date_birth = $row['date_birth'];
		$gender = $row['gender'];
		$specialization = $row['specialization'];
		$doctor = $row['doctor'];
		$pref_date = $row['pref_date'];
		$pref_time = $row['pref_time'];
		$email = $row['email'];
		$phone = $row['phone'];
		$status = $row['status'];

				
				
		?>

			
				   
		<tr align= "right">
				<td><?php echo $appoint_id; ?> </td>

		<td><?php echo $patient_name; ?> </td>
		<td><?php echo $address; ?> </td>
		<td><?php echo $date_birth; ?></td>
		<td><?php echo $gender; ?> </td>
		<td><?php echo $specialization; ?> </td>
				<td><?php echo $doctor; ?> </td>

		<td><?php echo $pref_date; ?></td>
		<td><?php echo $pref_time; ?> </td>
		<td><?php echo $email; ?> </td>
		<td><?php echo $phone; ?> </td>
		<td><?php echo $status; ?> </td>
       
		</tr>
		<?php } ?>
		 </table>
		
		
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
     

    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/tether.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="../plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        // Date Picker
        jQuery('.mydatepicker').datepicker();

    </script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/mask.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
