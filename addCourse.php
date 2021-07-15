<?php
    session_start();
    include_once 'config.php';

    $teacherName;
    $teacherID;
    $id = $_SESSION['id'];
    $sql = "SELECT teacherID, teacherName FROM teacher WHERE userKeyID = $id";
    $result = mysqli_query($link,$sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        $row = mysqli_fetch_assoc($result);
        $teacherID = $row['teacherID'];
        $teacherName = $row['teacherName'];
    }else{
        echo "error";
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $courseName = $courseType = $fee = $hour = $description = $shortDescription = '';
        
        $courseName = trim($_POST["courseName"]);
        $courseType = trim($_POST["courseType"]);
        $fee = trim($_POST["fee"]);
        $hour = trim($_POST["hour"]);
        $shortDescription = trim($_POST["shortDescription"]);
        $filename = $_FILES["uploadfile"]["name"]; 
	    $tempname = $_FILES["uploadfile"]["tmp_name"];	 
		$folder = "img/".$filename;

        $sql = "INSERT INTO course (courseName, courseType, teacher, fee, hour, short_descript, coursePng, teacherKeyID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssiissi", $param_courseName, $param_courseType, $param_teacher, $param_fee, $param_hour, $param_shortDescription, $param_file, $param_teacherID);
            
            $param_courseName = $courseName;
            $param_courseType = $courseType;
            $param_teacher = $teacherName;
            $param_fee = $fee;
            $param_hour = $hour;
            $param_description = $description;
            $param_shortDescription = $shortDescription;
            $param_file = $filename;
            $param_teacherID = $teacherID;

            if(mysqli_stmt_execute($stmt)){
                if (move_uploaded_file($tempname, $folder)) { 
                    echo "Image uploaded successfully";
                    header("location: teacher dashboard.php"); 
                }else{ 
                    echo "Failed to upload image";
                }
                if(mysqli_query($link,$sql)){
                  header("location: teacher dashboard.php");
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }
    
            // Close statement
            mysqli_stmt_close($stmt);
        }else{
            echo 'error here';
        }
        mysqli_close($link);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>

        #formDiv{ width:100%;
        }

        select {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid black;
            border-radius: 4px;
        }

        table{
            margin : 0 auto;
            width: 800px;
        }

        td{
            padding: 5px;
        }

        #courseName, #description, #shortDescription{
            width:100%;
        }

        #teacherName{
            border: none;
        }


    </style>

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Teacher</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="mainPage.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Back to course</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="teacher dashboard.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Dashboard</span></a>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="profile.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Profile</span></a>
                </a>
                
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="https://www.twitch.tv/" target="_blank">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Live Stream</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Course
            </div>

            <li class="nav-item">
                <a class="nav-link" href="view course.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>View course</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Other</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="login.html">Add Course</a>
                        <a class="collapse-item" href="register.html">Update Course</a>
                        <a class="collapse-item" href="forgot-password.html">Delete course</a>
                    </div>
                </div>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="profile.php" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $teacherName; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div id="formDiv">
                <table>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype='multipart/form-data'>

                            <tr>
                            <td colspan = "5"><h1 class="h3 mb-0 text-gray-800">Add Course</h1><br></td>
                            </tr>
                            <tr>
                            <td colspan="3"><label for="courseName">Course Name : </label><br>
                            <input type="text" id="courseName" name="courseName" required><br><br></td>
                            <td colspan="2"><label for="teacherName">Teacher Name : </label><br>
                            <input type="text" id="teacherName" name="teacherName" value="<?php echo $teacherName; ?>" readonly><br><br></td>
                            </tr>

                            <tr>
                            <td colspan="5"><label for="courseType">Course Type : </label><br>
                            <select name="courseType" required>
                                <option value=""></option>
                                <option value="Web Development">Web Development</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Content">Content</option>
                                <option value="Culinary">Culinary</option>
                                <option value="History">History</option>
                                <option value="Language">Language</option>
                                <option value="Mathematics">Mathematics</option>
                                <option value="Science">Science</option>

                            </select><br><br></td>
                            </tr>

                            <tr>
                            <td colspan="3"><label for="fee">Fee : </label><br>RM
                            <input type="number" name="fee" min="0" max="500"><br><br></td>

                            <td colspan="2"><label for="duration">Duration : </label><br>
                            <input id='h' name='hour' type='number' min='0' max='24' value="0">
                            <label for='h'>h</label>
                            </td>
                            </tr>

                            <!-- <tr>
                            <td colspan="5"><label for="description">Description : </label><br>
                            <textarea name="description" id="description" rows="10" cols="70" maxlength="500" required></textarea><br><br></td>
                            </tr> -->

                            <tr>
                            <td colspan="5"><label for="shortDescription">Short Description : </label><br>
                            <textarea name="shortDescription" id="shortDescription" rows="5" cols="70" maxlength="200" required></textarea><br><br></td>
                            </tr>

                            <tr><td colspan="5">
                            <label><strong>Upload course picture</label><br>
                            <input type='file' name='uploadfile' /><br><br>
                            </tr></td>

                            <tr>
                                <td style="text-align:center;" colspan="5">
                                    <a href="teacher dashboard.php"><input type="button" value="Back"></a>
                                    <a href="teacher dashboard.php"><input type="submit" value="Submit"></a>
                                    <input type="reset">
                                </td>
                            <tr>
                        
                    </form>
                    <tr>
                    </tr>
                    
                    </table>
                </div>
                    
                
            </div>
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>