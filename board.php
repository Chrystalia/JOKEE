<?php
include_once 'header.php';
// include 'boardfunction.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='board.js' defer></script>
  <title>Board | Jokee</title>
  <link rel="stylesheet" href="board.css">
</head>

<body>
<!-- background -->
<?php include 'background.php' ?>
<div class="layer"></div>

  <?php 
  $email = $_SESSION['email']; 
  if(isset($_SESSION['projectid']) && $_SESSION['projectid'] != 0){
    $projectid = $_SESSION['projectid'];
  } else{
    $userprojects = mysqli_query($db, "SELECT * FROM `userproject` WHERE email = '$email' AND projectStatus = 1 HAVING MIN(`projectID`);");
    $userproject = mysqli_fetch_array($userprojects);
    if($userproject['projectID'] === NULL || mysqli_num_rows($userprojects) === 0){?> 
      <script> window.location.replace("startProject.php"); </script> 
    <?php
    }else{
      $_SESSION['projectid'] = $userproject['projectID'];
    }
  }
?>

<div class='wrapper'>
  <!-- Show list -->
  <?php
  $idx = 0;
  $lists = mysqli_query($db, "SELECT * FROM projectlist WHERE projectID = '$projectid'");
  while($list_row = mysqli_fetch_array($lists)){ ?>
    <div class='list-container' data-list-id=<?php echo $list_row['listID'];?>>
      <?php $listidx[$list_row['listID']] = $idx;?>
      <div class='list-header horizontal'>
        <span class='list-label'><?php echo $list_row['listTitle'] ?></span>  
        <a href="board.php?delList=<?php  echo $list_row['listID']; ?>"  id="deleteList"><img class="delete-list-img" src="images/x-wo-shadow.svg"></a>
      </div>
      <!-- Show card -->
      <?php
      $list_id = $list_row['listID'];
      $list = mysqli_query($db, "SELECT * FROM cardHeader WHERE listId=$list_id");
      while($row = mysqli_fetch_array($list)){ 
        $cardid = $row['cardID'];
        $cardimgs = mysqli_query($db, "SELECT * FROM cardimage WHERE cardID = $cardid");
        $cardimg = mysqli_fetch_array($cardimgs); ?>
        <a class="card-container" href='board.php?show=<?php echo $cardid; ?>'>
          <img class="card-img" src="<?php if(isset($cardimg['imagePath'])){
                                              echo "uploads/".$cardimg['imagePath'];
                                            } else {                                                
                                              echo "images/Base.png";
                                           } ?>" alt="Failed to Load">
        </a>
        <form method="POST">
          <span class="card-label">
            <input type="text" name="cardId" value='<?php echo $cardid?>' style="display: none;" >
            <a href='board.php?swipe-left=<?php echo $cardid; ?>'><img src="images/SwipeLeft.svg"></a>
            <span class="task"><?php echo $row['cardTitle']; ?></span>
            <a href='board.php?swipe-right=<?php echo $cardid; ?>'><img src="images/SwipeRight.svg"></a>
          </span>
        </form>
        <a href="board.php?delCard=<?php echo $cardid; ?>" id="deleteCard">delete</a>
      <?php } ?>
      <!-- Add card Button-->
      <button onclick="addCard(<?php  echo$listidx[$list_row['listID']]; ?>)" class='add-card'>+ Add a Card</button>
      <!-- Add card -->
      
      <form class='add-card-container' method='POST' enctype='multipart/form-data' style="display: none;">
        <input type=text class="add" placeholder='Title' name='title'>
        <input type=text value="<?php echo $list_row['listID']?>" name='listId' style="display: none;">
        <div class='horizontal'>
          <button  onclick="addCard(<?php  echo$listidx[$list_row['listID']]; ?>)" class="btn" type='button'>Cancel</button>
          <button class='btn' type='submit' name='submit'>Add Card</button>
        </div>
      </form>
    </div>
  <?php $idx = $idx + 1;  } ?>
    
    <!-- Add list Button-->
    <button type="button" onclick="addLists()" id='add-list' style="display: block;">
      <div class="add-list-label"> + Add another list </div>
    </button>
    
    <form id="add-list-container" method='POST' style="display: none;" >
      <input type=text id='projectId' name='projectId' value="<?php echo $projectid ?>"  style="display: none;">
      <input class="add-list-title add" type="text" name="newListTitle" placeholder="Enter List Title" autocomplete="off">
      <div class="horizontal">
        <button type="button" onclick="addLists()" class="btn">Cancel</button>
        <button class="btn" type="submit" name="addList" >Add List</button>
      </div>
    </form>

    <div class="margin-right"></div>
</div>



