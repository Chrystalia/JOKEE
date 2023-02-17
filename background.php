<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php 
    $email = $_SESSION['email'];
    $selectedBackground = mysqli_query($db, "SELECT * FROM users WHERE email = '$email'");
    $row = mysqli_fetch_array($selectedBackground);
    ?>
    <!-- <div id="background"></div> -->
    <style>
    body{
        background-image: url("<?php echo $row['backgroundPath']?>");
        background-size: cover;
    }
    .layer{
        background-color: black;
        position: fixed;
        top: 0;
        left: 0;
        opacity: 0.5;
        z-index: -100;
        width: 100vw;
        height: 100vh;
    }
    </style>
</body>
</html>