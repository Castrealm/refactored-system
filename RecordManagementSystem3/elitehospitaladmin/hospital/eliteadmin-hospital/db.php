<?php
/*
Author: Javed Ur Rehman
Website: https://htmlcssphptutorial.wordpress.com/
*/
?>
<?php
$hostname = "localhost";
$user = "root";
$password = "";
$database = "mysqli_prm";
$bd = mysql_connect($hostname, $user, $password) 
or die("DB Connection Failed!");
mysql_select_db($database, $bd) or die("DB Connection Failed!");
?>