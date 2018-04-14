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
			   <li class=""><a href="index.html">Home</a></li>
				<li class=""><a href="FindADoctor.php">Find a Doctor</a></li>
                <li class=""><a href="About.php">About ONP</a></li>
                <li class=""><a href="Services.php">Our Services</a></li>
                <li class=""><a href="Contact.php">Contact Us</a></li>
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

<form>&nbsp;<input type="search" id="myInput" onkeyup="myFunction()" placeholder="Find a Doctor" ></form>
<br>

  <table id="myTable">
  <tr class="header">
  <th align="center"></th>
  <th align="center">Name</th>
  <th align="center">Specialization</th>
  <th align="center">Contact Number</th>
  <th align="center">Schedule</th>

 
  <th></th>
  </tr>
 
<?php
		include("dbconnect.php");
		$query = "select * from tbl_doctor";
		$run = mysqli_query($DBcon,$query);
		while($row = mysqli_fetch_array($run)) {
		$image = $row['image'];
		$name = $row['name'];
		$specialization = $row['specialization'];
		$contact_no = $row['contact_no'];
		$schedule = $row['schedule'];

				
		?>

			
				   
		<tr align= "center">
		<td><?php echo '&nbsp;&nbsp;&nbsp;<img style="height:100px;width:100px;" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>'; ?></td>
		<td><?php echo $name; ?> </td>
		<td><?php echo $specialization; ?> </td>
		<td><?php echo $contact_no; ?></td>
		<td><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo $schedule; ?></td>

	
		<td></td>
		
		</tr>
		<?php } ?>
		</form>
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
