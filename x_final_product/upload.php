<?php

if(isset($_POST['upload'])){
    #connect database
    include 'db.conn.php';

    $images = $_FILES['images'];

    #banyak gambar
    $num_of_imgs = count($images['name']);

    for($i = 0; $i < $num_of_imgs; $i++){

        #taro di var
        $image_name = $images['name'][$i];
        $tmp_name = $images['tmp_name'][$i];
        $error = $images['error'][$i];

        #kalo ga error pas upload
        if($error === 0) {
            $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            // echo $img_ex. "<br>";
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array('jpg', 'jpeg', 'png');
    
            if (in_array($img_ex_lc, $allowed_exs)) {

                #rename pake random string
                $new_img_name = uniqid('IMG-', true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
    
                $sql = "INSERT INTO finalproduct (productPath) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$new_img_name]);
                
                move_uploaded_file($tmp_name, $img_upload_path);
           
                # redirect to index.php
                header("Location: index.php");
            }
            else{
                $em = "The file type is invalid!";
                header("Location: index.php?error=$em");
            }
        }
        else{
            #error message
            $em = "There is no file selected!";
            header("Location: index.php?error=$em");
        }
    }
    // echo $num_of_img;
    // echo "<pre>";
    // print_r($_FILES['images']['name'][0]);
}