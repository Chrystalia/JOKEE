<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        #drop_file_zone {
            background-color: #EEE;
            border: #999 5px dashed;
            width: 290px;
            height: 200px;
            padding: 8px;
            font-size: 18px;
        }
        #drag_upload_file {
          width:50%;
          margin:0 auto;
        }
        #drag_upload_file p {
          text-align: center;
        }
        #drag_upload_file #selectfile {
          display: none;
        }
    </style>
    
    <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
        <div id="drag_upload_file">
            <p>Drop file here</p>
            <p>or</p>
            <p><input type="button" value="Select File" onclick="file_explorer();" /></p>
            <input type="file" id="selectfile" />
        </div>
    </div>
    <div class="img-content"></div>
    
    <script>
        var fileobj;
        function upload_file(e) {
            e.preventDefault();
            fileobj = e.dataTransfer.files[0];
            ajax_file_upload(fileobj);
        }
        
        function file_explorer() {
            document.getElementById('selectfile').click();
            document.getElementById('selectfile').onchange = function() {
                fileobj = document.getElementById('selectfile').files[0];
                ajax_file_upload(fileobj);
            };
        }
        
        function ajax_file_upload(file_obj) {
            if(file_obj != undefined) {
                var form_data = new FormData();                  
                form_data.append('file', file_obj);
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "ajax.php", true);
                xhttp.onload = function(event) {
                    oOutput = document.querySelector('.img-content');
                    if (xhttp.status == 200) {
                        oOutput.innerHTML = "<img src='"+ this.responseText +"' alt='The Image' />";
                    } else {
                        oOutput.innerHTML = "Error " + xhttp.status + " occurred when trying to upload your file.";
                    }
                }
        
                xhttp.send(form_data);
            }
        }
    </script>
</body>
</html>