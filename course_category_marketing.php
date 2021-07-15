<?php
  session_start();
  include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Courses - Mentor Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    
    .sidenav {
    height: 100%;                       /* 100% Full-height */
    width: 0;                           /* 0 width - change this with JavaScript */
    position: fixed;                    /* Stay in place */
    z-index: 1;                         /* Stay on top */
    top: 1000;                          /* Stay at the top */
    left: 0;
    background-color: #111;           /* Black*/
    overflow-x: hidden;                 /* Disable horizontal scroll */
    padding-top: 60px;                  /* Place content 60px from the top */
    transition: 0.5s;                   /* 0.5 second transition effect to slide in the sidenav */
  }
  
  /* The navigation menu links */
  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }
  
  /* When you mouse over the navigation links, change their color */
  .sidenav a:hover {
    color: #f1f1f1;
  }
  
  /* Position and style the close button (top right corner) */
  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }

  /*search function*/
  .sidenav .search-container button{
    float: right;
    padding: 6px 10px;
    margin-right: 16px;
    background: #ddd;
    font-size: 15px;
    border: none;
    cursor: pointer;
  }

  .sidenav .search-container button:hover {
    background: darkgray;
  }

  .side{
    margin-left: 5px;
  }

  /* Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  font-size: 20px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 6px 8px;
  text-decoration: none;
  display: block;
  font-size: 16px;
}

.dropdown-label{
  padding: 6px 8px 5px;
  font-weight : bold;
  border-bottom : 1px solid black;
  border-top : 1px solid black;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}

.select-group{
  width:200px;
  margin : 10px;
}
  
  /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  </style>

  <!-- =======================================================
  * Template Name: Mentor - v2.2.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main id="main" data-aos="fade-in">

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
            <li><a href = '
            <?php
              $dummylink = "#";
              $loginlink = "logout.php";
              $linkAdmin = "admin dashboard.php";
              $linkTeacher = "teacher dashboard.php";
              $linkStudent = "student dashboard.php"; 
              if($_SESSION["userType"] == 2){
                echo $linkAdmin;
                
              }
              else if ($_SESSION["userType"] == 1){
                echo $linkTeacher;
              }
              else{
                echo $linkStudent;
              }
            ?>
            '>Profile</a></li>
            <li><a href = '#' >Settings</a></li>
            <li><a href = '#' >Activity Log</a></li>
            <li><a href = 'logout.php'>Logout</a></li>
            
              
            </ul>
          </li>
        </ul>
      </nav>
      <!-- .nav-menu -->
    
    </div>
  </header><!-- End Header -->

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Homepage</h2>
      </div>
    </div><!-- End Breadcrumbs -->
    
    <!-- ======= Side Nav ======= -->
    <div id="mySidenav" class="sidenav">
      <div class="side">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <li class="nav-item active">
        <!-- Heading -->
        <div>
          <h2>My course</h2>
        </div>
        <hr class="sidebar-divider">
          <form action = "search.php" method="post">
            <div class="input-group">
              <input type="text" name="search" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
            </form>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        
        <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <div class="dropdown">
              <button class="dropbtn">Category</button>
              <div class="dropdown-content">
                <h5 class="dropdown-label">Academic</h5>
                <a href="course_category_language.php">Language</a>
                <a href="course_category_science.php">Science</a>
                <a href="course_category_mathematics.php">Mathematics</a>
                <a href="course_category_history.php">History</a>
                <h5 class="dropdown-label">General</h5>
                <a href="course_category_webDevelopment.php">Web Development</a>
                <a href="course_category_marketing.php">Marketing</a>
                <a href="course_category_content.php">Content</a>
                <a href="course_category_culinary.php">Culinary</a>
              </div>
            </div>
          </li>
      </ul>
      </div>
    </div>
    
    <span style="font-size:50px;cursor:pointer" onclick="openNav()">&#9776;</span>
    
    <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
      document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
      document.body.style.backgroundColor = "white";
    }
    </script>

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <?php
            $sql = "SELECT courseName, courseType, teacher, fee, seat, short_descript, coursePng FROM course WHERE courseType = 'Marketing' ORDER BY courseName";
            $result = mysqli_query($link, $sql);

            if (mysqli_num_rows($result) > 0) {
              while($rows = mysqli_fetch_assoc($result)) {
                $picture = $rows['coursePng'];
                $image = "img/".$picture;
            ?>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="<?php echo $image?>" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4><?php echo $rows['courseType']?></h4>
                  <p class="price"><?php echo $rows['fee']?></p>
                </div>

                <h3><a href="course-preview 1.php"><?php echo $rows['courseName']?></a></h3>
                <p><?php echo $rows['short_descript']?></p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                    <span><?php echo $rows['teacher']?></span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-user"></i>&nbsp;<?php echo $rows['seat']?>
                    &nbsp;&nbsp;
                    <i class="bx bx-heart"></i>&nbsp;65
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <?php
              }
            }
          ?>
          
        </div>

      </div>
    </section><!-- End Courses Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    
  <div class="container d-md-flex py-4">
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->


  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>