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
<link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
</head>
<body>
  <?php include('header.html');?>
  <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="registerstudent.php">Register</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  <h1>You are now logged out.</h1>
  <p>Returning to homepage. . .</p>
</body>
</html>
