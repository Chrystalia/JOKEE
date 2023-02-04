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
        // 'board.php': document.getElementById('board-nav'),
        'startProject.php': document.getElementById('board-nav'),
        'finalProduct': document.getElementById('final-product-nav'),
        'calendar.php': document.getElementById('calendar-nav'),
        'template.php': document.getElementById('template-nav'),
    };
    const path = location.pathname;

    if (pathMap[path]) {
      pathMap[path].classList.add('active');
      console.log("if");
    }
}