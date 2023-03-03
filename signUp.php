<?php include_once 'db.conn.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signUp.css">
    <script type="text/javascript"></script>
    <link rel="shortcut icon" href="images/Logo JOKEE.png" type="image/x-icon">
    <title>Sign Up for a Free Jokee</title>


</head>
<body>
<div class="header">
        <div class="kotak-logo">
            <a href="home.php"><img src="images/JOKEE.svg" alt="" class="gambar-logo"></a>
        </div>
    </div>

    <h2 class="font-signin">Sign Up</h2>

    <center>
        <form action="" name="formset" method="post" class="formSubmit" onsubmit="return validasi()">
            <div class="kotak-username"> 
                <img src="images/Icon Us.svg" alt="" class="icon-person">
                <input type="text" class="tulis-username" id="set-username" name="username" placeholder="Username" autocomplete="off">
            </div>
        
            <div class="kotak-email"> 
                <img src="images/Icon Email.svg" alt="" class="icon-email">
                <input type="email" class="tulis-email" id="set-email" name="email" placeholder="Email" autocomplete="off">
            </div>
        
            <div class="kotak-password">
                <img src="images/Icon Password.svg" alt="" class="icon-password">
                <input type="password" class="tulis-password" id="set-password" name="password" placeholder="Password" autocomplete="off">
            </div>
        
            <!-- <div class ="terms-condition-box">
                <input type="checkbox" name="agree" id="set-checkbox" class="checkbox" value="true">
                    <p class="term-condition-text" > I have read and agree to the<span class="term-condition-text-2"> <a href="//">privacy policy, terms and condition</a></span></p>
            </div> -->
            
            <div class="tombol-create">
                <!-- <h4 class="tulis-create"></h4>   -->
                <input type="hidden" class="submit-create" value="Create an Account" name="create">
                <div onclick="validasi()" class="submit-createe">Create an Account</div>
            </div>
    
            <h4 class="text-account" >Already have an account? <span class="text-account-2"> <a href="signIn.php">Sign In </a></span></h4>
        </form>
    </center>
    
    <?php
    
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $q = mysqli_query($db, "select * from users where username='$username'");
        $cek = mysqli_num_rows($q);
        
        if($cek > 0){
            echo "<script>alert('Username already used, please use another username');</script>";
        } else {
            $q2 = mysqli_query($db, "select * from users where email='$email'");
            $cek2 = mysqli_num_rows($q2);
            
            if($username == NULL || $email == NULL || $password == NULL){
                echo "<script>alert('You must fill in the data completely!');</script>";
            }
            else if($cek2 > 0){
                echo "<script>alert('Email already used, please use another email');</script>";
            } else{
                $password = md5($_POST['password']);
                $datasimpan = mysqli_query($db, "insert into users set
                username = '$username',
                email = '$email',
                userPassword = '$password'
                ");
                echo "<script>location.href='signIn.php'</script>";
            }
        }
    }
    
    ?>

    <script src="js/sweetalert2.all.min.js"></script>
    <script src="signUp.js"></script>
 </body>
 </html>