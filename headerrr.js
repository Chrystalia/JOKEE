var toggle = "close";

function opennavbar(){
    var opensidebar = document.getElementById("sidepanel");
    
    if (toggle == "close"){
        opensidebar.style.width= "320px";
        toggle = "open"
    } else {
        opensidebar.style.width = "0";
        toggle = "close";
        opensidebar.style.marginLeft ="0";
        
    }
}

function tutuppanel(){
    var opensidebar = document.getElementById("sidepanel");

    if (toggle == "close"){
        opensidebar.style.width= "320px";
        toggle = "open"
    } else {
        opensidebar.style.width = "0";
        toggle = "close";
    }
}

function addProjects() {
    var addProject= document.getElementById("add-project");
    var canceled= document.getElementById("add-project-container");
    if (canceled.style.display === "none") {
        addProject.style.display = "none";
        canceled.style.display = "block";
    } else if(canceled.style.display === "block"){
        addProject.style.display = "block";
        canceled.style.display = "none";
    }
}

function navigateTo(){
    const pathMap = {
        'board.php': document.getElementById('board-nav'),
        'finalProduct': document.getElementById('final-product-nav'),
        'calendar.php': document.getElementById('calendar-nav'),
        'template.php': document.getElementById('template-nav'),
    };
    const path = location.pathname;

    if (pathMap[path]) {
      pathMap[path].classList.add('active');
      console.log("if");
    }else{
        console.log("else")
    }
}
function navigateTo1(){
    let board = document.getElementById("board");
    let finalProduct = document.getElementById("final-product");
    let calendar = document.getElementById("calendar");
    let template = document.getElementById("template");

    board.classList.add("active");
    finalProduct.classList.remove("active");
    calendar.classList.remove("active");
    template.classList.remove("active");
}
function navigateTo2(){
    let board = document.getElementById("board");
    let finalProduct = document.getElementById("final-product");
    let calendar = document.getElementById("calendar");
    let template = document.getElementById("template");

    board.classList.remove("active");
    finalProduct.classList.add("active");
    calendar.classList.remove("active");
    template.classList.remove("active");
}
function navigateTo3(){
    let board = document.getElementById("board");
    let finalProduct = document.getElementById("final-product");
    let calendar = document.getElementById("calendar");
    let template = document.getElementById("template");

    board.classList.remove("active");
    finalProduct.classList.remove("active");
    calendar.classList.add("active");
    template.classList.remove("active");
}
function navigateTo4(){
    let board = document.getElementById("board");
    let finalProduct = document.getElementById("final-product");
    let calendar = document.getElementById("calendar");
    let template = document.getElementById("template");

    board.classList.remove("active");
    finalProduct.classList.remove("active");
    calendar.classList.remove("active");
    template.classList.add("active");
}

