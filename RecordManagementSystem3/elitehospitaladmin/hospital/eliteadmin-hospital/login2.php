<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['adminSession'])!="") {
 header("Location: elitehospitaladmin/hospital/eliteadmin-hospital/book-appointment-login.php");
 exit;
}

if (isset($_POST['btn-login'])) {
 
 $email = strip_tags($_POST['form-username']);
 $password = strip_tags($_POST['form-password']);
 
 $email = $DBcon->real_escape_string($email);
 $password = $DBcon->real_escape_string($password);
 
 $query = $DBcon->query("SELECT user_id, username, password,Role FROM tbl_users WHERE username='$email'");
 $row=$query->fetch_array();
 
 $count = $query->num_rows; // if email/password are correct returns must be 1 row
 
 $query = $DBcon->query("Insert Into loghistory (username, loghistory) values ('$email', now())");
 
 if (password_verify($password, $row['password']) && $count==1) {
  if ($row['Role'] == 'Admin'){
	    $_SESSION['adminSession'] = $row['user_id'];
	  header("Location: index.php");
  }else if ($row['Role'] == 'User'){
	  echo '<script type = "text/javascript">
	alert("You do not have the permission to login!");
</script>';
$msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span><font color='White'><center> &nbsp; You do not have the permission to login!</center></font>
     </div>";
  }else if ($row['Role'] == 'Doctor'){
	  	    $_SESSION['doctorSession'] = $row['user_id'];
	  header("Location: doctor-appointment.php");
  }
 } else {
	 echo '<script type = "text/javascript">
	alert("Username and Password does not match!");
</script>';
  $msg = "<div class='alert alert-danger'>
  <br>
  <br>
     <center><span class='glyphicon glyphicon-info-sign'></span><font color='White'> &nbsp; Username and Password does not match! </font></center>
    </div>";
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
    <title>Admin</title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
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
    <section id="wrapper" class="login-register">
        <div class="login-box login-sidebar">
            <div class="white-box">
			<form role="form" action="" method="post" class="login-form">
                <form class="form-horizontal form-material" id="loginform" action="index.html">
				<br><br><br>

                    <a href="javascript:void(0)" class="text-center db"><img src="../plugins/images/logo.png" width= "350px"/>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" name="form-username" type="text" required="" placeholder="Username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" name="form-password" type="password" required="" placeholder="Password"> </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" name="btn-login" type="submit">Log In</button>
                        </div>
                    </div>
                   
                    </div>
                   
                </form>
				</form>
                
    </section>
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
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Style Switcher -->
    <script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>