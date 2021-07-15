<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
              
  <!-- ======= Header ======= -->
  <header id="header" class="top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="mainPage.php">Mentor</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        
        <ul>
          <li class="active"><a href="mainPage.php">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact</a></li>  
          <li class="drop-down">Profile
            <ul>
            <?php
              $dummylink = "#";
              $loginlink = "logout.php";
              $linkAdmin = "admin dashboard.php";
              $linkTeacher = "teacher dashboard.php";
              $linkStudent = "student dashboard.php";
              if($_SESSION['userType'] == 2){
                echo "<li><a href = '".$linkAdmin."' >Profile</li>";
                
              }
              else if ($_SESSION['userType'] == 1){
                echo "<li><a href = '".$linkTeacher."' >Profile</li>";
              }
              else{
                echo "<li><a href = '".$linkStudent."' >Profile</li>";
              }
            echo "<li><a href = '".$dummylink."'>Settings</li>";
            echo "<li><a href = '".$dummylink."'>Activity Log</li>";
            echo "<li><a href = '".$loginlink."''>Logout</li>";
            ?>
              
            </ul>
          </li>
          
          <!-- <div class="topbar-divider d-none d-sm-block"></div> -->
      
        </ul>
      </nav>
      <!-- .nav-menu -->
    
    </div>
  </header><!-- End Header -->
    </body>
    </html>