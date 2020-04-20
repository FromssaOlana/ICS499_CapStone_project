<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/generalstylesheet.css">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/about.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/register.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">

<?php require APPROOT . '/views/inc/header.php'; ?>

  <div id = 'container'>
  <h1>About</h1>
  <p>This project is for senior students of the Bachelor of 
    Science in Computer Science by Prechar Xiong, Fromssa Olana, 
    Muhammad Shariff, and Christopher Schreiber. The project is 
    done for instructor Dr. Ismail Bile Hassan of Metropolitan 
    State University.</p> 
    
    <p> Metropolitan State University has a lengthy 
    process for its academic internship application due to its 
    physical application needing 5 physical signatures from 
    different individuals, which is inconvenient; since paper 
    travels slower than electricity. Metropolitan State University 
    needs an electronic internship management system to speed up 
    the academic internship application process.</p> 
    

    <p>The goal of this project is to create an easy and convenient 
      way to apply for the academic internship that’s available at 
      Metropolitan State University. The Metropolitan State Academic 
      Internship Management System is a web application that provides 
      students, internship faculty members and employers to manage and 
      sign the academic internship applications of students.</p>
    
    <br>

  <p>App Version: <?php echo $data['version']; ?></p>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>