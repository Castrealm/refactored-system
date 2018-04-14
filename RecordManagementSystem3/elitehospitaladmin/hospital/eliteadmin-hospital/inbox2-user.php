<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: book-appointment-login.php");
}

$query = $DBcon->query("SELECT * FROM tbl_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$username = $userRow['username'];
$query2 = "SELECT count(*) AS total FROM tbl_inbox where inbox_to='$username' and notification = 'unread'"; 
$link = mysqli_connect("localhost", "root", "")or die("cannot connect"); 
    mysqli_select_db($link, "mysqli_prm")or die("cannot select DB");
$result = mysqli_query($link ,$query2); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
?>

<?php if(isset($_POST['btn-send'])) {
 


 $currentDateTime = date('Y-m-d H:i:s');
 $inbox_from = $userRow['username'];
 $inbox_to = strip_tags($_POST['inbox_to']);
 $subject = strip_tags($_POST['subject']);
 $message = strip_tags($_POST['message']);
 //$healthcard = strip_tags($_POST['healthcard']);

   
 $query = "SELECT count(*) AS total FROM tbl_users where username='$inbox_to'"; 
$link = mysqli_connect("localhost", "root", "")or die("cannot connect"); 
    mysqli_select_db($link, "mysqli_prm")or die("cannot select DB");
$result = mysqli_query($link ,$query); 
$values = mysqli_fetch_assoc($result); 
$num_rows = $values['total']; 
  
  
if ($num_rows == 0) {
echo '<script type = "text/javascript">
	alert("Invalid Username");
</script>';

}
else{
  $query = "INSERT INTO tbl_inbox(subject, inbox_to ,inbox_from, message, date_sent, notification) VALUES('$subject', '$inbox_to' ,'$inbox_from', '$message', '$currentDateTime', 'unread')";
  if ($DBcon->query($query)) {
echo '<script type = "text/javascript">
	alert("Message Sent!");
</script>';
  }else {
echo '<script type = "text/javascript">
	alert("Error in Sending Message!");
</script>';
  }
}
  $DBcon->close();
}
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
    <title>Book an Appointment-ONP</title>
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
                <div class="top-left-part"><a class="logo" href="index.html"><b><img src="../plugins/images/logo.png" width = "210px"/></b><span class="hidden-xs"></a></div>
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

                                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
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
													  <li><a href="inbox-user.php"><i class="ti-email"></i>  Inbox</a></li>

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
							<li> <a href="user-appointment.php">My Appointments</a> </li>
							<li> <a href="appointment-history.php">Appointment History</a> </li>
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
                    <!-- /.col-lg-12 -->
  
<form class="form-signin" method="post" id="register-form" enctype="multipart/form-data">
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    </div>
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Compose Message</h3>
                            <form class="form-material form-horizontal">

								<div class="form-group">
                                    <label class="col-md-12" for="example-text"><br><b>To:</b></span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="inbox_to" class="form-control" placeholder="Enter Username" required />
                                    </div>
                                </div>
                               
								<div class="form-group">
								
                                    <label class="col-md-12" for="example-text"><br><b>Subject:</b></span></label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-text" name="subject" class="form-control" placeholder="Enter Subject" required />
                                    </div>
                                </div>
								<label class="col-md-12" for="example-text"><br><b>Message:</b></span></label>&nbsp;
								<textarea placeholder="Content" name="message" style="width:600px;height:150px;"></textarea>
                              
                                <button type="submit" name="btn-send" class="btn btn-info waves-effect waves-light m-r-10">Send</button>
								      </form>
                            </form>
                        </div>
                    </div>
                </div>
		
		
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
