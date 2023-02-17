<?php

$sName = "localhost";
$uName = "root";
$pass = "";

$db_name = "jokeedb";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  }
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>