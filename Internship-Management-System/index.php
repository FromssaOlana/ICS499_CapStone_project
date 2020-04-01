<?php
session_start();
include('loginfunctions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/generalstylesheet.css">
<link rel="stylesheet" href="css/homepage.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>
<body>
   <div id="page-container">
   <div id="content-wrap">
  <?php 
    if(isLoggedIn()){
      include('header.html');
    } else{

    }
  ?>

  <div class="header centered">
    <img src="images/students.jpg">
    <h1>Metrostate Academic Internship Management System</h1>
  </div>
  </div>
   <?php include('footer.html');?>
  </div>
</body>
</html>
