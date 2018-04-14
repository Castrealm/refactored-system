<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: admission-login.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();


?>

<?php if(isset($_POST['btn-appoint'])) {
 
 $patient_name = strip_tags($_POST['patient_name']);
 $date_birth = strip_tags($_POST['date_birth']);
 $date_admitted = strip_tags($_POST['date_admitted']);
 $gender = strip_tags($_POST['gender']);
 $health_condition = strip_tags($_POST['health_condition']);
 $date_time = strip_tags($_POST['date_time']);
 $email = strip_tags($_POST['email']);
 $phone = strip_tags($_POST['phone']);



  $query = "INSERT INTO tbl_admission(patient_name,date_birth,date_admitted,gender,health_condition,date_time,email,phone) VALUES('$patient_name','$date_birth','$date_admitted','$gender','$health_condition','$date_time','$email', '$phone')";
  if ($DBcon->query($query)) {
echo '<script type = "text/javascript">
	alert("Book Appointed, please wait for a confirmation");
</script>';
  }else {
   $msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span><font color='White'><center> &nbsp; error while registering !</center></font>
     </div>";
  }
  $DBcon->close();
}
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Book an Appointment</title>
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
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="../plugins/images/logo.png" width = "210px"/></b><span class="hidden-xs"></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                   
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="../plugins/images/users/d1.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $userRow['first_name'];?></b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i>  My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i>  Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i>  Account Setting</a></li>
                            <li><a href="../../../logout.php?logout"><i class="fa fa-power-off"></i>  Logout</a></li>
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
                    <li> <a href="javascript:void(0);" class="waves-effect active"><i class="ti-calendar p-r-10"></i> <span class="hide-menu"> Forms <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="book-appointment-login.php">Book Appointment Form</a> </li>
							<li> <a href="admission-login.php">Admission Form</a> </li>
                        </ul>
                    </li>
               
                    
                    <li><a href="../../../logout.php?logout" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
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
                        <h4 class="page-title">Book Appointment Form</h4>
                    </div>
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Appointment Information</h3>
                            <form class="form-material form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text"><b>Name</b></span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="patient_name" class="form-control" placeholder="enter your name">
                                    </div>
                                </div>
                                <div class="form-group">
															

                                    <label class="col-md-12" for="bdate"><br><b>Date of Birth</b></span></label>
                                    <div class="col-md-12">
                                       	<input type="date" name="date_birth">
                                    </div>
                                </div>
								  <div class="form-group">
															

                                    <label class="col-md-12" for="bdate"><br><b>Date of Admission</b></span></label>
                                    <div class="col-md-12">
                                       	<input type="text" name="date_admitted">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12"><br><b>Gender</b></label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="gender">
                                                <option>Select Gender</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12"><b>Health Condition</b></label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="health_condition">
                                                <option>Select Condition</option>
												<option>Acute Bronchitis</option>
												<option>Allergy</option>
                                                <option>Arthritis</option>
												<option>Asthma</option>
												

												<option>Back Pain</option>
												<option>Burns</option>
												
												<option>Dehydration</option>
												<option>Dengue</option>
												<option>Diarrhea</option>
												
												<option>Flu</option>
												<option>Fracture</option>
												
												<option>Gallstone</option>
												
                                                <option>Heart Burn</option>
												<option>Heart Disease</option>
											    <option>Heat Stroke</option>
												<option>Hypertention</option>
																								
												<option>Stroke</option>
												<option>Others</option>

                                            </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="date-time"><br><b>Date Time</span><span class="text-muted font-12 p-l-20">(e.g. "12/10/2017 05:15 pm")</b></span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="date-time" name="date_time" class="form-control" placeholder="enter date and time of appointment" data-mask="99/99/9999 99:99 am">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-email"><br><b>Email</b></span></label>
                                    <div class="col-md-12">
                                        <input type="email" id="example-email" name="email" class="form-control" placeholder="enter your email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-phone"><br><b>Phone</b></span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-phone" name="phone" class="form-control" placeholder="enter your phone" data-mask="(999) 999-9999">
                                    </div>
                                </div>
<br>
                                <button type="submit" name="btn-appoint" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
                                <button type="submit"  class="btn btn-inverse waves-effect waves-light">Cancel</button>
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
