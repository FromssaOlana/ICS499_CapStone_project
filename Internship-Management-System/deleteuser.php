<?php
  session_start();
  include('loginfunctions.php');
  require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete User</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/generalstylesheet.css">
<link rel="stylesheet" href="css/delete.css">

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>
<body>
  <div id="page-container">
   <div id="content-wrap">

<?php
    if (isLoggedInAdmin()){
      include('header.html');
      echo "<h1 id='delete'>Delete User</h1>";
      echo "<form method='post'>";
      echo "<label>Confirm Deletion</label>";
      echo "<button type='submit' name='delete' id='deletebut'>Delete</button>";
      echo "</form>";
    } else {
      isNotLoggedInAdmin();
      include('header.html');
    }
  ?>

  <?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_name = $_GET['username'];

    $query = "DELETE FROM users WHERE User_Name='".$user_name."'";

    if(mysqli_query($link, $query)){
      echo "<script type='text/javascript'>alert('User successfully deleted!');</script>";
      header( "refresh:.5;url=manageusers.php" );
    }else {
      echo "ERROR: Could not able to execute $query. ".mysqli_error($db);
    }

  }

   ?>

  </div>
  <?php
    include('footer.html');
  ?>
  </div>
</body>
</html>
