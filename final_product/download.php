<?php
if(!empty($_GET['file'])){
    $image  = basename($_GET['file']);
    $filePath  = "uploads/".$image;
    
    if(!empty($image) && file_exists($filePath)){
        //define header
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$image");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");
        
        //read file 
        readfile($filePath);
        exit;
    }
    else{
        echo "image not exit";
    }
}