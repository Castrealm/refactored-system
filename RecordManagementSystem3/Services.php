<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ospital ng Paranaque</title>
  

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <link rel="shortcut icon" href="assets/ico/favicon.png">


</head>

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

      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <!-- <img src="img/logo.png" class="img-responsive"> -->
            </div>
            <div class="banner-text text-center">
            </div>
            <div class="overlay-detail text-center">
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
  <br>
  <!--service-->
   <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
		<br><br><br>

          <h2 class="ser-title">Our Services</h2>
          <hr class="botm-line">
          <p><font color ="#7E7B7B">Today's challenging healthcare environment demands an experienced partner who can provide healthcare services, while operating on budget. Ospital ng Parañaque has the expertise and experience to meet the needs of patients and making us the preffered choice of best government hospital in Paranaque. </p>
        </div>
		
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
		<img class="fancybox" src="img/SurgicalOncology.jpg" title="Surgical Oncology" width= "300px"/>
            </div>
            <div class="icon-info">
              <h4>Breast Surgery</h4>
              <p><font color ="#7E7B7B">Breast Augmentation. Also known as augmentation mammaplasty, breast enlargement or breast implants. Breast augmentation surgery increases or restores breast size using silicone gel implants, saline implants or in some cases, fat transfer.</p>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">			<br>

		<img class="fancybox" src="img/GeneralSurgery.jpg" title="General Surgery" width= "300px"/>
            </div>
            <div class="icon-info">
              <h4>General Surgery</h4>
              <p><font color ="#7E7B7B">General surgery is a discipline that requires knowledge of and responsibility for the preoperative, operative, and postoperative management of patients with a broad spectrum of diseases, including those which may require nonoperative, elective, or emergency surgical treatment.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
		<img class="fancybox" src="img/Gastro.jpg" title="Gastrointestinal Surgery" width= "300px"/>
            </div>
            <div class="icon-info">
              <h4>Gastrointestinal Surgery</h4>
              <p><font color ="#7E7B7B">Gastrointestinal surgery includes the examination and treatment of various surgical diseases of the digestive tract from the oesophagus to the rectum, and surgical diseases of the liver, biliary ducts and pancreas.</p>
            </div>
          </div>
		  
          <div class="service-info">
            <div class="icon">
			<br>
		<img class="fancybox" src="img/SurgicalOncology.jpg" title="Colorectal Surgery" width= "300px"/>
            </div>
			
            <div class="icon-info">
              <h4>Colorectal Surgery</h4>
              <p><font color ="#7E7B7B">Colorectal surgery is a field in medicine, dealing with disorders of the rectum, anus, and colon. The field is also known as proctology, but the latter term is now used infrequently within medicine, and is most often employed to identify practices relating to the anus and rectum in particular.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ do not remove-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>
</body>
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
                <li><a href="#service"><i class="fa fa-circle"></i>Service</a></li>
                <li><a href="#contact"><i class="fa fa-circle"></i>Appointment</a></li>
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
