<?php
    #connect database
    include 'db.conn.php';

    #fetching image
    $sql = "SELECT productPath FROM finalproduct ORDER BY projectID DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $images = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Product</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />


</head>
<body>

    <div class="title">Final Product</div>
    
    <div class="finalproduct">
        <form method="post"
            action="upload.php"
            enctype="multipart/form-data">

            <?php
                if(isset($_GET['error'])){
                    echo "<p class='error'>";
                    echo htmlspecialchars($_GET['error']);
                    echo "</p>";
                }
            ?>
        <div class="btn">
            <input type="file"
                id="file"
                name="images[]"
                class="btn-choose"
                multiple>

            <button type="submit"
                name="upload"
                class="btn-upload">
                <img src="Assets/Upload.png" width="37px">
            </button>
        </div>
            
        </form>
    </div>


    <?php
        if($stmt->rowCount() > 0) { ?>
            <div class="gallery">
                <?php foreach ($images as $image) { ?>
                    <img src="uploads/<?=$image['productPath']?>">
                    <a href="download.php?file=<?php echo $image['productPath'] ?>">
                        <img src="Assets/Download.png"class="btn-download"></a>
                    <a href="delete.php?file=<?php echo $image['productPath'] ?>">
                        <img src="Assets/Delete.png"class="btn-delete"></a>
                    </a>
                <?php
                }?>
            </div>

            <!-- <div class="img-popup">
                <span>$times;</span>
                <img src="images[]">
            </div> -->
        <?php
        }?>
        

    
    
    <!-- <script>
        document.querySelectorAll('.image-container img').forEach(image =>{
            image.onclick = () => {
                document.querySelector('.img-popup').style.dispplay = 'block';
                document.querySelector('.img-popup img').src = image.getAttrivute('src');
            }
        });

        document.querySelector('.img-popup span').onclick = () => {
            document.querySelector('.img-popup').style.dispplay = 'none';
        }

    </script> -->
</body>
</html>