<?php 
session_start();
include 'boardfunctions.php';
$db = mysqli_connect('localhost', 'root', '', 'jokeedb');     

if(isset($_POST['addProject'])){
    $email = $_POST['email'];
    $title =$_POST['title'];
    if(!empty($title)){
        $qry = "INSERT INTO `userproject`(`email`, `projectTitle`) VALUES ('$email','$title')";
        mysqli_query($db, $qry);
        header('location:board.php');
    }
}

if(isset($_POST['boardShift'])){
    $_SESSION['projectid'] = $_POST['projectid'];
    header('location:board.php');
}

if(isset($_GET['delProject'])){
    $projectid = $_GET['delProject'];
    $email = $_SESSION['email'];
    $qry = mysqli_query($db, "SELECT * FROM `userproject` WHERE email = '$email'");
    $del = mysqli_query($db, "DELETE FROM `userproject` WHERE projectID = '$projectid'");
    $_SESSION['projectid'] = NULL;
    if(mysqli_num_rows($qry) === 1){
        header('location: startProject.php');
    } else{
        header('location: board.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="headerdsssss.css">
    <link rel="shortcut icon" href="images/Logo JOKEE.png" type="image/x-icon">
    <title>Jokee Header</title> 
</head>
<body>
    <div class="header">
        <div class="kotak-logo">
            <a href="board."><img src="images/JOKEE.svg" alt="" class="gambar-logo"></a>
        </div>
        <a href="logout.php">
            <div class="kotak-signout">
                <h3 class="tulis-signout">Sign Out</h3>   
            </div>
        </a>
    </div>

    <div class="header2">
        <div id="button-hamburger" class="navigate" onclick="opennavbar()" >
            <img src="images/hamburger.svg" alt="" class="gambar-hamburger"  >
        </div>
        <div id="nav" class="horizontal">
            <a href="board.php" id="board-nav" class="navigate nav-to">Board</a>
            <a href="finalProduct.php" id="final-product-nav" class="navigate nav-to">Final Product</a>
            <a href="calendar.php" id="calendar-nav" class="navigate nav-to">Calendar</a>
            <a href="template.php" id="template-nav" class="navigate nav-to">Template</a>
        </div>
    </div>
    

    <div id="sidepanel" class="button-sidebar" style="width: 0px;">
        <a href="javascript:void(0)" id="tutup-panel "class="closebtn"  onclick="tutuppanel()"><img src="images/silang-putih.svg" alt="" class="simbol-silang"></a>
        <p class="my-board">My Board</p>
        <div class="project-lists">
            <div class="projects">
                <div class="project-names vertical">
                    <?php 
                    $projectid = 0;
                    $email = $_SESSION['email']; 
                    if(isset($_SESSION['projectid']) && $_SESSION['projectid'] != 0){
                        $projectid = $_SESSION['projectid'];
                      } else{
                        $userprojects = mysqli_query($db, "SELECT * FROM `userproject` WHERE email = '$email' AND projectStatus = 1 HAVING MIN(`projectID`);");
                        if(mysqli_num_rows($userprojects) === 0){

                        } else{
                            $userproject = mysqli_fetch_array($userprojects);
                            // if($userproject['projectID'] === NULL){
                            // }else{
                            // }
                            $projectid = $userproject['projectID'];
                        }
                      }
                    $projects = mysqli_query($db, "SELECT * FROM userproject WHERE email = '$email' AND projectStatus = 1");
                    while($row = mysqli_fetch_assoc($projects)){   
                    ?>
                    <div class="horizontal project-name-box <?php echo($row['projectID'] === $projectid ? 'activate' : '')?>">
                        <form method="POST">
                            <input name='projectid' value="<?php echo $row['projectID']?>" style="display: none;">
                            <button type="submit" name="boardShift" class="project-name">
                                <?php 
                                echo $row['projectTitle']; 
                                ?>
                            </button>
                        </form>
                        <a href="board.php?delProject=<?php echo $row['projectID']?>"><img src="images/x-wo-shadow.svg" alt="" class="x-btn"></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
  
            <div class="project-lists-footer">
                <img src="images/JOKEE.svg" alt="" class="gambar-logo">
    
                <button type="button" onclick="addProjects()" id='add-project'>+ Add Board</button>
                <!-- Add card -->
                
                <form id='add-project-container' method='POST' enctype='multipart/form-data' style="display: none;">
                    <input type=text name='email' value="<?php echo $email?>" style="display: none;">
                    <input class="add" type=text placeholder='Title' name='title'>
                    <div class='horizontal'>
                        <button onclick="addProjects()" class="btn" type='button'>Cancel</button>
                        <button class='btn' type='submit' name='addProject'>Add Board</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="headerrr.js"></script>

    <script type="text/javascript">
        $(function() {
            // this will get the full URL at the address bar
            var url = window.location.href;

            // passes on every "a" tag
            $("#nav a").each(function() {
                if (url == (this.href)) {
                    $(this).addClass("active");
                } 
            });
        });        
    </script>
</body>
</html>