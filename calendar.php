<?php 
include 'headerr.php';
$email = $_SESSION['email']; 
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>JOKEE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="calendarsss.css">
  </head>
  <body>
    <?php $email = $_SESSION['email']; ?>
    <div class="vertical">
      <div class="title">Calendar</div>
      <div class="wrapper">
        <header>
          <div class="icons">
            <span id="prev"><img class="next-prev-btn" src="images/calendar_left.svg"></span>
            <p class="current-date"></p>
            <span id="next"><img class="next-prev-btn" src="images/calendar_right.svg"></span>
          </div>
        </header>
        <div class="calendar">
          <ul class="weeks">
            <li>Sun</li>
            <li>Mon</li>
            <li>Tue</li>
            <li>Wed</li>
            <li>Thu</li>
            <li>Fri</li>
            <li>Sat</li>
          </ul>
          <ul class="days"></ul>
        </div>
      </div>
    </div>

    
    <script>
      let daysTag = document.querySelector(".days"),
      currentDate = document.querySelector(".current-date"),
      prevNextIcon = document.querySelectorAll(".icons span");

      // getting new date, current year and month
      let date = new Date(),
      currYear = date.getFullYear(),
      currMonth = date.getMonth();

      // storing full name of all months in array
      const months = ["January", "February", "March", "April", "May", "June", "July",
                    "August", "September", "October", "November", "December"];

      const renderCalendar = () => {
          let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
          lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
          lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
          lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
          let liTag = "";

          for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
              liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
          }

          for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
              <?php 
              $qry = "SELECT * FROM calendar WHERE email = '$email'"; 
              $usercalendar=mysqli_query($db, $qry);
              $numOfRow = mysqli_num_rows($usercalendar);
              ?>
              // adding active class to li if the current day, month, and year matched
              let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                          && currYear === new Date().getFullYear() ? "active" : "";
              var month = currMonth+1;
              var currDate = `${currYear.toString()}-${month.toString().padStart(2,"0")}-${i.toString().padStart(2,"0")}`;
              // document.writeln(currDate);
              //document.cookie = "calendar = " + currDate;
              <?php // $currDate = $_COOKIE['calendar'];?>
              <?php $currDate = '${currDate}';
              //console.log(document.cookie);
              //console.log("Hello")
              //console.log(currDate);
              // $usercalendar = mysqli_query($db, $qry);
              //$row = mysqli_fetch_assoc($usercalendar);
              ?>
              
              let idx = 0;
              let flag = 0;
              <?php  while($row = mysqli_fetch_array($usercalendar)) {
                ?>
                idx++;
                if(flag === -1){
                } 
                // elseif(){
                  // kondisi kalau lebih dari 2
                  // bikin SELECT * FROM calendar WHERE email ='$email AND deadline = currDate;
                  // kalau baris lebih dari 2, jalanin else if ini
                else if(currDate === '<?php echo $row['deadline'] ?>' ){ // harusnya 6 Januari muncul 2x
                  // loop sebanyak qry
                  <?php 
                    $deadline = $row['deadline'];
                    $todayDeadlines = mysqli_query($db, "SELECT * FROM calendar WHERE email = '$email' AND deadline = '$deadline'");
                  ?>
                      liTag += `<li class="${isToday}">${i}
                                  <ul class="deadlines">
                                    <?php while($deadlines = mysqli_fetch_array($todayDeadlines)) { ?>
                                      <li><?php echo $deadlines['projectTitle']." - ".$deadlines['cardTitle'] ?></li>
                                    <?php } ?>
                                  </ul>
                                </li>` 
                      flag = -1;
                }else if(idx == '<?php echo $numOfRow ?>'){
                  liTag += `<li class="${isToday}">${i}</li>`
                }
              <?php } ?>
                  
              
                        
                        //$row = mysqli_fetch_assoc($usercalendar);
                        // echo $row['deadline']
                        //while($row = mysqli_fetch_assoc($usercalendar)){
                          // if()
                          //echo $currDate."==="."'2023-01-20'";
                          // echo $qry;
                            //if(strcmp($currDate, $row['deadline']) == 0){ ?>

                            <?php //} ?>
                        <?php //} ?>
                        
                // console.log(currDate);
          }

          for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
              liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
          }
          currentDate.innerText = `${months[currMonth]} ${currYear}`; // passing current mon and yr as currentDate text
          daysTag.innerHTML = liTag;
      }
      renderCalendar();

      prevNextIcon.forEach(icon => { // getting prev and next icons
          icon.addEventListener("click", () => { // adding click event on both icons
              // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
              currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

              if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
                  // creating a new date of current year & month and pass it as date value
                  date = new Date(currYear, currMonth, new Date().getDate());
                  currYear = date.getFullYear(); // updating current year with new date year
                  currMonth = date.getMonth(); // updating current month with new date month
              } else {
                  date = new Date(); // pass the current date as date value
              }
              renderCalendar(); // calling renderCalendar function
          });
      });
    </script>
  </body>
</html>