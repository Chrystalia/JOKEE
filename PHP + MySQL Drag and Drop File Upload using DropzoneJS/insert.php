<?php
  include_once 'mydb.php';

  $uploadDir = 'uploads';

  $tmpFile = $_FILES['file']['tmp_name'];
  $filetype = $_FILES["file"]["type"];
  $filesize = $_FILES["file"]["size"];

 // upload file to directory
 $filename = $uploadDir.'/'.time().'-'. $_FILES['file']['name'];
 move_uploaded_file($tmpFile,$filename);

 // insert file into db
 $sql="INSERT INTO images(file,type,size) VALUES('$filename','$filetype','$filesize')";
                    
 mysqli_query($conn,$sql);

?>