<?php 
session_start();
require_once("config.php"); 
unset($_SESSION['login_sess']);
unset($_SESSION['login_email']);
header("location:login.php"); 
?>

