<?php 
include 'header.php';
$db = mysqli_connect('localhost', 'root', '', 'jokeedb');

if(isset($_POST['addProject'])){
  $email = $_POST['email'];
  $projectTitle = $_POST['title'];
  if(empty($projectTitle)){
  } else {
    $qry = "INSERT INTO `userproject`(`email`, `projectTitle`) VALUES ('$email','$projectTitle')";
    mysqli_query($db, $qry);
    header('location: board.php');
  }
}
// add card
if(isset($_POST['submit'])){
  $cardTitle = $_POST['title'];
  $listId = $_POST['listId'];
  echo $cardTitle;
  echo $listId;
  $colorCode = 0;
  if(empty($cardTitle)){
    $errors = "You must fill in the Card Title";
  } else {
    $insertqry = "INSERT INTO `cardheader`(`listID`, `cardTitle`) VALUES ('$listId', '$cardTitle')";
    mysqli_query($db, $insertqry);
    $card_id = mysqli_insert_id($db);
    // for($i = 0; $i < count($_FILES['attachment']['name']); $i++){
    //   $target = '/uploads/'.$_FILES['attachment']['name'][$i];
    //   move_uploaded_file($_FILES['attachment']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'].'/'.$target);
    //   $insertimgqry = "INSERT INTO `cardimage`(`cardID`, `imagePath`) VALUES ('$card_id', '$target')";
    //   mysqli_query($db, $insertimgqry);
    // }
    // for($i = 0; $i < count($_POST['todos']); $i++){
    //   $current_todo = $_POST['todos'][$i];
    //   $inserttodoqry = "INSERT INTO `cardtodolist`(`cardID`, `toDoList`) VALUES ('$card_id', '$current_todo')";
    //   mysqli_query($db, $inserttodoqry);
    // }
    header('location: board.php');
  }
}

// update card
if(isset($_POST['update'])){
  $cardid = $_POST['cardId'];
  $cardTitle = $_POST['title'];
  $desc = $_POST['description'];
  $deadline = $_POST['deadline'];
  $colorCode = 0;
  
  $updateqry = "UPDATE `cardheader` SET cardTitle='$cardTitle', `description`='$desc', `deadline`='$deadline', colorCode='$colorCode' WHERE cardID=$cardid";
  mysqli_query($db, $updateqry);
  // $card_id = mysqli_insert_id($db);
  // for($i = 0; $i < count($_FILES['attachment']['name']); $i++){
  //   $target = '/uploads/'.$_FILES['attachment']['name'][$i];
  //   move_uploaded_file($_FILES['attachment']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'].'/'.$target);
  //   $insertimgqry = "INSERT INTO `cardimage`(`cardID`, `imagePath`) VALUES ('$card_id', '$target')";
  //   mysqli_query($db, $insertimgqry);
  // }
  // for($i = 0; $i < count($_POST['todos']); $i++){
  //   $current_todo = $_POST['todos'][$i];
  //   $inserttodoqry = "INSERT INTO `cardtodolist`(`cardID`, `toDoList`) VALUES ('$card_id', '$current_todo')";
  //   mysqli_query($db, $inserttodoqry);
  // }
  header('location: board.php');
}

// delete card
if(isset($_GET['delCard'])){
  $id = $_GET['delCard'];
  mysqli_query($db, "DELETE FROM cardHeader WHERE cardID=$id");
  header('location: board.php ');
}

// add List
if(isset($_POST['addList'])){
  $listTitle = $_POST['newlistTitle'];
  // $projectID = $_POST['projectID'];

  // can't input empty
  if(empty($listTitle)){
      $errors = "You must fill in the List Title";
      
  } else {
      // harus ubah projectID
      $insertqry = "INSERT INTO `projectlist`(`projectID`, `listTitle`) VALUES (1,'$listTitle')";
      mysqli_query($db, $insertqry);
      header('location: board.php');
  }
}

// delete list
if(isset($_GET['delList'])){
  $id = $_GET['delList'];
  mysqli_query($db, "DELETE FROM projectList WHERE listID=$id");
  header('location: board.php ');
}

