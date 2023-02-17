<?php

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
  }
  header('location: board.php');
}

// update card
if(isset($_POST['update'])){
  $cardid = $_POST['cardId'];
  $cardTitle = $_POST['title'];
  $desc = $_POST['description'];
  $deadline = $_POST['deadline'];

  $updateqry = "UPDATE `cardheader` SET cardTitle='$cardTitle', `description`='$desc', `deadline`='$deadline' WHERE cardID=$cardid";
  mysqli_query($db, $updateqry);
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
  $projectid = $_POST['projectId'];
  $listTitle = $_POST['newListTitle'];

  // can't input empty
  if(empty($listTitle)){
      $errors = "You must fill in the List Title";
      
  } else {
      // harus ubah projectID
      $insertqry = "INSERT INTO `projectlist`(`projectID`, `listTitle`) VALUES ('$projectid','$listTitle')";
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
  $todo = $_POST['todo'];

  if(empty($todo)){
    
  } else{
    $updateqry = "UPDATE `cardheader` SET cardTitle='$cardTitle', `description`='$desc', `deadline`='$deadline' WHERE cardID=$cardid";
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
}

// delete To Do 
if(isset($_GET['delToDo'])){
  $id = $_GET['delToDo'];
  $qry = mysqli_query($db, "SELECT * FROM cardtodolist WHERE id=$id");
  $todolist = mysqli_fetch_assoc($qry);

  mysqli_query($db, "DELETE FROM cardtodolist WHERE id=$id");
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
          # redirect to board.php
          header("Location: board.php?show=".$cardid);
    }
}

if(isset($_GET['swipe-left'])){
  $cardid = $_GET['swipe-left'];
  $projectcards = mysqli_query($db, "SELECT * FROM cardheader WHERE cardid=$cardid");
  $projectcard = mysqli_fetch_assoc($projectcards);
  $listid = $projectcard['listID'];
  $projectlists = mysqli_query($db, "SELECT * FROM projectlist WHERE listID = '$listid'");
  $projectlist = mysqli_fetch_assoc($projectlists);
  $projectid = $projectlist['projectID']; 
  
  $listidupdated = 0;
  $temp = 0;
  $projectlistid = mysqli_query($db, "SELECT * FROM projectlist WHERE projectID = '$projectid'");
  while($row = mysqli_fetch_assoc($projectlistid)){
    if($row['projectID'] === $projectid){
        $temp = $listidupdated;
        $listidupdated = $row['listID'];
    }
    if($listidupdated >= $listid){
        $listidupdated = $temp;
        break;
    }
  };
  $qry = "UPDATE `cardheader` 
          SET `listID` = $listidupdated
          WHERE `cardID` = '$cardid'";
  mysqli_query($db, $qry);
  header('Location: board.php');
}

if(isset($_GET['swipe-right'])){
  $cardid = $_GET['swipe-right'];
  $projectcards = mysqli_query($db, "SELECT * FROM cardheader WHERE cardid=$cardid");
  $projectcard = mysqli_fetch_assoc($projectcards);
  $listid = $projectcard['listID'];
  $projectlists = mysqli_query($db, "SELECT * FROM projectlist WHERE listID = '$listid'");
  $projectlist = mysqli_fetch_assoc($projectlists);
  $projectid = $projectlist['projectID']; 

  $qry = "UPDATE `cardheader` 
          SET `listID` = (SELECT `listID` FROM `projectlist` WHERE `listID` > $listid  AND `projectID`='$projectid' LIMIT 1) 
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

?>