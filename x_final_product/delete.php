<?php
    #connect database
    include 'db.conn.php';

    // delete
    if(isset($_GET['file'])){
        
        $image  = basename($_GET['file']);

        $filePath  = "uploads/".$image;

        $sql = "DELETE FROM finalproduct WHERE productPath = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($image));
        $images = $stmt->fetchAll();

        @unlink($filePath);

        
        header("Location: index.php");
    }
?>