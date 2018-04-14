<?php
   require('session.php');
?>

<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];    
    $username=$_POST['username']; 
    $password=$_POST['password'];
    // checking empty fields
    if(empty($fname) || empty($lname) || empty($email)|| empty($username)|| empty($password)) {            
        if(empty($fname)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($lname)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        } 
         if(empty($username)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        } 
         if(empty($password)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        } 
              
    } else {    
        //updating the table
        $result = mysqli_query($dbconnect, "UPDATE users SET Fname='$fname',Lname='$lname',email='$email',Username='$username',Password='$password' WHERE id=$id_session");
        
        //redirectig to the display page. In our case, it is index.php
		require('session.php');
		header("Location: blank.php");
    }
}
?>

<?php
//getting id from url
//$id = $_GET['id'];
$id = $id_session;
 
//selecting data associated with this particular id
$result = mysqli_query($dbconnect, "SELECT * FROM users");
 
while($res = mysqli_fetch_array($result))
{
	$id = $res['id'];
    $fname = $res['Fname'];
    $lname = $res['Lname'];
    $email = $res['Email'];
    $username = $res['Username'];
    $password = $res['Password'];

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Senor Pollo</title>
    <link href="cssdesign.css" rel="stylesheet" >
   <link href="registerdesign.css" rel="stylesheet">
    	<link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <link href="2/ninja-slider.css" rel="stylesheet" type="text/css" />
    <script src="2/ninja-slider.js" type="text/javascript"></script>


     <style>
        body {font: normal 0.9em Arial;margin:0;}
        a {color:#1155CC;}
        ul li {padding: 10px 0;}
        header {display:block;position:absolute;z-index:4; width: 100%;}

          
    </style>

</head>
<body>
<center>
   

<div class="banner-inner">
 
  <header>
<div id="nav">
<div class="logo">
<img src="image/logo.jpg" alt="image" style="width: 100%; height:150px; vertical-align: middle" >
</div>
<div class="main-nav">
<a href="userhome.php" class="divtxtcontent1-link"><span style="color: rgb(228, 174, 11); ">HOME</span></a>&nbsp;&nbsp;
<a href="events.html" class="divtxtcontent1-link">ABOUT</a>&nbsp;&nbsp;
<a href="menu.html" class="divtxtcontent1-link">MENU</a>&nbsp;&nbsp; 
<a href="events.html" class="divtxtcontent1-link">RESERVATION</a>&nbsp;&nbsp;
<a href="games.html" class="divtxtcontent1-link">CONTACT US</a>
</div>
 



<div class="profile hover01 dropdown">
<div class="prof-pic"><?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Picture'] ).' "style="width: 100%; height:60px; border-radius:50px;border: 2px solid gray; vertical-align: middle"/>';?></div>

<div class="profname">logged in as
<br>
<span style="color: rgb(183, 128, 0);"><?php echo $login_session; ?></span>

 

</div>
  <div class="dropdown-content">
    <a href="usereditpicture.php">Edit Picture</a>
    <a href="usereditprofile.php">Edit Profile</a>
    <a href="logout.php">Logout</a>
  </div>
</div>


 </div>
    </header>
<div class="adminform">
<div class="regform">
<span class="admintitle" style="font-size:4em">Edit Profile</span><br>







<form name="form1" method="post" action="" enctype = "multipart/form-data">
        <table border="0">
            <tr> 
			<td><input type="hidden" name="id" value=<?php echo $id_session;?>></td>
			</tr>
			
			<tr>
                <td>Name</td>
                <td><input type="text" name="fname" value="<?php echo $fname_session;?>"></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="lname" value="<?php echo $lname_session;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email_session;?>"></td>
            </tr>
            <tr> 
                <td>Username</td>
                <td><input type="text" name="username" value="<?php echo $login_session;?>"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password" value="<?php echo $password_session;?>"></td>
            </tr>
            <tr> 
                
            </tr>
            <tr>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>


</div>








</div>



</div>






<footer style="clear: both">
<div></div>
<div class="footcontainer">
<div class="main-navf">
<center>
<a href="home.html" class="divtxtcontent1-link">HOME</a>&nbsp;&nbsp;
<a href="events.html" class="divtxtcontent1-link">ABOUT</a>&nbsp;&nbsp;
<a href="menu.html" class="divtxtcontent1-link">MENU</a>&nbsp;&nbsp; 
<a href="events.html" class="divtxtcontent1-link">RESERVATION</a>&nbsp;&nbsp;
<a href="games.html" class="divtxtcontent1-link">CONTACT US</a>
</center>
</div>
<div class="foot-row">
<a href="facebook.com"><img class="foot-link" src="image/fblogo.png" ></a> &nbsp;
<a href="facebook.com"><img class="foot-link" src="image/twtrlogo.png" ></a> &nbsp;
<a href="facebook.com"><img class="foot-link" src="image/iglogo.png" ></a> &nbsp;</div>
<div class="footad">Copyright 2018 Senor Pollo. All Rights Reserved</div>

</div>

</footer>

</body>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>





</html>
