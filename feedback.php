<?php
?>

<!DOCTYPE html>
<html>
  <head>
    <title>TeachNLearn Feedback Form</title>
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
      <form id="form_Feedback" action="mainPage.php">
        <h1>TeachNLearn Feedback Form</h1>
        <h4>Type of Feedback<span>*</span></h4>
        <select>
          <option value=""></option>
          <option value="">Enquiry</option>
          <option value="2">Complaint</option>
          <option value="3">Compliment</option>
          <option value="4">Suggestion</option>
        </select>
        
        <h4>Name<span>*</span></h4>
        <div class="occupation-block">
          <select>
            <option value="occupation" selected>Occupation</option>
            <option value="student">Student</option>
            <option value="freshGrad">Fresh Graduate/Unemployed</option>
            <option value="teach">Teachers</option>
            <option value="inexpert">Industry Expert</option>
          </select>
          <input class="name" type="text" name="name" placeholder="First" />
          <input class="name" type="text" name="name" placeholder="Last" />
        </div>
        <div class="row">
            <div class="column" >
                <h4>Email Address<span>*</span></h4>
                <input type="text" name="name" />
            </div>
            <div class="column">
                <h4>Contact Number<span>*</span></h4>
                <input type="text" name="name"/>
            </div>
        </div>
        
        <div class="row">
            <div class="column" >
                <h4>Your Course<span>*</span></h4>
                <select>
                    <option value="science">Science</option>
                    <option value="math">Mathematic</option>
                    <option value="compSc">Computer Science</option>
                    <option value="history">History</option>
                    <option value="practicalskill">Practical Skills</option>
                  </select>
            </div>
            <div class="column">                    
                <h4>Rate your TeachNLearn Satisfaction</h4>
                <div class="rate">
                    <input type="radio" id="star5" name="rate" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rate" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rate" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rate" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name="rate" value="1" />
                    <label for="star1" title="text">1 star</label>
                  </div>
            </div>
        </div>

             
        <h4>Feedback/Enquiry</h4>
        <p class="small">Please do not indicate your account or credit card number and banking instruction in your comments. Thank you for your time and valuable feedback.</small>
          <textarea rows="5"></textarea>
        <div class="btn-block">
          <button type="submit" href="mainPage.php">Send Feedback</button>
        </div>
      </form>
    </div>
  </div>
 </div>
 <div class=footer></div>
</div>

  </body>
</html>