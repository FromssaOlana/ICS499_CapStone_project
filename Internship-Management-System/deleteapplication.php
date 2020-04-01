<?php
  session_start();
  include('loginfunctions.php');
  require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Application</title>
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
    if (isLoggedIn()){
      include('header.html');
      echo "<h1 id='delete'>Delete Application</h1>";
      echo "<form method='post'>";
      echo "<label>Confirm Deletion</label>";
      echo "<button type='submit' name='delete' id='deletebut'>Delete</button>";
      echo "</form>";
    } else {
      include('header.html');
      isNotLoggedIn();
    }
  ?>

  <?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $application_id = $_GET['applicationid'];

    $query = "DELETE FROM applications WHERE application_id ='".$application_id."'";

    if(mysqli_query($link, $query)){
      echo "<script type='text/javascript'>alert('Application successfully deleted!');</script>";
      header( "refresh:.5;url=manageapplications.php" );
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