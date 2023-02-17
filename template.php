<?php  
include_once 'header.php';
$email = $_SESSION['email'];

if(isset($_POST['change-bg'])){
    $backgroundPath = $_POST['change-bg'];
    if(mysqli_query($db, "UPDATE `users` SET `backgroundPath`='$backgroundPath' WHERE email = '$email'")){
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='template.css'>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Template | Jokee</title>
</head>
<body>
    <!-- background -->
    <?php include 'background.php' ?>
    <div class="layer"></div>

    <div class="vertical">
        <div class="title"> Templates </div>
        
        <div class="temp">
          <div class="selected-page">
            <button id="gallery-label" type="button" class="template-btn" onclick="galleryPage()"  style="color: #FFBE9D;">Gallery</button>
            <button id="upload-label" type="button" class="template-btn" onclick="uploadPage()">Upload</button>
          </div>
          <div class="cont vertical">

            <div id="gallery">
              <form action="" method="POST" enctype="multipart/form-data" style="display: none;">
                  <input type="text" name="change-bg" id="selected-bg" value=""/>
                  <!-- <button type="submit" name="chosen-bg" id="change-bg-btn"></button> -->
              </form>
                <div class="horizontal" >
                  <div onclick="showTemplate()"> <span class="arrow"><img src="images/background/left button.svg" alt="arrow-left"id="arrow-left"/></span> </div>
                  <div class="pic">
                    <div id="page1">
                      <img src="images/background/Template 1.png" alt="bg-image" id="bg1"/>
                      <img src="images/background/Template 2.png" alt="bg-image" id="bg2"/>
                      <img src="images/background/Template 3.png" alt="bg-image" id="bg3"/>
                      <img src="images/background/Template 4.png" alt="bg-image" id="bg4"/>
                      <img src="images/background/Template 5.png" alt="bg-image" id="bg5"/>
                      <img src="images/background/Template 6.png" alt="bg-image" id="bg6"/>
                    </div>
                    <div id="page2" style="display: none;">
                      <img src="images/background/Template 7.png" alt="bg-image" id="bg7"/>
                      <img src="images/background/Template 8.png" alt="bg-image" id="bg8"/>
                      <img src="images/background/Template 9.png" alt="bg-image" id="bg9"/>
                      <img src="images/background/Template 10.png" alt="bg-image" id="bg10"/>
                      <img src="images/background/Template 11.png" alt="bg-image" id="bg11"/>
                      <img src="images/background/Template 12.png" alt="bg-image" id="bg12"/>
                    </div>
                    <div id="page3" style="display: none;">
                      <img src="images/background/Template 13.png" alt="bg-image" id="bg13"/>
                      <img src="images/background/Template 14.png" alt="bg-image" id="bg14"/>
                      <img src="images/background/Template 15.png" alt="bg-image" id="bg15"/>
                      <img src="images/background/Template 16.png" alt="bg-image" id="bg16"/>
                      <img src="images/background/Template 17.png" alt="bg-image" id="bg17"/>
                      <img src="images/background/Template 18.png" alt="bg-image" id="bg18"/>
                    </div>
                  </div>
                  <div onclick="showTemplate()"><span class="arrow"> <img src="images/background/right button.svg" alt="arrow-right"id="arrow-right"/></span></div>
                </div>
                <div class="page"><span id="currentPage"></span>/3</div>
              </div>
              
                <div id="upload" style="display: none;">
                  <!-- <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false" > -->
                  <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="allowDrop(event);" ondragleave="leaveDropZone(event);">
                      <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                      <div id="drag_upload_file">
                          <header>Drag & Drop to Upload File</header>
                          <p>OR</p>
                          <p><input type="button" value="Browse File" onclick="file_explorer();" /></p>
                          <input type="file" id="selectfile"/>
                      </div>
                  </div>
                  <!-- show image -->
                  <div class="img-content" style="display: none;"></div>
                  
            </div>
        </div>
    </div>
        
    <script src="templates.js"></script>
</body>
</html>