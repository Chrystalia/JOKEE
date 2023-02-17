<?php
    #connect database
    include 'db.conn.php';

    #fetching image
    $sql = "SELECT img_name FROM finalproduct ORDER BY id DESC";
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
    <title>Jokee</title>
    <link rel="stylesheet" href="finalProduct.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

</head>
<body>
<div class="title">Final Product</div>
    
    <div class="finalproduct">
        <form method="post"
            action="fp_upload.php"
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
                name="finalproduct[]"
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
                
                <!-- <div class="image"> -->
                    <?php foreach ($finalproduct as $image) { ?>

                        <img src="fp_uploads/<?=$image['img_name']?>">

                        <!-- <a href="#<?php echo $image['img_name'];?>" class="img-popup">
                            <img src="fp_uploads/<?=$image['img_name']?>">
                        </a> -->

                        <!-- fp_download -->
                        <a href="fp_download.php?file=<?php echo $image['img_name'] ?>">
                            <img src="Assets/download.png"class="btn-download"></a>

                        <!-- Delete -->
                        <a href="fp_delete.php?file=<?php echo $image['img_name'] ?>">
                            <img src="Assets/Delete.png"class="btn-delete"></a>

                    <?php }
                    ?>
                <!-- </div> -->
                
                <!-- <div class="img-popup">
                    <span>$times;</span>
                    <img src="fp_uploads/<?=$image['img_name']?>">
                </div> -->

            </div>
        <?php }
    ?>
        

    
    
    <!-- <script>
        document.querySelectorAll('.gallery img').forEach(image =>{
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