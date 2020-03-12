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

<link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
</head>
<body>
<?php include('header.html');?>

<?php
    if (isLoggedInAdmin())
    {
      echo "<h1 id='delete'>Delete User</h1>";
      echo "<form method='post'>";
      echo "<label>Confirm Deletion</label>";
      echo "<button type='submit' name='delete' id='deletebut'>Delete</button>";
      echo "</form>";
    }
    else
    {
      isNotLoggedInAdmin();
    }
  ?>

  <?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_GET['id'];

    $query = "DELETE FROM users WHERE userID='".$id."'";

    if(mysqli_query($link, $query)){
      echo "<script type='text/javascript'>alert('User successfully deleted!');</script>";
      header( "refresh:.5;url=manageusers.php" );
    }else {
      echo "ERROR: Could not able to execute $query. ".mysqli_error($db);
    }

  }

   ?>