// add to do
if(isset($_POST['addToDo'])){
  $cardid = $_POST['cardId'];
  $cardTitle = $_POST['title'];
  $desc = $_POST['description'];
  $deadline = $_POST['deadline'];
  $colorCode = 0;
  $todo = $_POST['todo'];

  if(empty($todo)){

  } else{
    $updateqry = "UPDATE `cardheader` SET cardTitle='$cardTitle', `description`='$desc', `deadline`='$deadline', colorCode='$colorCode' WHERE cardID=$cardid";
    mysqli_query($db, $updateqry);
  
    $todoquery = "INSERT INTO `cardtodolist`(`cardID`, `toDoList`) VALUES ('$cardid','$todo')";
    mysqli_query($db, $todoquery);
  }
  header('Location: board.php?show='.$cardid);
}

//checked To Do
if(isset($_GET['checked'])){
  $id = $_GET['checked'];
  $qry = mysqli_query($db, "SELECT * FROM cardtodolist WHERE id=$id");
  $todolist = mysqli_fetch_assoc($qry);

  if($todolist['status']){
    $checkqry = "UPDATE `cardtodolist` SET `status`=0  WHERE id = $id";
  } else {
    $checkqry = "UPDATE `cardtodolist` SET `status`=1  WHERE id = $id";
  }
  mysqli_query($db, $checkqry);
  header('Location: board.php?show='.$todolist['cardID']);
  // echo $id;
  // echo mysqli_query($db, "SELECT cardID FROM cardtodolist WHERE id=$id");
  // echo $cardid;
}

// delete To Do 
if(isset($_GET['delToDo'])){
  $id = $_GET['delToDo'];
  $qry = mysqli_query($db, "SELECT * FROM cardtodolist WHERE id=$id");
  $todolist = mysqli_fetch_assoc($qry);

  // $cardid = "SELECT cardID FROM toDoList WHERE id=$id";
  mysqli_query($db, "DELETE FROM cardtodolist WHERE id=$id");
  // header('Location: board.php?show='.$cardid);
  header('Location: board.php?show='.$todolist['cardID']);
}

// add attachment
if(isset($_POST['attachment'])){
    #connect database
    $images = $_FILES['images'];
    $cardid = $_POST['cardId'];

    #banyak gambar
    $num_of_imgs = count($images['name']);

    for($i = 0; $i < $num_of_imgs; $i++){

        #taro di var
        $image_name = $images['name'][$i];
        $tmp_name = $images['tmp_name'][$i];
        $error = $images['error'][$i];

        #kalo ga error pas upload
        if($error === 0) {
            $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
            // echo $img_ex. "<br>";
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array('jpg', 'jpeg', 'png');
    
            if (in_array($img_ex_lc, $allowed_exs)) {

                #rename pake random string
                $new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                $qry = "INSERT INTO `cardimage`(`imagePath`,`cardID`) VALUES ('$new_img_name', '$cardid')";
                echo mysqli_query($db, $qry);
                move_uploaded_file($tmp_name, $img_upload_path);
           
                # redirect to board.php
                header("Location: board.php?show=".$cardid);
            }
            else{
                $em = "Ga bisa upload tipe ini";
                header("Location: board.php?error=$em");
            }
        }
        else{
            #error message
            $em = "Unknown Error Ocurred while uploading";
            header("Location: board.php?error=$em");
        }
    }
    // echo $num_of_img;
    // echo "<pre>";
    // print_r($_FILES['images']['name'][0]);
}

if(isset($_GET['swipe-left'])){
  $cardid = $_GET['swipe-left'];
  $projectcards = mysqli_query($db, "SELECT * FROM cardheader WHERE cardid=$cardid");
  $projectcard = mysqli_fetch_assoc($projectcards);
  $listid = $projectcard['listID'];
  echo $cardid;
  echo $listid;
  $qry = "UPDATE `cardheader` 
          SET `listID` = (SELECT `listID` FROM `projectlist` WHERE `listID` < $listid LIMIT 1) 
          WHERE `cardID` = '$cardid'";
  mysqli_query($db, $qry);
  header('Location: board.php');
}

