<?php
  session_start();
  include('loginfunctions.php');
  require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Manage Users</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/generalstylesheet.css">
<link rel="stylesheet" href="css/manageusers.css">

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>

<body>
  <div id="page-container">
  <div id="content-wrap">

<?php
    if (isLoggedInAdmin()){
      include_once('header.html');
      echo "<h1>Manage Users</h1>";
      echo "<div id='admin-link'><a href='addadmin.php'>Add Admin Privileges</a>";
      echo "<a href='createAdmin.php'>Create Admin</a>";
      echo "<a href='createStudent.php'>Create Student</a>";
      echo "<a href='createEmployer.php'>Create Employer</a>";
      echo "<a href='createDean.php'>Create Dean</a>";
      echo "<a href='createFacultyLiaison.php'>Create Faculty Liaison</a>";
      echo "<a href='createInternshipCoordinator.php'>Create Internship Coordinator</a></div>";


      //$result=$link->query("SELECT Username, Email, created, admin FROM users ORDER BY admin DESC, created DESC");
      $result=$link->query("SELECT User_Type, User_Name, Password, Email, First_Name, Last_Name, Created FROM users ORDER BY User_Type DESC, Created DESC");

      echo "<div id='container'>";
      echo "<h2>Users</h2>";
      while($row=$result->fetch_object()){
        if($row->User_Name != 'admin'){
          echo "<div class='user-row'>";
          echo "<h3>".$row->User_Name." - ";
          echo "".$row->User_Type."</h3>";

          echo "<div class='created-date'>User Since ".$row->Created."</div>";
          echo "<a href='viewuser.php?username=".$row->User_Name."'>View</a>";
          echo "</div>";
        }
      }
      echo "</div>";

      $link->close();
    }
    else{
      include_once('header.html');
      isNotLoggedInAdmin();
    }
  ?>

  </div>
    <?php include('footer.html'); ?>
  </div>
  
  </body>
</html>
