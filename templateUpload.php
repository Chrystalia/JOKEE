<?php
include_once('db.conn.php');

$email = $_SESSION['email'];
$arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
  
if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
    echo "false";
    return;
}
  
if (!file_exists('uploadedBackground')) {
    mkdir('uploadedBackground', 0777);
}
  
$filename = time().'_'.$_FILES['file']['name'];
$newdir = 'uploadedBackground/'.$filename;
move_uploaded_file($_FILES['file']['tmp_name'], $newdir);
mysqli_query($db, "UPDATE `users` SET `backgroundPath`='$newdir' WHERE email = '$email'");
echo $newdir;
header('location: template.php');
?>