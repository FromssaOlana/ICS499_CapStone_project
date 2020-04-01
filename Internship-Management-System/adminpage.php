<?php
  session_start();
  include('loginfunctions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/generalstylesheet.css">
<link rel="stylesheet" href="css/adminpage.css">

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>
<body>
  <div id="page-container">
   <div id="content-wrap">

  <?php
    if (isLoggedInAdmin()){
      $user_name = $_SESSION['valid_admin'];
      include('header.html');
      echo "<h1>Admin Dashboard</h1>";
      echo "<div id='links'>";
      echo "<a href='manageusers.php'>Manage Users</a>";
      echo "<a href='viewuser.php?username=".$user_name."'>View Admin User Information</a>";
      echo "</div>";
    } else {
      isNotLoggedInAdmin();
    }
  ?>
  </div>
  <?php
    include('footer.html');
  ?>
  </div>
</body>
</html>
