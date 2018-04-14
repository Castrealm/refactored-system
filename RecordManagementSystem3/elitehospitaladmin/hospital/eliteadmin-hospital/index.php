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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Admin ONP</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
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
			
		<style type="text/css">
			#chart-container {
				position: absolute;
				left: 380px;
				top: 170px;
				width: 940px;
				height: auto;
strokeStyle = "AFFF2F";
		
			}
			
		</style>

		<div id="chart-container">
		<h1>Top 5 Disease this month</h1>		
			<canvas id="mycanvas"></canvas>
	
		</div>

		<!-- javascript -->
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/Chart.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
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
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="ti-folder p-r-10"></i> <span class="hide-menu"> Records <span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="book-appointment.php">Book Appointment Records</a> </li>
							<li> <a href="admission.php">Accepted Records</a> </li>
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
                    </li>
                  
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
		
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					
                        <h4 class="page-title">Hospital Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <a href="" target="_blank" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Buy Now</a>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Hospital</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-user bg-megna"></i>
                                <div class="bodystate">
                                    <h4>370</h4> <span class="text-muted">New Patient</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-shopping-cart bg-info"></i>
                                <div class="bodystate">
                                    <h4>342</h4> <span class="text-muted">OPD Patient</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-wallet bg-success"></i>
                                <div class="bodystate">
                                    <h4>13</h4> <span class="text-muted">Today's Ops.</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats"> <i class="ti-wallet bg-inverse"></i>
                                <div class="bodystate">
                                    <h4>$34650</h4> <span class="text-muted">Hospital Earning</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title"><small class="pull-right m-t-10 text-success"><i class="fa fa-sort-asc"></i> 18% High then last month</small> New Patient</h3>
                            <div class="stats-row">
                                <div class="stat-item">
                                    <h6>Overall</h6> <b>80.40%</b></div>
                                <div class="stat-item">
                                    <h6>Montly</h6> <b>15.40%</b></div>
                                <div class="stat-item">
                                    <h6>Day</h6> <b>5.50%</b></div>
                            </div>
                            <div id="sparkline8" class="minus-mar"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title"><small class="pull-right m-t-10 text-danger"><i class="fa fa-sort-desc"></i> 18% less then last month</small>OPD Patients</h3>
                            <div class="stats-row">
                                <div class="stat-item">
                                    <h6>Overall</h6> <b>80.40%</b></div>
                                <div class="stat-item">
                                    <h6>Montly</h6> <b>15.40%</b></div>
                                <div class="stat-item">
                                    <h6>Day</h6> <b>5.50%</b></div>
                            </div>
                            <div id="sparkline9" class="minus-mar"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title"><small class="pull-right m-t-10 text-success"><i class="fa fa-sort-asc"></i> 18% High then last month</small>Treatment</h3>
                            <div class="stats-row">
                                <div class="stat-item">
                                    <h6>Overall Growth</h6> <b>80.40%</b></div>
                                <div class="stat-item">
                                    <h6>Montly</h6> <b>15.40%</b></div>
                                <div class="stat-item">
                                    <h6>Day</h6> <b>5.50%</b></div>
                            </div>
                            <div id="sparkline10" class="minus-mar"></div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!--row -->
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Patients In</h3>
                            <ul class="list-inline text-center">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>OPD</h5> </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #b4becb;"></i>ICU</h5> </li>
                            </ul>
                            <div id="morris-area-chart1" style="height: 370px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Hospital Earning</h3>
                            <ul class="list-inline text-center">
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>OPD</h5> </li>
                                <li>
                                    <h5><i class="fa fa-circle m-r-5" style="color: #b4becb;"></i>ICU</h5> </li>
                            </ul>
                            <div id="morris-area-chart2" style="height: 370px;"></div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">New Patient List</h3>
                            <p class="text-muted">this is the sample data here for crm</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Diseases</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Deshmukh</td>
                                            <td>Prohaska</td>
                                            <td>@Genelia</td>
                                            <td><span class="label label-danger">Fever</span> </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Deshmukh</td>
                                            <td>Gaylord</td>
                                            <td>@Ritesh</td>
                                            <td><span class="label label-info">Cancer</span> </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Sanghani</td>
                                            <td>Gusikowski</td>
                                            <td>@Govinda</td>
                                            <td><span class="label label-warning">Lakva</span> </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Roshan</td>
                                            <td>Rogahn</td>
                                            <td>@Hritik</td>
                                            <td><span class="label label-success">Dental</span> </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Joshi</td>
                                            <td>Hickle</td>
                                            <td>@Maruti</td>
                                            <td><span class="label label-info">Cancer</span> </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Nigam</td>
                                            <td>Eichmann</td>
                                            <td>@Sonu</td>
                                            <td><span class="label label-success">Dental</span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Laboratory Test</h3>
                            <p class="text-muted">this is the sample data here for crm</p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>ECG</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Genelia Deshmukh</td>
                                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#01c0c8"], "stroke":["#01c0c8"]}' data-height="40">0,-3,-2,-4,-5,-4,-3,-2,-5,-1</span> </td>
                                            <td><span class="text-danger text-semibold"><i class="fa fa-level-down" aria-hidden="true"></i> 28.76%</span> </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Ajay Devgan</td>
                                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#01c0c8"], "stroke":["#01c0c8"]}' data-height="40">0,-1,-1,-2,-3,-1,-2,-3,-1,-2</span> </td>
                                            <td><span class="text-warning text-semibold"><i class="fa fa-level-down" aria-hidden="true"></i> 8.55%</span> </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Hrithik Roshan</td>
                                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#01c0c8"], "stroke":["#01c0c8"]}' data-height="40">0,3,6,1,2,4,6,3,2,1</span> </td>
                                            <td><span class="text-success text-semibold"><i class="fa fa-level-up" aria-hidden="true"></i> 58.56%</span> </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Steve Gection</td>
                                            <td><span class="peity-line" data-width="120" data-peity='{ "fill": ["#01c0c8"], "stroke":["#01c0c8"]}' data-height="40">0,3,6,4,5,4,7,3,4,2</span> </td>
                                            <td><span class="text-info text-semibold"><i class="fa fa-level-up" aria-hidden="true"></i> 35.76%</span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
               

                          
                             
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                
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
    <!--Morris JavaScript -->
    <script src="../plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="../plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- jQuery peity -->
    <script src="../plugins/bower_components/peity/jquery.peity.min.js"></script>
    <script src="../plugins/bower_components/peity/jquery.peity.init.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>