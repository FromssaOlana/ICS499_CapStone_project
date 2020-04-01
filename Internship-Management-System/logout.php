<?php
session_start();
include('loginfunctions.php');
logout();
header("refresh:3;url=index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Logged Out</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/generalstylesheet.css">
<link rel="stylesheet" href="css/logout.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>
<body>
  <div id="page-container">
   <div id="content-wrap">
  <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="registerstudent.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
    <?php include('header.html');?>
  <h1>You are now logged out.</h1>
  <p>Returning to homepage. . .</p>
  </div>
  <?php include('footer.html');?>
  </div>  
</body>
</html>
