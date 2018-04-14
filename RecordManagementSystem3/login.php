<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
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
  if ($row['Role'] == 'User'){
	    $_SESSION['userSession'] = $row['user_id'];
	  header("Location: elitehospitaladmin/hospital/eliteadmin-hospital/book-appointment-login.php");
  }else if ($row['Role'] == 'Admin'){
	  echo '<script type = "text/javascript">
	alert("You do not have the permission to login!");
</script>';
$msg = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span><font color='White'><center> &nbsp; You do not have the permission to login!</center></font>
     </div>";
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
        <title>L O G I N</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Ospital ng Paranaque |</strong> Login Form</h1>
                      
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to Book an appointment</h3>
                            		<p>Enter your username and password:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn" name="btn-login">Login!</button>
									 <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
						
                            <p><font color = "white">Don't have an account? <a href="Register.php"><font color = "RED"><b>Sign Up</b></a></p>
                        </div>
                    </div>
			                    </form>
		                    </div>
                        </div>
                    </div>
                   

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>