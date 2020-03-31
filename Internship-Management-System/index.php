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
<link rel="stylesheet" href="css/displayconcerts.css">
<link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
</head>
<body>
  <?php isLoggedIn();?>

  <div class="header centered">
    <img src="images/students.jpg">
    <h1>Metrostate Academic Internship Management System</h1>
  </div>
   <?php include('footer.html');?>
</body>
</html>
