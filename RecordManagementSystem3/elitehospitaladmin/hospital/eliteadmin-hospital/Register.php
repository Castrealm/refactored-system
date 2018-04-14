<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['adminSession'])) {
 header("Location: book-appointment-login.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['adminSession']);
$userRow=$query->fetch_array();
$username = $userRow['username'];

$query2 = "SELECT count(*) AS total FROM tbl_inbox where inbox_to='$username' and notification = 'unread'"; 
$link = mysqli_connect("localhost", "root", "")or die("cannot connect"); 
    mysqli_select_db($link, "mysqli_prm")or die("cannot select DB");
$result = mysqli_query($link ,$query2); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 

?>

<?php if(isset($_POST['btn-signup'])) {
 
 $uname = strip_tags($_POST['username']);
 $fname = strip_tags($_POST['first_name']);
 $lname = strip_tags($_POST['last_name']);
 $email = strip_tags($_POST['email']);
 $upass = strip_tags($_POST['password']);
 $sex = strip_tags($_POST['sex']);
 $bday = strip_tags($_POST['birthday']);
 $contact_no = strip_tags($_POST['contact_no']);
 $role = strip_tags($_POST['role']);
 

 

 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
 $check_email = $DBcon->query("SELECT email FROM tbl_users WHERE email='$email'");
 $countemail=$check_email->num_rows;
 
 $check_username = $DBcon->query("SELECT username FROM tbl_users WHERE username	='$uname'");
 $countuname=$check_username->num_rows;
 
 if ($countemail==0 && $countuname==0) {
	if ($countemail==0) {
		if ($countuname==0) {
		 
  $query = "INSERT INTO tbl_users(username,first_name,last_name,email,password,sex,birthday,role,contact_no) VALUES('$uname','$fname','$lname','$email','$hashed_password','$sex','$bday','$role','$contact_no')";
  if ($DBcon->query($query)) {
   $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span><font color='White'><center> &nbsp; Registration Succesful! Please try Logging In! </center></font>
     </div>";
  }else {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span><font color='White'><center> &nbsp; error while registering!</center></font>
     </div>";
  }
  
    $query2 = "INSERT INTO tbl_useraddhistory(username,date_added) VALUES('$uname',now())";
  if ($DBcon->query($query2)) {
   echo '<script type = "text/javascript">
	alert("Registration Successful! Please try logging in");
</script>';
  }else {
echo '<script type = "text/javascript">
	alert("Error while registering");
</script>';
  }
	 
	  	} else {
			echo '<script type = "text/javascript">
	alert("Email Taken!");
</script>'; 
	 }
	 
	 } else {
	echo '<script type = "text/javascript">
	alert("Username Taken!");
</script>';
	 }
  
 } else {
	   echo '<script type = "text/javascript">
	alert("Username and Email Already Taken!");
</script>';
 } 

}
 $DBcon->close();

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
    <title>Create Account</title>
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
    

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Create an Account</title>
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
                <div class="top-left-part"><a class="logo" href="index.php"><b><img src="../plugins/images/logo.png" width = "210px"/></b><span class="hidden-xs"></a></div>
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

                                <a class="text-center" href="inbox.php"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
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
                                                      <li><a href="../../../logout.php?logout"><i class="fa fa-power-off"></i>  Logout</a></li>
													  <li><a href="inbox.php"><i class="ti-email"></i>  Inbox</a></li>

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
                            <li> <a href="book-appointment.php">Book Appointment Records</a> </li>
							<li> <a href="admission.php">Admission Records</a> </li>
							<li> <a href="archive.php">Archive</a> </li>
							<li> <a href="pending-leave.php">Pending Leave Records</a> </li>
							<li> <a href="accepted-leave.php">Accepted Leave Records</a> </li>
							<li> <a href="leave-archive.php">Leave Archive</a> </li>

                        </ul>
                    </li>

							<li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user p-r-10"></i> <span class="hide-menu"> Register <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="Register.php">Create an Account</a> </li>
                            
                        </ul>
                    </li>
                    
                    <li class="hide-menu"
                        <a href="javacript:void(0);">
                           
                        </a>
                    </li>
                </ul>
            </div>
        </div>
		<form class="form-signin" method="post" id="register-form" enctype="multipart/form-data">
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Create Account</h4>
                    </div>
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Account Information</h3>
                            <form class="form-material form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Username</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="username" class="form-control" placeholder="Enter Your Username"  style="width:500px" required>
                                    </div>
                                </div>
                                    <div class="form-group">
                                    <label class="col-md-12" for="example-text">First name</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="first_name" class="form-control" placeholder="Enter Your First Name" style="width:500px" required>
                                    </div>
                                </div>
								    <div class="form-group">
                                    <label class="col-md-12" for="example-text">Last name</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="last_name" class="form-control" placeholder="Enter Your Last Name" style="width:500px" required>
                                    </div>
                                </div>
								    <div class="form-group">
                                    <label class="col-md-12" for="example-email">Email</span></label>
                                    <div class="col-md-12">
                                        <input type="email" id="example-email" name="email" class="form-control" placeholder="Enter your Email " style="width:500px" required >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Role</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="role" style="width:100px">
                                                <option>Admin</option>
												<option>Doctor</option>
                                                <option>User</option>												
                                            </select>
                                    </div>
                                </div>
									<div class="form-group">
                                    <label class="col-md-12" for="example-email">Password</span></label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" class="form-control" placeholder="Enter your Password " style="width:500px" required>
                                    </div>
                                </div>
									<div class="form-group">
                                    <label class="col-md-12" for="example-email">Confirm Password</span></label>
                                    <div class="col-md-12">
                                        <input type="password" name="password2" class="form-control" placeholder="Enter your Password " style="width:500px" required>
                                    </div>
                                </div>
									<div class="form-group">
                                    <label class="col-md-12" for="example-email">Birthday</span></label>
                                    <div class="col-md-12">
										 <input id="datefield" type="date" class="form-control" placeholder="Birthday" name="birthday" min="1900-01-01" max="2017-03-10" style="width:170px" required  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Gender</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="sex" style="width:100px">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-phone">Phone</span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-phone" name="contact_no" style="width:150px" class="form-control"  placeholder="Enter your Phone" data-mask="(999) 999-9999">
                                    <br><br>
									</div>
                                </div>

                                <button type="submit" name="btn-signup" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
								      </form>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul>
                                <li><b>Layout Options</b></li>
                                <li>
                                    <div class="checkbox checkbox-info">
                                        <input id="checkbox1" type="checkbox" class="fxhdr">
                                        <label for="checkbox1"> Fix Header </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-warning">
                                        <input id="checkbox2" type="checkbox" class="fxsdr">
                                        <label for="checkbox2"> Fix Sidebar </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox4" type="checkbox" class="open-close">
                                        <label for="checkbox4"> Toggle Sidebar </label>
                                    </div>
                                </li>
                            </ul>
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme working">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                              
                              
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
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
