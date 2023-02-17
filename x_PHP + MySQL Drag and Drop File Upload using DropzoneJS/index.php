<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag and Drop File Upload using DropzoneJS and PHP + MySQL - Laratuorials.com</title>
    <!-- Bootstrap Css -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>

<body>
  
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Drag and Drop File Upload using DropzoneJS and PHP + MySQL - Laratuorials.com</h2>
      <form action="upload.php" enctype="multipart/form-data" class="dropzone" id="image-upload">
        <div>
          <h3>Upload Multiple Image By Click On Box</h3>
        </div>
      </form>
      <button id="uploadFile">Upload Files</button>
    </div>
  </div>
</div>

<script type="text/javascript">
  
    Dropzone.autoDiscover = false;
  
    var myDropzone = new Dropzone(".dropzone", { 
       autoProcessQueue: false,
       maxFilesize: 1,
       acceptedFiles: ".jpeg,.jpg,.png,.gif"
    });
  
    $('#uploadFile').click(function(){
       myDropzone.processQueue();
    });
      
</script>
</body>
</html>