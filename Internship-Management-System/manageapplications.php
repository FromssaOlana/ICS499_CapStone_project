<?php
  session_start();
  include('loginfunctions.php');
  require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Manage Applications</title>
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
    if (isLoggedIn()){
      include_once('header.html');
      echo "<h1>Manage Applications</h1>";
      $user_type = $_SESSION['usertype'];
      $user_name = $_SESSION['username'];
      
      if($user_type == 'Student'){
        $student_id = $_SESSION['studentid'];
        $result=$link->query("SELECT application_ID, student_name, student_id, student_signature, employer_signature,
        faculty_liaison_signature, dean_signature, internship_coordinator_signature, application_status FROM applications 
        where student_id = '".$student_id."' ORDER BY application_ID DESC, student_name DESC");
  
        echo "<div id='container'>";
        echo "<h2>Applications</h2>";
        while($row=$result->fetch_object()){
            echo "<div class='user-row'>";
            echo "<h3>Application #".$row->application_ID." : ";
            echo "".$row->student_name."</h3>";
            echo "<div class='created-date'>Application Status: ".$row->application_status."</div>";
            echo "<a href='viewApplications.php?studentid=".$row->student_id."'>View</a>";
            echo "</div>";
        }
        echo "</div>";
      } else if($user_type == 'Employer'){
        $company_name = $_SESSION['companyname'];
        $result=$link->query("SELECT application_ID, student_name, student_id, student_signature, employer_signature,
        faculty_liaison_signature, dean_signature, internship_coordinator_signature, application_status FROM applications 
        where company_name = '".$company_name."' ORDER BY application_ID DESC, student_name DESC");
  
        echo "<div id='container'>";
        echo "<h2>Applications</h2>";
        while($row=$result->fetch_object()){
            echo "<div class='user-row'>";
            echo "<h3>Application #".$row->application_ID." : ";
            echo "".$row->student_name."</h3>";
            echo "<div class='created-date'>Application Status: ".$row->application_status."</div>";
            echo "<a href='viewApplications.php?studentid=".$row->student_id."'>View</a>";
            echo "</div>";
        }
        echo "</div>";
      } else {
        $result=$link->query("SELECT application_ID, student_name, student_id, student_signature, employer_signature,
        faculty_liaison_signature, dean_signature, internship_coordinator_signature, application_status FROM applications ORDER BY application_ID DESC, student_name DESC");
  
        echo "<div id='container'>";
        echo "<h2>Applications</h2>";
        while($row=$result->fetch_object()){
            echo "<div class='user-row'>";
            echo "<h3>Application #".$row->application_ID." : ";
            echo "".$row->student_name."</h3>";
            echo "<div class='created-date'>Application Status: ".$row->application_status."</div>";
            echo "<a href='viewApplications.php?studentid=".$row->student_id."'>View</a>";
            echo "</div>";
        }
        echo "</div>";
      }

      $link->close();
    }
    else{
      include_once('header.html');
      isNotLoggedIn();
    }

  ?>

  </div>
    <?php include('footer.html'); ?>
  </div>
  
  </body>
</html>