var currPage = 1;
var background;
document.getElementById("arrow-left").onclick = function(){
    if(currPage != 1) currPage-=1;
    document.getElementById("currentPage").innerHTML = currPage;
}

document.getElementById("arrow-right").onclick = function(){
    if(currPage != 3) currPage+=1;
    document.getElementById("currentPage").innerHTML = currPage;
}

// show template Page
function showTemplate(){
    let page1 = document.getElementById("page1");
    let page2 = document.getElementById("page2");
    let page3 = document.getElementById("page3");
    if(currPage === 1){
        page1.style.display = "block";
        page2.style.display = "none";
        page3.style.display = "none";
    }else if(currPage === 2){
        page1.style.display = "none";
        page2.style.display = "block";
        page3.style.display = "none";
    }else if(currPage === 3){
        page1.style.display = "none";
        page2.style.display = "none";
        page3.style.display = "block";
    }
}

// change background
document.getElementById("bg1").onclick = function(){
   background = document.getElementById("bg1").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg2").onclick = function(){
   background = document.getElementById("bg2").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg3").onclick = function(){
   background = document.getElementById("bg3").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";   
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg4").onclick = function(){
   background = document.getElementById("bg4").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg5").onclick = function(){
   background = document.getElementById("bg5").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg6").onclick = function(){
   background = document.getElementById("bg6").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg7").onclick = function(){
   background = document.getElementById("bg7").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg8").onclick = function(){
   background = document.getElementById("bg8").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg9").onclick = function(){
   background = document.getElementById("bg9").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg10").onclick = function(){
   background = document.getElementById("bg10").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg11").onclick = function(){
   background = document.getElementById("bg11").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg12").onclick = function(){
   background = document.getElementById("bg12").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg13").onclick = function(){
   background = document.getElementById("bg13").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg14").onclick = function(){
   background = document.getElementById("bg14").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg15").onclick = function(){
   background = document.getElementById("bg15").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg16").onclick = function(){
   background = document.getElementById("bg16").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg17").onclick = function(){
   background = document.getElementById("bg17").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}
document.getElementById("bg18").onclick = function(){
   background = document.getElementById("bg18").getAttribute('src');
   document.body.style.backgroundImage= "url('" + background + "')";
   document.body.style.backgroundSize = "100vw auto";
   let selected = document.getElementById('selected-bg');
   selected.setAttribute('value',background);
   selected.form.submit();
}



document.getElementById("currentPage").innerHTML = currPage;

// (Gallery || Upload) Page
function galleryPage() {
   var gallery = document.getElementById("gallery");
   var upload = document.getElementById("upload");
   var galleryLabel = document.getElementById("gallery-label");
   var uploadLabel = document.getElementById("upload-label");
   gallery.style.display = "block";
   upload.style.display = "none";
   galleryLabel.style.color = "#FFBE9D";
   uploadLabel.style.color = "#fff";
}

function uploadPage() {
    var gallery = document.getElementById("gallery");
    var upload = document.getElementById("upload");
    var galleryLabel = document.getElementById("gallery-label");
    var uploadLabel = document.getElementById("upload-label");
    gallery.style.display = "none";
    upload.style.display = "block";
    galleryLabel.style.color = "#fff";
    uploadLabel.style.color = "#FFBE9D";
}


// Drag n Drop
var fileobj;
function allowDrop(ev) {
  $(ev.target).attr("drop-active", true);
  ev.preventDefault();
}

function leaveDropZone(ev) {
  $(ev.target).removeAttr("drop-active");
}

function upload_file(e) {
    $(e.target).removeAttr("drop-active");
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
        xhttp.open("POST", "templateUpload.php", true);
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
