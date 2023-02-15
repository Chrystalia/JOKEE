<?php
    #connect database
    include 'db.conn.php';

    // delete
    if(isset($_GET['file'])){
        
        $image  = basename($_GET['file']);

        $filePath  = "fp_uploads/".$image;

        $sql = "DELETE FROM finalproduct WHERE img_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($image));
        $finalproduct = $stmt->fetchAll();

        @unlink($filePath);

        
        header("Location: finalProduct.php");
    }
?>