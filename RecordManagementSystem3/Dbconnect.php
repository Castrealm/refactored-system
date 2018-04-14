<?php

  $DBhost = "localhost";
  $DBuser = "root";
  $DBpass = "";
  $DBname = "mysqli_prm";
  
  $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
?>