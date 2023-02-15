<?php 
include_once 'db.conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginStyless.css">
    <link rel="shortcut icon" href="img/Logo JOKEE.png" type="image/x-icon">
    <title>Jokee LogIn</title>
</head>
<body>
    

    <div class="header">
        <div class="kotak-logo">
            <img src="images/JOKEE.svg" alt="" class="gambar-logo">
        </div>
        <div class="kotak-signin"><a href = "login.php">
            <h4 class="tulis-signin">Sign In</h4></a>  
        </div></a>
    </div>  

    <h2 class="font-signin">Sign In</h2>
    
    <form action="login.php" id="form-email" method="POST" class="form-email"  name="form-email" autocomplete="off">
        <center><div class="kotak-email login-input"> 
            <img src="images/Icon Email.svg" alt="" class="icon-email">
            <input type="text" id="tulis-email" name="$nameOrEmail" placeholder="Email/Username" onkeydown="" autofocus>
        </div></center>
        
        <center><div class="kotak-password login-input">
            <img src="images/Icon Password.svg" alt="" class="icon-password">
            <input type="password" id="tulis-password" name ="password" placeholder="Password">
        </div><center>
            
            <div class="tombol-login" name="tombol-login">
                <button id="tulis-login-submit" name="proses-login" onclick="submits()">Login</button> 
            </div>
            
            <h4 class="text-account" >Don't have an account?<span class="text-account-2"> <a href="signup.php">Sign Up Now!</a></span></h4>
        </form>
        
        <?php
    // session_start();
    // require 'functions.php'; 
    
    // isset($_POST['proses-login']
    
    // $_SERVER['proses-login'] == 'POST'
        
    if(isset($_POST['proses-login'])){
        $nameOrEmail = $_POST['$nameOrEmail'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE 
                (email = '$nameOrEmail' AND userPassword = '$password') OR 
                (username = '$nameOrEmail' AND userPassword = '$password')";
        $qrys = mysqli_query($db, $query);
        
        // Cek Email/Username dengan Password
        if (mysqli_num_rows($qrys) === 1) {
            // simpan email
            $stmts = mysqli_query($db, "SELECT * FROM users WHERE email = '$nameOrEmail' OR username = '$nameOrEmail'");
            $stmt = mysqli_fetch_array($stmts);
            $_SESSION['email'] = $stmt['email'];
            echo $_SESSION['email'];
            header("Location: board.php");
        }else{
            echo '<script>alert("Email or password you entered is incorrect")</script>';
        }
    }
    ?>

    <script src="loginScripts.js"></script>
</body>
</html>