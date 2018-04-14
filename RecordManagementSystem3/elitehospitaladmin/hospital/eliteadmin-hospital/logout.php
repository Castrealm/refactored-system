<?php
session_start();

if (!isset($_SESSION['adminSession'])) {
 header("Location: login2.php");
} else if (isset($_SESSION['adminSession'])!="") {
 header("Location: login2.php");
}

if (isset($_GET['logout'])) {
 session_destroy();
 unset($_SESSION['adminSession']);
 header("Location: login2.php");
}
?>