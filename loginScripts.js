const tombol = document.querySelector('tulis-login-submit');
    
function submits(){
    validasi();
    var form1 = document.getElementById("form-email");
    form1.submit();
};

function validasi(){
    var email = document.getElementById("tulis-email").value;
    var password = document.getElementById("tulis-password").value;
    if(email == "" && password == ""){
        alert("You must fill in the data completely!");
        return false;
        exit;
    }else if(email == "" && password != ""){
        alert("You must fill in your email completely!");
        return false;
        exit;
    }else if(email != "" && password == ""){
        alert("You must fill in your password completely!");
        return false;
        exit;
    }
    return true;
}

// iterate through elements of the same class name and detect two different events.

// var iter = document.getElementsByClassName('login-input')
// Array.from(iter).forEach(function(x){
//   x.addEventListener("keyup", function(event) {
//     console.log("masuk")
//     // Number 13 is the "Enter" key on the keyboard
//     if (event.keyCode === 13) {
//       console.log("if")
//       // Focus on the next sibling
//       x.nextElementSibling;
//     }
//   });
// })