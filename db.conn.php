<?php
session_start(); 
$hName='localhost'; // host name

$uName='root';   // database user name

$password='';   // database password

$dbName = "jokeedb"; // database name

$db = mysqli_connect($hName,$uName,$password,"$dbName");

  if(!$db){
      die('Could not Connect MySql Server');
  }
?>