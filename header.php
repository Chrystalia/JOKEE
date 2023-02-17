<?php 
include_once 'db.conn.php';
include_once 'boardfunctions.php';


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

// del member
if(isset($_GET['delMember'])){
    $delMemberId = $_GET['delMember'];

    $delqry = "DELETE FROM `projectmember` WHERE id = '$delMemberId'";
    mysqli_query($db, $delqry);
    // redirect 
    header('Location: board.php');
  }

  
// add member
if(isset($_POST['newMember'])){
    $newMember = $_POST['member'];
    $projectid = $_POST['projectid'];
    
    if(empty($newMember)){
  
    } else{
      $insertqry = "INSERT INTO `projectmember`(`projectID`, `memberEmail`) VALUES ('$projectid','$newMember')";
      mysqli_query($db, $insertqry);
    }
    // redirect 
    header('Location: board.php');
  }
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <link rel="shortcut icon" href="images/Logo JOKEE.png" type="image/x-icon">
</head>
<body>
    <div class="header">
        <div class="kotak-logo">
            <a href="board.php"><img src="images/JOKEE.svg" alt="" class="gambar-logo"></a>
        </div>
        <a href="signOut.php">
            <div class="kotak-signout">
                <div class="tulis-signout">Sign Out</div>   
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
        <div class="project-lists">
            <div class="all-projects">
                <?php 
                $email = $_SESSION['email']; 
                $myBoard = mysqli_query($db, "SELECT * FROM `userproject` WHERE email = '$email'");
                $teamBoard = mysqli_query($db, "SELECT * FROM projectmember pm JOIN userproject up ON pm.projectID = up.projectID WHERE pm.memberemail = '$email' AND pm.memberEmail != up.email AND up.projectStatus = '1'");
                if(mysqli_num_rows($myBoard) != 0){ ?>
                <div>
                    <div class="project-names vertical">
                    <p class="my-board">My Board</p>
                    <?php 
                    $projectid = 0;
                    if(isset($_SESSION['projectid']) && $_SESSION['projectid'] != 0){
                        $projectid = $_SESSION['projectid'];
                      } else{
                        $userprojects = mysqli_query($db, "SELECT * FROM `userproject` WHERE email = '$email' AND projectStatus = 1 HAVING MIN(`projectID`);");
                        if(mysqli_num_rows($userprojects) === 0){

                        } else{
                            $userproject = mysqli_fetch_array($userprojects);
                            $projectid = $userproject['projectID'];
                        }
                      }
                    
                    $idx = 0;
                    $projects = mysqli_query($db, "SELECT * FROM userproject WHERE email = '$email' AND projectStatus = 1");
                    while($row = mysqli_fetch_assoc($projects)){ 
                        $currid = $row['projectID']; 
                        $projectIdx[$currid] = $idx;
                    ?>
                        <div class="horizontal project-name-box <?php echo($currid === $projectid ? 'activate' : '')?>">
                            <form method="POST"  enctype='multipart/form-data'> 
                            <div class="horizontal">
                                <input name='projectid' value="<?php echo $currid?>" style="display: none;">
                                <button type="submit" name="boardShift" class="project-name">
                                    <?php 
                                    echo $row['projectTitle']; 
                                    ?>
                                </button>
                                <button type="button" class="add-member" onclick="addMember(<?php echo $projectIdx[$currid]; ?>)">Add member</button>
                                    
                                <!-- Add member -->
                                    <div class="add-member-container" style="display:none;">
                                        <div class="space-between">
                                        <div class="add-member-title">Members</div> 
                                        <a type="button" onclick="addMember(<?php echo $projectIdx[$currid]; ?>)"><img src="images/x-darkbrown.svg" alt="" class="member-x-btn"></a>
                                        </div>
                                        <div class="horizontal  input-member-form">
                                            <input class="input-member" type="text" name="member" placeholder="Type user email..." autocomplete="off">
                                            <button class="add-member-btn" type="submit" name="newMember" >+</button>
                                        </div>
                                        <div class="add-member-title">Board Members:</div>
                                        <?php 
                                        $boardMembers = mysqli_query($db, "SELECT * FROM projectMember WHERE projectID = '$currid'");
                                        if(mysqli_num_rows($boardMembers) != 0){
                                            while($boardMember = mysqli_fetch_array($boardMembers)){
                                            ?> <div class="horizontal"> 
                                                <!-- <input type="text" data-member-id="<?php // echo $boardMember['id'] ?>" class="memberName" name="delMemberId" value="<?php // echo $boardMember['id'] ?>"> -->
                                                <?php echo $boardMember['memberEmail'] ?> 
                                                <!-- <button type="submit" name="delMember">x</button>   -->
                                                <a href="board.php?delMember=<?php echo $boardMember['id']; ?>"><img class="member-email" src="images/TrashCan.svg" alt=""></a>
                                                </div><?php 
                                            }
                                        } else {
                                        echo "-";
                                        }?>
                                    </div>
                            </div>
                            </form>
                            <a href="board.php?delProject=<?php echo $currid?>"><img src="images/x-wo-shadow.svg" alt="" class="x-btn"></a>
                        </div>
                    <?php $idx = $idx + 1; }?>
                    </div>
                </div>
                <?php } ?>
                
                <?php if(mysqli_num_rows($teamBoard) != 0){ ?>
                <div>
                    <div class="project-names vertical">
                    <p class="my-board">Invited Board</p>
                    <?php 
                    while($row = mysqli_fetch_assoc($teamBoard)){   
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
                    </div>
                    <?php }?>
                    </div>
                </div>
                <?php } ?>
                
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
    <script src="header.js"></script>

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