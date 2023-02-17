<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="startProjects.css">
    <title>Board | Jokee</title>
</head>
<body>
<?php include 'background.php' ?>
<div class="layer"></div>

    <div class="container center">
        <div class="no-project-container center vertical">
            <img src="images/kanban (3).png" class="add-project-img">
            <div class="no-project-text">
                Boards are where work gets done in Jokee. You can name a board based on the project. On a board, you can move cards between lists to keep projects, tasks, and more on track
            </div>
            <div class="br"></div>
            <div>
                <div>
                    <button type="button" onclick="addFirstProjects()" id='add-first-project'>+ Create my First Board</button>
                </div>
                
                <form id='add-first-project-container' method='POST' enctype='multipart/form-data' style="display: none;">
                    <input type=text name='email' value="<?php echo $email?>" style="display: none;">
                    <input type=text placeholder='Title' name='title'>
                    <div class='horizontal'>
                        <button onclick="addFirstProjects()" class="btn" type='button'>Cancel</button>
                        <button class='btn' type='submit' name='addProject'>Add Board</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="startProject.js"></script>
</body>
</html>