<!-- Show inside card -->
  <div class='overlay <?php echo ($_GET['show'] > 0 ? '' : 'hidden') ?>'>
    <?php
    $cardid = $_GET['show'];
    $query = mysqli_query($db, "SELECT * FROM cardheader WHERE cardID=$cardid");
    $row = mysqli_fetch_assoc($query);
    ?>
    <form class='item-overlay' method='POST' enctype='multipart/form-data'>
      <input type=text class='add-card-title' placeholder='Title' name='title' value="<?php echo $row['cardTitle']?>">
      <input type=text class='add-card-title' placeholder='Title' name='projectid' value="<?php echo $projectid ?>" style="display:none;">
      <input type="text" name="cardId" value='<?php echo $cardid?>' style="display: none;" >
      <div class='item-overlay-inner' data-card-id=<?php echo $cardid?>>
        
        <!-- description -->
        <label for='description' class="title-label-top">Description: </label>
        <input class="edit" name='description' value="<?php echo $row['description']?>" placeholder="-" autocomplete="off"></input>
        
        <!-- deadline -->
        <div>
          <label for='deadline' class="title-label">Deadline: </label>
          <input class="edit-calendar" type=date name='deadline' value="<?php echo $row['deadline']?>" placeholder="-">
        </div>

        <!-- To Do List -->
        <span class="title-label">To Do List:</span>
        <div class="todo-section vertical">
          <?php 
          $todos = mysqli_query($db, "SELECT * FROM cardtodolist WHERE cardID = $cardid ORDER BY id ASC");
          
          while($row = mysqli_fetch_array($todos)){?>
            <div class='todo-item horizontal'>
              <?php if($row['status']){ ?>
                <input type="checkbox" data-todo-id="<?php echo $row['id']?>" class="check-box" checked onclick="location.href='board.php?checked=<?php echo $row['id'] ?>'">
                <span class='task-content text-deco'><?php echo $row['toDoList']?></span>
              <?php } else {?>
                <input type="checkbox" data-todo-id="<?php echo $row['id']?>" class="check-box" onclick="location.href='board.php?checked=<?php echo $row['id'] ?>'">
                <span class='task-content'><?php echo $row['toDoList']?></span>
              <?php } ?>
              <a href="board.php?delToDo=<?php echo $row['id']; ?>"><img class="deleteToDo" src="images/TrashCan.svg"></a>
              <a href="board.php"></a>
            </div>
          <?php } ?>
            <button onclick="addTodo()" type="button" id='add-todo' > Add To Do </button>
            <div id="add-todo-container" style="display: none;">
              <input class="add write-todo" name="todo" placeholder="Add task" autocomplete="off">
              <div class="horizontal">
                <button type="button"  onclick="addTodo()"  class="btn" >Cancel</button>
                <button type="submit" class="btn" name="addToDo">Add</button>
              </div>
              <br>
            </div>
            <?php //} ?>
        </div>
        
        <label class="title-label" for=attachment>Attachment: </label>
        
        <div class="attached-img-container horizontal">
          <?php
            $attached = mysqli_query($db, "SELECT * FROM cardimage WHERE cardID = $cardid");

            while($row = mysqli_fetch_assoc($attached)){ ?>
               <img src="uploads/<?php echo $row['imagePath']?>" class="attached-img">
                <!-- fp_download -->
                <a href="b_download.php?file=<?php echo $row['imagePath'] ?>">
                    <img src="images/Download.png"class="btn-download">
                </a>
                <!-- Delete -->
                <a href="b_delete.php?file=<?php echo $row['imagePath'] ?>">
                    <img src="images/Delete.png"class="btn-delete">
                </a>
            <?php }?>
        </div>

          <div class="attach-btn">
            <input type="file"
                   id="file"
                   name="images[]"
                   class="btn-choose"
                   multiple>
            <input type=text name="cardId" value="<?php echo $cardid ?>" style="display: none;">
            <button type="submit"
                  name="attachment"
                  class="btn-upload">
                  Upload
            </button>
          </div>
        
        <label class="title-label" for="comment">Comment: </label>
        <input type="text" name="email" value="<?php echo $email?>" style="display: none;">
        <!-- <input type="text" class="typing-area" name="chat" placeholder="Type a Comment..."> -->
        <div class="typing-area horizontal">
          <input id="myComment" class="write-comment" name="chat" placeholder="Type a Comment..." autocomplete="off">
          <input type="datetime-local" class="date time datetime" name="datetime" style="display: none;">
          <button type="submit" id="submit-comment-btn" name="comment"><img class="submit-comment-img" src="images/Send Comment.svg"></button>
        </div>
        <div class="comment-section vertical">
          <?php
          $comment = mysqli_query($db, "SELECT * FROM chat c LEFT JOIN users u ON c.email=u.email WHERE c.cardID = $cardid ORDER BY id DESC");
          while($row = mysqli_fetch_array($comment)){ 
          ?>
            <div class="horizontal">
              <div class="profile-picture">
                <img src="images/Profile Picture.svg">
              </div>
              <div class="comment-detail vertical">
                <div class="comment-sender"> <?php echo $row['username']?> </div>
                <div class="comment"> <?php echo $row['chatText']?> </div>
              </div> 
            </div>
          <?php } ?>
        </div>
      </div>
              
      <div class='item-overlay-footer'>
        <a href="board.php" class="card-close">Close</a>
        <button type="submit" class="card-update" name="update">Update</button>
      </div>
  </form>
  </div>
   
</body>
</html>
