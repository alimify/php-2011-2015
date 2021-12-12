<?php session_start();
error_reporting(0);
include 'admin_settings.php';
if(!session_is_registered($password)) { header("Location: login.php"); }
?>
