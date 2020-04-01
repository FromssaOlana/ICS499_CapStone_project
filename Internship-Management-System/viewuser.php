<?php
  session_start();
  include('loginfunctions.php');
  require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>View User</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/generalstylesheet.css">
<link rel="stylesheet" href="css/viewuser.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,800;1,700&display=swap" rel="stylesheet">
</head>

<body>
<div id="page-container">
  <div id="content-wrap">

<?php
    if (isLoggedInAdmin()){
      include('header.html');
      $username = $_GET['username'];
      $currentUserName = $_SESSION['valid_admin'];

      $result=$link->query("SELECT User_Type, User_Name, Password, Email, First_Name, Last_Name, Created
        FROM users WHERE User_Name='".$username."'");

      while($row=$result->fetch_object()){
        $username = $row->User_Name;
        echo "<div id='top'><h1>".$row->User_Name." Info</h1>";

        if($username != "admin" && $username != $currentUserName){
          echo "<div id='centered'><a href='deleteuser.php?username=".$row->User_Name."'>Delete User</a></div>";
        }
        echo "</div>";

        echo "<div id='container'>";
        echo "<table border = '1'>";
        echo "<tr><td>User Type </td><td>".$row->User_Type."</td></tr>";
        echo "<tr><td>User Since </td><td>".$row->Created."</td></tr>";
        echo "<tr><td>Email </td><td>".$row->Email."</td></tr>";
        echo "<tr><td>Full Name </td><td>".$row->First_Name." ".$row->Last_Name."</td></tr>";
        echo "</table>";
        echo "</div>";
      }

      $link->close();
    } else if(isLoggedIn()){
      include('header.html');
      $username = $_SESSION['username'];
      $result=$link->query("SELECT User_Type, User_Name, Password, Email, First_Name, Last_Name, Created
        FROM users WHERE User_Name='".$username."'");

      while($row=$result->fetch_object()){
        $username = $row->User_Name;
        echo "<div id='top'><h1>".$row->User_Name." Info</h1>";
        echo "</div>";

        echo "<div id='container'>";
        echo "<table border = '1'>";
        echo "<tr><td>User Type </td><td>".$row->User_Type."</td></tr>";
        echo "<tr><td>User Since </td><td>".$row->Created."</td></tr>";
        echo "<tr><td>Email </td><td>".$row->Email."</td></tr>";
        echo "<tr><td>Full Name </td><td>".$row->First_Name." ".$row->Last_Name."</td></tr>";
        echo "</table>";
        echo "</div>";
      }

      $link->close();
    } else {
      include('header.html');
      isNotLoggedInAdmin();
    }
  ?>
  </div>
    <?php include('footer.html'); ?>
  </div>

  </body>
</html>
