<?php
    #connect database
    include 'db.conn.php';
    include 'db.conn2.php';

    // delete
    if(isset($_GET['file'])){
        
        $image  = basename($_GET['file']);
        $filePath  = "uploads/".$image;

        $qrys = mysqli_query($db, "SELECT * FROM cardimage WHERE imagePath = '$image'");
        $qry = mysqli_fetch_array($qrys);
        $cardid = $qry['cardID'];

        $sql = "DELETE FROM cardimage WHERE imagePath = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($image));
        $finalproduct = $stmt->fetchAll();
        
        @unlink($filePath);
        
        
        header('Location: board.php?show='.$cardid);
    }
?>