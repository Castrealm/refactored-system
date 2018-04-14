<?php
session_start();
require_once 'dbconnect.php';

 if(isset($_POST['btn-signup'])) {
 
 $uname = strip_tags($_POST['username']);
 $fname = strip_tags($_POST['first_name']);
 $lname = strip_tags($_POST['last_name']);
 $email = strip_tags($_POST['email']);
 $upass = strip_tags($_POST['password']);
 $sex = strip_tags($_POST['sex']);
 $bday = strip_tags($_POST['birthday']);
 $contact_no = strip_tags($_POST['contact_no']);
 

 

 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
 $check_email = $DBcon->query("SELECT email FROM tbl_users WHERE email='$email'");
 $countemail=$check_email->num_rows;
 
 $check_username = $DBcon->query("SELECT username FROM tbl_users WHERE username	='$uname'");
 $countuname=$check_username->num_rows;
 
 if ($countemail==0 && $countuname==0) {
	if ($countemail==0) {
		if ($countuname==0) {
		 
  $query = "INSERT INTO tbl_users(username,first_name,last_name,email,password,sex,birthday,role,contact_no) VALUES('$uname','$fname','$lname','$email','$hashed_password','$sex','$bday','User','$contact_no')";
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ospital ng Paranaque</title>
  

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style3.css">
  <link rel="shortcut icon" href="assets/ico/favicon.png">

</head>
<body>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <a class="navbar-brand" href="index.html"><img src="img/logo.png" class="img-responsive" style="width: 140px; margin-top: -14px; margin-left: -97px "></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
			  	<li class=""><a href="FindADoctor.php">Find a Doctor</a></li>
                <li class=""><a href="About.php">About ONP</a></li>
                <li class=""><a href="Services.php">Our Services</a></li>
                <li class=""><a href="#contact">Contact Us</a></li>
				<li><a href="login.php">Login</a></li>
</li>
				</ul>
            </div>
          </div>
        </div>
      </nav>
  <!--doctor team-->
  <br>
  <br>
  <br>
  <br><br><br>
<form class="form-signin" method="post" id="register-form" enctype="multipart/form-data">
<div class="container" style="background-color:white;width:550px;height:750px; float:center; margin-bottom:15px;">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Register an Account</h3>
							<br>
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
                                        <input type="phone" id="example-phone" name="contact_no" style="width:150px" class="form-control"  placeholder="Enter your Phone" maxlength="11">
                                    </div>
                                </div>

                                <button type="submit" name="btn-signup" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
								      </form>

                        </div>
                    </div>
                </div>

</div>
                            </form>

		
		
<br>
<br>
<br>
  <!--footer-->
  <footer id="footer">
    <div class="top-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">About Us</h4>
            </div>
            <div class="info-sec">
              <p>  Ospital ng Parañaque is a healthcare instituton providing patient treatment with specialized medical and nursing staff and medical equipment.</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Quick Links</h4>
            </div>
            <div class="info-sec">
              <ul class="quick-info">
                <li><a href="index.html"><i class="fa fa-circle"></i>Home</a></li>
				<li><a href="About.php"><i class="fa fa-circle"></i>About Us</a></li>
                <li><a href="Services.php"><i class="fa fa-circle"></i>Service</a></li>
                <li><a href="login.php"><i class="fa fa-circle"></i>Appointment</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Follow us</h4>
            </div>
            <div class="info-sec">
              <ul class="social-icon">
                <li class="bglight-blue"><i class="fa fa-facebook"></i></li>
                <li class="bgred"><i class="fa fa-google-plus"></i></li>
                <li class="bgdark-blue"><i class="fa fa-linkedin"></i></li>
                <li class="bglight-blue"><i class="fa fa-twitter"></i></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            © Copyright Ospital ng Parañaque. All Rights Reserved
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medilab
              -->
              Designed by <a href="https://bootstrapmade.com/">SBCA Students</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