if(isset($_GET['swipe-right'])){
  $cardid = $_GET['swipe-right'];
  $projectcards = mysqli_query($db, "SELECT * FROM cardheader WHERE cardid=$cardid");
  $projectcard = mysqli_fetch_assoc($projectcards);
  $listid = $projectcard['listID'];
  echo $cardid;
  echo $listid;
  $qry = "UPDATE `cardheader` 
          SET `listID` = (SELECT `listID` FROM `projectlist` WHERE `listID` > $listid LIMIT 1) 
          WHERE `cardID` = '$cardid'";
  mysqli_query($db, $qry);
  header('Location: board.php');
  
}

// add comment
if(isset($_POST['comment'])){
  $cardid = $_POST['cardId'];
  $email = $_POST['email'];
  $chat = $_POST['chat'];

  if(empty($chat)){

  } else{
    $chatqry = "INSERT INTO `chat`(`email`, `cardID`, `chatText`) VALUES ('$email','$cardid','$chat')";
    mysqli_query($db, $chatqry);
  }
  header('Location: board.php?show='.$cardid);
}

// close card
if(isset($_GET['closeCard'])){
  header('location: board.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="board2Style.css">
  <title>Document</title>
</head>
<body>
<div class='wrapper'>
  <!-- Show list -->
  <?php
  $idx = 0;
  $lists = mysqli_query($db, "SELECT * FROM projectlist");
  while($list_row = mysqli_fetch_array($lists)){ ?>
    <div class='list-container' data-list-id=<?php echo $list_row['listID'];?>>
      <?php $listidx[$list_row['listID']] = $idx; ?>
      <div class='list-header horizontal right'>
        <span class='list-label'><?php echo $list_row['listTitle'] ?></span>  
        <a href="board.php?delList=<?php echo $list_row['listID']; ?>"  id="deleteList">x</a>
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
        <input type=text placeholder='Title' name='title'>
        <input type=text value="<?php echo $list_row['listID']?>" name='listId' style="display: none;">
        <div class='horizontal'>
          <button  onclick="addCard(<?php  echo$listidx[$list_row['listID']]; ?>)" class="btn" type='button'>Cancel</button>
          <button class='btn' type='submit' name='submit'>Add Card</button>
        </div>
      </form>
      <!-- <div class="overlay2 add-card ">
      </div> -->
    </div>
  <?php $idx = $idx + 1;  } ?>
    
    <!-- Add list Button-->
    <button type="button" onclick="addList()" id='add-list'>
      <span class='list-label'>Add another list </span>
      <div id='plus-button'>+</div>
    </button>
    
    <form id="add-list-container" method='POST' style="display: none;">
      <input type=text id='projectId' name='projectId' style='display: none;'>
      <input class="add-list-title" type="text" name="newlistTitle" placeholder="Enter List Title" autocomplete="off">
      <div class="horizontal">
        <button type="button" onclick="addList()" class="btn">Cancel</button>
        <button class="btn" type="submit" name="addList" >Add List</button>
      </div>
    </form>
</div>
<!-- Show inside card -->
  <div class='overlay show-card <?php echo ($_GET['show'] > 0 ? '' : 'hidden') ?>'>
    <?php
    $cardid = $_GET['show'];
    $query = mysqli_query($db, "SELECT * FROM cardheader WHERE cardID=$cardid");
    $row = mysqli_fetch_assoc($query);
    ?>
    <form class='item-overlay' method='POST' enctype='multipart/form-data'>
      <input type=text class='add-card-title' placeholder='Title' name='title' value="<?php echo $row['cardTitle']?>">
      <input type="text" name="cardId" value='<?php echo $cardid?>' style="display: none;" >
      <div class='item-overlay-inner' data-card-id=<?php echo $cardid?>>
        <!-- deadline -->
        <label class="edit" for='deadline' class='bold'>Deadline: </label>
        <input type=date name='deadline' value="<?php echo $row['deadline']?>" placeholder="-">
        
        <!-- description -->
        <label for='description' class='bold'>Description: </label>
        <input class="edit" name='description' value="<?php echo $row['description']?>" placeholder="-"></input>
        
        <!-- To Do List -->
        <span class='bold'>To Do List:</span>
        <div class="todo-section vertical">
          <?php 
          $todos = mysqli_query($db, "SELECT * FROM cardtodolist WHERE cardID = $cardid ORDER BY id ASC");
          
          while($row = mysqli_fetch_array($todos)){?>
            <div class='todo-item horizontal'>
              <?php if($row['status']){ ?>
                <input type="checkbox" data-todo-id="<?php echo $row['id']?>" class="check-box" checked onclick="location.href='board.php?checked=<?php echo $row['id'] ?>'">
                <span class='task-content' style="text-decoration: line-through;"><?php echo $row['toDoList']?></span>
              <?php } else {?>
                <input type="checkbox" data-todo-id="<?php echo $row['id']?>" class="check-box" onclick="location.href='board.php?checked=<?php echo $row['id'] ?>'">
                <span class='task-content'><?php echo $row['toDoList']?></span>
              <?php } ?>
              <a href="board.php?delToDo=<?php echo $row['id']; ?>"><img class="deleteToDo" src="images/TrashCan.svg"></a>
            </div>
          <?php } ?>
          <?php //if(isset($_GET['mess']) && $GET['mess'] == 'error'){ ?>
            <!-- <input type="text" name="todo" placeholder="Add task" style="border-color: darkred;">
            <button type="submit" name="addToDo">Add</button> -->
          <?php //} else { ?>
            <button onclick="addTodo()" type="button" id='add-todo' > Add To Do </button>
            <div id="add-todo-container" style="display: none;">
              <input class="edit" name="todo" placeholder="Add task" autocomplete="off">
              <div class="horizontal">
                <button type="button"  onclick="addTodo()"  class="btn" >Cancel</button>
                <button type="submit" class="btn" name="addToDo">Add</button>
              </div>
              <br>
            </div>
            <?php //} ?>
        </div>
        
        <!-- <img src="uploads/IMG-63be4f6d6f5b84.13584936.jpg"> -->
        <label class='bold' for=attachment>Attachment: </label>
        <div class="attached-img-container horizontal">
          <?php
            $attached = mysqli_query($db, "SELECT * FROM cardimage WHERE cardID = $cardid");

            while($row = mysqli_fetch_assoc($attached)){ ?>
               <img src="uploads/<?php echo $row['imagePath']?>" class="attached-img">
            <?php }?>
        </div>
        <input type="file"
                 id="file"
                 name="images[]"
                 style="display: none"
                 multiple>
          <label for="file">
              <img src="images/Attachment.svg" class="attachment-icon"> 
          </label>
          <input type=text name="cardId" value="<?php echo $cardid ?>" style="display: none;">
          <button type="submit"
                  name="attachment"> Upload
          </button>
        <!-- <input type='file' name='attachment[]' id='attachment' multiple=true> -->
        
        <label class="bold" for="comment">Comment: </label>
        <input type="text" name="email" placeholder="Enter email..">
        <!-- <input type="text" class="typing-area" name="chat" placeholder="Type a Comment..."> -->
        <textarea class="typing-area" name="chat" placeholder="Type a Comment..."></textarea>
        <input type="datetime-local" class="date time datetime" name="datetime" style="display: none;">
        <button type="submit" name="comment"><img class="submit-comment-btn" src="images/Send Comment.svg"></button>
        <!-- <a href='button.php?comment=<?php ?>'><img class="submit-comment-btn" src="images/Send Comment.svg"></a> -->
        <div class="comment-section vertical">
          <?php
          $comment = mysqli_query($db, "SELECT * FROM chat c LEFT JOIN users u ON c.email=u.email WHERE c.cardID = $cardid ORDER BY id DESC");
          while($row = mysqli_fetch_array($comment)){ 
          ?>
            <div class="horizontal">
              <div class="profile-picture">
                <img src="images/Profile Picture.svg">
              </div>
              <div class="comment-detail">
                <div class="comment-sender"> <?php echo $row['username']?> </div>
                <div class="comment"> <?php echo $row['chatText']?> </div>
              </div> 
            </div>
          <?php } ?>
        </div>
      </div>
              
      <div class='item-overlay-footer'>
        <a href="board.php?closeCard" class="card-close">Close</a>
        <button name="update">Update</button>
      </div>
  </form>
  </div>
</body>
</html>