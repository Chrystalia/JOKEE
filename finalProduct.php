<?php
    #connect database
    include 'db.conn2.php';
    include 'header.php';
    $email = $_SESSION['email']; 
    
    #fetching image
    $sql = "SELECT img_name FROM finalproduct WHERE email = '$email' ORDER BY id DESC ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $finalproduct = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Product | Jokee</title>
    <link rel="stylesheet" href="finalProduct.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

</head>
<body>
<?php include 'background.php' ?>
<div class="layer"></div>
<div class="top-margin"></div>
<div class="title left-margin">Final Product</div>
    
    <div class="finalproduct">
        <form method="post"
            action="fp_upload.php"
            enctype="multipart/form-data">

            <?php
                if(isset($_GET['error'])){
                    echo "<p class='error'>";
                    echo "please upload a file with '.jpg', '.jpeg', or '.png' format";
                    echo "</p>";
                }
            ?>
        <div class="fp-btn">
            <input type="file"
                id="file"
                name="finalproduct[]"
                class="btn-choose"
                multiple>

            <button type="submit"
                name="upload"
                class="btn-upload">
                <img src="images/Upload.png" width="37px">
            </button>
        </div>
            
        </form>
    </div>



    <?php
        if($stmt->rowCount() > 0) { ?>
            <div class="gallery">
                
                <!-- <div class="image"> -->
                    <?php foreach ($finalproduct as $image) { ?>

                        <!-- <img src="fp_uploads/<?=$image['img_name']?>"> -->

                        <a href="finalProduct.php?asset=<?php echo $image['img_name'];?>">
                            <img src="fp_uploads/<?php echo $image['img_name']?>">
                        </a>

                        <!-- fp_download -->
                        <a href="fp_download.php?file=<?php echo $image['img_name'] ?>">
                            <img src="images/download.png"class="btn-download">
                        </a>

                        <!-- Delete -->
                        <a href="fp_delete.php?file=<?php echo $image['img_name'] ?>">
                            <img src="images/Delete.png"class="btn-delete">
                        </a>
                        
                        <?php }
                    ?>
                
                
            </div>
            <!-- show final asset pop up -->
            <div class="overlay <?php echo (isset($_GET['asset']) ? '': 'hidden') ?>">
                <script>console.log("nama adalah<?php echo $_GET['asset']; ?>")</script>
                <?php
                    $finalproduct = $_GET['asset'];
                    $query = mysqli_query($db, "SELECT * FROM finalProduct WHERE img_name='$finalproduct'");
                    $row = mysqli_fetch_array($query);
                    ?>
                <div class="item-overlay">
                    <!-- show product -->
                    <img src="fp_uploads/<?php echo $row['img_name']?>" class="finalproject">    
                    <!-- close product -->
                    <a href="finalProduct.php" class="btn-close-container">
                        <img src="images/x-wo-shadow.svg"class="btn-close">
                    </a>
                </div>
            </div>
        <?php }
    ?>
        

    
</body>
</html>