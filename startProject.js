function addFirstProjects() {
    var addProject= document.getElementById("add-first-project");
    var canceled= document.getElementById("add-first-project-container");
    if (canceled.style.display === "none") {
        addProject.style.display = "none";
        canceled.style.display = "block";
    } else if(canceled.style.display === "block"){
        addProject.style.display = "block";
        canceled.style.display = "none";
    }
  }