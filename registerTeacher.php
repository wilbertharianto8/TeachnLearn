<?php
    require 'config.php';
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST"){

    $fullname = $ic = $number = $job = $course = '';

    $fullname = trim($_POST["name"]);
    $ic = trim($_POST["ic"]);
    $number = trim($_POST["number"]);
    $job = trim($_POST["occupation"]);
    $course = trim($_POST["course"]);
    $userKeyID = $_SESSION['id'];
    
    $sql = "INSERT INTO teacher (teacherName, ic, phoneNum, occupation, typeOfCourse, status, userKeyID) VALUES (?, ?, ?, ?, ?, ?,?)";
    
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssi", $param_fullname,$param_ic, $param_number, $param_job, $param_course, $param_status, $param_userID);
        
        // Set parameters
        $param_fullname = $fullname;
        $param_ic = $ic;
        $param_number = $number;
        $param_job = $job;
        $param_course = $course;
        $param_status = "pending";
        $param_userID = $userKeyID;

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            if(mysqli_query($link,$sql)){
              // Redirect to login page
              header("location: student dashboard.php");
            }
        } else{
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);

}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Become a teacher Now</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/feedback.css">
  </head>
  <body>
<div class=container>
    <div class="imagebg"></div>
    <div class="row " style="margin-top: 50px">
        <div class="col-md-6 col-md-offset-3 form-container">
    <div class="testbox">
      <form id="form_Feedback" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1>Registeration Form</h1>
        
        <div class="row">
            <div class="column" >
                <h4>Full name<span>*</span></h4>
                <input type="text" name="name">
            </div>
        </div>
        <div class="row">
            <div class="column">
                <h4>Identity Card<span>*</span></h4>
                <input type="text" name="ic" >
            </div>
            <div class="column">
                <h4>Contact Number<span>*</span></h4>
                <input type="text" name="number" >
            </div>
        </div>

        <h4>Occupation<span>*</span></h4>
        <select name="occupation">
          <option value=""></option>
          <option value="Fresh Graduate/Unemployed">Fresh Graduate/Unemployed</option>
          <option value="Teachers">Teachers</option>
          <option value="Industry Expert">Industry Expert</option>
        </select>
        
        <div class="row">
            <div class="column" >
                <h4>Your Course<span>*</span></h4>
                <select name="course">
                    <option value=""></option>
                    <option value="general">General course</option>
                    <option value="academic">Academic course</option>
                    <option value="general and academic">Both</option>
                  </select>
            </div>
            
        </div>

        <div class="btn-block">
          <button type="submit" href="student dashboard.php">Send</button>
        </div>
      </form>
    </div>
  </div>
 </div>
 <div class=footer></div>
</div>

  </body>
</html>