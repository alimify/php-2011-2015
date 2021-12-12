<?php session_start();
error_reporting(0);
$password='1234';
if(!session_is_registered($password)) else { echo'sorry u r none admin' ;}
?>