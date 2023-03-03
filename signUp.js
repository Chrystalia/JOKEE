
        const tombol = document.querySelector('.submit-createe');
        const form = document.querySelector('.formSubmit');

        tombol.addEventListener('click', function(){
            form.submit();
            event.unbind('submit').submit();
        });
    
    
    // function validasi() {
    //     var username = document.getElementById("set-username").value;  
    //     var email = document.getElementById("set-email").value;  
    //     var password = document.getElementById("set-password").value;  
    //     var check = document.forms["formset"]["agree"].checked;
    //     // var check = document.get
    //     console.log("masuk sini")
    //     if(username == "" && email == "" && password == "" && check == false){
    //         alert("You must fill in the data completely!");
    //         return false;
    //         exit;
    //     }else if(username == "" && email != "" && password != ""){
    //         alert("You must fill in your username completely!");
    //         return false;
    //         exit;
    //     }else if(username != "" && email == "" && password != ""){
    //         alert("You must fill in your email completely!");
    //         return false;
    //         exit;
    //     }else if(username != "" && email != "" && password == ""){
    //         alert("You must fill in your password completely!");
    //         return false;
    //         exit;
    //     }else if(!check){ 
    //         alert("You must agree to the terms and conditions!");
    //         return false;
    //         exit;
    //     }else if(username == "" && email == "" && password == "" && check == true){
    //         alert("You must fill in the data completely!");
    //         return false;
    //         exit;
    //     }

    //     return true;
    // }