<?php

if(isset($_POST['upload'])){
    #connect database
    include 'db.conn.php';

    $finalproduct = $_FILES['finalproduct'];

    #banyak gambar
    $num_of_imgs = count($finalproduct['name']);

    for($i = 0; $i < $num_of_imgs; $i++){

        #taro di var
        $image_name = $finalproduct['name'][$i];
        $tmp_name = $finalproduct['tmp_name'][$i];
        $error = $finalproduct['error'][$i];

        #kalo ga error pas upload
        if($error === 0) {
            $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            // echo $img_ex. "<br>";
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array('jpg', 'jpeg', 'png');
    
            if (in_array($img_ex_lc, $allowed_exs)) {

                #rename pake random string
                $new_img_name = uniqid('IMG-', true) . '.' . $img_ex_lc;
                $img_upload_path = 'fp_uploads/'.$new_img_name;
    
                $sql = "INSERT INTO finalproduct (img_name) VALUES (?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$new_img_name]);
                
                move_uploaded_file($tmp_name, $img_upload_path);
           
                # redirect to index.php
                header("Location: finalProduct.php");
            }
            else{
                $em = "Ga bisa upload tipe ini";
                header("Location: finalProduct.php?error=$em");
            }
        }
        else{
            #error message
            $em = "Unknown Error Ocurred while uploading";
            header("Location: finalProduct.php?error=$em");
        }
    }
    // echo $num_of_img;
    // echo "<pre>";
    // print_r($_FILES['finalproduct']['name'][0]);
}