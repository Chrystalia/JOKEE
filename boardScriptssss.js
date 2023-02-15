function addLists() {
  var addListTitle = document.getElementById("add-list");
  var cancel= document.getElementById("add-list-container");
  console.log(cancel.style.display);
  if (cancel.style.display === "none") {
    addListTitle.style.display = "none";
    cancel.style.display = "block";
  } else if(cancel.style.display === "block"){
    addListTitle.style.display = "block";
    cancel.style.display = "none";
  }
}

function addCard(idx){
  var addCardTitle = document.getElementsByClassName("add-card");
  var cancel= document.getElementsByClassName("add-card-container");
  if (addCardTitle[idx].style.display === "none") {
    addCardTitle[idx].style.display = "block";
    cancel[idx].style.display = "none";
  } else {
    addCardTitle[idx].style.display = "none";
    cancel[idx].style.display = "block";
  }
}

function addTodo() {
  var addToDo= document.getElementById("add-todo");
  var canceled= document.getElementById("add-todo-container");
  if (addToDo.style.display === "none") {
    addToDo.style.display = "block";
    canceled.style.display = "none";
  } else {
    addToDo.style.display = "none";
    canceled.style.display = "block";
  }
}



// Get input field
var input = document.getElementById("myComment");
// Execute a function when the user presses a key on the keyboard
input.addEventListener("keypress", function (event) {
  // if uses press "Enter", trigger button eith click
  if(event.key === "Enter"){
    event.preventDefault(); // cancel pdefault action
    document.getElementById("submit-comment-btn").click();
  }
});





