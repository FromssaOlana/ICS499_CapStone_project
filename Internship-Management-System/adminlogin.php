<?php
session_start();
include('loginfunctions.php');
loginAdmin();
global $user_err, $pass_err;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/generalstylesheet.css">
<link rel="stylesheet" href="css/adminlogin.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>

<body>
  <div id="page-container">
  <div id="content-wrap">
  <?php
  if (isLoggedInAdmin()){
    include('header.html');
    echo "<h1>Redirecting to Admin Page. . .</h1>";
    header("refresh:1;url=manageusers.php");
  } elseif(isset($_SESSION['username'])){
    include('header.html');
    header('location:index.php');
  } else{
    echo "<nav>
        <ul>
          <li><a href=\"index.php\"><img src='images/logo2.png' alt='metrostate logo' height='50' width='200'></a></li>
          <li><a href=\"index.php\">Home</a></li>
          <li><a href=\"registerstudent.php\">Register</a></li>
          <li><a href=\"login.php\">Login</a></li>
        </ul>
      </nav>";
    include('header.html');
    echo '
    <h2>Admin Login</h2>
    <div id="form">
      <form action="adminlogin.php" method="post" name="adminForm">
        <label for="username">Admin Username</label>
        <input type="text" id="username" name="username" required><br>';
    echo "<div class='error'>".$user_err."</div>";
    echo'
        <label for="password">Admin Password</label>
        <input type="password" id="password" name="password" required>';
    echo "<div class='error'>".$pass_err."</div>";
    echo'
        <div id="button"><button type="submit">Login</button></div>
      </form>
    </div>
    ';
  }
  ?>
</div>
  <?php
    include('footer.html');
  ?>
  </div>
</body>
</html>
